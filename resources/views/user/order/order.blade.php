@extends('user.index')
@section('body')
    <div class="wap_1200 layout-cart">
        <form class="form-cart validation-cart" method="post" action="" enctype="multipart/form-data">
            <div class="wrap-cart">
                @if (session('cart'))
                    <div class="row">
                        <div class="top-cart col-12 col-lg-7">
                            <p class="title-cart">Giỏ hàng của bạn:</p>
                            <div class="list-procart">
                                <div class="procart procart-label">
                                    <div class="form-row">
                                        <div class="pic-procart col-3 col-md-2">Hình ảnh</div>
                                        <div class="info-procart col-6 col-md-5">Thông tin sản phẩm</div>
                                        <div class="quantity-procart col-3 col-md-2">
                                            <p>Số lượng</p>
                                        </div>
                                        <div class="price-procart col-3 col-md-3">Đơn giá</div>
                                    </div>
                                </div>
                                
                                @foreach (session('cart') as $i => $details)
                                    @php
                                        $nameColor = $colors->where('id','=',$details['id_color'])->first();
                                        $nameSize = $sizes->where('id','=',$details['id_size'])->first()
                                    @endphp
                                    <div class="procart">
                                        <div class="form-row">
                                            <div class="pic-procart col-3 col-md-2">
                                                <a class="text-decoration-none" href="" target="_blank"
                                                    title="">
                                                    <img class=""
                                                        onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                        src="{{ asset('upload/product/' . $details['image']) }}"
                                                        style="" alt="" />
                                                </a>
                                                <a class="del-procart text-decoration-none"
                                                    data-code="{{ $details['code'] }}">
                                                    <i class="fa fa-times-circle"></i>
                                                    <span>xoá</span>
                                                </a>
                                            </div>
                                            <div class="info-procart col-6 col-md-5">
                                                <h3 class="name-procart"><a class="text-decoration-none" href=""
                                                        target="_blank" title="">{{ $details['name'] }}</a></h3>
                                                <div class="properties-procart">

                                                    <p>Màu: <strong>
                                                            {{ isset($nameColor) ? $nameColor['name'] : 'Chưa chọn màu' }}
                                                        </strong></p>

                                                    <p>Size: <strong>
                                                        {{ isset($nameSize) ? $nameSize['name'] : 'Chưa chọn size' }}
                                                        </strong></p>

                                                </div>
                                            </div>
                                            <div class="quantity-procart col-3 col-md-2">
                                                <div class="quantity-counter-procart quantity-counter-procart">
                                                    <span class="counter-procart-minus counter-procart">-</span>
                                                    <input type="number" class="quantity-procart" min="1"
                                                        value="{{ $details['quantity'] }}" data-pid="1" readonly />
                                                    <span class="counter-procart-plus counter-procart">+</span>
                                                </div>
                                            </div>
                                            <div class="price-procart col-3 col-md-3">
                                                <div class="price-procart price-procart-rp">
                                                    @if (!empty($details['price_sale']))
                                                        <p class="price-new-cart load-price-new">
                                                            {{ formatMoney($details['price_sale']) }}
                                                        </p>
                                                        <p class="price-old-cart load-price">
                                                            {{ $details['price_regular'] }}
                                                        </p>
                                                    @else
                                                        <p class="price-new-cart load-price-new">
                                                            {{ formatMoney($details['price_regular']) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="bottom-cart col-12 col-lg-5">
                            <div class="section-cart">
                                <p class="title-cart">Hình thức thanh toán:</p>
                                <div class="information-cart">

                                    <div class="payments-cart custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payments"
                                            name="payments" value="1" checked required>
                                        <label class="payments-label custom-control-label" for="payments"
                                            data-payments="">Thanh toán khi nhận</label>
                                    </div>

                                </div>
                                <p class="title-cart">Thông tin giao hàng:</p>
                                <div class="information-cart">
                                    <div class="form-row">
                                        <div class="input-cart col-md-6">
                                            <input type="text" class="form-control text-sm" id="fullname"
                                                name="fullname" placeholder="Họ tên" value="" required />
                                        </div>
                                        <div class="input-cart col-md-6">
                                            <input type="number" class="form-control text-sm" id="phone" name="phone"
                                                placeholder="Số điện thoại" value="" required />
                                        </div>
                                    </div>
                                    <div class="input-cart">
                                        <input type="email" class="form-control text-sm" id="email" name="email"
                                            placeholder="Email" value="" required />
                                    </div>
                                    <div class="input-cart">
                                        <input type="text" class="form-control text-sm" id="address" name="address"
                                            placeholder="Địa chỉ" value="" required />
                                    </div>
                                    <div class="input-cart">
                                        <textarea class="form-control text-sm" id="requirements" name="requirements" placeholder="Yêu cầu khác"></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-dark btn-cart w-100" name="thanhtoan"
                                    value="Thanh toán" />
                            </div>
                        </div>
                    </div>
                @else
                    <div class="wrap-empty">
                        <a href="{{ route('trang-chu-user') }}" class="empty-cart text-decoration-none w-100">
                            <img src="{{ asset('assets/user/images/empty.png') }}">
                            <p>Không tồn tại sản phẩm nào trong giỏ hàng!!!</p>
                            <span class="btn btn-dark btn-sm">Về trang chủ</span>
                        </a>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
