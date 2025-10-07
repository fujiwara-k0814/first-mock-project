<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponse
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->delivery_address) {
            return redirect()->intended('/');
        }else{
            return redirect('/mypage/profile');
        }
    }
}
