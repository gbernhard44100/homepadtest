<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * Class for automated test with dealing with User management
 */
class UserTest extends TestCase
{
    /**
     * Test if the user has been well registered
     *
     * @return void
     */
    public function testRegistrationSuccessfull()
    {
        DB::beginTransaction();

        $response = $this->postJson('api/users', ['name' => 'Sally', 'email' => 'sally@test.com', 'password' => 'azertyuiop']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Sally', 'email' => 'sally@test.com'
            ]);

        $this->assertDatabaseHas('users', [
                'name' => 'Sally',
                'email' => 'sally@test.com',
            ]);

        DB::rollBack();
    }

    /**
     * Test if the 2nd user registration fails because the password is too short and the email has already been used
     *
     * @return void
     */
    public function testRegistrationFailed()
    {
        DB::beginTransaction();

        $response1 = $this->postJson('api/users', ['name' => 'Sally', 'email' => 'sally@test.com', 'password' => 'azertyuiop']);

        $response2 = $this->postJson('api/users', ['name' => 'Sally2', 'email' => 'sally@test.com', 'password' => 'azer']);
        $response2
            ->assertStatus(422)
            ->assertJson([
                'errors' => 'This email address has already been used! | Your password is too short'
            ]);

        DB::rollBack();
    }
}
