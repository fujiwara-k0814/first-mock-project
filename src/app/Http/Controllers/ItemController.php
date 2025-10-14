<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if (Auth::check()) {
            if ($request->query('tab') === 'mylist') {
                $items = $user->likedItems()->keywordSearch($request->keyword)->get();
            }else{
                $soldItemIds = $user->soldItems()->pluck('id');

                $items = Item::whereNotIn('id', $soldItemIds)->keywordSearch($request->keyword)->get();
            }
        }else{
            if ($request->query('tab') === 'mylist') {
                $items = collect();
            }else{
                $items = Item::keywordSearch($request->keyword)->get();
            }
        }

        
        session()->forget('item_image');


        return view('index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['categories', 'comments', 'condition', 'likes'])
                    ->withCount(['comments', 'likes'])
                    ->find($item_id);
        

        $comments = Comment::where('item_id', $item_id)->get();


        $user = Auth::user();


        session()->forget('payment');


        return view('item', compact('item', 'comments', 'user'));
    }
}
