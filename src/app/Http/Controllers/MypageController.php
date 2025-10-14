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
            if (!$request->file('image')) {
                return redirect('/mypage/profile')->withInput();
            }


            $imagePath = $request->file('image')->store('profile_images', 'public');

            session(['profile_image' => "storage/$imagePath"]);

            return redirect('/mypage/profile')->withInput();
        }


        $userAddress = $request->only([
            'postal_code',
            'address',
            'building',
        ]);


        $user = Auth::user();


        if ($user->delivery_address) {
            $user->delivery_address->update($userAddress);
            $redirectPath = '/mypage';
        }else{
            $user->delivery_address()->create($userAddress);
            $redirectPath = '/';
        }


        if (session()->has('profile_image')) {
            $user->image_path = session('profile_image');

            session()->forget('profile_image');
        }else{
            if ($request->file('image')) {
                $imagePath = $request->file('image')->store('profile_images', 'public');

                $user->image_path = "storage/$imagePath";
            }
        }


        $user->name = $request->input('name');

        $user->fill($userAddress);

        $user->save();


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


        session()->forget('profile_image');


        session()->forget('item_image');


        return view('mypage', compact('user', 'items'));
    }
}
