<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Utils\TableHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryProduct;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\DeliveryRequest;

class DeliveryController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        if ($search && !empty($search)) {
            $deliveries = Delivery::where('cellphone', 'like', '%' . $search . '%')
                ->paginate(20)
                ->appends(['search' => $search]);
        } else {
            $deliveries = Delivery::paginate(20);
        }
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


        return redirect()->route('delivery.show', ['id_delivery' => encrypt($newDeliveryId), 'id_category' => encrypt(-1)]);

    }


    public function edit(Request $request)
    {

        $deliveryEncryptedId = $request->input('delivery_id');
        $idString = Crypt::decryptString($deliveryEncryptedId);
        $id = unserialize($idString);
        $delivery = Delivery::findOrFail($id);

        return view('delivery.edit', compact('delivery'));
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
    public function update(DeliveryRequest $request)
    {
        $deliveryEncryptedId = $request->input('delivery_id');
        $idString = Crypt::decryptString($deliveryEncryptedId);
        $id = unserialize($idString);
        $delivery = Delivery::findOrFail($id);
        $delivery->update($request->validated());
        return redirect()->route('delivery.index')->with('success', 'Delivery actualizado correctamente');
    }


    public function destroy(Request $request)
    {
        $deliveryEncryptedId = $request->input('delivery_id');
        $idString = Crypt::decryptString($deliveryEncryptedId);
        $id = unserialize($idString);
        $delivery = Delivery::findOrFail($id);
        $delivery->changeStatus();
        return redirect()->route('delivery.index')->with('success', 'Delivery deleted successfully');
    }
}
