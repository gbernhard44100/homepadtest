<?php

use App\Package;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Package::all() as $package) {
            for ($index = 1; $index <= random_int(3, 8); $index++) {
                DB::table('registrations')->insert([
                    'user_id' => User::all()->shuffle()->first()->id,
                    'package_id' => $package->id,
                    'registered_at' => now()->subDays(rand(1, 100))->subHours(rand(1, 24))
                ]);
            }
        }
    }
}
