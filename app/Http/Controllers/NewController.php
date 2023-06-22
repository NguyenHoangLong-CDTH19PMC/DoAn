<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableNew;
use App\Models\TableNewType;
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

class NewController extends Controller
{
    //
    public function getsnew()
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsNew = TableNew::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsNew->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.new.list', compact('dsNew', 'serial'));
    }
    public function Return_tpladm_addnew()
    {
        $level1 = TableNew::all();
       

        return view('.admin.new.add', compact('level1'));
    }

    public function addnews(xlAddRequestNew $req)
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
                $req->file->move(public_path('upload/new/'), $filename);
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
}
