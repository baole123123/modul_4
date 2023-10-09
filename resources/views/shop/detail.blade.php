@extends('shop.master')
@section('content')

<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{ asset($products->image) }}" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    {{-- <i class="fa fa-2x fa-angle-left text-dark"></i> --}}
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    {{-- <i class="fa fa-2x fa-angle-right text-dark"></i> --}}
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>{{ $products->name }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(99 Đánh giá)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{number_format($products->price) }} VNĐ</h3>
                <p class="font-family">{{ $products->description }}</p>
                @if ($products->status == 0)
                                    <td><span class="badge bg-success text-white">
                                            <i class="fas fa-check-circle"></i> Còn hàng
                                        </span></td>
                                @else
                                    <td> <span class="badge bg-danger text-white">
                                            <i class="fas fa-times-circle"></i> Hết hàng
                                        </span></td>
                                @endif
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="{{ route('add.to.cart', $products->id) }}" id="{{ $products->id }}" class="btn btn-danger mt-20">Thêm vào giỏ hàng</a>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a href="javascript:history.back()" class="text-dark px-2">
                        Quay lại trang
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM LIÊN QUAN</span></h2>
        <div class="row px-xl-5">
            @foreach ($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" width="100" height="90"
                                src="{{ asset($relatedProduct->image) }}" alt="Image">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="{{ route('shop.detail', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
                            <h6>
                                @if ($relatedProduct->status == 0)
                                    <td><span class="badge badge-success">
                                            <i class="fas fa-check-circle"></i> Còn hàng
                                        </span></td>
                                @else
                                    <td> <span class="badge badge-danger">
                                            <i class="fas fa-times-circle"></i> Hết hàng
                                        </span></td>
                                @endif
                            </h6>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($relatedProduct->price) }} VNĐ</h5>
                                <h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
