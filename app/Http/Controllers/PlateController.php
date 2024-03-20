<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;



class PlateController extends Controller
{


    public function index()
    {
        $products = Product::all();
        return view('table_product.index', compact('products'));
    }

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
            'category_id' => 'required|integer',
            'status' => 'required|integer|between:0,1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $request->file('image')->getRealPath();

        $imageData = base64_encode(file_get_contents($imagePath));

        $product = Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'cost' => $validatedData['cost'],
            'category_id' => $validatedData['category_id'],
            'status' => $validatedData['status'],
            'image' => $imageData,
        ]);

        return redirect()->route('table_product.index')->with('success', 'Producto creado correctamente');
}




    public function show(Product $product)
    {
        return view('table_product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('table_product.edit', compact('product', 'categories'));
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

        return redirect()->route('table_product.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        $product->status = 0;
        $product->save();
        return redirect()->route('table_product.index')->with('success', 'plato desactivado correctamente');
    }

    public function activate(Product $product)
    {
        $product->status = 1;
        $product->save();
        return redirect()->route('table_product.index')->with('success', 'plato activado correctamente');
    }

    public function search(Request $request)
{
    $search = $request->get('search');
    $products = Product::where('name', 'like', '%' . $search . '%')->get();
    return view('table_product.index', compact('product'));
}

}
