<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use OpenApi\Attributes as OA;

#[
    OA\Post(
        path: "/api/auth/send-email-verification-message",
        operationId: "sendEmailVerificationMessage",
        summary: "send email verification message",
        security: [["bearerAuth" => []]],
        tags: ["Auth"],
        responses: [
            new OA\Response(
                response: 200,
                description: "The user has successfully send email verification message.",
                content: new OA\JsonContent(
                    properties: [
                        "message" => new OA\Property(
                            property: "message",
                            type: "string",
                            example: "Verification email sent"
                        ),
                    ]
                )
            ),
        ]
    )
]
class VerifyEmailController extends Controller
{
    public function sendEmailVerificationMessage(Request $request)
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
