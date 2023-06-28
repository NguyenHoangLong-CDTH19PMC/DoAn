@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content">
            <form class="validation-form" novalidate method="post" action="{{ route('xl-doi-matkhau-admin', ['id'=>Auth::guard('user')->user()->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-footer text-sm sticky-top">
                    <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i
                            class="far fa-save mr-2"></i>Lưu</button>
                    <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                        lại</button>
                </div>

                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin admin</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-xl-4 col-lg-6 col-md-6">
                                <label for="old-password">Mật khẩu cũ:</label>
                                <div class="wap-inputpass">
                                    <input type="password" class="form-control text-sm" name="oldpassword"
                                        id="old-password" placeholder="Mật khẩu cũ">
                                    <div class="input-group-append">
                                        <div class="input-group-text show">
                                            <span class="fas fa-eye" toggle="#old-password"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xl-4 col-lg-6 col-md-6">
                                <label for="new-password">
                                    <span class="d-inline-block align-middle">Mật khẩu mới:</span>
                                    <span class="text-danger ml-2" id="show-password"></span>
                                </label>
                                <div class="row align-items-center">
                                    <div class="wap-inputpass">
                                        <input type="password" class="form-control show-value text-sm" name="newpassword"
                                            id="new-password" placeholder="Mật khẩu mới">
                                        <div class="input-group-append">
                                            <div class="input-group-text show-icon">
                                                <span class="fas fa-eye" toggle="#old-password"></span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-5 create-password-random"><a class="btn btn-sm bg-gradient-primary text-sm" href="#" onclick="randomPassword()"><i class="fas fa-random mr-1"></i>Tạo mật khẩu</a></div> --}}
                                </div>
                            </div>

                            <div class="form-group col-xl-4 col-lg-6 col-md-6">
                                <label for="renew-password">Nhập lại mật khẩu mới:</label>
                                <input type="password" class="form-control show-value text-sm" name="renewpassword"
                                    id="renew-password" placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
