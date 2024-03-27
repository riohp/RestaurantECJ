<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\ItemInvoice;
use App\Models\TableProduct;
use App\Utils\TableHelper;
use App\Utils\ShowDataInvoice;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Crypt;


class InvoiceController extends Controller
{   
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', compact('invoices'));
    }



    public function invoiceBill(Request $request)
    {
     
        $responsible = auth()->user()->id;
        $itemsJsonEncrypted = $request->input('items');
        $itemsJsonString = Crypt::decryptString($itemsJsonEncrypted);
        $itemsDeserealize = unserialize($itemsJsonString);
        $items = json_decode($itemsDeserealize, true);

        $tableEncryptedID = $request->input('table_id');
        $tableIdString = Crypt::decryptString($tableEncryptedID);
        $tableId = unserialize($tableIdString);

        $type_invoice = $request->input('type_invoice');
        $total = 0;
    

        foreach ($items as $status => $products) {
            foreach ($products as $productId => $item) {
                if($item['status'] == 'process' or $item['status'] == 'cooking'){
                    if($tableId){
                        return TableHelper::processTableData($tableId, -1, null, 'No se puede facturar, hay productos en proceso o cocinando.');
                    }else{
                        return TableHelper::processTableDataDelivery($request->deliveries_id, -1, null, 'No se puede facturar, hay productos en proceso o cocinando.');
                    }
                    
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
    
        TableProduct::where('table_id', $tableId)->delete();
    
        return redirect()->route('invoice.index');
    }
    
   

    public function show(Request $request)
    {   
        $invoiceIdEncrypted = $request->input('invoice');
        $invoiceDecrypt = Crypt::decryptString($invoiceIdEncrypted);
        $invoiceId = unserialize($invoiceDecrypt);
        $invoice = Invoice::with('items.product')->find($invoiceId);

        $categoryEncrypted = $request->input('category_id');
        $categoryDecrypt = Crypt::decryptString($categoryEncrypted);
        $categoryId = unserialize($categoryDecrypt);
        return view('invoice.show', compact('invoice', 'categoryId'));
    }



    public function generateInvoice(Request $request)
    {  
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper(array(0, 0, 310, 641), 'portrait');
        $invoiceId = $request->input('invoice');
        $invoice = Invoice::with('items.product')->find($invoiceId);
        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg';
        $imageContent = file_get_contents($imageUrl);
        $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageContent);
        $html = view('invoice.pdfInvoice', compact('invoice', 'imageBase64'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        return response($output)
            ->header('Content-Type', 'application/pdf');
    }
    

    public function destroy(Request $request)
    {
        $invoiceIdEncrypted = $request->input('invoice');
        $invoiceDecrypt = Crypt::decryptString($invoiceIdEncrypted);
        $invoiceId = unserialize($invoiceDecrypt);
        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->changeStatus();
        return redirect()->route('invoice.index')->with('success', 'Factura eliminada correctamente');
    }
    
}
