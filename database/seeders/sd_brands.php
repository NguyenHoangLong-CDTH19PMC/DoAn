<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sd_brands extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
            [
                'name'=>'Adidas'
            ],
            [
                'name'=>'Nike'
            ],
            [
                'name'=>'Puma'
            ],
            [
                'name'=>'New Balance'
            ],
            [
                'name'=>'MLB'
            ],
        ]);
    }
}
