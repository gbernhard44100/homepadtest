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
    /**
     * Test if the user cannot access if the Token is invalid
     *
     * @return void
     */
    public function testAccessPackageListFailed()
    {
        $response = $this->getJson('api/packages');

        $response->assertStatus(401)->assertJson(['message' => 'Unauthenticated.']);
    }

    /**
     * Test if the user with a valid token can have access to the package list
     *
     * @return void
     */
    public function testAccessPackageListSuccess()
    {
        DB::beginTransaction();

        $user = factory(User::class)->create();

        $this->actingAs($user, 'api');

        $response = $this->getJson('api/packages');

        $response->assertStatus(200);

        DB::rollBack();
    }
}
