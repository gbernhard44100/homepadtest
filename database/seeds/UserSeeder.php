<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gaetan',
            'email' => 'gaetan@test.com',
            'password' => Hash::make('azertyuiop'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'David',
            'email' => 'david@test.com',
            'password' => Hash::make('qsdfghjklm'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Betim',
            'email' => 'betim@test.com',
            'password' => Hash::make('wxcvbn12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
