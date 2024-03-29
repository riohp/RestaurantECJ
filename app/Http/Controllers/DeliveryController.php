<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Utils\TableHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryProduct;
use Illuminate\Support\Facades\Crypt;

class DeliveryController extends Controller
{
    public function index(){
        
        $delivery = Delivery::all();
        return view('delivery.index', compact('delivery'));
    }   

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delivery.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $deliveryByUser=  Delivery::where('client_id', $user->id)->where('status', 1)->first();
        /* dd($deliveryByUser); */
        if(!$deliveryByUser== null and $deliveryByUser->count() > 0){
            return TableHelper::showDelivery($deliveryByUser->id);
        }


        $validatedData['cellphone'] = $user->cellphone;
        $validatedData['address'] = $user->address;
        $validatedData['client_id'] = $user->id; 
        $newDelivery = Delivery::create($validatedData);
        $newDeliveryId = $newDelivery->id;

        return redirect()->route('delivery.show', ['id_delivery' => encrypt($newDeliveryId), 'id_category' => encrypt(-1)]);
    }

    /**
     * Display the specified table.
     * 
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show($id_delivery_encrypted, $id_category_encrypted)
    {
        $id = Crypt::decryptString($id_delivery_encrypted);
        $deliveryId = unserialize($id);

        $categoryIdUnserialize = Crypt::decryptString($id_category_encrypted);
        $id_category = unserialize($categoryIdUnserialize);
        return TableHelper::processTableDataDelivery($deliveryId, $id_category);
    }


    /**
     * Update the specified delivery in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'cellphone' => 'required|integer',
            'address' => 'required|max:255',
            'invoice_id' => 'required|integer',
        ]);

        $delivery->update($validatedData);

        return redirect()->route('delivery.index')->with('success', 'Delivery actualizado correctamente');
    }

    public function destroy(Request $request)
    {
        $delivery = Delivery::find($request->delivery);
        $delivery->changeStatus();
        return redirect()->route('delivery.index')->with('success', 'Delivery deleted successfully');
    }

}
