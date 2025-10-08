<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $item = Item::find($item_id);


        $user = Auth::user();

        $deliveryAddress = $user->delivery_address;


        return view('purchase', compact('item', 'deliveryAddress'));
    }

    public function tempPayment(Request $request, $item_id)
    {
        session(['payment' => $request->input('payment')]);
        
        return redirect("/purchase/{$item_id}");
    }

    public function store(Request $request, $item_id)
    {
        $item = Item::find($item_id);

        $item->delivery_address_id = $request->input('delivery_address_id');

        $item->save();


        session()->forget('payment');


        return redirect('/mypage?page=buy');
    }
}
