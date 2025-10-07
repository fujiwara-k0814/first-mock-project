<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;

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

        session(['item_image' => $path]);

        return redirect('/sell');
    }

    public function store()
    {
        
    }
}
