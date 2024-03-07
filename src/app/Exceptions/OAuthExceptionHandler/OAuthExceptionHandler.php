<?php

namespace App\Exceptions\OAuthExceptionHandler;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OAuthExceptionHandler
{
    protected $grantTypes = ["refresh_token", "password"];
    protected $response;
    protected $request;
    protected $exception;

    public function __construct(Request $request, $exception)
    {
        $this->request = $request;
        $this->exception = $exception;
    }

    public function handleGrantType()
    {
        if (!in_array($this->request->grant_type, $this->grantTypes)) {
            $this->response = response()->json(
                ["message" => "Invalid grant type"],
                400
            );
        }

        return $this;
    }

    public function handleUser()
    {
        $user = User::where("username", $this->request->username)->first();
        if (!$user || !Hash::check($this->request->password, $user->password)) {
            $this->response = response()->json(
                ["message" => "Invalid username or password"],
                401
            );
        }

        return $this;
    }

    public function renderException()
    {
        if (!$this->response) {
            return $this->exception->render($this->request);
        }

        return $this->response;
    }
}
