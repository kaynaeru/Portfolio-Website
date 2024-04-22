<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;

class experienceController extends Controller
{
    protected $_type;

    public function __construct()
    {
        $this->_type = 'experience';
    }

    public function index()
    {
        $data = history::where('type', $this->_type)->orderBy('end_date', 'DESC')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    public function create()
    {
        return view('dashboard.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'info1' => 'required',
            'start_date' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'Title must be filled',
            'info1.required' => 'Institution name must be filled',
            'start_date.required' => 'Start date must be filled',
            'content.required' => 'Content must be filled',
        ]);

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type' => $this->_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $request->content
        ];
        
        history::create($data);
        return redirect()->route('experience.index')->with('Success', 'Experience added successfully');
    }

    public function edit($id)
    {
        $data = history::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard.experience.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'info1' => 'required',
            'start_date' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'Title must be filled',
            'info1.required' => 'Institution name must be filled',
            'start_date.required' => 'Start date must be filled',
            'content.required' => 'Content must be filled',
        ]);

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type' => $this->_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $request->content
        ];

        history::where('id', $id)->update($data);

        return redirect()->route('experience.index')->with('Success', 'Experience updated successfully');
    }

    public function destroy($id)
    {
        history::where('id', $id)->where('type', $this->_type)->delete();
        return redirect()->route('experience.index')->with('Success', 'Experience deleted successfully');
    }
}
