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
    public static function processTableData($tableId, $id_category)
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

            $tableItems = TableProduct::where('table_id', $tableId)->with('product')->get();
            $result = self::generateItemsAndTotal($tableItems);
            $items = $result['items'];
            $total = $result['total'];
            
       
/*             dd($table, $id_category, $products, $categories, $items, $total, $reload, $message);
 */            return view('table.show', compact('table', 'id_category', 'products', 'categories', 'items', 'total'));
        } else {
            return response()->json(['error' => 'ID de la mesa inválido'], 400);
        }
    }


    public static function processTableDataDelivery($deliveryId, $id_category)
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
            $result = self::generateItemsAndTotal($tableitems);
            $items = $result['items'];
            $total = $result['total'];
            return view('delivery.requestDelivery', compact('delivery', 'id_category', 'products', 'categories', 'items', 'total'));
        } else {
            return response()->json(['error' => 'ID del delivery inválido'], 400);
        }
    }

    public static function showDelivery($deliveryId)
    {   
        $delivery = Delivery::find($deliveryId);
    
        $tableitems = DeliveryProduct::where('deliveries_id', $deliveryId)->with('product')->get();
        $result = self::generateItemsAndTotal($tableitems);
        $items = $result['items'];
        $total = $result['total'];

        return view('delivery.show', compact('items', 'total', 'delivery'));
    }

    public static function generateItemsAndTotal($tableItems) 
    {
        
        $items = [];
        $total = 0; 

        foreach ($tableItems as $tableProduct) {
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
        return ['items' => $items, 'total' => $total];
    }

}
