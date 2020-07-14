<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        exec('php artisan passport:install');

        $this->call(PackageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RegistrationSeeder::class);
        $this->call(PassportClientSeeder::class);
    }
}
