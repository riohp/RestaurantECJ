<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\ItemInvoice;
use App\Models\TableProduct;
use App\Utils\TableHelper;

class InvoiceController extends Controller
{   
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', compact('invoices'));
    }



    public function invoiceBill(Request $request)
    {
      
        $responsible = 1;
        $itemsJson = $request->input('items');
        $items = json_decode($itemsJson, true);
  
        $type_invoice = $request->input('type_invoice');
        $total = 0;
    

        foreach ($items as $status => $products) {
            foreach ($products as $productId => $item) {
                if($item['status'] == 'process' or $item['status'] == 'cooking'){
                    return TableHelper::processTableData($request->table_id, -1, null, 'No se puede facturar, hay productos en proceso o cocinando.');
                }
            }
        }

  
        foreach ($items as $status => $products) {
            foreach ($products as $productId => $item) {
                $total += $item['subtotal'];
            }
        }
    
        $invoice = Invoice::create([
            'total' => $total,
            'type_invoice' => $type_invoice,
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
    
        TableProduct::where('table_id', $request->table_id)->delete();
    
        return redirect()->route('invoice.index');
    }
    


    public function show(Request $request)
    {   
        $invoiceId = $request->input('invoice');
        $invoice = Invoice::with('items.product')->find($invoiceId);
        return view('invoice.show', compact('invoice'));
    }


    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->changeStatus();
        return redirect()->route('invoice.index')->with('success', 'Factura actualizada correctamente');
    }
    
}
