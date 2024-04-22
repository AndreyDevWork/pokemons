<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(
    ["namespace" => "App\Http\Controllers\Auth", "prefix" => "auth"],
    function () {
        Route::post("/register", RegisterController::class);
        Route::post("/send-email-verification-message", [
            VerifyEmailController::class,
            "sendEmailVerificationMessage",
        ])->middleware("auth:api");
        Route::get("email/verify/{id}/{hash}", [
            VerifyEmailController::class,
            "verificationEmail",
        ])->name("verification.verify");
    }
);

Route::group(
    [
        "namespace" => "\App\Http\Controllers\Profile",
        "middleware" => "auth:api",
    ],
    function () {
        Route::get("/profile/{profile}", ShowController::class);
        Route::post("/profile", StoreController::class);
        Route::patch("/profile", UpdateController::class);
        Route::get("/profile", IndexController::class);
    }
);
