<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class VerifyEmailController extends Controller
{
    public function notice()
    {
        $user = Auth::user();

        //署名パス取得
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        return view('verify-email', compact('verificationUrl'));
    }

    public function verify(EmailVerificationRequest $request)
    {
        //email_verified_atカラム更新
        $request->fulfill();
        return redirect('/mypage/profile');
    }

    public function send(Request $request)
    {
        //認証メール再送信
        $request->user()->sendEmailVerificationNotification();
        return redirect('/email/verify');
    }
}
