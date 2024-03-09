<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[
    OA\Schema(
        schema: "UserResource",
        properties: [
            "id" => new OA\Property(
                property: "id",
                type: "integer",
                example: "7"
            ),
            "username" => new OA\Property(
                property: "username",
                type: "string",
                example: "Slark"
            ),
            "email" => new OA\Property(
                property: "email",
                type: "string",
                example: "slark@gmail.com",
                nullable: true
            ),
        ]
    )
]
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "email" => $this->email,
        ];
    }
}
