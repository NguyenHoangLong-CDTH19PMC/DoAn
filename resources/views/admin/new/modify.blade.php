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
                        <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form class="validation-form" method="post" action="{{ route('xl-sua-doi-bai-viet-admin', ['id' => $detailNew->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="{{ route('bai-viet-admin') }}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
                    </div>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Danh mục bài viết</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group-category row">

                                <div class="form-group col-xl-6 col-sm-4">
                                    <label class="d-block" for="id_list">Danh mục loại bài viết:</label>
                                    <select id="select-newtype" name="newtype[]" class="select multiselect" multiple="multiple">
                                        @foreach ($level1 as $value)
                                            @php
                                                $check = '';
                                                if(in_array($value->id_new,$arrIdNewType))
                                                {
                                                    $check = 'selected="selected"';
                                                }
                                            @endphp
                                            <option value="{{$value->id}}" {{$check}}>{{$value->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card card-default color-palette-box card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin bài viết</h3>
                                </div>
                             
                                <div class="card-body card-article">
                                    <div class="form-group title">
                                        <label for="name-product">Tên bài viết:</label>
                                        <input type="text" class="form-control for-seo text-sm" name="tenbaiviet"
                                            id="fullname" placeholder="Tên bài viết" value="{{ $detailNew->name }}" @error('tenbaiviet') is-invalid @enderror>
                                        @error('tenbaiviet') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group titleProduct">
                                        <label for="nameProduct">Nội dung:</label>
                                        <textarea class="form-control for-seo text-sm form-ckeditor" name="noidung" id="" rows="10"
                                            placeholder="Nội dung">{!!$detailNew->content!!}</textarea>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh loại bài viết</h3>
                                </div>
                                <div class="card-body">
                                    {{-- Image --}}
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="{{ asset('upload/new/' . $detailNew->photo) }}" alt="Alt Photo" style="" />
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