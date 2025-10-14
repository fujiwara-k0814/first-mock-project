<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExhibitionRequest;

class SellController extends Controller
{
    public function create()
    {
        $categories = Category::all();


        $conditions = Condition::all();


        return view('sell', compact('categories', 'conditions'));
    }

    public function store(ExhibitionRequest $request)
    {
        if (!$request->has('action')) {
            if (!$request->file('image')) {
                return redirect('/sell')->withInput();
            }


            $imagePath = $request->file('image')->store('item_images', 'public');

            session(['item_image' => "storage/$imagePath"]);


            return redirect('/sell')->withInput();
        }
        

        $itemInformation = $request->only([
            'name',
            'brand',
            'price',
            'description'
        ]);

        $itemInformation['condition_id'] = $request->input('condition');

        if (session()->has('item_image')) {
            $itemInformation['image_path'] = session('item_image');

            session()->forget('item_image');
        }else{
            $imagePath = $request->file('image')->store('item_images', 'public');

            $itemInformation['image_path'] = "storage/$imagePath";
        }

        $item = Item::create($itemInformation);


        $item->categories()->sync($request->input('category'));


        $user = Auth::user();

        $user->sells()->create(['item_id' => $item->id]);


        return redirect('/mypage');
    }
}
