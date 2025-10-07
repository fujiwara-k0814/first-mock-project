<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();


        $user = Auth::user();
        
        if ($user) {
            $sold = $user->soldItems;
        } else {
            $sold = collect();
        }


        return view('index', compact('items', 'sold'));
    }

    public function show($item_id)
    {
        $item = Item::with(['categories', 'comments', 'condition', 'likes'])
                    ->withCount(['comments', 'likes'])
                    ->find($item_id);
        

        $user = Auth::user();

        if ($user) {
            $user->load(['delivery_address', 'likes']);
        } else {
            $user = collect();
        }



        return view('item', compact('item', 'user'));
    }
}
