<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;


class ProductController extends Controller
{


    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        $validateData = $request->validated();
        $imagePath = $request->file('image')->getRealPath();
        $imageData = base64_encode(file_get_contents($imagePath));
        $validateData['image'] = $imageData;
        Product::create($validateData);
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }




    public function show(Request $request)
    {
        $encryptedId = $request->input('product_encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


    public function edit(Request $request)
    {
        $encryptedId = $request->input('product_encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }


    public function update(ProductRequest $request)
    {
        $encryptedId = $request->input('product_encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $product = Product::findOrFail($id);
        $validateData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->getRealPath();
            $imageData = base64_encode(file_get_contents($imagePath));
            $validateData['image'] = $imageData;
        }
        $product->update($validateData);
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }


    public function destroy(Request $request)
    {
        $encryptedId = $request->input('product_encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }

    public function activate(Request $request)
    {
        $encryptedId = $request->input('product_encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto activado correctamente');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('products.index', compact('product'));
    }
}
