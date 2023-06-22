<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCotroller extends Controller
{
    function Return_tpladm_login()
    {
        return view('.admin.login.login');
    }
    function xlLogin(Request $req)
    {
        if (Auth::guard('user')->attempt($req->only(['username', 'password']))) {
            return redirect()->route('trang-chu-admin');
        } else {
            return redirect()->route('dang-nhap-admin');
        }
    }
}
