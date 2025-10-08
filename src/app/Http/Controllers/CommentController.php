<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $item_id)
    {
        $itemComment = [
            'item_id' => $item_id,
            'body' => $request->input('comment')
        ];

        $user = Auth::user();

        $user->comments()->create($itemComment);


        return redirect("/item/$item_id");
    }
}
