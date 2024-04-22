<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{
    function index(){
        return view('auth.index');
    }
    
    function redirect(){
        return Socialite::driver('google')->redirect();
    }
    function callback(){
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $avatar = $user->avatar; //mengambil avatar dari akun google buat jadi iconnya

        $periksa = User::where('email',$email)->count();
        //kalo di database ada emailnya, maka akan diredirect
        if($periksa > 0){
            $avatar_access = $id.".jpg";
            $isi_file = file_get_contents($avatar);
            File::put(public_path("admin/images/faces/$avatar_access"),$isi_file); //meletakkan file avatar ke folder

            $user = User::updateOrCreate(
                ['email'=>$email],
                [
                    'name'=>$name,
                    'id_google'=>$id,
                    'avatar'=>$avatar_access
                ]
            ); 
            Auth::login($user);
            return redirect()->to('dashboard');
        }
        //kalo di databasenya gaada emailnya
        else{
            return redirect()->to('auth')->with('error','Your account is not permitted to open this');
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->to('auth');
    }
}
