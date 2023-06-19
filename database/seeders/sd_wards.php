<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sd_wards extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('wards')->insert([
            //QUận Ba Đình
            [
                'name'=>'Cống Vị',
                'id_district'=>'1',


            ],
            [
                'name'=>'Điện Biên',
                'id_district'=>'1',


            ],
            [
                'name'=>'Đội Cấn',
                'id_district'=>'1',


            ],
            [
                'name'=>'Giảng Võ',
                'id_district'=>'1',


            ],
            [
                'name'=>'Kim Mã',
                'id_district'=>'1',

            ],
            [
                'name'=>'Liễu Giai',
                'id_district'=>'1',


            ],
            [
                'name'=>'Ngọc Hà',
                'id_district'=>'1',

            ],
            [
                'name'=>'Ngọc Khánh',
                'id_district'=>'1',


            ],
            [
                'name'=>'Nguyễn Trung Trực',
                'id_district'=>'1',


            ],
            [
                'name'=>'Phúc Xá',
                'id_district'=>'1',


            ],
            [
                'name'=>'Quán Thánh',
                'id_district'=>'1',


            ],
            [
                'name'=>'Thành Công',
                'id_district'=>'1',


            ],
            [
                'name'=>'Trúc Bạch',
                'id_district'=>'1',


            ],
            [
                'name'=>'Vĩnh Phúc',
                'id_district'=>'1',


            ],
            //QUận Băc Từ Liêm
            [
                'name'=>'Cổ Nhuế 1',
                'id_district'=>'2',


            ],
            [
                'name'=>'Cổ Nhuế 2',
                'id_district'=>'2',


            ],
            [
                'name'=>'Đông Ngạc',
                'id_district'=>'2',

            ],
            [
                'name'=>'Đức Thắng',
                'id_district'=>'2',

            ],
            [
                'name'=>'Liên Mạc',
                'id_district'=>'2',

            ],
            //Quận Hà Đông 
            [
                'name'=>'Biên Giang',
                'id_district'=>'3',

            ],
            [
                'name'=>'Kiến Hưng',
                'id_district'=>'3',

            ],
            [
                'name'=>'Phú Lương',
                'id_district'=>'3',

            ],
            [
                'name'=>'Quang Trung',
                'id_district'=>'3',

            ],
            [
                'name'=>'Vạn Phúc',
                'id_district'=>'3',
            ],
            //Hai Bà Trưng
            [
                'name'=>'Bạch Đằng',
                'id_district'=>'4',

            ],
            [
                'name'=>'Lê Đại Hành',
                'id_district'=>'4',
            ],
            [
                'name'=>'Nguyễn Du',
                'id_district'=>'4',

            ],
            [
                'name'=>'Thanh Nhàn',
                'id_district'=>'4',

            ],
            [
                'name'=>'Trương Định',
                'id_district'=>'4',

            ],
            //Hoàn Kiếm
            [
                'name'=>'Chương Dương',
                'id_district'=>'5',

            ],
            [
                'name'=>'Đồng Xuân',
                'id_district'=>'5',

            ],
            [
                'name'=>'Hàng Bạc',
                'id_district'=>'5',

            ],
            [
                'name'=>'Tràng Tiền',
                'id_district'=>'5',

            ],
            //Hoàng Mai
            [
                'name'=>'Đại Kim',
                'id_district'=>'6',

            ],
            [
                'name'=>'Lĩnh Nam',
                'id_district'=>'6',

            ],
            [
                'name'=>'Mai Động',
                'id_district'=>'6',

            ],
            [
                'name'=>'Tràng Tiền',
                'id_district'=>'6',

            ],
            [
                'name'=>'Tràng Tiền',
                'id_district'=>'6',

            ],
            //Cầu Giấy
            [
                'name'=>'Dịch Vọng',
                'id_district'=>'7',
            ],
            [
                'name'=>'Nghĩa Tân',
                'id_district'=>'7',


            ],
            [
                'name'=>'Yên Hòa',
                'id_district'=>'7',

            ],
            //Da Nang
            //Liên CHiểu
            [
                'name'=>'Hòa Hiệp Bắc',
                'id_district'=>'8',

            ],
            [
                'name'=>'Hòa Khánh Bắc',
                'id_district'=>'8',

            ],
            [
                'name'=>'Hòa Minh',
                'id_district'=>'8',

            ],
            //Thanh Khê
            [
                'name'=>'Tam Thuận',
                'id_district'=>'9',

            ],
            [
                'name'=>'Thanh Khê Tây',
                'id_district'=>'9',

            ],
            [
                'name'=>'Xuân Hà',
                'id_district'=>'9',

            ],
            [
                'name'=>'Chính Giáng',
                'id_district'=>'9',

            ],
            //Hải Châu
            [
                'name'=>'Thanh Bình',
                'id_district'=>'10',

            ],
            [
                'name'=>'Thuận Phước',
                'id_district'=>'10',
            ],
            [
                'name'=>'Thạch Thang',
                'id_district'=>'10',

            ],
            //SƠn TRà
            [
                'name'=>'Nại Hiên Đông',
                'id_district'=>'11',

            ],
            [
                'name'=>'Mân Thái',
                'id_district'=>'11',

            ],
            [
                'name'=>'An Hải Bắc',
                'id_district'=>'11',

            ],
            //TPHCM
            //QUan 1
            [
                'name'=>'Bến Nghé',
                'id_district'=>'12',

            ],
            [
                'name'=>'Bến Thành',
                'id_district'=>'12',

            ],
            [
                'name'=>'Đa Kao',
                'id_district'=>'12',

            ],
            //Quan 3
            [
                'name'=>'Phường 01',
                'id_district'=>'13',

            ],
            [
                'name'=>'Phường 02',
                'id_district'=>'13',

            ],
            [
                'name'=>'Phường 03',
                'id_district'=>'13',

            ],
            [
                'name'=>'Phường 04',
                'id_district'=>'13',

            ],
              //Quan 4
              [
                'name'=>'Phường 01',
                'id_district'=>'14',

            ],
            [
                'name'=>'Phường 02',
                'id_district'=>'14',

            ],
            [
                'name'=>'Phường 03',
                'id_district'=>'14',

            ],
            [
                'name'=>'Phường 04',
                'id_district'=>'14',
            ],
        ]);
    }
}
