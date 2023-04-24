<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ReturnTpl;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function products()
    {
        $products=DB::table('table_products')->get();
        return view('.admin.product.list',compact('products'));
    }
}
