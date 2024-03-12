<?php

namespace Auth;

use App\Models\User;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use phpseclib3\File\ASN1\Maps\EncryptedData;
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
        $response = $this->login($this->client);
        $response->assertStatus(200);
    }

    public function testRefreshToken()
    {
        $responseLogin = $this->login($this->client);
        $responseLoginContent = json_decode($responseLogin->content());

        $responseRefresh = $this->post("/oauth/token", [
            "grant_type" => "refresh_token",
            "refresh_token" => $responseLoginContent->refresh_token,
            "client_id" => $this->client->id,
            "client_secret" => $this->client->secret,
        ]);

        $responseRefresh->assertStatus(200);
    }

    private function login(Client $client): \Illuminate\Testing\TestResponse
    {
        $response = $this->post("/oauth/token", [
            "grant_type" => "password",
            "client_id" => $client->id,
            "client_secret" => $client->secret,
            "username" => "Slark",
            "password" => "1246qwrt",
        ]);

        return $response;
    }
}
