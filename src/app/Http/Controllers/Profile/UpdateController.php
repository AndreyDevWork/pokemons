<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

#[
    OA\Patch(
        path: "/api/profile",
        operationId: "updateProfile",
        summary: "Update auth profile of user",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(
                ref: "#/components/schemas/ProfileUpdateRequest"
            )
        ),
        tags: ["Profile"],
        responses: [
            new OA\Response(
                response: 200,
                description: "The profile has successfully updated profile",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/ProfileResource"
                )
            ),
            new OA\Response(response: 422, description: "Validation error"),
        ]
    )
]
class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $profile = Auth::user()->profile;
        $data = $request->validated();
        $profile->update($data);

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
