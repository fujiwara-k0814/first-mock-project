<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }
}
