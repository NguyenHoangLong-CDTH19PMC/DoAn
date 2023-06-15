<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\xlAddRequest;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableProduct_Level1;
use App\Models\TableProduct_Level2;

class ProductController extends Controller
{

    // ---------------- ADMIN ---------------- //
    // Sản phẩm //
    public function Return_tpladm_pro()
    {
        return view('.admin.product.main.list');
    }

    public function getproducts(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $products = TableProduct::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $products->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.main.list', compact('products', 'serial'));
    }

    public function Return_tpladm_addpro()
    {
        $level1 = TableProduct_Level1::all();
        $level2 = TableProduct_Level2::all();
        return view('.admin.product.main.add', compact('level1', 'level2'));
    }

    public function addproducts(xlAddRequest $req)
    {
        $validated = $req->validated();
        $random = Str::random(5);

        // tạo 1 item mới
        $itemproduct = new TableProduct();
        // lưu các mục vào csdl
        $itemproduct->code = $req->masp;
        $itemproduct->name = $req->tensp;
        $itemproduct->content = htmlspecialchars($req->noidung);
        // kiểm tra xem giá có rỗng không, có giá trị thì thay thế ký tự , =  ký tự rỗng, ngược lại thì gán = 0 
        $itemproduct->price_regular = (isset($req->giagoc) && !empty($req->giagoc)) ? str_replace(',', '', $req->giagoc) : 0;
        $itemproduct->sale_price = (isset($req->giamoi) && $req->giamoi != '') ? str_replace(",", "", $req->giamoi) : 0;
        ($req->categorylv1 > 0) ? $itemproduct->id_level1 = $req->categorylv1 : 0;
        ($req->categorylv2 > 0) ? $itemproduct->id_level2 = $req->categorylv2 : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 2000000) {
                session()->flash('fail', 'Kích thước ảnh vượt quá 2MB');
                return redirect()->back();
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'product-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemproduct->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {
                session()->flash('fail', 'File hiện tại không phải hình ảnh');
                return redirect()->back();
            }
        }
        $itemproduct->save();
        return redirect()->route('san-pham-admin')->with('flash_message', 'Thêm thành công!!!');
    }

    public function Return_tpladm_modifypro(Request $req)
    {
        $product = TableProduct::find($req->id);
        $level1 = TableProduct_Level1::all();
        $level2 = TableProduct_Level2::all();
        return view('.admin.product.main.modify', ['detailSP'  => $product], compact('level1', 'level2'));
    }

    public function modifyproducts(xlAddRequest $req)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $itemproduct = TableProduct::find($req->id);
        if ($itemproduct == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }
        $itemproduct->code = $req->masp;
        $itemproduct->name = $req->tensp;
        $itemproduct->content = htmlspecialchars($req->noidung); 
        // kiểm tra xem giá có rỗng không, có giá trị thì thay thế ký tự ',' =  ký tự rỗng '' , ngược lại thì gán = 0 
        $itemproduct->price_regular = (isset($req->giagoc) && $req->giagoc != '') ? str_replace(",", "", $req->giagoc) : 0;
        $itemproduct->sale_price = (isset($req->giamoi) && $req->giamoi != '') ? str_replace(",", "", $req->giamoi) : 0;
        ($req->categorylv1 > 0) ? $itemproduct->id_level1 = $req->categorylv1 : 0;
        ($req->categorylv2 > 0) ? $itemproduct->id_level2 = $req->categorylv2 : 0;    
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
                $itemproduct->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/product/'), $filename);
            } else {
                session()->flash('fail', 'File hiện tại không phải hình ảnh');
                return redirect()->back();
            }
        }

        $itemproduct->save();
        return redirect()->route('san-pham-admin')->with('flash_message', 'Chỉnh sửa thành công!!!');
    }

    public function deleteproducts(Request $req)
    {
        $products = TableProduct::find($req->id);
        if ($products == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }

        $products->delete();
        return redirect()->route('san-pham-admin')->with('flash_message', 'Xoá thành công!!!');
    }
    // Sản phẩm //

    // Danh mục cấp 1 //
    public function getproductlv1()
    {
        $limit =  10;
        $dslevel1 = TableProduct_Level1::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dslevel1->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.level1.list', compact('dslevel1','serial'));
    }

    public function Return_tpladm_addprolv1()
    {
        return view('.admin.product.level1.add');
    }

    public function addlevel1(xlAddRequest $req)
    {
        // tạo 1 item mới
        $itemlevel1 = new TableProduct_Level1();
        // lưu các mục vào csdl
        $itemlevel1->name = $req->tensp;
        
        $itemlevel1->save();
        return redirect()->route('sanpham-lv1-admin');
    }

    public function Return_tpladm_modifylv1(Request $req)
    {
        $level1 = TableProduct_Level1::find($req->id);
        return view('.admin.product.level1.modify', ['detailLV1'  => $level1]);
    }

    public function modifylevel1(xlAddRequest $req)
    {
        $itemlevel1 = TableProduct_Level1::find($req->id);
        if ($itemlevel1 == null) {
            return "không tìm thấy danh mục có ID = {$req->id} ";
        }
        // lưu các mục vào csdl
        $itemlevel1->name = $req->tensp;
        $itemlevel1->save();
        return redirect()->route('sanpham-lv1-admin');
    }

    public function deletelevel1(Request $req)
    {
        $itemlevel1 = TableProduct_Level1::find($req->id);
        if ($itemlevel1 == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }

        $itemlevel1->delete();
        return redirect()->route('sanpham-lv1-admin');
    }

    // Danh mục cấp 1 //

    // Danh mục cấp 2 //
    public function getproductlv2()
    {
        $limit =  10;
        $dslevel2 = TableProduct_Level2::latest()->paginate($limit);
        $dslevel1 = TableProduct_Level1::all();
        // lấy trang hiện tại
        $current = $dslevel2->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.level2.list', compact('dslevel2','serial','dslevel1'));
    }

    public function Return_tpladm_addprolv2()
    {
        $dslevel1 = TableProduct_Level1::all();
        return view('.admin.product.level2.add',compact('dslevel1'));
    }

    public function addlevel2(xlAddRequest $req)
    {
        // tạo 1 item mới
        $itemlevel2 = new TableProduct_Level2();
        // lưu các mục vào csdl
        $itemlevel2->name = $req->tensp;
        ($req->categorylv1 > 0) ? $itemlevel2->id_level1 = $req->categorylv1 : 0;
        $itemlevel2->save();
        return redirect()->route('sanpham-lv2-admin');
    }

    public function Return_tpladm_modifylv2(Request $req)
    {
        $level2 = TableProduct_Level2::find($req->id);
        $dslevel1 = TableProduct_Level1::all();
        return view('.admin.product.level2.modify', ['detailLV2'  => $level2], compact('dslevel1'));
    }

    public function modifylevel2(xlAddRequest $req)
    {
        $itemlevel2 = TableProduct_Level2::find($req->id);
        if ($itemlevel2 == null) {
            return "không tìm thấy danh mục có ID = {$req->id} ";
        }    
        // lưu các mục vào csdl
        $itemlevel2->name = $req->tensp;
        ($req->categorylv1 > 0) ? $itemlevel2->id_level1 = $req->categorylv1 : 0;
        $itemlevel2->save();
        return redirect()->route('sanpham-lv2-admin');
    }

    public function deletelevel2(Request $req)
    {
        $level2 = TableProduct_Level2::find($req->id);
        if ($level2 == null) {
            return "không tìm thấy sản phẩm có ID = {$req->id} ";
        }

        $level2->delete();
        return redirect()->route('sanpham-lv2-admin');
    }

    // Danh mục cấp 2 //

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
