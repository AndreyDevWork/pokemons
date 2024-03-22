<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[
    OA\Schema(
        schema: "AuthRegisterRequest",
        required: ["username", "password"],
        properties: [
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
            "password" => new OA\Property(
                property: "password",
                type: "string",
                example: "slarkAAA3"
            ),
        ]
    )
]
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => "required|string|max:30|min:2",
            "email" => "string|email|max:255",
            "password" => "required|string|min:8",
        ];
    }
}
