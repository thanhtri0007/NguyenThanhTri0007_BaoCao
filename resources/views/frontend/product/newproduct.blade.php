@extends('layouts.master')
<style>
    .custom-justify-right {
        justify-content: flex-end;
    }

    .custom-font {
        font-family: 'Playfair Display', serif;

        /* Thay 'Your_Custom_Font' bằng tên font chữ bạn muốn sử dụng */
        font-size: 24px;
        /* Điều chỉnh kích thước font chữ theo ý muốn */
        font-weight: bold;
        /* Điều chỉnh độ đậm của font chữ theo ý muốn */
        color: #333;
        /* Điều chỉnh màu sắc của font chữ theo ý muốn */
        /* Các thuộc tính khác có thể thêm vào tùy thuộc vào yêu cầu thiết kế */
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dist/css/price.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<div class="container">
    <div class="p-b-10">
        <h3 class="ltext-103 cl5 custom-font">
            Sản Phẩm Mới
        </h3>
    </div>
    <div class="row py-3">
        <div class="col-md-12 border-bottom border-1 border-danger">
            @isset($cat)
            <a class="float-start text-danger" style="text-decoration: none" href="{{ route('site.index', ['slug' => $cat->slug]) }}">
                <h4 class="text-center">{{ $cat->name }}</h4>
            </a>
            @endisset
        </div>
    </div>
    @isset($list_product)
    <div class="row isotope-grid">
        @foreach ($list_product as $index => $product)
        <div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img class="product-image" src="{{ asset('images/product/' . $product->image) }}">
                    <a href="{{ route('product.detail', ['product' => $product->id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        <span onclick="window.location.href='{{ route('product.detail', ['product' => $product->id]) }}';">
                            Quick View
                        </span>
                    </a>
                </div>
                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <h1 class="product-name">{{ $product->name }}</h1>
                        <span class="mtext-106 cl2">
                            <div class="d-flex align-items-center flex-row">
                                <img src="{{ asset('images/product/sale.png') }}" width="20">
                                <span class="guarantee">Giảm giá sập sàn</span>
                            </div>
                            <h2 class="product-price">
                                @if ($product->price_sale)
                                <del>Giá:{{ $product->price }} VND</del> {{ $product->price_sale }} VND
                                @else
                                {{ $product->price }} VND
                                @endif
                            </h2>
                        </span>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="images/product/icon-heart-01.png" alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/product/icon-heart-02.png" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (($index + 1) % 3 == 0)
    </div>
    <div class="row isotope-grid">
        @endif
        @endforeach
    </div>
    @endisset

</div>