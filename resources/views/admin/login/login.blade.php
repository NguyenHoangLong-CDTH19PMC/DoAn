<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin/images/logo.ico') }}">
    <title>HL Shoe</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.css') }}">
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{ asset('assets/admin/images/logo.png') }}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form class="validate" method="POST" action="{{route('xl-dang-nhap-admin')}}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text wh"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user" value=""
                                placeholder="Tên đăng nhập">
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text wh"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value=""
                                placeholder="Mật Khẩu">
                        </div>
                       
                        <div class="d-flex justify-content-center mt-3 login_container">
                            {{-- <button type="button" name="button" class="btn login_btn">Login</button> --}}
                            <input type="submit" value="Login" name="button" class="btn login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('assets/bootstrap/bootstrap.js') }}"></script>
</body>

</html>
