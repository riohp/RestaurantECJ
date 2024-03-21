<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Utils\TableHelper;
use App\Models\DeliveryProduct;
use Illuminate\Database\QueryException;
class DeliveryProductController extends Controller
{

    
    public function store(Request $request)
    {
        try {
            DeliveryProduct::create($request->all());
            return TableHelper::processTableDataDelivery($request->deliveries_id, null);
            } catch (QueryException $e) {
            return TableHelper::processTableDataDelivery($request->deliveries_id, null);
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

        return TableHelper::processTableDataDelivery($request->deliveries_id, null);
    }


    
    public function updateStatus(Request $request)
    {
        $deliveryProduct = DeliveryProduct::where('deliveries_id', $request->deliveries_id)
            ->where('product_id', $request->product_id)
            ->where('status', 'process')
            ->first();

        if ($deliveryProduct) {
            $deliveryProduct->status = $request->status;
            $deliveryProduct->save();
        }

        return TableHelper::processTableDataDelivery($request->deliveries_id, $request->status);
    }

    public function updateStatusItems(Request $request)
    {

        $deliveryProducts = DeliveryProduct::where('deliveries_id', $request->deliveries_id)->get();

        foreach ($deliveryProducts as $deliveryProduct) {
            $deliveryProduct->status = $request->status;
            $deliveryProduct->save();
        }
        return TableHelper::processTableDataDelivery($request->deliveries_id, null);
    }

}
