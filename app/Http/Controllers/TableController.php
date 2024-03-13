<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Products;
use App\Models\Category;
use App\Utils\TableHelper;
Use App\Models\TableProduct;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('table.index', compact('tables'));
    }

    public function create()
    {
        return view('table.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'capaciodad' => 'required|integer',
            'location' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        Table::create($validatedData);

        return redirect()->route('table.index')->with('success', 'Mesa creada correctamente');
    }

    public function show(Request $request)
    {   
        $tableId = $request->input('table');
        $table = Table::find($tableId);
        $id_category = $request->input('category_id');

        return TableHelper::processTableData($tableId, $id_category);
    }

    public function edit(Table $table)
    {
        return view('table.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {

        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'capaciodad' => 'required|integer',
            'location' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        $table->update($validatedData);

        return redirect()->route('table.index')->with('success', 'Mesa actualizada correctamente');
    }
    

    public function destroy(Table $table)
    {
        $table->status = 0;
        $table->save();
        return redirect()->route('table.index')->with('success', 'Mesa eliminada correctamente');
    }


    public function activate(Table $table)
    {
        $table->status = 1; //activar mesa
        $table->save();
        return redirect()->route('table.index')->with('success', 'Mesa activada correctamente');
    }
}
