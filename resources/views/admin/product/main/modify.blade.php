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
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
<<<<<<< HEAD:resources/views/admin/product/main/modify.blade.php
                <form class="validation-form" method="post" action="{{ route('xl-sua-doi-san-pham-admin', ['id' => $detailSP->id]) }}" enctype="multipart/form-data">
=======
                <form class="validation-form" method="post" action="{{URL::to('admin/product/insert-product')}}" enctype="multipart/form-data">
>>>>>>> dc266781cbb34bf9f6a3a1a363f4b24a91df5715:resources/views/admin/product/add.blade.php
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('san-pham-admin') }}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
<<<<<<< HEAD:resources/views/admin/product/main/modify.blade.php
                            <h3 class="card-title">Danh mục sản phẩm</h3>
=======
                            <h3 class="card-title">Danh mục lựa chọn</h3>
>>>>>>> dc266781cbb34bf9f6a3a1a363f4b24a91df5715:resources/views/admin/product/add.blade.php
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group-category row">

                                <div class="form-group col-xl-6 col-sm-4">
<<<<<<< HEAD:resources/views/admin/product/main/modify.blade.php
                                    <label class="d-block" for="id_list">Danh mục cấp 1:</label>
                                    <select id="select-category1" name="categorylv1" class="form-control select2">
                                        <option value="0">Chọn Danh mục</option>
                                        @foreach ($level1 as $k => $value)
                                            <option value="{{ $value->id }}" {{ ($value->id == $detailSP->id_level1) ? "selected" : "" }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Danh mục cấp 2:</label>
                                    <select id="select-category2" name="categorylv2" class="form-control select2">
                                        <option value="0">Chọn Danh mục</option>
                                        @foreach ($level2 as $k => $value)
                                            <option value="{{ $value->id }}" {{ ($value->id == $detailSP->id_level2) ? "selected" : "" }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                               
                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_color">Danh mục màu sắc:</label>
                                    <select id="select-color" name="color[]" class="select multiselect" multiple="multiple">
                                        @foreach ($dsColor as $value)
                                            @php
                                                $check = '';
                                                if(in_array($value->id,$arrIdColor))
                                                {
                                                    $check = 'selected="selected"';
                                                }
                                            @endphp
                                            <option value="{{$value->id}}" {{$check}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>  
                                </div>

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_size">Danh mục kích thước:</label>
                                    <select id="select-size" name="size[]" class="select multiselect" multiple="multiple">
                                        @foreach ($dsSize as $value)
                                            @php
                                                $check = '';
                                                if(in_array($value->id,$arrIdSize))
                                                {
                                                    $check = 'selected="selected"';
                                                }
                                            @endphp
                                            <option value="{{$value->id}}" {{$check}}>{{$value->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>
=======
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


>>>>>>> dc266781cbb34bf9f6a3a1a363f4b24a91df5715:resources/views/admin/product/add.blade.php
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
<<<<<<< HEAD:resources/views/admin/product/main/modify.blade.php
                                    <div class="form-group title">
                                        <label for="name-product">Tên sản phẩm:</label>
                                        <input type="text" class="form-control for-seo text-sm" name="tensp"
                                            id="fullname" placeholder="Tên sản phẩm" value="{{ $detailSP->name }}" @error('tensp') is-invalid @enderror>
                                        @error('tensp') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group titleProduct">
                                        <label for="nameProduct">Nội dung:</label>
                                        <textarea class="form-control for-seo text-sm form-ckeditor" name="noidung" id="" rows="10"
                                            placeholder="Nội dung">{!!$detailSP->content!!}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="code-product">Mã sản phẩm:</label>
                                            <input type="text" class="form-control text-sm" name="masp" id="code"
                                                placeholder="Mã sản phẩm" value="{{ $detailSP->code }}">
=======
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
>>>>>>> dc266781cbb34bf9f6a3a1a363f4b24a91df5715:resources/views/admin/product/add.blade.php
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="regular_price">Giá gốc:</label>
                                            <div class="input-group">
                                                <input type="text"
<<<<<<< HEAD:resources/views/admin/product/main/modify.blade.php
                                                    class="form-control format-price regular_price text-sm" name="giagoc"
                                                    id="regular_price" placeholder="Giá gốc" value="{{$detailSP->price_regular}}">
=======
                                                    class="form-control format-price regular_price text-sm" name="price_regular"
                                                    id="price_regular" placeholder="Giá gốc" value="{{$row_product['price_regular']}}">
>>>>>>> dc266781cbb34bf9f6a3a1a363f4b24a91df5715:resources/views/admin/product/add.blade.php
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><strong>VNĐ</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="d-block" for="sale_price">Giá mới:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control format-price sale_price text-sm"
<<<<<<< HEAD:resources/views/admin/product/main/modify.blade.php
                                                    name="giamoi" id="sale_price" placeholder="Giá mới" value="{{$detailSP->sale_price}}">
=======
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
>>>>>>> dc266781cbb34bf9f6a3a1a363f4b24a91df5715:resources/views/admin/product/add.blade.php
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
                                    <h3 class="card-title">Hình ảnh sản phẩm</h3>
                                </div>
                                <div class="card-body">
                                    {{-- Image --}}
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="{{ asset('upload/product/' . $detailSP->photo) }}" alt="Alt Photo" style="" />
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" name="file" id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 270px - Height: 270px (.jpg|.png|.jpeg)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
