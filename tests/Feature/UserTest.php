<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class for automated test with dealing with User management
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the user has been well registered
     *
     * @return void
     */
    public function testRegistrationSuccessfull()
    {
        $response = $this->postJson('api/users', ['name' => 'Sally', 'email' => 'sally@test.com', 'password' => 'azertyuiop']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Sally', 'email' => 'sally@test.com'
            ]);
    }

    /**
     * Test if the 2nd user registration fails because the password is too short and the email has already been used
     *
     * @return void
     */
    public function testRegistrationFailed()
    {
        $response1 = $this->postJson('api/users', ['name' => 'Sally', 'email' => 'sally@test.com', 'password' => 'azertyuiop']);

        $response2 = $this->postJson('api/users', ['name' => 'Sally2', 'email' => 'sally@test.com', 'password' => 'azer']);
        $response2
            ->assertStatus(422)
            ->assertJson([
                'errors' => 'This email address has already been used! | Your password is too short'
            ]);
    }
}
