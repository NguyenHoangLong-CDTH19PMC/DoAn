<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableNew;
use App\Models\TableNewType;
use App\Http\Requests\xlAddRequestProduct;
use App\Http\Requests\xlAddRequestNewType;
use App\Http\Requests\xlAddRequestDmucLevel;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableProduct_Level1;
use App\Models\TableProduct_Level2;
use App\Models\TableColor;
use App\Models\TableSize;
use App\Models\TableVariantsColorProduct;
use App\Models\TableVariantsSizeProduct;

class NewTypeController extends Controller
{
    //
    public function getsnewtype()
    {
        $limit =  10;
        //latest() = orderBy('created_at','desc')
        $dsNewType = TableNewType::latest()->paginate($limit);
        // lấy trang hiện tại
        $current = $dsNewType->currentPage();
        // lấy số thứ tự đầu tiên nhưng theo dạng mảng (là số 0)
        $perSerial = $limit * ($current - 1);
        $serial = $perSerial + 1;
        return view('.admin.newtype.list', compact('dsNewType', 'serial'));
    }
    public function Return_tpladm_addnewtype()
    {
        $newtype = TableNewType::all();
       

        return view('.admin.newtype.add', compact('newtype'));
    }

    public function addnewstype(xlAddRequestNewType $req)
    {

        $random = Str::random(5);

        // tạo 1 item mới
        $itemnewtype = new TableNewType();
        // lưu các mục vào csdl
        $itemnewtype->name = $req->tenloaibaiviet;
        $itemnewtype->content = htmlspecialchars($req->noidung);

        if ($req->file != null) {
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'newtype-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemnewtype->photo = $filename;
                //Lưu trữ file vào thư mục product trong public -> upload -> product
                $req->file->move(public_path('upload/new/'), $filename);
            } else {
                return redirect()->back();
            }
        }
        $itemnewtype->save();

        return redirect()->route('loai-bai-viet-admin');
    }

    public function Return_tpladm_modifynewtype(Request $req, $id)
    {
        $newtype = TableNewType::find($id);

        return view('.admin.newtype.modify', ['detailNewType'  => $newtype]);
    }

    public function modifynewtypes(xlAddRequestNewType $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);

        //tìm xem sản phẩm có hay không
        $itemnewtype = TableNewType::find($id);
        if ($itemnewtype == null) {
            return "không tìm thấy loại bài viết nào có ID = {$id} này";
        }
        $itemnewtype->name = $req->tenloaibaiviet;
        $itemnewtype->content = htmlspecialchars($req->noidung);
       
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg' || $extension == 'gif') {
                // đổi tên hình
                $filename = 'newtype-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $itemnewtype->photo = $filename;
                //Lưu trữ file vào thư mục new trong public -> upload -> new
                $req->file->move(public_path('upload/new/'), $filename);
            } else {
                
                return redirect()->back();
            }
        

        $itemnewtype->save();
        return redirect()->route('loai-bai-viet-admin');
    }

    public function deletenewtypes(Request $req)
    {
        $newtype = TableNewType::find($req->id);
        if ($newtype == null) {
            return "không tìm thấy thấy loại bài viết nào có ID = {$req->id} này";
        }

        $newtype->delete();
        return redirect()->route('loai-bai-viet-admin');
    }
}
