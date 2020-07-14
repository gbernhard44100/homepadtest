<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PassportClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
            'user_id' => null,
            'name' => 'Laravel Personal Access Client',
            'secret' => Hash::make(env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET')),
            'provider' => null,
            'redirect' => 'http:\/\/localhost',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => '2020-07-14 20:52:17.0',
            'updated_at' => '2020-07-14 20:52:17.0'
        ]);
    }
}
