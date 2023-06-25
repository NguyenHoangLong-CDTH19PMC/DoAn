@extends('user.index')
@section('body')
    <div class="wap_1200 layout-cart">

        <form class="form-cart validation-cart" method="post" action="" enctype="multipart/form-data">
            <div class="wrap-cart">
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

                            <div class="procart">
                                <div class="form-row">
                                    <div class="pic-procart col-3 col-md-2">
                                        <a class="text-decoration-none" href="" target="_blank" title="">
                                            <img class=""
                                                onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                                src="{{ asset('assets/user/images/poduct-1.jpg') }}" style=""
                                                alt="" />
                                        </a>
                                        <a class="del-procart text-decoration-none">
                                            <i class="fa fa-times-circle"></i>
                                            <span>xoá</span>
                                        </a>
                                    </div>
                                    <div class="info-procart col-6 col-md-5">
                                        <h3 class="name-procart"><a class="text-decoration-none" href=""
                                                target="_blank" title="">Sản phẩm 1</a></h3>
                                        <div class="properties-procart">

                                            <p>Màu: <strong>Xanh</strong></p>

                                            <p>Size: <strong>42</strong></p>

                                        </div>
                                    </div>
                                    <div class="quantity-procart col-3 col-md-2">
                                        <div class="price-procart price-procart-rp">
                                            <p class="price-new-cart load-price-new">
                                                1,000,000
                                            </p>
                                            <p class="price-old-cart load-price">
                                                2,500,000
                                            </p>
                                        </div>
                                        <div class="quantity-counter-procart quantity-counter-procart">
                                            <span class="counter-procart-minus counter-procart">-</span>
                                            <input type="number" class="quantity-procart" min="1" value="50"
                                                data-pid="1" />
                                            <span class="counter-procart-plus counter-procart">+</span>
                                        </div>
                                    </div>
                                    <div class="price-procart col-3 col-md-3">
                                        <div class="price-procart price-procart-rp">
                                            <p class="price-new-cart load-price-new">
                                                1,000,000
                                            </p>
                                            <p class="price-old-cart load-price">
                                                2,500,000
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bottom-cart col-12 col-lg-5">
                        <div class="section-cart">
                            <p class="title-cart">Hình thức thanh toán:</p>
                            <div class="information-cart">
                                <?php /*foreach ($payments_info as $key => $value) { ?> ?> ?> ?>
                                <div class="payments-cart custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payments-<?= $value['id'] ?>"
                                        name="dataOrder[payments]" value="<?= $value['id'] ?>"
                                        <?= !empty($flashPayment) && $flashPayment == $value['id'] ? 'checked' : '' ?>
                                        required>
                                    <label class="payments-label custom-control-label" for="payments-<?= $value['id'] ?>"
                                        data-payments="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></label>
                                    <div class="payments-info payments-info-<?= $value['id'] ?> transition">
                                        <?= str_replace("\n", '<br>', $value['desc' . $lang]) ?></div>
                                </div>
                                <?php }*/ ?>
                            </div>
                            <p class="title-cart">Thông tin giao hàng:</p>
                            <div class="information-cart">
                                <div class="form-row">
                                    <div class="input-cart col-md-6">
                                        <input type="text" class="form-control text-sm" id="fullname" name="fullname"
                                            placeholder="hoten" value="" required />
                                    </div>
                                    <div class="input-cart col-md-6">
                                        <input type="number" class="form-control text-sm" id="phone" name="phone"
                                            placeholder="số điện thoại" value="" required />
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <input type="email" class="form-control text-sm" id="email" name="email"
                                        placeholder="Email" value="" required />
                                </div>
                                <div class="form-row">
                                    <div class="input-cart col-md-4 mr-2">
                                        <select class="select-city-cart custom-select form-select text-sm" required id="city"
                                            name="city">
                                            <option value="">Tỉnh thành</option>

                                        </select>
                                    </div>
                                    <div class="input-cart col-md-4 mr-2">
                                        <select class="select-district-cart select-district custom-select form-select text-sm" required
                                            id="district" name="district">
                                            <option value="">quận huyện</option>
                                        </select>
                                    </div>
                                    <div class="input-cart col-md-4">
                                        <select class="select-ward-cart select-ward custom-select form-select text-sm" required
                                            id="ward" name="ward">
                                            <option value="">phường xã</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <input type="text" class="form-control text-sm" id="address" name="address"
                                        placeholder="địa chỉ" value="" required />
                                </div>
                                <div class="input-cart">
                                    <textarea class="form-control text-sm" id="requirements" name="requirements"
                                        placeholder="Yêu cầu khác"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-dark btn-cart w-100" name="thanhtoan"
                                value="Thanh toán" />
                        </div>
                    </div>

                    {{-- <a href="" class="empty-cart text-decoration-none w-100">
                        <p>Không tồn tại sản phẩm nào trong giỏ hàng</p>
                        <span class="btn btn-dark btn-sm">Về trang chủ</span>
                    </a> --}}

                </div>
            </div>
        </form>
    </div>
@endsection
