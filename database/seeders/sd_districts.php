<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sd_districts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('districts')->insert([
            [
                'name'=>'Ba Đình',
                'id_city'=>'1',
            ],
            [
                'name'=>'Bắc Từ Liêm',
                'id_city'=>'1',
            ],
            [
                'name'=>'Hà Đông',
                'id_city'=>'1',
            ],
            [
                'name'=>'Hai Bà Trưng',
                'id_city'=>'1',
            ],
            [
                'name'=>'Hoàn Kiếm',
                'id_city'=>'1',
            ],
            [
                'name'=>'Hoàng Mai',
                'id_city'=>'1',

            ],
            [
                'name'=>'Cầu Giấy',
                'id_city'=>'1',

            ],
            [
                'name'=>'Liên Chiểu',
                'id_city'=>'2',

            ],
            [
                'name'=>'Thanh Khê',
                'id_city'=>'2',

            ],
            [
                'name'=>'Hải Châu',
                'id_city'=>'2',

            ],
            [
                'name'=>'Sơn Trà',
                'id_city'=>'2',
            ],
            [
                'name'=>'Quận 1',
                'id_city'=>'3',

            ],
            [
                'name'=>'Quận 3',
                'id_city'=>'3',

            ],
            [
                'name'=>'Quận 4',
                'id_city'=>'3',
            ],

        ]);
    }
}
