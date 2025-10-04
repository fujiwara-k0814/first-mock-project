<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }


    public function tempImage(Request $request)
    {
        $path = $request->file('image')->store('profile_images', 'public');

        session(['profile_image' => $path]);

        return redirect('/mypage/profile');
    }


    public function store(Request $request)
    {
        $deliveryAddress = $request->only([
            'postal_code',
            'address',
            'building',
        ]);

        $user = Auth::user();

        if ($user->delivery_address) {
            $user->delivery_address()->update($deliveryAddress);
        }else{
            $user->delivery_address()->create($deliveryAddress);
        }



        if (session()->has('profile_image')) {
            $imagePath = session('profile_image');
            
            $user->image_path = $imagePath;

            session()->forget('profile_image');
        }

        $user->name = $request->input('name');

        $user->first_login_done = true;

        $user->save();
    }
}
