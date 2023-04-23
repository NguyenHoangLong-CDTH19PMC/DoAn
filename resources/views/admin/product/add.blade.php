@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post" action="" enctype="multipart/form-data">
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
                        {{-- <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i class="far fa-save mr-2"></i>Lưu tại trang</button> --}}
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('san-pham') }}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục ...</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-category row">

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Danh mục cấp 1:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">Danh Mục Cấp 1 a</option>
                                        <option value="2">Danh Mục Cấp 1 b</option>
                                        <option value="3">Danh Mục Cấp 1 c</option>
                                    </select>

                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_cat">Danh mục cấp 2:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">Danh Mục Cấp 2 a</option>
                                        <option value="2">Danh Mục Cấp 2 b</option>
                                        <option value="3">Danh Mục Cấp 2 c</option>
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_item">Danh mục cấp 3:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">Danh Mục Cấp 3 a</option>
                                        <option value="2">Danh Mục Cấp 3 b</option>
                                        <option value="3">Danh Mục Cấp 3 c</option>
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_brand">Danh mục hãng:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">Nike</option>
                                        <option value="2">Adidas</option>
                                        <option value="3">Converse</option>
                                    </select>    

                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_tags">Danh mục tags:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">Giày giá rẻ</option>
                                        <option value="2">Giày cũ</option>
                                    </select>  
                                </div>


                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_color">Danh mục màu sắc:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">Đỏ</option>
                                        <option value="2">Đen</option>
                                        <option value="3">Xanh</option>
                                        <option value="4">Trắng</option>
                                    </select>  
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_size">Danh mục kích thước:</label>
                                    <select id="" name="" class="form-control select2 ">
                                        <option value="0">Chọn Danh mục</option>
                                        <option value="1">38</option>
                                        <option value="2">39</option>
                                        <option value="3">40</option>
                                        <option value="4">41</option>
                                    </select>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin sản phẩm</h3>
                                </div>
                                <div class="card-body card-article">
                                    <div class="form-group ordinal-numbers">
                                        <label for="numb" class="d-inline-block align-middle mb-0 mr-2">Số thứ
                                            tự:</label>
                                        <input type="number"
                                            class="form-control form-control-mini d-inline-block align-middle text-sm"
                                            min="0" name="" id="numb" placeholder="0" value="">
                                    </div>
                                    <div class="form-group title">
                                        <label for="name...">Tên... :</label>
                                        <input type="text" class="form-control for-seo text-sm" name=""
                                            id="" placeholder="Tên ..." value="" required>
                                    </div>
                                    <div class="form-group title...">
                                        <label for="name...">Nội dụng:</label>
                                        <textarea class="form-control for-seo text-sm " name="" id="" rows="5" placeholder="Nội dung ..."></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="code">Mã sản phẩm:</label>
                                            <input type="text" class="form-control text-sm" name="" id="code"
                                                placeholder="Mã sản phẩm" value="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="regular_price">Giá gốc:</label>
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control format-price regular_price text-sm" name=""
                                                    id="regular_price" placeholder="Giá gốc" value="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="sale_price">Giá mới:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control format-price sale_price text-sm"
                                                    name="" id="sale_price" placeholder="Giá mới" value="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh ...</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- Image --}}
                                    @include('admin.layouts.image')
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
