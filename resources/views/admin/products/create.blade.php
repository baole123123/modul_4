@extends('admin.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Thêm Mới </span>
    </h4>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ old('name') }}">
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Mô tả</label>
                                        <input type="text" class="form-control" placeholder="Mô tả" name="description" value="{{ old('description') }}">
                                        @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Giá</label>
                                        <input type="text" class="form-control" placeholder="Giá" name="price" value="{{ old('price') }}">
                                        @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Ảnh</label>
                                        <input type="file" class="form-control" placeholder="Ảnh" name="image" value="{{ old('image') }}">
                                        @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Số lượng</label>
                                        <input type="text" class="form-control" placeholder="Số lượng" name="quantity" value="{{ old('quantity') }}">
                                        @error('quantity') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="status-org">Trạng thái </label>
                                    <select class="form-control" name="status" value="{{ old('status') }}">
                                        <option value="">Tất cả</option>
                                        <option value="0">Còn</option>
                                        <option value="1">Hết</option>
                                    </select>
                                    @error('status') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Danh mục</label>
                                    <select name="category_id" class="form-select" value="{{ old('category_id') }}">
                                        <option value="">Vui lòng chọn</option>
                                        @foreach($categories as $index => $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
        </div>
    </form>
</div>

@endsection
