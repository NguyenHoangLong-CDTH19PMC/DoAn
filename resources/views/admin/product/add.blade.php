<?php
    $connect= mysqli_connect("localhost","root","","doantn");
    if(mysqli_connect_error())
    {
        echo "Failed to connect to MySQL:".mysqli_connect_error();
    }
    $sql_brands= mysqli_query($connect,"SELECT * FROM brands ORDER BY id  ASC");
    $sql_genders= mysqli_query($connect,"SELECT * FROM genders ORDER BY id  ASC");
    $sql_sizes= mysqli_query($connect,"SELECT * FROM sizes ORDER BY id  ASC");
    $sql_colors= mysqli_query($connect,"SELECT * FROM colors ORDER BY id  ASC");
    $sql_product_types= mysqli_query($connect,"SELECT * FROM product_types ORDER BY id  ASC");
    $sql_product=mysqli_query($connect, "SELECT * FROM products");
?>
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
                <form class="validation-form" method="post" action="{{URL::to('admin/product/insert-product')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
                        {{-- <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i class="far fa-save mr-2"></i>Lưu tại trang</button> --}}
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('san-pham') }}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục lựa chọn</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group-category row">

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Thương Hiệu</label>
                                    <select id="" name="brands" class="form-control select2 ">

                                        <?php
                                        while($row_brands = mysqli_fetch_array($sql_brands))
                                        {
                                            echo '<option value=" '.$row_brands['id'].' ">'.$row_brands['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_cat">Loại Giày</label>
                                    <select id="" name="product_types" class="form-control select2 ">
                                    <?php
                                        while($row_product_types = mysqli_fetch_array($sql_product_types))
                                        {
                                            echo '<option value=" '.$row_product_types['id'].' ">'.$row_product_types['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_item">Giới Tính</label>
                                    <select id="" name="genders" class="form-control select2 ">
                                    <?php
                                        while($row_genders = mysqli_fetch_array($sql_genders))
                                        {
                                            echo '<option value=" '.$row_genders['id'].' ">'.$row_genders['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_brand">Kích Thước</label>
                                    <select id="" name="sizes" class="form-control select2 ">
                                    <?php
                                        while($row_sizes = mysqli_fetch_array($sql_sizes))
                                        {
                                            echo '<option value=" '.$row_sizes['id'].' ">'.$row_sizes['name'].'</option>';
                                        }
                                        ?>
                                    </select>    

                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_tags">Màu Sắc</label>
                                    <select id="" name="colors" class="form-control select2 ">
                                    <?php
                                        while($row_colors = mysqli_fetch_array($sql_colors))
                                        {
                                            echo '<option value=" '.$row_colors['id'].' ">'.$row_colors['name'].'</option>';
                                        }
                                        ?>
                                    </select>  
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    $row_product=mysqli_fetch_array($sql_product);
                    ?>
                        <div class="col-xl-8">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin sản phẩm</h3>
                                </div>
                                <form class="validation-form" method="post" action="{{URL::to('admin/product/insert-product')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="card-body card-article">
                                    <!-- <div class="form-group ordinal-numbers">
                                        <label for="numb" class="d-inline-block align-middle mb-0 mr-2">Số thứ
                                            tự:</label>
                                        <input type="number"
                                            class="form-control form-control-mini d-inline-block align-middle text-sm"
                                            min="0" name="" id="numb" placeholder="0" value="">
                                    </div> -->
                                    
                                    <div class="form-group title">
                                        <label for="name...">Tên Sản Phẩm:</label>
                                        <input type="text" class="form-control for-seo text-sm" name="name"
                                            id="" placeholder="Tên ..." value="{{$row_product['name']}}" required>
                                    </div>
                                    <div class="form-group title...">
                                        <label for="name...">Nội dung:</label>
                                        <textarea class="form-control for-seo text-sm " name="content" id="content" rows="5" placeholder="Nội dung ...">{{$row_product['content']}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="code">Mã sản phẩm:</label>
                                            <input type="text" class="form-control text-sm" name="code" id="code"
                                                placeholder="Mã sản phẩm" value="{{$row_product['code']}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="regular_price">Giá gốc:</label>
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control format-price regular_price text-sm" name="price_regular"
                                                    id="price_regular" placeholder="Giá gốc" value="{{$row_product['price_regular']}}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="sale_price">Giá mới:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control format-price sale_price text-sm"
                                                    name="sale_price" id="sale_price" placeholder="Giá mới" value="{{$row_product['sale_price']}}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="sale_price">Giảm:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control format-price sale_price text-sm"
                                                    name="discount" id="discount" placeholder="Giá mới" value="{{$row_product['discount']}}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 </form>
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
