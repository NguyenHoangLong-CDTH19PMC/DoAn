<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products=DB::table('products')->get();
        return view('.admin.product.list',compact('products'));
    }
}
