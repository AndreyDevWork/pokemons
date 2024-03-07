<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes as OA;

#[OA\Info(version: "1.0.0", title: "Pokemons Backend")]
#[OA\PathItem(path: "/api")]
#[
    OA\Components(
        securitySchemes: [
            "securityScheme" => new OA\SecurityScheme(
                securityScheme: "bearerAuth",
                type: "http",
                scheme: "bearer"
            ),
        ]
    )
]
class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
