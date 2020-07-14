<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * Class to test the methods from the PackageController
 */
class PackageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the user cannot access if the Token is invalid
     *
     * @return void
     */
    public function testAccessPackageListFailed(): void
    {
        $response = $this->getJson('api/packages');

        $response->assertStatus(401)->assertJson(['message' => 'Unauthenticated.']);
    }

    /**
     * Test if the user with a valid token can have access to the package list
     *
     * @return void
     */
    public function testAccessPackageListSuccess(): void
    {
        $this->seed();
        $this->actingAs(factory(User::class)->create(), 'api');

        $response = $this->getJson('api/packages');
        $response->assertStatus(200);

        $response->assertJsonStructure([['id','name', 'limit', 'availability']]);
    }
}
