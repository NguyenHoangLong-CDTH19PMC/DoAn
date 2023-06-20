<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\xlAddRequestProduct;
use App\Http\Requests\xlAddRequestDmucLevel;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableProduct_Level1;
use App\Models\TableProduct_Level2;
use App\Models\TableColor;
use App\Models\TableSize;
use App\Models\TableVariantsColorProduct;
use App\Models\TableVariantsSizeProduct;

class ProductController extends Controller
{

    // ---------------- ADMIN ---------------- //
    // Sản phẩm //
    public function getproducts(Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsProduct = TableProduct::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsProduct->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.product.main.list', compact('dsProduct', 'serial'));
    }

    public function Return_tpladm_addpro()
    {
        $level1 = TableProduct_Level1::all();
        $level2 = TableProduct_Level2::all();

        $dsColor = TableColor::all();
        $dsSize = TableSize::all();

        return view('.admin.product.main.add', compact('level1', 'level2', 'dsColor', 'dsSize'));
    }

    public function addproducts(xlAddRequestProduct $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemproduct = new TableProduct();
        // lưu các mục vào csdl
        $itemproduct->code = $req->masp;
        $itemproduct->name = $req->tensp;
        $itemproduct->content = htmlspecialchars($req->noidung);
        // kiểm tra xem giá có rỗng không, có giá trị thì thay thế ký tự , =  ký tự rỗng, ngược lại thì gán = 0 
        $itemproduct->price_regular = (isset($req->giagoc) && !empty($req->giagoc)) ? str_replace(',', '', $req->giagoc) : 0;
        $itemproduct->sale_price = (isset($req->giamoi) && !empty($req->giamoi)) ? str_replace(",", "", $req->giamoi) : 0;
        ($req->categorylv1 > 0) ? $itemproduct->id_level1 = $req->categorylv1 : 0;
        ($req->categorylv2 > 0) ? $itemproduct->id_level2 = $req->categorylv2 : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 2000000) {
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
                return redirect()->back();
            }
        }
        $itemproduct->save();

        foreach ($req->color as $key => $value) {
            $variantsColPro = new TableVariantsColorProduct();
            $variantsColPro->id_product = $itemproduct->id;
            $variantsColPro->id_color = $value;
            $variantsColPro->save();
        }

        foreach ($req->size as $key => $value) {
            $variantsSizPro = new TableVariantsSizeProduct();
            $variantsSizPro->id_product = $itemproduct->id;
            $variantsSizPro->id_size = $value;
            $variantsSizPro->save();
        }

        return redirect()->route('san-pham-admin');
    }

    public function Return_tpladm_modifypro(Request $req, $id)
    {
        $product = TableProduct::find($id);
        $level1 = TableProduct_Level1::all();
        $level2 = TableProduct_Level2::all();

        $dsColor = TableColor::all();
        $dsSize = TableSize::all();

        // Lấy danh sách color theo sản phẩm và size theo sản phẩm
        $listSelectedColor = TableVariantsColorProduct::where('id_product', $id)->get();
        $listSelectedSize = TableVariantsSizeProduct::where('id_product', $id)->get();
        // Lấy mảng id từ danh sách color theo sản phẩm
        $arrIdColor = [];
        foreach ($listSelectedColor as $k => $v) {
            array_push($arrIdColor, $v->id_color);
        }

        // Lấy mảng id từ danh sách size theo sản phẩm
        $arrIdSize = [];
        foreach ($listSelectedSize as $k => $v) {
            array_push($arrIdSize, $v->id_size);
        }

        return view('.admin.product.main.modify', ['detailSP'  => $product], compact('level1', 'level2', 'dsColor', 'dsSize', 'arrIdColor', 'arrIdSize'));
    }

    public function modifyproducts(xlAddRequestProduct $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $itemproduct = TableProduct::find($id);
        if ($itemproduct == null) {
            return "không tìm thấy sản phẩm nào có ID = {$id} này";
        }
        $itemproduct->code = $req->masp;
        $itemproduct->name = $req->tensp;
        $itemproduct->content = htmlspecialchars($req->noidung);
        // kiểm tra xem giá có rỗng không, có giá trị thì thay thế ký tự ',' =  ký tự rỗng '' , ngược lại thì gán = 0 
        $itemproduct->price_regular = (isset($req->giagoc) && !empty($req->giagoc)) ? str_replace(",", "", $req->giagoc) : 0;
        $itemproduct->sale_price = (isset($req->giamoi) && !empty($req->giamoi)) ? str_replace(",", "", $req->giamoi) : 0;
        ($req->categorylv1 > 0) ? $itemproduct->id_level1 = $req->categorylv1 : 0;
        ($req->categorylv2 > 0) ? $itemproduct->id_level2 = $req->categorylv2 : 0;
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 2000000) {
               
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
                
                return redirect()->back();
            }
        }

        $itemproduct->save();

        // Xoá đi để thêm lại cái mới
        TableVariantsColorProduct::where('id_product', $id)->delete();
        if (!empty($req->color)) {
            // Tìm trong bảng có sản phẩm nào không
            $variantsColPro = TableVariantsColorProduct::where('id_product', $id)->get();
                       
            // Update lại
            foreach ($req->color as $key => $value) {
                $variantsColPro = new TableVariantsColorProduct();
                $variantsColPro->id_product = $id;
                $variantsColPro->id_color = $value;
                $variantsColPro->save();
            }
        }
        // Xoá đi để thêm lại cái mới
        TableVariantsSizeProduct::where('id_product', $id)->delete();
        if (!empty($req->size)) {
            $variantsSizPro = TableVariantsSizeProduct::where('id_product', $id)->get();
          
            // Update lại
            foreach ($req->size as $key => $value) {
                $variantsSizPro = new TableVariantsSizeProduct();
                $variantsSizPro->id_product = $id;
                $variantsSizPro->id_size = $value;
                $variantsSizPro->save();
            }
        }

        return redirect()->route('san-pham-admin');
    }

    public function deleteproducts(Request $req)
    {
        $products = TableProduct::find($req->id);
        if ($products == null) {
            return "không tìm thấy sản phẩm nào có ID = {$req->id} này";
        }

        $products->delete();
        return redirect()->route('san-pham-admin');
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
        return view('.admin.product.level1.list', compact('dslevel1', 'serial'));
    }

    public function Return_tpladm_addprolv1()
    {
        return view('.admin.product.level1.add');
    }

    public function addlevel1(xlAddRequestDmucLevel $req)
    {
        // tạo 1 item mới
        $itemlevel1 = new TableProduct_Level1();
        // lưu các mục vào csdl
        $itemlevel1->name = $req->tendm;

        $itemlevel1->save();
        return redirect()->route('sanpham-lv1-admin');
    }

    public function Return_tpladm_modifylv1($id)
    {
        $level1 = TableProduct_Level1::find($id);
        return view('.admin.product.level1.modify', ['detailLV1'  => $level1]);
    }

    public function modifylevel1(xlAddRequestDmucLevel $req, $id)
    {
        $itemlevel1 = TableProduct_Level1::find($id);
        if ($itemlevel1 == null) {
            return "không tìm thấy danh mục nào có ID = {$id} này";
        }
        // lưu các mục vào csdl
        $itemlevel1->name = $req->tendm;
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
        return view('.admin.product.level2.list', compact('dslevel2', 'serial', 'dslevel1'));
    }

    public function Return_tpladm_addprolv2()
    {
        $dslevel1 = TableProduct_Level1::all();
        return view('.admin.product.level2.add', compact('dslevel1'));
    }

    public function addlevel2(xlAddRequestDmucLevel $req)
    {
        // tạo 1 item mới
        $itemlevel2 = new TableProduct_Level2();
        // lưu các mục vào csdl
        $itemlevel2->name = $req->tendm;
        ($req->categorylv1 > 0) ? $itemlevel2->id_level1 = $req->categorylv1 : 0;
        $itemlevel2->save();
        return redirect()->route('sanpham-lv2-admin');
    }

    public function Return_tpladm_modifylv2($id)
    {
        $level2 = TableProduct_Level2::find($id);
        $dslevel1 = TableProduct_Level1::all();
        return view('.admin.product.level2.modify', ['detailLV2'  => $level2], compact('dslevel1'));
    }

    public function modifylevel2(xlAddRequestDmucLevel $req, $id)
    {
        $itemlevel2 = TableProduct_Level2::find($id);
        if ($itemlevel2 == null) {
            return "không tìm thấy danh mục nào có ID = {$id} này";
        }
        // lưu các mục vào csdl
        $itemlevel2->name = $req->tendm;
        ($req->categorylv1 > 0) ? $itemlevel2->id_level1 = $req->categorylv1 : 0;
        $itemlevel2->save();
        return redirect()->route('sanpham-lv2-admin');
    }

    public function deletelevel2(Request $req)
    {
        $itemlevel2 = TableProduct_Level2::find($req->id);
        if ($itemlevel2 == null) {
            return "không tìm thấy sản phẩm có nào ID = {$req->id} này";
        }

        $itemlevel2->delete();
        return redirect()->route('sanpham-lv2-admin');
    }

    // Danh mục cấp 2 //

    public function setStatus(Request $req){
        if ($req->id) {
            // lấy giá trị cột được chọn tạo ra 1 mảng riêng
            $status_detail = TableProduct::where('id',$req->id)->pluck('status');
            // cắt mảng thành từng phần tử nhỏ và lấy phần tử đầu tiên
            $status_array = (!empty($status_detail[0])) ? explode(',', $status_detail[0]) : array();
            // check xem $req truyền vào có trong mảng ko
            if (array_search($req->status, $status_array) !== false) {
                $key = array_search($req->status, $status_array);
                unset($status_array[$key]);
            } else {
                array_push($status_array, $req->status);
            }
            // tạo 1 mảng mới
            $data = array();
            // truyền dữ liệu vào mảng
            $data['status'] = (!empty($status_array)) ? implode(',', $status_array) : null;
            // lấy dữ liệu item hiện tại
            $status_save = TableProduct::find($req->id);
            // đổi giá trị cột status thành giá trị mới truyền
            $status_save->status = $data['status'];
            $status_save->save();  
        }
    }
    public function searchproduct(Request $req)
    {
        
        $keywords=$req->keywords_submit;

        $search_product=TableProduct::where('name','like','%'.$keywords.'%')->get();
        return view('.admin.product.main.searchproduct')->with('search_product',$search_product);
    }
    public function searchlv2(Request $req)
    {
        
        $keywords=$req->keywords_submit;

        $search_lv2=TableProduct_Level2::where('name','like','%'.$keywords.'%')->get();
        return view('.admin.product.level2.searchlv2')->with('search_lv2',$search_lv2);
    }
    public function searchlv1(Request $req)
    {

        $keywords=$req->keywords_submit;

        $search_lv1=TableProduct_Level1::where('name','like','%'.$keywords.'%')->get();
        return view('.admin.product.level1.searchlv1')->with('search_lv1',$search_lv1);
    }
    public function searchcolor(Request $req)
    {

        $keywords=$req->keywords_submit;

        $search_color=TableColor::where('name','like','%'.$keywords.'%')->get();
        return view('.admin.color_size.color.searchcolor')->with('search_color',$search_color);
    }
    public function searchsize(Request $req)
    {

        $keywords=$req->keywords_submit;

        $search_size=TableSize::where('name','like','%'.$keywords.'%')->get();
        return view('.admin.color_size.size.searchsize')->with('search_size',$search_size);
    }

    // ---------------- ADMIN ---------------- //

    // ---------------- USER ---------------- //
    public function GetProductIndex (Request $req)
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsProduct = TableProduct::latest()->get();
        return view('.user.home.home', compact('dsProduct'));
    }
}
