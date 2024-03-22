<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooking;
use App\Models\CookingCategory;
use App\Models\TableProduct;
use App\Models\DeliveryProduct;
use App\Utils\ShowDataInvoice;
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
        $cookingId = $request->input('cooking');
        return ShowDataInvoice::showDataInvoice($cookingId);
    }


    public function edit(Cooking $cooking)
    {
        return view('cooking.edit', compact('cooking'));
    }

    public function update(Request $request, Cooking $cooking)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        $cooking->update($validatedData);

        return redirect()->route('cooking.index')->with('success', 'Mesa actualizada correctamente');
    }
    

    public function destroy(Cooking $cooking)
    {
        $cooking->status = 0;
        $cooking->save();
        return redirect()->route('cooking.index')->with('success', 'Mesa eliminada correctamente');
    }

    public function activate(Cooking $cooking)
    {
        $cooking->status = 1; //activar mesa
        $cooking->save();
        return redirect()->route('cooking.index')->with('success', 'Mesa activada correctamente');
    }
}
