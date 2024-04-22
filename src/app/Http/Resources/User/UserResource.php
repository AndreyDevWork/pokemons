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
            "email_verified_at" => new OA\Property(
                property: "email_verified_at",
                type: "boolean",
                example: "slark@gmail.com",
            ),
            "created_at" => new OA\Property(
                property: "created_at",
                type: "datetime",
                example: "2020-01-01 00:00:00"
            )
        ]
    )
]
class UserResource extends JsonResource
{
    public static $wrap = null;
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "email" => $this->email,
            "email_verified_at" => $this->email_verified_at,
            "created_at" => $this->created_at->format("Y-m-dTH:i:s"),
        ];
    }
}
