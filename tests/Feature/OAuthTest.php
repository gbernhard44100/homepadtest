<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;

/**
 * Class to test OAuthController methods
 */
class OAuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the user has failed login because of wrong password
     *
     * @return void
     */
    public function testLoginFailedWrongCredential(): void
    {
        factory(User::class)->create([
            'name' => 'Abigail',
            'email' => 'abigail@test.com',
            'password' => Hash::make('password')
        ]);

        $response = $this->postJson('api/login', ['email' => 'abigail@test.com', 'password' => 'wrong_password']);

        $response->assertStatus(401)->assertJson(['errors' => 'Wrong credentials']);
    }

    /**
     * Test if the user has failed login because the password has not been typed
     *
     * @return void
     */
    public function testLoginFailedFormIncomplete(): void
    {
        factory(User::class)->create([
            'name' => 'Abigailo',
            'email' => 'abigailo@test.com',
            'password' => Hash::make('password')
        ]);


        $response = $this->postJson('api/login', ['email' => 'abigailo@test.com']);

        $response->assertStatus(422)->assertJson(['errors' => 'Missing email or password']);
    }

    public function testLoginRedirection(): void
    {
        $response = $this->getJson('api/login');

        $response->assertStatus(401)->assertJson(['message' => 'Invalid token. Please, login.']);
    }
}
