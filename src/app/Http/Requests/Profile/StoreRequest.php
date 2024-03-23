<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[
    OA\Schema(
        schema: "ProfileStoreRequest",
        required: ["date_of_birth", "firstname", "lastname", "role_id"],
        properties: [
            "date_of_birth" => new OA\Property(
                property: "date_of_birth",
                type: "string",
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
            "role_id" => new OA\Property(
                property: "role_id",
                type: "integer",
                example: "1"
            ),
        ]
    )
]
class StoreRequest extends FormRequest
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
            "date_of_birth" => "date_format:Y-m-d|required",
            "firstname" => "string|required|max:20|min:2",
            "lastname" => "string|required|max:20|min:2",
            "role_id" => "integer|required",
        ];
    }
}
