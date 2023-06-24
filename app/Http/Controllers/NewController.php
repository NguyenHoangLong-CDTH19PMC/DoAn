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
use App\Models\TableVariantsNewType;
use App\Http\Requests\xlAddRequestNew;

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
        $level1 = TableNewType::all();
       

        return view('.admin.new.add', compact('level1'));
    }

    public function addnews(xlAddRequestNew $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemnew = new TableNew();
        // lưu các mục vào csdl
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);
        
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'new-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemnew->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/new/'), $filename);
            } else {
                return redirect()->back();
            }
        
        $itemnew->save();
        if (!empty($req->new)) {
            foreach ($req->new as $key => $value) {
                $variantsNew = new TableVariantsNewType();
                $variantsNew->id_new = $itemnew->id;
                $variantsNew->id_newtype = $value;
                $variantsNew->save();
            }
        }
        return redirect()->route('bai-viet-admin');
    }
    public function Return_tpladm_modifynew(Request $req, $id)
    {
        $new = TableNew::find($id);
        $level1 = TableNewType::all();
        $listSelectedNewType = TableVariantsNewType::where('id_new', $id)->get();

        $arrIdNewType = [];
        foreach ($listSelectedNewType as $k => $v) {
            array_push($arrIdNewType, $v->id_new_type);
        }


        return view('.admin.new.modify', ['detailNew'  => $new], compact('level1','arrIdNewType'));
    }

    public function modifynews(xlAddRequestNew $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        $itemnew = TableNew::find($id);
        if ($itemnew == null) {
            return "không tìm thấy bài viết nào có ID = {$id} này";
        }
        $itemnew->name = $req->tenbaiviet;
        $itemnew->content = htmlspecialchars($req->noidung);

            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg' || $extension == 'gif') {
                // đổi tên hình
                $filename = 'new-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemnew->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/new/'), $filename);
            } else {

                return redirect()->back();
            }
        

        $itemnew->save();

        // Xoá đi để thêm lại cái mới
        TableVariantsNewType::where('id_new', $id)->delete();
        if (!empty($req->new_type)) {
            // Tìm trong bảng có sản phẩm nào không
            $variantsNewType = TableVariantsNewType::where('id_new', $id)->get();

            // Update lại
            foreach ($req->new_type as $key => $value) {
                $variantsNewType = new TableVariantsNewType();
                $variantsNewType->id_new = $id;
                $variantsNewType->id_new_type = $value;
                $variantsNewType->save();
            }
        }
        return redirect()->route('bai-viet-admin');
    }

    public function deletenews(Request $req)
    {
        $new = TableNew::find($req->id);
        if ($new == null) {
            return "không tìm thấy thấy bài viết nào có ID = {$req->id} này";
        }

        $new->delete();
        return redirect()->route('bai-viet-admin');
    }
}
