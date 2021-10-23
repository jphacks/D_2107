<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterBusinessSeeder extends Seeder
{
    public $names = [
        1 => 'IT',
        2 => '不動産',
        3 => '人材',
        4 => '金融',
        5 => '物流',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('master_businesses')->truncate();
        foreach ($this->names as $key => $value) {
            \DB::table('master_businesses')->insert([
                'id' => $key,
                'name' => $value,
            ]);
        }
    }
}
