<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($item_id)
    {
        $user = Auth::user();

        $user->likes()->create(['item_id' => $item_id]);


        return redirect("/item/$item_id");
    }

    public function destroy($item_id)
    {
        $user = Auth::user();

        $user->where('item_id', $item_id)->delete();


        return redirect("/item/$item_id");
    }
}
