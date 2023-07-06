@extends('user.index')
@section('body')
    <div class="wap_detail">
        <div class="grid-pro-detail w-clear">
            <div class="row">
                <div class="left-pro-detail col-md-6 col-lg-6 mb-4 row">
                    <div class="photo-prodetail col-md-6 col-lg-10">
                        {{-- <p class="thumb-pro-detail mb-0 scale-img">
                            <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                src="{{ asset('upload/product/' . $rowDetail->photo) }}" style="" />
                        </p> --}}

                        <div class="chay-photo">
                            @foreach ($dsGallery as $item)
                                <div class="item-gallery">
                                    <a class="thumb-pro-detail">
                                        <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                            src="{{ asset('upload/album/' . $item->photo) }}" style="" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="list-gallery col-md-6 col-lg-2">
                        <div class="chay-gallery">
                            @foreach ($dsGallery as $item)
                                <div class="item-gallery">
                                    <a class="thumb-pro-detail">
                                        <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                                            src="{{ asset('upload/album/' . $item->photo) }}" style="" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="right-pro-detail col-md-6 col-lg-6 mb-4">
                    <p class="title-pro-detail mb-2"><?= $rowDetail->name ?></p>
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
                                        class="price-new-pro-detail">{{ $rowDetail->price_regular > 0 ? formatMoney($rowDetail->price_regular) : 'Liên hệ' }}</span>
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
                        <li class="color-block-pro-detail w-clear">
                            <label class="attr-label-pro-detail d-block">Màu sắc:</label>
                            <div class="attr-content-pro-detail d-block">
                                @if (count($rowColor))
                                    @foreach ($rowColor as $k => $v)
                                        <label for="color-pro-detail-{{ $v->id }}"
                                            class="color-pro-detail text-decoration-none"
                                            data-idproduct="{{ $rowDetail->id }}"
                                            style="background-color: {{ $v->code }}">
                                            <input type="radio" value="{{ $v->id }}"
                                                id="color-pro-detail-{{ $v->id }}" name="color-pro-detail">
                                        </label>
                                    @endforeach
                                @else
                                    Chưa có màu sắc
                                @endif
                            </div>
                        </li>
                        <li class="size-block-pro-detail w-clear">
                            <label class="attr-label-pro-detail d-block">Size:</label>
                            <div class="attr-content-pro-detail d-block">
                                @if (count($rowSize))
                                    @foreach ($rowSize as $k => $v)
                                        <label for="size-pro-detail-{{ $v->id }}"
                                            class="size-pro-detail text-decoration-none">
                                            <input type="radio" value="{{ $v->id }}"
                                                id="size-pro-detail-{{ $v->id }}" name="size-pro-detail">
                                            {{ $v->name }}
                                        </label>
                                    @endforeach
                                @else
                                    Chưa có size
                                @endif
                            </div>
                        </li>

                    </ul>
                    <div class="cart-pro-detail">
                        <a class="btn btn-success add-cart rounded-0 mr-2" data-id="{{ $rowDetail->id }}">
                            <i class="fas fa-cart-plus mr-1"></i>
                            <span>Thêm vào giỏ hàng</span>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Thông tin sản phẩm</a>
                </li>
            </ul>
            <div class="tab-content pt-4 pb-4" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="autoHeight w-clear" id="toc-content">{!! htmlspecialchars_decode($rowDetail->content) !!}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
