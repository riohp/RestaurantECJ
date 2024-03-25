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
    public static function processTableData($tableId, $id_category, $reload = null, $message = null)
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
            
                    $status = $tableProduct->status;
            
                    if (!isset($items[$status])) {
                        $items[$status] = [];
                    }
            
                    if (isset($items[$status][$productId])) {
                        $items[$status][$productId]['quantity'] += 1;
                        $items[$status][$productId]['subtotal'] += $price * $quantity;
                    } else {
                        $items[$status][$productId] = [
                            'id' => $productId,
                            'status' => $status,
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
            foreach ($items as $status => $statusItems) {
                foreach ($statusItems as $item) {
                    $total += $item['subtotal'];
                }
            }   
/*             dd($table, $id_category, $products, $categories, $items, $total, $reload, $message);
 */            return view('table.show', compact('table', 'id_category', 'products', 'categories', 'items', 'total', 'reload', 'message'));
        } else {
            return response()->json(['error' => 'ID de la mesa inválido'], 400);
        }
    }


    public static function processTableDataDelivery($deliveryId, $id_category, $reload = null, $message = null)
    {   
        $delivery = Delivery::find($deliveryId);
        $categories = null;
        $products = null;
        if (!empty($delivery)) {
            if (!is_null($id_category) && is_numeric($id_category) && $id_category != -1) {
                $products = Product::where('category_id', $id_category)->get();
            }else{
                $categories = Category::all();
            }
           

            $tableitems = DeliveryProduct::where('deliveries_id', $deliveryId)->with('product')->get();
            $items = [];
            $total = 0; 

            foreach ($tableitems as $tableProduct) {
                $product = $tableProduct->product;
            
                if (!is_null($product)) {
                    $productId = $product->id;
                    $price = $product->price;
                    $quantity = 1;
            
                    $status = $tableProduct->status;
            
                    if (!isset($items[$status])) {
                        $items[$status] = [];
                    }
            
                    if (isset($items[$status][$productId])) {
                        $items[$status][$productId]['quantity'] += 1;
                        $items[$status][$productId]['subtotal'] += $price * $quantity;
                    } else {
                        $items[$status][$productId] = [
                            'id' => $productId,
                            'status' => $status,
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
            foreach ($items as $status => $statusItems) {
                foreach ($statusItems as $item) {
                    $total += $item['subtotal'];
                }
            }   
            return view('delivery.requestDelivery', compact('delivery', 'id_category', 'products', 'categories', 'items', 'total', 'reload', 'message'));
        } else {
            return response()->json(['error' => 'ID del delivery inválido'], 400);
        }
    }

    public static function showDelivery($deliveryId)
    {   
        $delivery = Delivery::find($deliveryId);
    
        $tableitems = DeliveryProduct::where('deliveries_id', $deliveryId)->with('product')->get();
        $items = [];
        $total = 0; 

        foreach ($tableitems as $tableProduct) {
            $product = $tableProduct->product;
        
            if (!is_null($product)) {
                $productId = $product->id;
                $price = $product->price;
                $quantity = 1;
        
                $status = $tableProduct->status;
        
                if (!isset($items[$status])) {
                    $items[$status] = [];
                }
        
                if (isset($items[$status][$productId])) {
                    $items[$status][$productId]['quantity'] += 1;
                    $items[$status][$productId]['subtotal'] += $price * $quantity;
                } else {
                    $items[$status][$productId] = [
                        'id' => $productId,
                        'status' => $status,
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

        foreach ($items as $status => $statusItems) {
            foreach ($statusItems as $item) {
                $total += $item['subtotal'];

            }
            
        } 

        return view('delivery.show', compact('items', 'total', 'delivery'));
    }
}
