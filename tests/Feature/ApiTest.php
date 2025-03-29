<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * Проверка базового API маршрута.
     *
     * @return void
     */
    public function test_api_route_is_working()
    {
        $response = $this->get('/api/test');

        // Проверяем успешный статус (200 или 204 и т.д.)
        $response->assertSuccessful();

        // Более мягкая проверка JSON (проверяет, что Content-Type содержит 'application/json')
        $response->assertHeader('Content-Type');
        $this->assertStringContainsString('application/json', $response->headers->get('Content-Type'));
    }
}
