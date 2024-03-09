<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Resources\Currency\CurrencyResource;
use DB;
use OpenApi\Attributes as OA;

#[
    OA\Get(
        path: "/api/currency",
        summary: "Get currencies",
        security: [["bearerAuth" => []]],
        tags: ["Currency"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Currencies collection",
                content: new OA\JsonContent(
                    properties: [
                        "data" => new OA\Property(
                            property: "data",
                            type: "array",
                            items: new OA\Items(
                                ref: "#/components/schemas/CurrencyResource"
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
        return CurrencyResource::collection(
            DB::table("currencies")->orderBy("id", "desc")->limit(43)->get()
        );
    }
}
