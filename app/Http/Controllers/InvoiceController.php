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
use App\Utils\InvoceUtils;


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
        $tableEncryptedID = $request->input('table_id');
        $tableIdString = Crypt::decryptString($tableEncryptedID);
        $tableId = unserialize($tableIdString);
        $tableItems = TableProduct::where('table_id', $tableId)->with('product')->get();
        $result = TableHelper::generateItemsAndTotal($tableItems);
        $items = $result['items'];
        $total = $result['total'];
        
        
        foreach ($items as $status => $products) {
            foreach ($products as $productId => $item) {
                if($item['status'] == 'process' or $item['status'] == 'cooking'){
                    if($tableId){
                        return redirect()->route('table.show', ['id_table' => $tableEncryptedID, 'id_category' => encrypt(-1)])->with('error', 'No se puede facturar, hay productos en proceso o cocinando.');
                    }else{
                        return redirect()->route('table.show', ['id_table' => $tableEncryptedID, 'id_category' => encrypt(-1)])->with('error', 'No se puede facturar, hay productos en proceso o cocinando.');
                    }
                    
                }
            }
        }

        InvoceUtils::createInvoce($total, 'site', $responsible, $items);
      
    
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
