@extends('admin.index')
@section('body')
    <div class="content-wrapper">
        <section class="content-header text-sm">
            <div class="container-fluid">
                <div class="row">
                    <ol class="breadcrumb float-sm-left pl-3">
                        <li class="breadcrumb-item"><a href="{{ route('trang-chu-admin') }}" title="Bảng điều khiển">Bảng điều
                                khiển</a></li>
                        <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card-footer text-sm sticky-top">
                    <div class="form-inline form-search d-inline-block align-middle">

                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar text-sm" type="search" name="keyword"
                                id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value=""
                                data-href="product">
                            <div class="input-group-append bg-primary rounded-right">
                                <button class="btn btn-navbar text-white btn-search" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card card-primary card-outline text-sm mb-0">
                    <div class="card-header">
                        <h3 class="card-title"><b>Danh sách sản phẩm</b></h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table card-table table-hover">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center" width="10%">STT</th>

                                    <th class="align-middle" style="width:10%">Mã Hoá Đơn</th>

                                    <th class="align-middle" style="width:20%">Tên khách hàng</th>

                                    <th class="align-middle" style="width:10%">Số điện thoại</th>

                                    <th class="align-middle" style="width:30%">Địa chỉ</th>

                                    <th class="align-middle" style="width:20%">Tống giá trị Hoá Đơn</th>

                                    <th class="align-middle text-center">Thao tác</th>
                                </tr>
                            </thead>
                            @if (count($dsOrder))
                                @foreach ($dsOrder as $k => $item)
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <input type="number"
                                                    class="form-control form-control-mini m-auto update-numb" min="0"
                                                    value="{{ $serial++ }}" data-id="" data-table="product"
                                                    readonly>
                                            </td>

                                            <td class="align-middle">
                                                <a class="text-dark text-break"
                                                    href="{{ route('chi-tiet-don-hang', ['id'=>$item->id]) }}"
                                                    title="Mã Hoá Đơn">{{ $item->code }}</a>
                                            </td>

                                            <td class="align-middle">
                                                <a class="text-dark text-break"
                                                    href="{{ route('chi-tiet-don-hang', ['id'=>$item->id]) }}"
                                                    title="Tên khách hàng">{{ $item->fullname }}</a>
                                            </td>

                                            <td class="align-middle">
                                                <a class="text-dark text-break"
                                                    href="{{ route('chi-tiet-don-hang', ['id'=>$item->id]) }}"
                                                    title="Số điện thoại">{{ $item->phone }}</a>
                                            </td>

                                            <td class="align-middle">
                                                <a class="text-dark text-break"
                                                    href="{{ route('chi-tiet-don-hang', ['id'=>$item->id]) }}"
                                                    title="Địa chỉ">{{ $item->address }}</a>
                                            </td>

                                            <td class="align-middle">
                                                <a class="text-dark text-break"
                                                    href=""
                                                    title="Tống giá trị Hoá Đơn">{{ formatMoney($item->total_price) }}</a>
                                            </td>
                                            
                                            <td class="align-middle text-center text-md text-nowrap">
                                                <a class="text-primary mr-2 modify-item"
                                                    href="{{ route('chi-tiet-don-hang', ['id'=>$item->id]) }}"
                                                    title="Chỉnh sửa"><i class="fas fa-edit"></i></a>

                                                <a class="text-danger delete-item" data-href="order"
                                                    data-id="{{ $item->id }}" title="Xóa"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="card-footer text-sm">
                    @if (count($dsOrder))
                        <div class="card-pagination">
                            {!! $dsOrder->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
