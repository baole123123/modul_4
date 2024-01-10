@extends('admin.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Chỉnh sửa </span>
    </h4>
    <form action="{{route('products.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="app-ecommerce">
            <!-- Add Product -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column justify-content-center">

                </div>

            </div>
            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $item->name }}">
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Mô tả</label>
                                        <input type="text" class="form-control" placeholder="Mô tả" name="description" value="{{ $item->description }}">
                                        @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Giá</label>
                                        <input type="text" class="form-control" placeholder="Giá" name="price" value="{{ $item->price }}">
                                        @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ảnh</label>
                                    <input type="file" name="image" class="form-control" style="width: 340%;"><br>
                                    @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="Ảnh cũ" style="width:10%; height:50%;">
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Số lượng</label>
                                        <input type="text" class="form-control" placeholder="Số lượng" name="quantity" value="{{ $item->quantity }}">
                                        @error('quantity') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Trạng thái</label>
                                    <select class="form-control" name="status">
                                        <option value="">Tất cả</option>
                                        <option @selected($item->status == \App\Models\Product::ACTIVE) value="{{ \App\Models\Product::ACTIVE }}">Còn</option>
                                        <option @selected($item->status == \App\Models\Product::INACTIVE) value="{{ \App\Models\Product::INACTIVE }}">Hết</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Danh mục</label>
                                        <select name="category_id" class="form-select" style="width: 340%;">
                                            <option value="">Vui lòng chọn</option>
                                            @foreach($categories as $index => $categorie)
                                            <option value="{{ $categorie->id }}" {{ $categorie->id == $item->category_id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-content-center flex-wrap gap-3">
                                <a href="{{route('products.index')}}" class="btn btn-label-secondary">Trở Về</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</div>
@endsection
