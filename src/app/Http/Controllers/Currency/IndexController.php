<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Models\Currency;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Currency::all();
    }
}
