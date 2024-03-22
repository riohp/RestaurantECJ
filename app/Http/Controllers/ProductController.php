<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Schema;



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
        $productId = $request->input('product_id');
        $product = Product::find($productId);
        return view('products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }



    public function update(Request $request, Product $product)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'category_id' => 'required|integer',
            'status' => 'required|integer|between:0,1',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        $product->status = 0;
        $product->save();
        return redirect()->route('products.index')->with('success', 'plato desactivado correctamente');
    }

    public function activate(Product $product)
    {
        $product->status = 1;
        $product->save();
        return redirect()->route('products.index')->with('success', 'plato activado correctamente');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('products.index', compact('product'));
    }
}
