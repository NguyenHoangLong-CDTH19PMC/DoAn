<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ReturnTpl extends Controller
{
    public function Return_tpluser(){
        return view('./user/index');
    }
    public function Return_tpladmin(){
        return view('./admin/home/home');
    }
    // public function Return_tpluser_detail(){
    //     return view('./user/detail');
    // }
}
