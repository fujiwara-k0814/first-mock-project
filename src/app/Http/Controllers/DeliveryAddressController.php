<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class DeliveryAddressController extends Controller
{
    public function edit($item_id)
    {
        $item = Item::find($item_id);


        $user = Auth::user();

        $deliveryAddress = $user->delivery_address;


        return view('address', compact('item', 'deliveryAddress'));
    }

    public function update(Request $request, $item_id)
    {
        $deliveryAddress = $request->only([
            'postal_code',
            'address',
            'building'
        ]);

        $user = Auth::user();

        $user->delivery_address->update($deliveryAddress);


        return redirect("/purchase/{$item_id}");
    }
}
