<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        // Crear una nueva categoria
        Category::create($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('category.index')->with('success', 'Categoria creada correctamente');
    }

    /**
     * Display the specified category.
     * 
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }


    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        // Actualizar la categoria
        $category->update($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('category.index')->with('success', 'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Eliminar la categoria
        $category->status = 0; //desactivar category
        $category->save(); 
        // Redirigir a la página adecuada
        return redirect()->route('category.index')->with('success', 'Categoria eliminada correctamente');
    }

    public function activate(Category $category)
    {
        // Activar la categoria
        $category->status = 1; //activar category
        $category->save(); 
        // Redirigir a la página adecuada
        return redirect()->route('category.index')->with('success', 'Categoria activada correctamente');
    }
}
