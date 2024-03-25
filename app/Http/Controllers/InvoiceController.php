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
                    if($request->table_id){
                        return TableHelper::processTableData($request->table_id, -1, null, 'No se puede facturar, hay productos en proceso o cocinando.');
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
    
        TableProduct::where('table_id', $request->table_id)->delete();
    
        return redirect()->route('invoice.index');
    }
    
   

    public function show(Request $request)
    {   
        $invoiceId = $request->input('invoice');
        $invoice = Invoice::with('items.product')->find($invoiceId);
        return view('invoice.show', compact('invoice'));
    }


    public function generateInvoice(Request $request)
    {
        // Opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper(array(0, 0, 310, 641), 'portrait');
        
        // ID de la factura
        $invoiceId = $request->input('invoice');
        $invoice = Invoice::with('items.product')->find($invoiceId);
        
        // URL de la imagen
        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg';
        
        // Obtener el contenido de la imagen
        $imageContent = file_get_contents($imageUrl);
        
        // Convertir la imagen en base64
        $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageContent);
        
        // Renderizar la vista invoice.pdfInvoice con los datos de la factura y la imagen
        $html = view('invoice.pdfInvoice', compact('invoice', 'imageBase64'))->render();
        
        // Cargar el HTML en Dompdf y renderizar el PDF
        $dompdf->loadHtml($html);
        $dompdf->render();
        
        // Obtener el contenido del PDF generado
        $output = $dompdf->output();
        
        // Devolver el PDF como respuesta
        return response($output)
            ->header('Content-Type', 'application/pdf');
    }
    
    

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->changeStatus();
        return redirect()->route('invoice.index')->with('success', 'Factura actualizada correctamente');
    }
    
}
