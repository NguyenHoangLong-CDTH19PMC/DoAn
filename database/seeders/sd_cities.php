<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class sd_cities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert([
            [
                'name'=>'Hà Nội',
                'id_user'=>'1'
            ],
            [
                'name'=>'Đà Nẵng',
                'id_user'=>'1'
            ],
            [
                'name'=>'TP Hò Chí Minh',
                'id_user'=>'1'
            ],
        ]);
    }
}
