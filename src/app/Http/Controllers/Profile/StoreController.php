<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\Profile\StoreService;
use OpenApi\Attributes as OA;

#[
    OA\Post(
        path: "/api/profile",
        summary: "Create profile of user",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(
                ref: "#/components/schemas/ProfileStoreRequest"
            )
        ),
        tags: ["Profile"],
        responses: [
            new OA\Response(
                response: 201,
                description: "The profile has successfully created profile",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/ProfileResource"
                )
            ),
            new OA\Response(
                response: 409,
                description: "Profile already exists for this user."
            ),
            new OA\Response(response: 422, description: "Validation error"),
        ]
    )
]
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, StoreService $service)
    {
        $data = $request->validated();
        $profile = $service($data);

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : $profile;
    }
}
