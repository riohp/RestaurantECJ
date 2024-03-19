<?php
namespace App\Utils;

use App\Models\Table;
use App\Models\Product;
use App\Models\Category;
use App\Models\TableProduct;
use App\Models\DeliveryProduct;
use App\Models\Delivery;

class TableHelper
{
    public static function processTableData($tableId, $id_category, $reload = null)
    {
        $table = Table::find($tableId);
        $categories = null;
        $products = null;
        if (!empty($table)) {
            if (!is_null($id_category) && is_numeric($id_category) && $id_category != -1) {
                $products = Product::where('category_id', $id_category)->get();
            }else{
                $categories = Category::all();
            }
           

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
                            'status' => $tableProduct->status,
                            'category_id' => $product->category_id,
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

            return view('table.show', compact('table', 'id_category', 'products', 'categories', 'items', 'total', 'reload'));
        } else {
            return response()->json(['error' => 'ID de la mesa inválido'], 400);
        }
    }


    public static function processTableDataDelivery($deliveryId, $id_category)
    {   
        $delivery = Delivery::find($deliveryId);

        if (!empty($delivery)) {
            if (!is_null($id_category) && is_numeric($id_category) && $id_category != -1) {
                $products = Product::where('status', 1)->where('category_id', $id_category)->get();
            } else {
                $products = Product::where('status', 1)->get();
            }
            $categories = Category::where('status', 1)->get();

            $tableitems = DeliveryProduct::where('deliveries_id', $deliveryId)->with('product')->get();
            $items = [];
            $total = 0; 

            foreach ($tableitems as $deliveryProduct) {
                $product = $deliveryProduct->product;

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

            return view('delivery.requestDelivery', compact('delivery','products', 'categories', 'items', 'total'));
        } else {
            return response()->json(['error' => 'ID de la del delyvery inválido'], 400);
        }
    }
}
