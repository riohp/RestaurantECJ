<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooking;
use App\Models\CookingCategory;
use App\Models\TableProduct;
use App\Models\DeliveryProduct;
use App\Utils\ShowDataInvoice;
use App\Http\Requests\CookingRequest;
use Illuminate\Support\Facades\Crypt;
class CookingController extends Controller
{
    public function index()
    {
        $cookings = Cooking::all();
        return view('cooking.index', compact('cookings'));
    }


    public function create()
    {
        return view('cooking.create');
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ]);
        Cooking::create($validatedData);

        return redirect()->route('cooking.index')->with('success', 'Mesa creada correctamente');
    }


    public function show(Request $request)
    {
        $encryptedId = $request->input('encrypted_cooking_id');
        $id = Crypt::decryptString($encryptedId);
        $cookingId = unserialize($id);
        
        $categoryIdEncrypted = $request->input('category_id');
        $categoryIdUnserialize = Crypt::decryptString($categoryIdEncrypted);
        $idCategory = unserialize($categoryIdUnserialize);
        return ShowDataInvoice::showDataInvoice($cookingId, $idCategory);

    }


    public function edit(Request $request)
    {
        $encryptedId = $request->input('encrypted_cooking_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $cooking = Cooking::findOrFail($id);
        return view('cooking.edit', compact('cooking'));
    }

    public function update(CookingRequest $request)
    {
        $encryptedId = $request->input('encrypted_cooking_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $cooking = Cooking::findOrFail($id);
        $cooking->update($request->validated());

        return redirect()->route('cooking.index')->with('success', 'Mesa actualizada correctamente');
    }
    

    public function destroy(Request $request)
    {   
        $encryptedId = $request->input('encrypted_cooking_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $cooking = Cooking::findOrFail($id);
        $cooking->status = 0;
        $cooking->save();
        return redirect()->route('cooking.index')->with('success', 'Mesa eliminada correctamente');
    }

    public function activate(Request $request)
    {   
        $encryptedId = $request->input('encrypted_cooking_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $cooking = Cooking::findOrFail($id);
        $cooking->status = 1; //activar mesa
        $cooking->save();
        return redirect()->route('cooking.index')->with('success', 'Mesa activada correctamente');
    }
}
