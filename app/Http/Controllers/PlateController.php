<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;



class PlateController extends Controller
{
    
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('table_product.index', compact('products'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('table_product.create', compact('categories'));
    }

   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'category_id' => 'required|integer', // Corregido para validar 'category_id'
            'status' => 'required|integer|between:0,1',
        ]);
    
        $product = Products::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'cost' => $validatedData['cost'],
            'category_id' => $validatedData['category_id'], // Corregido para obtener 'category_id' de la solicitud
            'status' => $validatedData['status'],
        ]);
    
        return redirect()->route('table_product.index')->with('success', 'Producto creado correctamente');
    }
    
    

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('table_product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {   
        $categories = Category::all();
        return view('table_product.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'category_id' => 'required|integer',
            'status' => 'required|integer|between:0,1',
        ]);

        // Actualizar el usuario
        $product->update($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('table_product.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->status = 0; // desactivar usuario
        $product->save();
        return redirect()->route('table_product.index')->with('success', 'plato desactivado correctamente');
    }

    public function activate(Products $product)
    {
        $product->status = 1; // activar usuario
        $product->save();
        return redirect()->route('table_product.index')->with('success', 'plato activado correctamente');
    }

    public function search(Request $request)
{
    $search = $request->get('search');
    $products = Products::where('name', 'like', '%' . $search . '%')->get();
    return view('table_product.index', compact('product'));
}

}
