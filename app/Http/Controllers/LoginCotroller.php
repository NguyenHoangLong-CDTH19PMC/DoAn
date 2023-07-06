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
    function index_login_user()
    {
        return view('.user.login.login');
    }
    function xlLoginAdmin(xlDangNhapRequest $req)
    {
        //Kiểm Giá trị input có bằng giá trị trông cơ sở dữ liệu
        if (Auth::guard('admin')->attempt($req->only(['username', 'password']))) {
            //Đúng thì vào trang trong
            return redirect()->route('trang-chu-admin');
        } else {
            //Sai thì load lại trang login
            return redirect()->route('dang-nhap-admin');
        }
    }

    function xlLoginUser(xlDangNhapRequest $req)
    {
        //Kiểm Giá trị input có bằng giá trị trông cơ sở dữ liệu
        if (Auth::guard('user')->attempt($req->only(['username', 'password']))) {
            //Đúng thì vào trang trong
            return redirect()->route('trang-chu-user');
        } else {
            //Sai thì load lại trang login
            return redirect()->route('dang-nhap-user');
        }
    }

    public function xlLogoutAdmin(Request $req): RedirectResponse
    {
        if (Auth::guard('admin')->check()) // this means that the user was logged in.
        {
            Auth::guard('admin')->logout();
            $req->session()->regenerateToken();
            return redirect()->route('dang-nhap-admin');
        }
        return redirect()->route('dang-nhap-admin');
    }

    public function xlLogoutUser(Request $req): RedirectResponse
    {
        if (Auth::guard('user')->check()) // this means that the user was logged in.
        {
            Auth::guard('user')->logout();
            return redirect()->route('dang-nhap-user');
        }
        return redirect()->route('dang-nhap-user');
    }

    function index_update()
    {
        return view('.admin.login.update_info');
    }
    function xl_update_info(Request $req, $id)
    {
        // tạo 1 chuỗi ngẫu nhiên 
        $random = Str::random(5);
        $info = TableUser::where('id', $id)->first();
        if ($info == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }
        $info->name = $req->fullname;
        // $info->name = Hash::make($req->password);
        $info->email = $req->email;
        $info->phone = $req->phone;
        ($req->gender > 0) ? $info->gender = $req->gender : $info->gender = 1;
        $info->birthday = $req->birthday;
        $info->address = $req->address;
        
        if ($req->file != null) {
            // kiểm tra kích thước
            $size = $req->file->getSize();
            if ($size > 102400) {
                return "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 100MB ~ 102400KB";
            }
            // lọc ra đuôi file
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'jpg' || $extension == 'png' || $extension = 'jpeg') {
                // đổi tên hình
                $filename = 'avatar-' . $random . '.' . $req->file->getClientOriginalExtension();
                // lấy tên file để lưu vào csdl
                $info->avatar = $filename;
                //Lưu trữ file vào thư mục avatar trong public -> upload -> avatar
                $req->file->move(public_path('upload/avatar/'), $filename);
            } else {
                return "Định dạng ảnh không đúng. Định dạng cho phép (.jpg|.png|.jpeg)";
            }
        }
        $info->save();
        return redirect()->route('trang-chu-admin');
    }
    function index_change()
    {
        return view('.admin.login.change_password');
    }
    function xl_change_password(Request $req, $id)
    {
        // $validated = $req->validate([
        //     'email' => ['required'],
        //     'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
        // ]);
        $change = TableUser::find($id);
        
        if ($change == null) {
            return "không tìm thấy người dùng nào có ID = {$id} này";
        }

        if ($change == $req->oldpassword || !empty($req->oldpassword)) {
            if ($req->newpassword < 6 || $req->renewpassword < 6) {
                return "Mật khẩu mới có độ dài bé hơn 6 ký tự";
            }
            else{
                if ($req->newpassword != $req->renewpassword) {
                    return "Xác nhận mật khẩu mới không trùng khớp";
                }
                elseif(empty($req->newpassword) || empty($req->renewpassword)){
                    return "Chưa nhập mật khẩu!!!";
                }
                else{
                    $change->password = Hash::make($req->renewpassword);
                }
            }
        }
        else
        {
            return "Mật khẩu cũ của bạn chưa đúng!!! hoặc bạn chưa nhập mật khẩu cũ";
        }

        $change->save();
        return redirect()->route('dang-nhap-admin');
    }
}
