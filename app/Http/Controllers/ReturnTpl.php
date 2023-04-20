<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnTpl extends Controller
{
    public function Return_tpluser(){
        return view('./user/index');
    }
    public function Return_tpladmin(){
        return view('./admin/index');
    }
    public function Return_detailproduct(){
        return view('user/home/detail');
    }
}
