<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Utils\TableHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryProduct;

class DeliveryController extends Controller
{
    public function index() {
        $deliveries = Delivery::all();
        return view('delivery.index', compact('deliveries'));
    }
    
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Suponiendo que estás obteniendo el pedido del usuario autenticado
        $user = auth()->user();
        $delivery = $user->delivery; // Suponiendo que la relación se llama "delivery" en tu modelo User
        return view('delivery.create', compact('delivery'));
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
    $deliveryByUser = Delivery::where('client_id', $user->id)->where('status', 1)->first();

    if ($deliveryByUser) {
        return TableHelper::showDelivery($deliveryByUser->id);
    }

    $validatedData['cellphone'] = $user->cellphone;
    $validatedData['address'] = $user->address;
    $validatedData['client_id'] = $user->id; 

    $newDelivery = Delivery::create($validatedData);
    $newDeliveryId = $newDelivery->id;

    return TableHelper::processTableDataDelivery($newDeliveryId, null);
}


    /**
     * Display the specified table.
     * 
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $deliveryId = $request->input('delivery');
        $id_category = $request->input('category_id');


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
