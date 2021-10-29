<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MasterBusinessSeeder::class);
        $this->call(MasterOccupationSeeder::class);
        $this->call(MasterLicenseSeeder::class);
    }
}
