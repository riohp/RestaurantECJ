<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Utils\TableHelper;
use App\Models\DeliveryProduct;
use Illuminate\Database\QueryException;
use App\Utils\ShowDataInvoice;
use App\Utils\InvoceUtils;

class DeliveryProductController extends Controller
{


    public function store(Request $request)
    {
        try {
            DeliveryProduct::create($request->all());
            return redirect()->route('delivery.show', ['id_delivery' => encrypt($request->deliveries_id), 'id_category' => encrypt($request->category_id)]);
        } catch (QueryException $e) {
            return redirect()->route('delivery.show', ['id_delivery' => encrypt($request->deliveries_id), 'id_category' => encrypt($request->category_id)]);
        }
    }



    public function destroy(Request $request)
    {
        $delivery = DeliveryProduct::where('deliveries_id', $request->deliveries_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($delivery) {
            $delivery->delete();
        }

        return redirect()->route('delivery.show', ['id_delivery' => encrypt($request->deliveries_id), 'id_category' => encrypt($request->category_id)]);
    }



    public function updateStatus(Request $request)
    {
        $cooking_id = $request->input('cooking_id');
        $deliveryProduct = DeliveryProduct::where('deliveries_id', $request->deliveries_id)
            ->where('product_id', $request->product_id)
            ->where('status', 'cooking')
            ->first();
        
        if ($deliveryProduct) {
            $deliveryProduct->status = $request->status;
            $deliveryProduct->save();
        }
        $deliveryCooking  = DeliveryProduct::where('deliveries_id', $request->deliveries_id)
        ->where('status', 'cooking')
        ->first();
        if(empty($deliveryCooking ) ) {
            $tableitems = DeliveryProduct::where('deliveries_id', $request->deliveries_id)->with('product')->get();
            $result = TableHelper::generateItemsAndTotal($tableitems);
            $items = $result['items'];
            $total = $result['total'];
            InvoceUtils::createInvoce($total, 'delivery', auth()->user()->id, $items);
            $delivery = Delivery::find($request->deliveries_id);
            $delivery->status = '0';
            $delivery->save();
        }	
        return ShowDataInvoice::showDataInvoice($cooking_id);
    }

    public function updateStatusItems(Request $request)
    {

        $deliveryProducts = DeliveryProduct::where('deliveries_id', $request->deliveries_id)->get();

        foreach ($deliveryProducts as $deliveryProduct) {
            $deliveryProduct->status = $request->status;
            $deliveryProduct->save();
        }
        return TableHelper::showDelivery($request->deliveries_id);
    }

}
