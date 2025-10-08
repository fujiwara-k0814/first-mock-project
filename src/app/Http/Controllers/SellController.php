<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        $conditions = Condition::all();

        return view('sell', compact('categories', 'conditions'));
    }

    public function tempImage(Request $request)
    {
        $path = $request->file('image')->store('item_images', 'public');

        session(['item_image' => "storage/$path"]);

        return redirect('/sell');
    }

    public function store(Request $request)
    {
        $itemInformation = $request->only([
            'name',
            'brand',
            'price',
            'description'
        ]);

        $itemInformation['condition_id'] = $request->input('condition');

        if (session()->has('item_image')) {
            $imagePath = session('item_image');

            $itemInformation['image_path'] = $imagePath;

            session()->forget('item_image');
        }

        $item = Item::create($itemInformation);


        $item->categories()->sync($request->input('category'));


        $user = Auth::user();

        $user->sells()->create(['item_id' => $item->id]);


        return redirect('/mypage');
    }
}
