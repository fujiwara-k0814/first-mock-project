<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function update($item_id)
    {
        $user = Auth::user();

        if ($user->likes()->where('item_id', $item_id)->exists()) {
            $user->likes()->where('item_id', $item_id)->delete();
        }else{
            $user->likes()->create(['item_id' => $item_id]);
        }
        

        return redirect("/item/$item_id");
    }
}
