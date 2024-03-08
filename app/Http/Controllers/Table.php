<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use app\Models\Category;

class Table extends Controller
{
    public function index(){
        $categorys = Category::all();

        return view ('index', compact('categorys'));
    }


    public function create(){
        return view('note');
    
    }

    public function edit(Note $note)
    {
            
        return view('edit', compact('note'));
    }

    public function store(Request $request)
    {
        Note::create($request->all());
        return redirect()->route('index');
    }


    public function show(Note $note)
    {
        return view('show', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return redirect()->route('index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('index');

    }
}
