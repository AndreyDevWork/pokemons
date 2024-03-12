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

        // Создать клиента при настройке тестового окружения
        $this->client = $this->createPasswordGrantClient();
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
        self::register();
        $response = $this->post("/oauth/token", [
            "grant_type" => "password",
            "client_id" => $client->id,
            "client_secret" => $client->secret,
            "username" => "Slark",
            "password" => "1246qwrt",
        ]);

        return $response;
    }

    private function register(): void
    {
        $this->post("/api/auth/register", [
            "username" => "Slark",
            "password" => "1246qwrt",
        ]);
    }

    private function createPasswordGrantClient(): Client
    {
        $clientRepository = new ClientRepository();
        return $clientRepository->createPasswordGrantClient(
            null,
            "Test Client",
            config("app.url")
        );
    }
}
