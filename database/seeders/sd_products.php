<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sd_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id_color'=>'1',
                'id_size'=>'1',
                'id_type'=>'1',
                'cat_level1'=>'1',
                'cat_level2'=>'1',
                'cat_level3'=>'1',
                'code'=>'SP1',
                'name'=> 'Adizero Adios Pro 3.0',
                'photo'=>'pro1.png',
                'content'=>'Xác định tốc độ đua và duy trì cho tới vạch đích. Đôi giày chạy bộ adidas này có thiết kế đầy tốc độ với các thanh carbon ENERGYROD tạo độ cứng siêu nhẹ cho sải bước gọn ghẽ.',
                'price_regular'=>'6500000.00',
                'sale_price'=>'6500000.00',
                'discount'=>'0.00'
            ],
            ]);
    }
}
