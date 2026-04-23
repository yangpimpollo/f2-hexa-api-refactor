<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloWorldConectionTest extends TestCase
{
    public function test_hello_world_route_returns_success(): void
    {
        $response = $this->getJson('/api/hello')->assertStatus(200);
    }
}
