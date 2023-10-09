@extends('admin.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
    @if (session('successMessage3'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '<h6>{{ session('successMessage3') }}</h6>',
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
    @elseif(session('successMessage2'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '<h6>{{ session('successMessage2') }}</h6>',
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
    <h2 class="offset-4">Thùng rác</h2>
    <div class="table-responsive pt-3">
        <table class="table table-hover" border="1">
            <thead style="background: linear-gradient(to bottom, #A208C8 , #0768F1)">
                <tr>
                    <th style="width:35% ; color:white">
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
                        Hành động
                    </th>

                </tr>
            </thead>
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
                                <button type="submit" class="btn btn-success">Restore</button>
                                <a href="{{ route('product_destroy', $product->id) }}" id="{{ $product->id }}"
                                    class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $products->appends(request()->query()) }}</tr> --}}
    </div>
@endsection
