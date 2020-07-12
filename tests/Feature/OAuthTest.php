<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class to test OAuthController methods
 */
class OAuthTest extends TestCase
{
    /**
     * Test if the user has failed login because of wrong password
     *
     * @return void
     */
    public function testLoginFailedWrongCredential()
    {
        DB::beginTransaction();

        $user = factory(User::class)->create([
            'name' => 'Abigail',
            'email' => 'abigail@test.com',
            'password' => Hash::make('password')
        ]);


        $response = $this->postJson('api/login', ['email' => 'abigail@test.com', 'password' => 'wrong_password']);

        $response->assertStatus(401)->assertJson(['errors' => 'Wrong credentials']);

        DB::rollBack();
    }

    /**
     * Test if the user has failed login because the password has not been typed
     *
     * @return void
     */
    public function testLoginFailedFormIncomplete()
    {
        DB::beginTransaction();

        $user = factory(User::class)->create([
            'name' => 'Abigailo',
            'email' => 'abigailo@test.com',
            'password' => Hash::make('password')
        ]);


        $response = $this->postJson('api/login', ['email' => 'abigailo@test.com']);

        $response->assertStatus(422)->assertJson(['errors' => 'Missing email or password']);

        DB::rollBack();
    }
}
