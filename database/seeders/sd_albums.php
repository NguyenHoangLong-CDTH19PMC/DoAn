<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class sd_albums extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('albums')->insert([
            [
                'name'=>'OIP',
                'photo'=>'OIP.jpg',
                'id_product'=>'1'
            ],
            [
                'name'=>'OIP',
                'photo'=>'OIP2.jpg',
                'id_product'=>'1'
            ],
        ]);
    }
}
