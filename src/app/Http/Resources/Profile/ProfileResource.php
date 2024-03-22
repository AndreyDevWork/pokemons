<?php

namespace App\Http\Resources\Profile;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "date_of_birth" => $this->date_of_birth,
            "firstname" => $this->name,
            "lastname" => $this->lastname,
            "role" => $this->role->role,
            "user" => new UserResource($this->user),
        ];
    }
}
