<?php
namespace App\Utils;

use App\Models\Table;
use App\Models\Products;
use App\Models\Category;
use App\Models\TableProduct;

class TableHelper
{
    public static function processTableData($tableId, $id_category)
    {
        $table = Table::find($tableId);

        if (!empty($table)) {
            if (!is_null($id_category) && is_numeric($id_category) && $id_category != -1) {
                $products = Products::where('category_id', $id_category)->get();
            } else {
                $products = Products::all();
            }
            $categories = Category::all();

            $tableitems = TableProduct::where('table_id', $tableId)->with('product')->get();
            $items = [];
            $total = 0; 

            foreach ($tableitems as $tableProduct) {
                $product = $tableProduct->product;

                if (!is_null($product)) {
                    $productId = $product->id;
                    $price = $product->price;
                    $quantity = 1;

                    if (isset($items[$productId])) {
                        $items[$productId]['quantity'] += 1;
                        $items[$productId]['subtotal'] += $price * $quantity;
                    } else {
                        $items[$productId] = [
                            'id' => $productId,
                            'name' => $product->name,
                            'price' => $price,
                            'quantity' => $quantity,
                            'subtotal' => $price * $quantity,
                            'image' => $product->image,
                        ];
                    }  
                }
            }
            foreach($items as $item){
                $total += $item['subtotal'];
            }

            return view('table.show', compact('table', 'products', 'categories', 'items', 'total'));
        } else {
            return response()->json(['error' => 'ID de categoría o mesa inválido'], 400);
        }
    }
}
