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

    public function list()
    {
        $tables = Table::all();
        return view('table.listTable', compact('tables'));
    }

    public function store(TableRequest $request)
    {
        Table::create($request->validated());

        return redirect()->route('table.listTable')->with('success', 'Mesa creada correctamente');
    }

    public function show($encryptedId, $categoryIdEncrypted)
    {   
        $id = Crypt::decryptString($encryptedId);
        $tableId = unserialize($id);

        $categoryIdUnserialize = Crypt::decryptString($categoryIdEncrypted);
        $idCategory = unserialize($categoryIdUnserialize);
        return TableHelper::processTableData($tableId, $idCategory);
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

        return redirect()->route('table.listTable')->with('success', 'Mesa actualizada correctamente');
    }
    

    public function destroy(Request $request)
    {
        $encryptedId = $request->input('encrypted_table_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $table = Table::findOrFail($id);
        $table->status = 0;
        $table->save();
        return redirect()->route('table.listTable')->with('success', 'Mesa desactivada correctamente');
    }

    public function activate(Request $request)
    {   
        $encryptedId = $request->input('encrypted_table_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $table = Table::findOrFail($id);
        $table->status = 1;
        $table->save();
        return redirect()->route('table.listTable')->with('success', 'Mesa activada correctamente');
    }
}
