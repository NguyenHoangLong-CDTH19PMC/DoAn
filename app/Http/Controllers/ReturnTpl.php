<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\New;
class ReturnTpl extends Controller
{
    public function index_user(){
        return view('.user/ndex');
    }
    public function index_admin(){
        return view('./admin/home/home');
    }

    public function Return_tpladm_pro(){
        return view('./admin/product/list');
    }
    public function Return_tpladm_new(){
        return view('./admin/new/list');
    }
    public function Return_tpladm_addnew(){
        return view('./admin/new/add');
    }
    public function Return_tpladm_newtype(){
        return view('./admin/newtype/list');
    }
    public function Return_tpladm_addnewtype(){
        return view('./admin/newtype/add');
    }


    public function Return_tpladm_addpro(){
        return view('./admin/product/add');
    }
    public function Return_tpluser_detail(){
        return view('./user/detail');
    }
    
}
