<?php

namespace Auth;

use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testRegister(): void
    {
        $response = $this->post("/api/auth/register", [
            "username" => "Slark",
            "password" => "1246qwrt",
        ]);

        $response->assertStatus(201);
    }
}
