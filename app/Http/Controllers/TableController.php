<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Products;
use App\Models\Category;
use App\Utils\TableHelper;
Use App\Models\TableProduct;
use App\Http\Requests\TableRequest;
use Illuminate\Support\Facades\Crypt;

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


    public function store(TableRequest $request)
    {
        Table::create($request->validated());

        return redirect()->route('table.index')->with('success', 'Mesa creada correctamente');
    }

    public function show(Request $request)
    {   
        $tableId = $request->input('table');
        $table = Table::find($tableId);
        $id_category = $request->input('category_id');

        return TableHelper::processTableData($tableId, $id_category);

    }

    public function edit(Request $request)
    {
        $encryptedId = $request->input('encrypted_table_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $table = Table::findOrFail($id);
        return view('table.edit', compact('table'));
    }

    public function update(TableRequest $request)
    {
        $encryptedId = $request->input('encrypted_table_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $table = Table::findOrFail($id);
        $table->update($request->validated());
        return redirect()->route('table.index')->with('success', 'Mesa actualizada correctamente');
    }
    

    public function destroy(Request $request)
    {
        $encryptedId = $request->input('encrypted_table_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $table = Table::findOrFail($id);
        $table->status = 0;
        $table->save();
        return redirect()->route('table.index')->with('success', 'Mesa desactivada correctamente');
    }

    public function activate(Request $request)
    {   
        $encryptedId = $request->input('encrypted_table_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $table = Table::findOrFail($id);
        $table->status = 1;
        $table->save();
        return redirect()->route('table.index')->with('success', 'Mesa activada correctamente');
    }
}
