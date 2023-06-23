<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\xlDangNhapRequest;
use App\Models\TableUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginCotroller extends Controller
{
    function index_login()
    {
        return view('.admin.login.login');
    }
    function xlLogin(xlDangNhapRequest $req)
    {
        //Kiểm Giá trị input có bằng giá trị trông cơ sở dữ liệu
        if (Auth::guard('user')->attempt($req->only(['username', 'password']))) {
            //Đúng thì vào trang trong
            return redirect()->route('trang-chu-admin');
        } else {
            //Sai thì load lại trang login
            return redirect()->route('dang-nhap-admin');
        }
    }

    public function xlLogout(Request $req): RedirectResponse
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('dang-nhap-admin');
    }
    function index_update()
    {
        return view('.admin.login.update_info');
    }
    function xl_update_info(Request $req,$id){
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);
        $info = TableUser::find($id);
        if ($info == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }
        $info->name = $req->fullname;
        // $info->name = Hash::make($req->password);
        $info->email = $req->email;
        $info->phone = $req->phone;
        ($req->gender > 0) ? $info->gender = $req->gender : 1;
        $info->birthday = $req->birthday;
        $info->address = $req->address;
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
                $filename = 'avatar-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $info->avatar = $filename;
                //Lưu trữ file vào thư mục avatar trong public -> upload -> avatar
                $req->file->move(public_path('upload/avatar/'), $filename);
            } else {

                return redirect()->back();
            }
        }
        $info->save();
        return redirect()->route('trang-chu-admin');
    }
}
