@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-12 col-lg-12">
        <!-- Product Information -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-name">Mô tả</label>
                            <input type="text" class="form-control" placeholder="Mô tả" name="description" value="{{ $product->description }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-name">Thuộc loại</label>
                            <input type="text" class="form-control" placeholder="Giá" name="price" value="{{ $product->category->name }}">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-name">Số lượng</label>
                            <input type="text" class="form-control" placeholder="Số lượng" name="quantity" value="{{ $product->quantity }}">
                        </div>
                    </div>

                <div class="d-flex align-content-center flex-wrap gap-3">
                    <a href="{{route('products.index')}}" class="btn btn-label-secondary">Trở Về</a>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

@endsection
