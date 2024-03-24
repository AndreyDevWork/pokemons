<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Redirect;

class VerifyEmailController extends Controller
{
    public function sendEmailVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json(["message" => "Verification email sent"]);
    }

    public function verificationEmail(Request $request, $id, $token)
    {
        $user = User::find($id);

        if (
            !hash_equals(
                (string) $token,
                sha1($user->getEmailForVerification())
            )
        ) {
            return response()->json(["error" => "Invalid verification link"]);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(["error" => "Email already verified"]);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return Redirect::to(env("FRONT_URL"));
    }
}
