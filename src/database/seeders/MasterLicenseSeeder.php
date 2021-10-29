<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterLicenseSeeder extends Seeder
{
    public $names = [
        1 => 'AT限定運転免許',
        2 => '数検1級',
        3 => '英検1級',
        4 => 'TOEIC900点',
        5 => '宅地建物取引士',
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('master_licenses')->truncate();
        foreach ($this->names as $key => $value) {
            \DB::table('master_licenses')->insert([
                'id' => $key,
                'name' => $value,
            ]);
        }
    }
}