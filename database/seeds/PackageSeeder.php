<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Seeder to fill the packages table
 */
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds to fill the packages table
     *
     * @return void
     */
    public function run()
    {
        $packageQty = 15;
        $lengthPackageName = 10;

        for ($index = 1; $index <= $packageQty; $index++) {
            DB::table('packages')->insert([
                'name' => strtolower('Package N°' . $index . ': ' . Str::random($lengthPackageName)),
                'limit' => random_int(3, 8)
            ]);
        }
    }
}
