<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductController extends Controller
{
    public function getproducts()
    {
        $products=Product::all();
        return view('.admin.product.main.list',compact('products'));
    }
    

    public function Return_tpladm_pro(){
        return view('.admin.product.main.list');
    }

    public function Return_tpladm_addpro(){
        $products = Product::all();
        return view('.admin.product.main.add',compact('products'));
    }

    public function Return_tpladm_editpro($id){
        $products = Product::find($id);
        return view('.admin.product.main.edit',['dsSP'  => $products]);
    }



    public function addproducts(Request $req)
    {   
        $random = Str::random(5);
        // đổi tên hình
        $filename = 'product-'. $random .'.'.$req->file->getClientOriginalExtension();
        // tạo 1 item mới
        $products = new Product();
        // lưu các mục vào csdl
        $products->code = $req->masp;
        $products->serial = $req->serial;
        $products->name = $req->tensp;
        $products->content = $req->noidung;
        $products->price_regular =(isset($req->giagoc) && $req->giagoc != '') ? str_replace(",", "", $req->giagoc) : 0;
        $products->sale_price = (isset($req->giamoi) && $req->giamoi != '') ? str_replace(",", "", $req->giamoi) : 0;
        // lấy tên file để lưu vào csdl
        $products->photo = $filename;
        //Lưu trữ file vào thư mục product trong public -> upload -> product
        $req->file->move(public_path('upload/product/'), $filename);



        //$req->file->move(base_path('upload/product/'.$req->file->getClientOriginalName()));
        $products->save();
        return redirect()->route('san-pham');
    }



    public function editproducts(Request $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);
        // đổi tên hình
        $filename = 'product-'. $random .'.'.$req->file->getClientOriginalExtension();

        //tìm xem sản phẩm có hay không
        $products = Product::find($id);
        if ($products == null) {
            return "không tìm thấy sản phẩm có ID = {$id} ";
        }
        $products->code = $req->masp;
        $products->name = $req->tensp;
        $products->content = $req->noidung;
        $products->price_regular = $req->giagoc;
        $products->sale_price = $req->giamoi;
        // lấy tên file để lưu vào csdl
        $products->photo = $filename;
        //Lưu trữ file vào thư mục product trong public -> upload -> product
        $req->file->move(public_path('upload/product/'), $filename);
        
        $products->save();
        return redirect()->route('san-pham');
    }

    public function deleteproducts($id)
    {
        $products = Product::find($id);
        if ($products == null) {
            return "không tìm thấy sản phẩm có ID = {$id} ";
        }
       
        $products->delete();
        return redirect()->route('san-pham');
    }

    //  /* Format money */
    //  public function formatMoney($price = 0, $unit = 'đ', $html = false)
    //  {
    //      $str = '';
    //      if ($price) {
    //          $str .= number_format($price, 0, ',', '.');
    //          if ($unit != '') {
    //              if ($html) {
    //                  $str .= '<span>' . $unit . '</span>';
    //              } else {
    //                  $str .= $unit;
    //              }
    //          }
    //      }
    //      return $str;
    //  }

    public function storeFile(Request $reqFile)
    {
        $reqFile->validate($reqFile, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $path = $reqFile->file('image')->store('/upload/product', 'public');

        $data = Product::create([
            'image' => $path,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return $data;
    }
}
