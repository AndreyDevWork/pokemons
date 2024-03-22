<?php

namespace App\Services\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    public function __invoke($data)
    {
        $user = Auth::user();

        if ($user->profile) {
            return response()->json(
                [
                    "message" => "Profile already exists for this user.",
                ],
                409
            );
        }

        $data["user_id"] = $user->id;

        return Profile::create($data);
    }
}
