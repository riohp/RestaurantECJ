<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        Category::create($validatedData);

        return redirect()->route('category.index')->with('success', 'Categoria creada correctamente');
    }


    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
     
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        $category->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Categoria actualizada correctamente');
    }

    public function destroy(Category $category)
    {

        $category->status = 0;
        $category->save(); 

        return redirect()->route('category.index')->with('success', 'Categoria eliminada correctamente');
    }

    public function activate(Category $category)
    {

        $category->status = 1; 
        $category->save(); 
        return redirect()->route('category.index')->with('success', 'Categoria activada correctamente');
    }
}
