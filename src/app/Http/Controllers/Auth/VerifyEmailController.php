<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\TestMessage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function sendEmailVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json(["message" => "Verification email sent"]);
    }

    public function verificationEmail(EmailVerificationRequest $request)
    {
        dd(22);
        $request->authorize();
        dd(\Auth::user());
        $request->fulfill();
        return response()->json(["message" => "Email verified"]);
    }
}
