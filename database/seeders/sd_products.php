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
                'id_color'=>'ABCWHITE',
                'id_size'=>'ABCADSL',
                'id_type'=>'ADSTYPES',
                'cat_level1'=>'ADIDAS',
                'cat_level2'=>'Giày Chạy Bộ',
                'cat_level3'=>'Male',
                'code'=>'ADIDASRUN1',
                'name'=> 'Adizero Adios Pro 3.0',
                'content'=>'Xác định tốc độ đua và duy trì cho tới vạch đích. Đôi giày chạy bộ adidas này có thiết kế đầy tốc độ với các thanh carbon ENERGYROD tạo độ cứng siêu nhẹ cho sải bước gọn ghẽ.',
                'price_regular'=>'6500000.00',
                'sale_price'=>'6500000.00',
                'discount'=>'0.00'
            ],
            ]);
    }
}
