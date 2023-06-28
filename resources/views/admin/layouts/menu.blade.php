<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-color navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav align-items-center">
        <li class="nav-item">
            <a class="nav-link" id="sidebarCollapse" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('trang-chu-user') }}" class="nav-link link-home d-block" target="_blank">Xem Webite <i class="fa-solid fa-arrow-up-right-from-square fa-xs ml-1"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('assets/admin/images/user1-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('assets/admin/images/user8-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('assets/admin/images/user3-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <div class="user_profile_dd dropdown">
                <a class="nav-link d-block"  data-toggle="dropdown" href="#">
                        <img class="img-responsive rounded-circle" src="{{ asset('upload/avatar/' . Auth::guard('user')->user()->avatar) }}"
                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"alt="Alt Photo" style="" />
                        <span class="name_user">{{ Auth::guard('user')->user()->name }}</span></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('suadoi-thongtin-admin', ['id'=>Auth::guard('user')->user()->id]) }}">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="{{route('xl-logout')}}"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                </div>
            </div>
        </li>
    </ul>
    
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('trang-chu-admin') }}" class="brand-link">
        <img src="{{ asset('assets/admin/images/logo.png') }}" alt="Logo company"
            class="brand-image img-circle elevation-3 ">
        <span class="brand-text ml-2 font-weight-light font-size-3">HL Shoe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->

        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('trang-chu-admin') }}"
                        class="nav-link {{ $name == 'trang-chu-admin' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ $name == 'san-pham-admin' ||
                    $name == 'them-moi-san-pham-admin' ||
                    $name == 'sua-doi-san-pham-admin' ||
                    $name == 'sanpham-lv1-admin' ||
                    $name == 'themmoi-sanpham-lv1-admin' ||
                    $name == 'suadoi-sanpham-lv1-admin' ||
                    $name == 'sanpham-lv2-admin' ||
                    $name == 'themmoi-sanpham-lv2-admin' ||
                    $name == 'suadoi-sanpham-lv2-admin'
                        ? 'menu-open'
                        : '' }} ">

                    <a
                        class="nav-link {{ $name == 'san-pham-admin' ||
                        $name == 'them-moi-san-pham-admin' ||
                        $name == 'sua-doi-san-pham-admin' ||
                        $name == 'sanpham-lv1-admin' ||
                        $name == 'themmoi-sanpham-lv1-admin' ||
                        $name == 'suadoi-sanpham-lv1-admin' ||
                        $name == 'sanpham-lv2-admin' ||
                        $name == 'themmoi-sanpham-lv2-admin' ||
                        $name == 'suadoi-sanpham-lv2-admin'
                            ? 'active'
                            : '' }}">
                        <i class="nav-icon fas fa-boxes-stacked"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('san-pham-admin') }}"
                                class="nav-link {{ $name == 'san-pham-admin' || $name == 'them-moi-san-pham-admin' || $name == 'sua-doi-san-pham-admin'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sanpham-lv1-admin') }}"
                                class="nav-link {{ $name == 'sanpham-lv1-admin' || $name == 'themmoi-sanpham-lv1-admin' || $name == 'suadoi-sanpham-lv1-admin'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh mục thương hiệu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sanpham-lv2-admin') }}"
                                class="nav-link {{ $name == 'sanpham-lv2-admin' || $name == 'themmoi-sanpham-lv2-admin' || $name == 'suadoi-sanpham-lv2-admin'
                                    ? 'active'
                                    : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh mục loại</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ $name == 'mau-sac-admin' || $name == 'them-moi-mau-sac-admin' || $name == 'sua-doi-mau-sac-admin' || $name == 'kich-thuoc-admin' || $name == 'them-moi-kich-thuoc-admin' || $name == 'sua-doi-kich-thuoc-admin' ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ $name == 'mau-sac-admin' || $name == 'them-moi-mau-sac-admin' || $name == 'sua-doi-mau-sac-admin' || $name == 'kich-thuoc-admin' || $name == 'them-moi-kich-thuoc-admin' || $name == 'sua-doi-kich-thuoc-admin' ? 'active' : '' }} ">
                        <i class="nav-icon  fas fa-palette"></i>
                        <p>
                            Quản lý Color - Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('mau-sac-admin') }}"
                                class="nav-link {{ $name == 'mau-sac-admin' || $name == 'them-moi-mau-sac-admin' || $name == 'sua-doi-mau-sac-admin' ? 'active' : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách màu sắc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kich-thuoc-admin') }}"
                                class="nav-link {{ $name == 'kich-thuoc-admin' || $name == 'them-moi-kich-thuoc-admin' || $name == 'sua-doi-kich-thuoc-admin' ? 'active' : '' }}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách kích thước</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{($name == 'bai-viet-admin'|| $name == 'them-moi-bai-viet-admin' || $name == 'sua-doi-bai-viet-admin' || $name == 'loai-bai-viet-admin' || $name == 'them-moi-loai-bai-viet-admin' || $name == 'sua-doi-loai-bai-viet-admin') ? "menu-open" : ""}}">
                    <a class="nav-link {{($name == 'bai-viet-admin' || $name == 'them-moi-bai-viet-admin' || $name == 'sua-doi-bai-viet-admin' || $name == 'loai-bai-viet-admin' || $name == 'them-moi-loai-bai-viet-admin' || $name == 'sua-doi-loai-bai-viet-admin') ? "active" : ""}} ">
                        <i class="nav-icon fas fa-duotone fa-clipboard"></i>
                        <p>
                           Quản lý Bài Viết
                           <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bai-viet-admin')}}" class="nav-link {{($name == 'bai-viet-admin' || $name == 'them-moi-bai-viet-admin' || $name == 'sua-doi-bai-viet-admin') ? "active" : ""}}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách bài viết</p>
                            </a>
                        </li>
                        
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('loai-bai-viet-admin')}}" class="nav-link {{($name == 'loai-bai-viet-admin' || $name == 'them-moi-loai-bai-viet-admin' || $name == 'sua-doi-loai-bai-viet-admin') ? "active" : ""}}">
                                <i class="nav-icon-small fas fa-circle fa-2xs"></i>
                                <p>Danh sách loại bài viết</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
