<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\page;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index(){
        $about_id = get_metavalue('about');
        $about_data = page::where('id',$about_id)->first();

        $interest_id = get_metavalue('interest');
        $interest_data = page::where('id',$interest_id)->first();

        $experience_data = history::where('type','experience')->get();
        $education_data = history::where('type','education')->get();
        return view('front.index')->with([
            'about'=>$about_data,
            'interest'=>$interest_data,
            'experience'=>$experience_data,
            'education'=>$education_data
        ]);
    }
}