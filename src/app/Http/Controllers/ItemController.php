<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user) {
            $soldItemIds = $user->soldItems()->pluck('id');

            $items = Item::whereNotIn('id', $soldItemIds)->get();
        }else{
            $items = Item::all();
        }


        return view('index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['categories', 'comments', 'condition', 'likes'])
                    ->withCount(['comments', 'likes'])
                    ->find($item_id);
        

        $comments = Comment::where('item_id', $item_id)->get();


        session()->forget('payment');


        return view('item', compact('item', 'comments'));
    }
}
