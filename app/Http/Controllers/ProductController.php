<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\xlAddRequest;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableProduct_Level1;

class ProductController extends Controller
{
    // ---------------- ADMIN ---------------- //
    // Sản phẩm //
    public function Return_tpladm_pro()
    {
        return view('.admin.product.main.list');
    }

    public function getproducts()
    {
        $products = TableProduct::latest()->paginate(10);
        $level1 = TableProduct_Level1::all();
        return view('.admin.product.main.list', compact('products', 'level1'));
    }

    public function Return_tpladm_addpro()
    {
        $level1 = TableProduct_Level1::all();
        return view('.admin.product.main.add', compact('level1'));
    }

    public function addproducts(xlAddRequest $req)
    {
        $validated = $req->validated();
        $random = Str::random(5);

        // tạo 1 item mới
        $products = new TableProduct();
        // lưu các mục vào csdl
        $products->code = $req->masp;
        $products->name = $req->tensp;
        $products->content = $req->noidung;
        // kiểm tra xem giá có rỗng ko có thì thay thế dấu , =  " " , ngược thì gán = 0 (isset($req->giagoc) && $req->giagoc != '') ? str_replace(",", "", $req->giagoc) : 0;
        $products->price_regular = (isset($req->giagoc) && $req->giagoc != '') ? str_replace(",", "", $req->giagoc) : 0;
        $products->sale_price = (isset($req->giamoi) && $req->giamoi != '') ? str_replace(",", "", $req->giamoi) : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 2000000) {
                session()->flash('fail', 'Kích thước ảnh vượt quá 2MB');
                return redirect()->back();
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg' || $extension == 'gif') {
                // đổi tên hình
                $filename = 'product-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $products->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {
                session()->flash('fail', 'File hiện tại không phải hình ảnh');
                return redirect()->back();
            }
        }
        $products->save();
        return redirect()->route('san-pham-admin');
    }

    public function Return_tpladm_modifypro(Request $req)
    {
        $products = TableProduct::find($req->id);
        $level1 = TableProduct_Level1::find($req->id);
        return view('.admin.product.main.modify', ['dsSP'  => $products], ['dsDM1' => $level1]);
    }

    public function modifyproducts(xlAddRequest $req)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $products = TableProduct::find($req->id);
        if ($products == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }
        $products->code = $req->masp;
        $products->name = $req->tensp;
        $products->content = $req->noidung;
        // kiểm tra xem giá có rỗng ko có thì thay thế dấu , =  " " , ngược thì gán = 0 (isset($req->giagoc) && $req->giagoc != '') ? str_replace(",", "", $req->giagoc) : 0;
        $products->price_regular = (isset($req->giagoc) && $req->giagoc != '') ? str_replace(",", "", $req->giagoc) : 0;
        $products->sale_price = (isset($req->giamoi) && $req->giamoi != '') ? str_replace(",", "", $req->giamoi) : 0;

        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 2000000) {
                session()->flash('fail', 'Kích thước ảnh vượt quá 2MB');
                return redirect()->back();
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg' || $extension == 'gif') {
                // đổi tên hình
                $filename = 'product-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $products->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {
                session()->flash('fail', 'File hiện tại không phải hình ảnh');
                return redirect()->back();
            }
        }

        $products->save();
        return redirect()->route('san-pham-admin');
    }

    public function deleteproducts(Request $req)
    {
        $products = TableProduct::find($req->id);
        if ($products == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }

        $products->delete();
        return redirect()->route('san-pham-admin');
    }
    // Sản phẩm //

    // Danh mục cấp 1 //
    public function getproductlv1()
    {
        $level1 = TableProduct_Level1::latest()->paginate(10);
        return view('.admin.product.level1.list', compact('level1'));
    }
    public function Return_tpladm_addprolv1()
    {
        return view('.admin.product.level1.add');
    }

    public function addlevel1(Request $req)
    {
        $random = Str::random(5);

        // tạo 1 item mới
        $products = new TableProduct_Level1();
        // lưu các mục vào csdl
        $products->name = $req->tensp;
        $products->content = $req->noidung;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 2000000) {
                session()->flash('fail', 'Kích thước ảnh vượt quá 2MB');
                return redirect()->back();
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg' || $extension == 'gif') {
                // đổi tên hình
                $filename = 'level1-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $products->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {
                session()->flash('fail', 'File hiện tại không phải hình ảnh');
                return redirect()->back();
            }
        }
        $products->save();
        return redirect()->route('sanpham-lv1-admin');
    }

    public function Return_tpladm_modifylv1(Request $req)
    {
        $level1 = TableProduct_Level1::find($req->id);
        return view('.admin.product.main.modify', ['dsSP'  => $level1]);
    }

    // Danh mục cấp 1 //

    // ---------------- ADMIN ---------------- //



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

}
