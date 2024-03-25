<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\TableProduct;
use App\Utils\TableHelper;
use Illuminate\Database\QueryException;
use App\Utils\ShowDataInvoice;
use Illuminate\Support\Facades\Crypt;
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
            $tableEncryptedID = $request->input('table_id');
            $tableIdString = Crypt::decryptString($tableEncryptedID);
            $tableId = unserialize($tableIdString);

            $categoryEncryptedID = $request->input('category_id');
            $categoryIdString = Crypt::decryptString($categoryEncryptedID);
            $categoryId = unserialize($categoryIdString);

            $productEncryptedID = $request->input('product_id');
            $productIdString = Crypt::decryptString($productEncryptedID);
            $productId = unserialize($productIdString);

            TableProduct::create([
                'table_id' => $tableId,
                'product_id' => $productId,
                'category_id' => $categoryId,
            ]);

            return TableHelper::processTableData($tableId, $categoryId, true);

        } catch (QueryException $e) {
            return TableHelper::processTableData($tableId, $categoryId, true);
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
        $encryptedId = $request->input('table_id');
        $idTableString = Crypt::decryptString($encryptedId);
        $idTable = unserialize($idTableString);

        $encryptProductID = $request->input('product_id');
        $idProductString = Crypt::decryptString($encryptProductID);
        $idProduct = unserialize($idProductString);

        $encryptedCategoryID = $request->input('category_id'); 
        /* dd($encryptedCategoryID);  */
        $idCategoryString = Crypt::decryptString($encryptedCategoryID);
        $idCategory = unserialize($idCategoryString);


        $table = TableProduct::where('table_id', $idTable)
        ->where('product_id', $idProduct)
        ->first();

        if ($table) {
        $table->delete();
        }

        return TableHelper::processTableData($idTable, $idCategory, true);
    }


    public function updateStatus(Request $request)
    {
        $cookingEncryptId = $request->input('cooking_id');
        $cookingIdString = Crypt::decryptString($cookingEncryptId);
        $cooking_id = unserialize($cookingIdString);

        $tableEncryptId = $request->input('table_id');
        $tableIdString = Crypt::decryptString($tableEncryptId);
        $table_id = unserialize($tableIdString);

        $productEncryptId = $request->input('product_id');
        $productIdString = Crypt::decryptString($productEncryptId);
        $product_id = unserialize($productIdString);

        $tableProduct = TableProduct::where('table_id', $table_id)
            ->where('product_id', $product_id)
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
        $encryptedId = $request->input('table_id');
        $idTableString = Crypt::decryptString($encryptedId);
        $idTable = unserialize($idTableString);
        
        $tableProducts = TableProduct::where('table_id', $idTable)
            ->where('status', 'process')
            ->get();

        foreach ($tableProducts as $tableProduct) {
            $tableProduct->status = $request->status;
            $tableProduct->save();
        }
        return TableHelper::processTableData($idTable, -1, true);
    }
}