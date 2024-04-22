<?php

namespace App\Http\Resources\Profile;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[
    OA\Schema(
        schema: "ProfileResource",
        properties: [
            "date_of_birth" => new OA\Property(
                property: "date_of_birth",
                type: 'datetime',
                example: "2001-02-14"
            ),
            "firstname" => new OA\Property(
                property: "firstname",
                type: "string",
                example: "Slark"
            ),
            "lastname" => new OA\Property(
                property: "lastname",
                type: "string",
                example: "Puchina"
            ),
            "role" => new OA\Property(
                property: "role",
                type: "string",
                example: "student"
            ),
            "user" => new OA\Property(
                property: "user",
                ref: "#/components/schemas/UserResource",
                type: "object"
            ),
        ]
    )
]
class ProfileResource extends JsonResource
{
    public static $wrap = false;
    public function toArray(Request $request): array
    {
        return [
            "date_of_birth" => $this->date_of_birth,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "role" => $this->role->role,
            "user" => new UserResource($this->user),
        ];
    }
}
