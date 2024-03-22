<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use OpenApi\Attributes as OA;

#[
    OA\Get(
        path: "/api/profile/{id}",
        summary: "Get profile by USER ID",
        security: [["bearerAuth" => []]],
        tags: ["Profile"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "ID of the user",
                in: "path",
                schema: new OA\Schema(type: "integer", format: "int64")
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Profile",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/ProfileResource"
                )
            ),
            new OA\Response(response: 404, description: "Profile not found"),
        ]
    )
]
class ShowController extends Controller
{
    public function __invoke($userId)
    {
        $profile = Profile::where("user_id", $userId)->first();

        return $profile instanceof Profile
            ? new ProfileResource($profile)
            : response()->json(["message" => "Profile not found"], 404);
    }
}
