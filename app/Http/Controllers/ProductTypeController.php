<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //
    public function pro_types()
    {
        $pro_types=DB::table('product_types')->get();
        return view('.admin.product.list',compact('pro_types'));
    }
}
