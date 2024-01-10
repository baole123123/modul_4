@extends('admin.master')
@section('content')
    <h1 class="offset-4">Đơn hàng</h1>
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
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Khách Hàng</th>
                <!-- <th scope="col">Tên Sản Phẩm</th> -->
                <th scope="col">Email</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">Ngày Đặt Hàng</th>

                <th scope="col">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->customer->name }}</td>
                    <!-- <td>{{ $item->product_name }}</td> -->
                    <td>{{ $item->customer->email }}</td>
                    <td>{{ $item->customer->phone }}</td>
                    <td>{{ $item->customer->address }}</td>
                    <td>{{ $item->date_at }}</td>
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
                        <!-- <a class='btn btn-info' href="{{ route('order.detail', $item->id) }}">Chi tiết</a> -->
                        <form action="{{ route('order.destroy', $item->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
