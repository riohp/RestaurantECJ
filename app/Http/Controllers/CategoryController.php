<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect()->route('category.index')->with('success', 'Categoria creada correctamente');
    }


    public function show(Request $request)
    {
        $encryptedId = $request->input('encrypted_category_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    } 

    public function edit(Request $request)
    {
        $encryptedId = $request->input('encrypted_category_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }



    public function update(CategoryRequest $request)
    {
        $encryptedId = $request->input('encrypted_category_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return redirect()->route('category.index')->with('success', 'Categoria actualizada correctamente');
    }

    public function destroy(Request $request)
    {
        $encryptedId = $request->input('encrypted_category_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $category = Category::findOrFail($id);
        $category->status = 0;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Categoria eliminada correctamente');
    }
   

    public function activate(Request $request)
    {
        $encryptedId = $request->input('encrypted_category_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $category = Category::findOrFail($id);
        $category->status = 1;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Categoria activada correctamente');
    }
}
