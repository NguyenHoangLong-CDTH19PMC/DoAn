<?php $name = Route::currentRouteName(); 
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$yearnow =  date("Y", time()) ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
    @include('admin.layouts.css')
    
</head>

<body>
    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('assets/admin/images/AdminLTELogo.png') }}" alt="AdminLTELogo"
            height="60" width="60">
    </div> --}}
    <div class="contain_main wrapper">
        @include('admin.layouts.menu')
        @yield('body')
        @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.notify')
    @include('admin.layouts.js')
</body>

</html>
