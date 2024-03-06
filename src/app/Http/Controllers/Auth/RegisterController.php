<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterService $service)
    {
        $data = $request->validated();
        $user = $service($data);

        return $user instanceof User ? new UserResource($user) : $user;
    }
}
