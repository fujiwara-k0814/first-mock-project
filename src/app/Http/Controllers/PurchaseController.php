<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $item = Item::find($item_id);


        $user = Auth::user();

        $deliveryAddress = $user->delivery_address;


        return view('purchase', compact('item', 'deliveryAddress'));
    }

    public function store(PurchaseRequest $request, $item_id)
    {
        if (!$request->has('action')) {
            session(['payment' => $request->input('payment')]);

            return redirect("/purchase/$item_id")->withInput();
        }
        

        //DB処理
        $item = Item::find($item_id);

        $item->delivery_address_id = $request->input('delivery_address_id');

        $item->save();

        
        //Stripe処理
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $session = Session::create([
            'payment_method_types' => [session('payment')],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'unit_amount' => $item->price,
                    'product_data' => ['name' => $item->name],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/'),
            'cancel_url' => url("/purchase/$item_id"),
            'metadata' => [
                'item_id' => $item->id,
                'delivery_address_id' => $request->input('delivery_address_id'),
            ],
        ]);

        session()->forget('payment');

        return redirect($session->url);
    }
}
