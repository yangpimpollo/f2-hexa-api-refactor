<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function login_incorrect_username(): void
    {
        //$response = $this->getJson('/api/hello')->assertStatus(200);
    }

    public function login_incorrect_password(): void
    {
        //$response = $this->getJson('/api/hello')->assertStatus(200);
    }

    public function login_success(): void
    {
        //$response = $this->getJson('/api/hello')->assertStatus(200);
    }
}
