<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class StripeWebhookController extends Controller
{
    public function store(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        if ($payload['type'] === 'checkout.session.completed') {
            $session = $payload['data']['object'];

            $itemId = $session['metadata']['item_id'];

            $deliveryAddressId = $session['metadata']['delivery_address_id'];

            $item = Item::find($itemId);

            $item->delivery_address_id = $deliveryAddressId;

            $item->save();
        }
    }
}
