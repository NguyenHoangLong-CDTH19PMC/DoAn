<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BrandController extends Controller
{
    //
    public function brands(){
        $value=DB::table('brands')->get();
        return view('./admin/product/add',compact('brands'));
    }
}
