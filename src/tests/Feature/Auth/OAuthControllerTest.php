<?php

namespace Auth;

use Laravel\Passport\ClientRepository;
use Tests\TestCase;

class OAuthControllerTest extends TestCase
{
    /**
     * A basic test example.
     */

    private $client;

    public function setUp(): void
    {
        parent::setUp();
        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPasswordGrantClient(
            null,
            "Test Client",
            config("app.url")
        );
        $this->client = $client;

        $this->post("/api/auth/register", [
            "username" => "Slark",
            "password" => "1246qwrt",
        ]);
    }

    public function testLogin(): void
    {
        $response = $this->login();
        $response->assertStatus(200);
    }

    private function login(): \Illuminate\Testing\TestResponse
    {
        $response = $this->post("/oauth/token", [
            "grant_type" => "password",
            "client_id" => $this->client->id,
            "client_secret" => $this->client->secret,
            "username" => "Slark",
            "password" => "1246qwrt",
        ]);

        return $response;
    }

    public function testRefreshToken(): void
    {
        $responseLogin = $this->login();
        $responseLoginContent = json_decode($responseLogin->content());

        $responseRefresh = $this->post("/oauth/token", [
            "grant_type" => "refresh_token",
            "refresh_token" => $responseLoginContent->refresh_token,
            "client_id" => $this->client->id,
            "client_secret" => $this->client->secret,
        ]);

        $responseRefresh->assertStatus(200);
    }
}
