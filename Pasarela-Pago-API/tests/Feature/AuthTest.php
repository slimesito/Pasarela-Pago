<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'pgsql']);
        config(['database.connections.pgsql.schema' => env('DB_SCHEMA', 'pasarela_pago_tests')]);
    }

    public function test_register_user_successfully(): void
    {
        $admin = User::factory()->create(['isAdmin' => true]);
        $token = $admin->createToken('test_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                        ->postJson('/api/register', [
                            'name' => 'Test User',
                            'email' => 'test@example.com',
                            'password' => 'secret123',
                            'password_confirmation' => 'secret123',
                            'isAdmin' => false,
                        ]);

        $response->assertStatus(201)
                ->assertJsonStructure([
                    'message',
                    'user' => ['id', 'name', 'email', 'isAdmin'],
                ]);
    }

    public function test_login_successful(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'secret123',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'message',
                     'token',
                     'expires_in',
                     'user' => ['id', 'name', 'email', 'isAdmin'],
                 ]);
    }

    public function test_logout_user(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/logout');

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Sesión cerrada correctamente. Todos los tokens han sido revocados.',
                 ]);
    }
}
