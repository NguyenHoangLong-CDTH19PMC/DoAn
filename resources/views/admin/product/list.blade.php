@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu') }}" title="Bảng điều khiển">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card-footer text-sm sticky-top">
                    <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('them-moi-san-pham') }}" title="Thêm mới"><i
                            class="fas fa-plus mr-2"></i>Thêm mới</a>
                    <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" title="Xóa tất cả"><i
                            class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
                    <div class="form-inline form-search d-inline-block align-middle ml-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar text-sm" type="search" id="keyword"
                                placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="">
                            <div class="input-group-append bg-primary rounded-right">
                                <button class="btn btn-navbar text-white" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer form-group-category text-sm bg-light row">
                    <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-0">
                        <select name="" id="" class="form-control filter-category select2">
                            <option value="">Chọn Danh Mục</option>
                            <option value="">Danh Mục Cấp 1 a</option>
                            <option value="">Danh Mục Cấp 1 b</option>
                            <option value="">Danh Mục Cấp 1 c</option>

                        </select>
                    </div>
                </div>

                <div class="card card-primary card-outline text-sm mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách </h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="align-middle" width="5%">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                            <label for="selectall-checkbox" class="custom-control-label"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle text-center" width="10%">STT</th>

                                    <th class="align-middle">Hình</th>

                                    {{-- <th class="align-middle">Hình 2</th> --}}

                                    <th class="align-middle" style="width:30%">Tiêu đề</th>

                                    <th class="align-middle">Gallery</th>

                                    <th class="align-middle text-center">Hiển thị</th>

                                    <th class="align-middle text-center">Thao tác</th>
                                </tr>
                            </thead>
                            @foreach($products as $k => $product)
                            
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input select-checkbox"
                                                id="select-checkbox" value="">
                                            <label for="select-checkbox" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <input type="number" class="form-control form-control-mini m-auto update-numb"
                                            min="0" value="<?=$k+1?>" data-id="" data-table="product" readonly>
                                    </td>
                                    <td class="align-middle">
                                        <a href="" title="">
                                            <img class="rounded img-preview" src="{{ asset('upload/product/'. $product->photo) }}" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'" alt="Alt Photo" style=""/>
                                        </a>
                                    </td>
                                    {{-- <td class="align-middle">
                                        <a href="" title="">
                                            <img class="rounded img-preview" src="{{ asset('upload/photo/$product->name') }}" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'" alt="Alt Photo" style=""/>
                                        </a>
                                    </td> --}}

                                    <td class="align-middle">
                                        <a class="text-dark text-break" href="" title="">{{$product->name}}</a>
                                        <div class="tool-action mt-2 w-clear">

                                            {{-- <a class="text-primary mr-3" href="" title=""><i
                                                    class="fas fa-comments mr-1"></i><span
                                                    class="badge badge-danger align-top"></span></a>

                                            <a class="text-primary mr-3" href="" target="_blank" title=""><i
                                                    class="far fa-eye mr-1"></i>View</a>

                                            <a class="text-info mr-3" href="" title=""><i
                                                    class="far fa-edit mr-1"></i>Edit</a>
                                            <div class="dropdown">
                                                <a id="dropdownCopy" href="#" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    class="nav-link dropdown-toggle text-success p-0 pr-3"><i
                                                        class="far fa-clone mr-1"></i>Copy</a>
                                                <ul aria-labelledby="dropdownCopy" class="dropdown-menu border-0 shadow">
                                                    <li><a href="#" class="dropdown-item copy-now" data-id=""
                                                            data-table="product" data-copyimg=""><i
                                                                class="far fa-caret-square-right text-secondary mr-2"></i>Sao
                                                            chép ngay</a></li>
                                                    <li><a href="" class="dropdown-item"><i
                                                                class="far fa-caret-square-right text-secondary mr-2"></i>Chỉnh
                                                            sửa thông tin</a></li>
                                                </ul>
                                            </div>

                                            <a class="text-danger" id="delete-item" data-url="" title=""><i
                                                    class="far fa-trash-alt mr-1"></i>Delete</a> --}}
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm bg-gradient-success dropdown-toggle"
                                                id="dropdown-gallery" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Thêm</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-gallery">
                                                <a class="dropdown-item text-dark" href="" title=""><i
                                                        class="far fa-caret-square-right text-secondary mr-2"></i>Hình ảnh con </a>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="align-middle text-center">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input show-checkbox"
                                                id="show-checkbox" data-table="product" data-id="" data-attr="">
                                            <label for="show-checkbox" class="custom-control-label"></label>
                                        </div>
                                    </td>

                                    <td class="align-middle text-center text-md text-nowrap">
                                        <div class="dropdown d-inline-block align-middle">
                                            <a id="dropdownCopy" href="#" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                class="nav-link dropdown-toggle text-success p-0 pr-2"><i
                                                    class="far fa-clone"></i></a>
                                            <ul aria-labelledby="dropdownCopy" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item copy-now" data-id=""
                                                        data-table="product"><i
                                                            class="far fa-caret-square-right text-secondary mr-2"></i>Sao
                                                        chép
                                                        ngay</a></li>
                                                <li><a href="" class="dropdown-item"><i
                                                            class="far fa-caret-square-right text-secondary mr-2"></i>Chỉnh
                                                        sửa
                                                        thông tin</a></li>
                                            </ul>
                                        </div>

                                        <a class="text-primary mr-2" href="" title="Chỉnh sửa"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="text-danger" id="delete-item" data-url="" title="Xóa"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer text-sm pb-0"></div>

                <div class="card-footer text-sm">
                    <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('them-moi-san-pham') }}" title="Thêm mới"><i
                            class="fas fa-plus mr-2"></i>Thêm mới</a>
                    <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url=""
                        title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
                </div>
            </div>
        </section>
    </div>
@endsection