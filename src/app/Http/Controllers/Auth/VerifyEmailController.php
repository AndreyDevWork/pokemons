<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class VerifyEmailController extends Controller
{
    public function sendEmailVerification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(
                ["error" => "Email already verified"],
                Response::HTTP_CONFLICT
            );
        }

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
            return response()->json(
                ["error" => "Invalid verification link"],
                Response::HTTP_BAD_REQUEST
            );
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(
                ["error" => "Email already verified"],
                Response::HTTP_CONFLICT
            );
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return Redirect::to(env("FRONT_URL"));
    }
}
