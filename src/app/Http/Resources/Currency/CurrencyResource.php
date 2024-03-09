<?php

namespace App\Http\Resources\Currency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

class CurrencyResource extends JsonResource
{
    #[
        OA\Schema(
            schema: "CurrencyResource",
            properties: [
                "id" => new OA\Property(
                    property: "id",
                    type: "integer",
                    example: "22"
                ),
                "num_code" => new OA\Property(
                    property: "num_code",
                    type: "string",
                    example: "840"
                ),
                "char_code" => new OA\Property(
                    property: "char_code",
                    type: "string",
                    example: "USD"
                ),
                "nominal" => new OA\Property(
                    property: "nominal",
                    type: "integer",
                    example: "1"
                ),
                "name" => new OA\Property(
                    property: "name",
                    type: "string",
                    example: "Доллар США"
                ),
                "value" => new OA\Property(
                    property: "value",
                    type: "string",
                    example: "90.7493"
                ),
                "vunit_rate" => new OA\Property(
                    property: "vunit_rate",
                    type: "string",
                    example: "90.7493"
                ),
                "updated_at" => new OA\Property(
                    property: "updated_at",
                    type: "date",
                    example: "2024-03-08 23:26:19"
                ),
            ]
        )
    ]
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "num_code" => $this->num_code,
            "char_code" => $this->char_code,
            "nominal" => $this->nominal,
            "name" => $this->name,
            "value" => $this->value,
            "vunit_rate" => $this->vunit_rate,
            "updated_at" => $this->updated_at,
        ];
    }
}
