@extends('admin.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>

<h2 class="offset-4">Thùng rác</h2>
<div class="table-responsive pt-3">
    <table class="table table-hover" border="1">
        <thead style="background-color: #D81B60; color: white;">
            <tr>
                <th style="width: 35%;">
                    STT
                </th>
                <th style="color: white">
                    Tên
                </th>
                <th style="color: white">
                    Mô tả
                </th>
                <th style="color: white">
                    Giá
                </th>
                <th style="color: white">
                    Số lượng
                </th>
                <th style="color: white">
                    Trạng thái
                </th>
                <th style="color: white">
                    Thuộc loại
                </th>
                <th style="color: white">
                    Ảnh
                </th>
                <th style="color: white">
                    Thao tác
                </th>

            </tr>
        </thead>
        @if (session('success') || session('error'))
    <div class="card-header pt-2 pb-0">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 2000); // Thời gian trễ 2 giây (2000ms)
    </script>
@endif
        <tbody>
            @foreach ($products as $key => $product)
            <tr data-expanded="true" class="item-{{ $product->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                @if ($product->status == 0)
                <td><span class="badge bg-success">
                        <i class="fas fa-check-circle"></i> Còn hàng
                    </span></td>
                @else
                <td> <span class="badge bg-danger">
                        <i class="fas fa-times-circle"></i> Hết hàng
                    </span></td>
                @endif

                <td>{{ $product->category->name }}</td>
                <td><img width="90px" height="90px" src="{{ asset($product->image) }}" alt=""></td>


                <td>
                    <form action="{{ route('product.restoredelete', $product->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-success">Khôi phục</button>
                        <a href="{{ route('product_destroy', $product->id) }}" id="{{ $product->id }}" class="btn btn-danger">Xóa</a>
                    </form>
                </td>
                @endforeach
        </tbody>
    </table>
    {{-- <tr>{{ $products->appends(request()->query()) }}</tr> --}}
</div>
@endsection
