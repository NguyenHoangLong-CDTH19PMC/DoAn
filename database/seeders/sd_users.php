<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class sd_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name'=>'Nguyễn Hoàng Long',
                'gender'=>'Nam',
                'birthday'=>date('2000-01-01'),
                'email'=>'hoanglong@gmail.com',
                'phone'=>'0391234561',
                'address'=>'Quận 8, TPHCM',
                'avatar'=>'long.jpg',
                'username'=>'hoanglong123',
                'password'=>Hash::make('long0101123'),
            ],
            [
                'name'=>'Nguyễn Thiên Hưng',
                'gender'=>'Nam',
                'birthday'=>date('2001-10-10'),
                'email'=>'thienhung@gmail.com',
                'phone'=>'0391234562',
                'address'=>'Trường Thọ, TP.Thủ Đức',
                'avatar'=>'hung.jpg',
                'username'=>'thienhung123',
                'password'=>Hash::make('hung1010123'),
            ],
        ]);
    }
}
