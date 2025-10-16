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
            if (!$request->file('image_path')) {
                return redirect('/sell')->withInput();
            }


            $imagePath = $request->file('image_path')->store('item_images', 'public');

            session(['item_image_path' => "storage/$imagePath"]);
            

            return redirect('/sell')->withInput();
        }
        

        $itemInformation = $request->only([
            'name',
            'brand',
            'price',
            'description'
        ]);

        $itemInformation['condition_id'] = $request->input('condition');

        $itemInformation['image_path'] = $request->input('image_path');

        $item = Item::create($itemInformation);


        $item->categories()->sync($request->input('category'));


        $user = Auth::user();

        $user->sells()->create(['item_id' => $item->id]);


        session()->forget('item_image_path');


        return redirect('/mypage');
    }
}
