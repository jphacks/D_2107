<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterOccurpationSeeder extends Seeder
{
    public $names = [
        1 => 'webエンジニア',
        2 => '土木作業員',
        3 => 'レジカウンター',
        4 => '営業',
        5 => 'デザイナー',
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('master_occurpations')->truncate();
        foreach ($this->names as $key => $value) {
            \DB::table('master_occurpations')->insert([
                'id' => $key,
                'name' => $value,
            ]);
        }
    }
}