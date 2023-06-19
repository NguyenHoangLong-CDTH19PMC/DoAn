<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class sd_product_types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_types')->insert([
            [
                'name'=>'Giày Chạy Bộ'
            ],
            [
                'name'=>'Giày Sneaker'
            ],
            [
                'name'=>'Giày Bóng Rổ'
            ],
            [
                'name'=>'Giày Bóng Chuyền'
            ],
            [
                'name'=>'Giày Tập Luyện'
            ],
        ]);
    }
}
