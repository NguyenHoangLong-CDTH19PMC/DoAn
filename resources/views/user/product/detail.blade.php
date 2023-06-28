@extends('user.index')
@section('body')
    <div class="wap_detail">
        <div class="grid-pro-detail w-clear">
            <div class="row">
                <div class="left-pro-detail col-md-6 col-lg-5 mb-4">
                    <p class="thumb-pro-detail mb-0 scale-img">
                        <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                            src="{{ asset('upload/product/' . $rowDetail->photo) }}" alt="Alt Photo" style=""
                            alt="{{ $rowDetail->name }}" />
                    </p>
                </div>
                <div class="right-pro-detail col-md-6 col-lg-7 mb-4">
                    <p class="title-pro-detail mb-2"><?= $rowDetail->name ?></p>

                    {{-- <div class="desc-pro-detail">{!! $rowDetail->content !!}</div> --}}
                    <ul class="attr-pro-detail">
                        <li class="w-clear">
                            <label class="attr-label-pro-detail">Mã:</label>
                            <div class="attr-content-pro-detail">{{ $rowDetail->code }}</div>
                        </li>

                        <li class="w-clear">
                            <label class="attr-label-pro-detail">Giá:</label>
                            <div class="attr-content-pro-detail">
                                @if ($rowDetail->sale_price > 0)
                                    <span class="price-new-pro-detail">{{ formatMoney($rowDetail->sale_price) }}</span>
                                    <span class="price-old-pro-detail">{{ formatMoney($rowDetail->price_regular) }}</span>
                                @else
                                    <span
                                        class="price-new-pro-detail">{{ formatMoney($rowDetail->price_regular) ? formatMoney($rowDetail->price_regular) : 'Liên hệ' }}</span>
                                @endif
                            </div>
                        </li>



                        <li class="w-clear">
                            <label class="attr-label-pro-detail d-block">Số lượng:</label>
                            <div class="attr-content-pro-detail d-block">
                                <div class="quantity-pro-detail">
                                    <span class="quantity-minus-pro-detail">-</span>
                                    <input type="number" class="qty-pro" min="1" value="1" readonly />
                                    <span class="quantity-plus-pro-detail">+</span>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <div class="cart-pro-detail">
                        <a class="btn btn-success addcart rounded-0 mr-2" data-id="<?= $rowDetail['id'] ?>"
                            data-action="addnow">
                            <i class="fas fa-shopping-bag mr-1"></i>
                            <span>Thêm vào giỏ hàng</span>
                        </a>
                        <a class="btn btn-dark addcart rounded-0" data-id="<?= $rowDetail['id'] ?>" data-action="buynow">
                            <i class="fas fa-shopping-bag mr-1"></i>
                            <span>Mua ngay</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
