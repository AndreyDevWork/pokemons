<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

class ShowController extends Controller
{
    public function __invoke($userId)
    {
        $profile = Profile::where("user_id", $userId)->first();

        return new ProfileResource($profile);
    }
}
