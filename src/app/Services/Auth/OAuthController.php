<?php

namespace App\Services\Auth;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

#[
    OA\Post(
        path: "/oauth/token",
        summary: "Get tokens",
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(
                oneOf: [
                    new OA\Schema(
                        properties: [
                            "grant_type" => new OA\Property(
                                property: "grant_type",
                                type: "string",
                                example: "password"
                            ),
                            "client_id" => new OA\Property(
                                property: "client_id",
                                type: "string",
                                example: "ZGFfPErDzJONO2j9evX3_2mRdgqN"
                            ),
                            "client_secret" => new OA\Property(
                                property: "client_secret",
                                type: "string",
                                example: "KMWZ_L8jgUKNrShC"
                            ),
                            "username" => new OA\Property(
                                property: "username",
                                type: "string",
                                example: "Slark"
                            ),
                            "password" => new OA\Property(
                                property: "password",
                                type: "string",
                                example: "slarkAAA3"
                            ),
                        ]
                    ),
                    new OA\Schema(
                        properties: [
                            "grant_type" => new OA\Property(
                                property: "grant_type",
                                type: "string",
                                example: "refresh_token"
                            ),
                            "client_id" => new OA\Property(
                                property: "client_id",
                                type: "string",
                                example: "ZGFfPErDzJONO2j9evX3_2mRdgqN"
                            ),
                            "client_secret" => new OA\Property(
                                property: "client_secret",
                                type: "string",
                                example: "KMWZ_L8jgUKNrShC"
                            ),
                            "refresh_token" => new OA\Property(
                                property: "refresh_token",
                                type: "string",
                                example: "15f8017665b4094d15432da"
                            ),
                        ]
                    ),
                ]
            )
        ),
        tags: ["Auth"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Success",
                content: new OA\JsonContent(
                    properties: [
                        "token_type" => new OA\Property(
                            property: "token_type",
                            type: "string",
                            example: "Bearer"
                        ),
                        "expires_in" => new OA\Property(
                            property: "expires_in",
                            type: "integer",
                            example: "54000"
                        ),
                        "access_token" => new OA\Property(
                            property: "access_token",
                            type: "string",
                            example: "wianRpIjoiZDQwMTQwZGE3MDJlNTYwYzVkYz"
                        ),
                        "refresh_token" => new OA\Property(
                            property: "refresh_token",
                            type: "string",
                            example: "pIjoiZDQwMTQwZwZGE3MDJlNTYwYzVkYz"
                        ),
                    ]
                )
            ),
            new OA\Response(
                response: 401,
                description: "Client authentication failed or invalid credentials provided"
            ),
            new OA\Response(response: 400, description: "Invalid grant type"),
        ]
    )
]
class OAuthController extends Controller
{
}
