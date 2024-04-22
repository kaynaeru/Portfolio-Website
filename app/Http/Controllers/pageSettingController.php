<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use App\Models\page;
use Illuminate\Http\Request;

class pageSettingController extends Controller
{
    function index(){
        $pagedata = page::orderBy('title','ASC')->get();
        return view("dashboard.pagesetting.index")->with('pagedata',$pagedata);
    }
    function update(Request $request){
        metadata::updateOrCreate(['metakey'=>'about'],['metavalue'=>$request->about]);
        metadata::updateOrCreate(['metakey'=>'interest'],['metavalue'=>$request->interest]);

        return redirect()->route('pagesetting.index')->with('Success','Page setting updated successfully');
    }
}
