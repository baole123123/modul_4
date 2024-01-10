@extends('admin.master')

@section('content')
<form action="{{ route('products.index') }}" method="GET">
    <input type="text" name="keyword" placeholder="Nhập...">
    <button type="submit">Tìm</button> <br> <br>

    <a href="{{ route('products.create') }}" class="btn btn-add">Thêm mới</a>
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Các mặt hàng</h6>
    </div>
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
    <div class="table-responsive p-0">
        <table class="table">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>

                    <th>Ảnh</th>

                    <th>Thao tác</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>


                    <td>{{number_format($product->price) }}</td>
                    @if ($product->status == 0)
                    <td><span class="badge bg-success">
                            <i class="fas fa-check-circle"></i> Còn hàng
                        </span></td>
                    @else
                    <td> <span class="badge bg-danger">
                            <i class="fas fa-times-circle"></i> Hết hàng
                        </span></td>
                    @endif


                    <td><img width="90px" height="90px" src="{{ asset($product->image) }}" alt=""></td>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
                                    @if (session('successMessage'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: '<h6>{{ session('successMessage') }}</h6>',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            width: '300px',
                                            customClass: {
                                                popup: 'animated bounce',
                                            },
                                            background: '#F4F4F4',
                                            iconColor: '#00A65A',
                                        });
                                    </script>

                                    @endif
                    <td>

                        <div class="btn-group">
                            <a href="{{ route('products.edit',$product->id) }}">
                                <button type="button" class="btn btn-primary">Sửa</button>
                            </a>

                            <a href="{{ route('products.show',$product->id) }}">
                                <button type="button" class="btn btn-success mb-2">Xem</button>
                            </a>
                @if (Auth::user()->hasPermission('products_delete'))
                            <form method="POST" action="{{ route('product.softdeletes',$product->id) }}">
                                @method('PUT')

                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</button>
                            </form>
                        </div>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <nav class="float-right">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
        </nav>
    </div>
    @endsection
    <style>
        tr:hover {
            background-color: #E6E6E6;
            transition: background-color 0.3s;
        }

        tr:hover td {
            transform: scale(1.1);
            transition: transform 0.3s;
        }
    </style>
