<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\ProfileRequest;

class MypageController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        
        return view('profile', compact('user'));
    }
    
    public function store(ProfileRequest $request)
    {
        if (!$request->has('action')) {
            if (!$request->file('image_path')) {
                return redirect('/mypage/profile')->withInput();
            }


            $imagePath = $request->file('image_path')->store('profile_images', 'public');

            session(['profile_image_path' => "storage/$imagePath"]);

            return redirect('/mypage/profile')->withInput();
        }


        $user = Auth::user();

        $userAddress = $request->only([
            'postal_code',
            'address',
            'building',
        ]);

        if ($user->delivery_address) {
            $user->delivery_address->update($userAddress);
            $redirectPath = '/mypage';
        }else{
            $user->delivery_address()->create($userAddress);
            $redirectPath = '/';
        }

        $user->image_path = $request->input('image_path');

        $user->name = $request->input('name');

        $user->fill($userAddress);

        $user->save();


        session()->forget('profile_image_path');


        return redirect($redirectPath);
    }


    public function show(Request $request)
    {
        $user = Auth::user();

        if ($request->query('page') === "buy") {
            $items = Item::where('delivery_address_id', $user->delivery_address->id)->get();
        }else{
            $items = $user->soldItems;
        }


        session()->forget('profile_image_path');


        session()->forget('item_image_path');


        return view('mypage', compact('user', 'items'));
    }
}
