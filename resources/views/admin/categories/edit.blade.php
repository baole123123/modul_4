@extends('admin.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Chỉnh sửa </span>
    </h4>
    <form action="{{route('categories.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
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
                                        <label class="form-label">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $item->name }}">
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <input type="text" class="form-control" placeholder="Mô tả" name="description" value="{{ $item->description }}">
                                        @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-content-center flex-wrap gap-3">
                    <a href="{{route('categories.index')}}" class="btn btn-label-secondary">Trở Về</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>

                </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
