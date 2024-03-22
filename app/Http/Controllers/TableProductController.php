<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\TableProduct;
use App\Utils\TableHelper;
use Illuminate\Database\QueryException;
use App\Utils\ShowDataInvoice;
class tableProductController extends Controller
{
     public function index(){
   
    }


    public function create(){
        return view('table.create_table');
    }

    public function edit(TableProduct $table)
    {
            
        return view('table.edit', compact('table'));
    }

    public function store(Request $request)
    {
        try {
            TableProduct::create($request->all());
            return TableHelper::processTableData($request->table_id, $request->category_id, true);
        } catch (QueryException $e) {
            return TableHelper::processTableData($request->table_id, $request->category_id, true);
        }
    }


    public function show(TableProduct $table)
    {
        return view('table.show', compact('table'));        
    }

    public function update(Request $request, TableProduct $table)
    {
        $table->update($request->all());
        return redirect()->route('table.index');
    }

    public function destroy(Request $request)
    {
        $table = TableProduct::where('table_id', $request->table_id)
        ->where('product_id', $request->product_id)
        ->first();

        if ($table) {
        $table->delete();
        }

        return TableHelper::processTableData($request->table_id, $request->category_id, true);
    }


    public function updateStatus(Request $request)
    {
        $cooking_id = $request->input('cooking_id');
        $tableProduct = TableProduct::where('table_id', $request->table_id)
            ->where('product_id', $request->product_id)
            ->where('status', 'cooking')
            ->first();

        if ($tableProduct) {
            $tableProduct->status = $request->status;
            $tableProduct->save();
        }

        return ShowDataInvoice::showDataInvoice($cooking_id);
    }

    public function updateStatusItems(Request $request)
    {


        $tableProducts = TableProduct::where('table_id', $request->table_id)
        ->where('status', 'process')->get();

        foreach ($tableProducts as $tableProduct) {
            $tableProduct->status = $request->status;
            $tableProduct->save();
        }
        return TableHelper::processTableData($request->table_id, -1);
    }
}