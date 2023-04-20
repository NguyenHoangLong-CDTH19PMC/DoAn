<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnTpl extends Controller
{
    public function Return_tpluser(){
        return view('./user/index');
    }
    public function Return_tpladmin(){
        return view('./admin/home/home');
    }

    public function Return_tpladm_pro(){
        return view('./admin/product/list');
    }

    public function Return_tpladm_addpro(){
        return view('./admin/product/add');
    }
    public function Return_detailproduct(){
        return view('user/home/detail');
    }
}
