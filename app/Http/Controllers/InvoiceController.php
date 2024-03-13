<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\ItemInvoice;
use App\Models\TableProduct;

class InvoiceController extends Controller
{
    public function invoiceBill(Request $request)
    {   
        $responsible = 1;
        $items = $request->input('items');
        $type_invoice = $request->input('type_invoice');
        $total = 0;

        $itemsArray = json_decode($items[0], true);

        foreach ($itemsArray as $item) {
            $total += $item['subtotal'];
        }

        $invoice = Invoice::create([
            'total' => $total,
            'type_invoice' => $type_invoice,
            'responsible_id' => $responsible,
        ]);

        foreach ($itemsArray as $item) {
            ItemInvoice::create([
                'cant' => $item['quantity'],
                'product_id' => $item['id'],
                'invoice_id' => $invoice->id,
                'subTotal' => $item['subtotal'],
            ]);
        }

        TableProduct::where('table_id', $request->table_id)->delete();


        return redirect()->route('table.index');
    }

}
