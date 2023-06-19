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
    public function insert_product()
    {
        $data = request()->validate([
            'name'=>'required',
            'code'=>'required',
            'content'=>'required',
            'image'=>'required|image',
            'price_regular'=>'required',
            'sale_price'=>'required',
            'discount'=>'required',
            'id_color'=>'required',
            'id_size'=>'required',
            'id_product_type'=>'required',
            'id_brand'=>'required',
            'id_gender'=>'required',
        ]);
        $product = new Product();
        $product->name=$data['name'];
        $product->code=$data['code'];
        $product->content=$data['content'];
        $product->image='OIP.jpg';
        $product->price_regular=$data['price_regular'];
        $product->sale_price=$data['sale_price'];
        $product->discount=$data['discount'];
        $product->id_color=$data['id_color'];
        $product->id_size=$data['id_size'];
        $product->id_product_type=$data['id_product_type'];
        $product->id_brand=$data['id_brand'];
        $product->id_gender=$data['id_gender'];

        $product->save();
        return redirect('admin/product/list');
        // $data=$req->all();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }
}
