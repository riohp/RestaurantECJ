<?php
namespace App\Utils;

use App\Models\Table;
use App\Models\Product;
use App\Models\Category;
use App\Models\TableProduct;
use App\Models\DeliveryProduct;
use App\Models\Delivery;
use App\Models\Cooking;
use App\Models\CookingCategory;
use App\Models\Invoice;
use App\Models\ItemInvoice;

class InvoceUtils
{
    public static function createInvoce($total, $type_invoice, $responsible, $items)
    {
      
        $invoice = Invoice::create([
            'total' => $total,
            'tipo' => $type_invoice,
            'responsible_id' => $responsible,
        ]);
    
        foreach ($items as $status => $products) {
            foreach ($products as $productId => $item) {
                ItemInvoice::create([
                    'cant' => $item['quantity'],
                    'product_id' => $item['id'],
                    'invoice_id' => $invoice->id,
                    'subTotal' => $item['subtotal'],
                ]);
            }
        }
    }

}
