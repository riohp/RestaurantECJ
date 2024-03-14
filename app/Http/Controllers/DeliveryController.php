<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Utils\TableHelper;

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
        
        // $validatedData = $request->validate([
        //     'cellphone' => 'required|integer',
        //     'address' => 'required|max:255',
        // ]);
        $validatedData['cellphone'] = "123456789";
        $validatedData['address'] = "direcion de usuario logueado";
        $validatedData['client_id'] = 1;
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

    /**
     * Remove the specified table from storage.
     * 
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->status = 0;
        $delivery->save();
        return redirect()->route('delivery.index')->with('success', 'Delivery deleted successfully');
    }

    public function activate(Request $request)
    {
        $delivery = Delivery::find($request->delivery);
        $delivery->status = 1;
        $delivery->save();
        return redirect()->route('delivery.index')->with('success', 'Delivery activated successfully');
    }
}
