<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sd_colors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colors')->insert([
            [
                'name'=>'White',
            ],
            [
                'name'=>'Black',
            ],
            [
                'name'=>'Grey',
            ],
            [
                'name'=>'Red',
            ],
            [
                'name'=>'Blue',
            ],
            [
                'name'=>'Pink',
            ],
        ]);
    }
}
