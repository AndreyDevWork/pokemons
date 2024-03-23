<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use OpenApi\Attributes as OA;

#[
    OA\Get(
        path: "/api/profile",
        summary: "Get profiles",
        security: [["bearerAuth" => []]],
        tags: ["Profile"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Profile",
                content: new OA\JsonContent(
                    properties: [
                        "data" => new OA\Property(
                            property: "data",
                            type: "array",
                            items: new OA\Items(
                                ref: "#/components/schemas/ProfileResource"
                            )
                        ),
                    ]
                )
            ),
        ]
    )
]
class IndexController extends Controller
{
    public function __invoke()
    {
        $users = Profile::all();
        return ProfileResource::collection($users);
    }
}
