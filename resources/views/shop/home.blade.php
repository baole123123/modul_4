@extends('shop.master')

@section('content')

<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">CÁC MẶT HÀNG</span></h2>
    <div class="row px-xl-5">
        @foreach($products as $key=>$product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset($product->image) }}" alt="">
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href="{{ route('add.to.cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="{{ route('shop.detail',$product->id) }}">{{ $product->name }}</a> <br>

                    @if ($product->status == 0)
                    <td><span class="badge bg-success text-white">
                            <i class="fas fa-check-circle"></i> Còn hàng
                        </span></td>
                    @else
                    <td> <span class="badge bg-danger text-white">
                            <i class="fas fa-times-circle"></i> Hết hàng
                        </span></td>
                    @endif

                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{number_format($product->price) }} VNĐ</h5>
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
    <!-- <div class="text-center mt-4">
        <a href="#" class="btn btn-primary btn-view-more">Xem thêm</a>
        <a href="#" class="btn btn-secondary btn-view-less">Thu gọn</a>
    </div> -->
<div class="card-footer">
    <nav class="float-right">
        {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
    </nav>
</div>
@endsection
