<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'".implode("','", $skill)."'";

        return view('dashboard.skill.index')->with(['skill'=> $skill]);
    }
    public function update(Request $request){
        //Jadi kalo ada method post, kita jalanin fungsi updatenya
        if($request->method()=='POST'){
            $request->validate([
                'tools'=>'required',
            ],[
                'tools.required'=>'Please insert the tools',
            ]);
            metadata::updateOrCreate(
                ['metakey' => 'tools'],
                ['metavalue' => $request->tools]
            );

            return redirect()->route('skill.index')->with('Success', 'Skill is updated successfully');
        }
    }
}
