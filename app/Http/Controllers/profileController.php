<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index(){
        return view ('dashboard.profile.index');
    }

    function update(Request $request){
        $request->validate([
            'picture'=>'mimes:jpeg,jpg,png,gif'
        ],[
            'picture.mimes' => 'JPEG/JPG/PNG only'
        ]);
        //membuat file fotonya jadi unik
        if($request->hasFile('picture')){
            $picture_file = $request->file('picture');
            $picture_extension = $picture_file->extension();
            $new_picture = date('ymdhis').".$picture_extension";
            $picture_file->move(public_path('picture'),$new_picture);
            //jika ada update foto
            //cek dulu foto lama, delete
            $old_picture = get_metavalue('picture');
            File::delete(public_path('picture')."/".$old_picture);

            metadata::updateOrCreate(['metakey'=>'picture'],['metavalue'=>$new_picture]);
        }
        metadata::updateOrCreate(['metakey'=>'description'],['metavalue'=>$request->description]);
        metadata::updateOrCreate(['metakey'=>'linkedin'],['metavalue'=>$request->linkedin]);
        metadata::updateOrCreate(['metakey'=>'github'],['metavalue'=>$request->github]);
        metadata::updateOrCreate(['metakey'=>'instagram'],['metavalue'=>$request->instagram]);
        return redirect()->route('profile.index')->with('Success','Profile is updated successfully');
   
   
   
    }
}
