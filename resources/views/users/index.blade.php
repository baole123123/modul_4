 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Authors table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <thead>
                    <tr>
                        <th>TT</th>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Ảnh</th>

                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $key => $user)

                    <tr>
                        <td>{{$key+1}}</td>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td><img width="90px" height="90px" src="{{ asset($user->image) }}" alt=""></td>
                        <td>
                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-primary btn-sm">Sửa</a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có muốn xóa ?')">Xóa</button>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-view btn-sm">Xem chi tiết</a>
                            </form>
                        </td>

                    </tr>

                    @endforeach



                </tbody>
            </table>
</body>
 </html>
phan trang -->


    @extends('admin.master')


@section('content')

<a href="{{ route('user.create') }}" class="btn btn-add">Thêm mới</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<div class="col-12">
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Các loại sách</h6>
                </div>
            </div>

            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    TT</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Name</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Email</th>
                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Ảnh</th>

                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($users as $key => $user)

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            {{ $key + 1 }}
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <td>{{ $user->name }}</td>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <p class="text-xs font-weight-bold mb-0">  {{ $user->email }}</p>
                                </td>
                                <td>
                                    <img src="{{ $user->image }}" alt="User Image" class="img-fluid" style="width: 100px">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <div>
                                            <a href="{{ route('user.edit', ['id' => $user->id]) }}">
                                                <button type="submit" class="btn btn-primary">Sửa</button>
                                            </a>
                                        </div>
                                        <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</button>

                                        </form>

                                        <a href="{{ route('user.show', ['user' => $user->id]) }}">
                                            <button type="submit" class="btn btn-success mb-2">Xem</button>
                                        </a>

                                    </div>


                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <nav class="float-right">
        {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
    </nav>
</div>

@endsection
<style>


        /* CSS cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* CSS cho nút sửa và xóa */
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            color: #FF0000;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }
         /* CSS cho nút thêm mới */
         .btn-add {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: #f44336;
            color: #fff;
            cursor: pointer;

        }
            /* CSS cho nút xem chi tiết */
            .btn-view {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: #17a2b8;
            color: #fff;
            cursor: pointer;
        }
        tr:hover {
        background-color: #E6E6E6;
        transition: background-color 0.3s;
    }
    tr:hover td {
        transform: scale(1.1);
        transition: transform 0.3s;
    }
    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
        padding: 0.75rem 1.25rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .pagination li {
        display: inline;
    }

    .pagination li a {
        color: #007bff;
        padding: 0.25rem 0.5rem;
        text-decoration: none;
        background-color: ; /* Màu nền của ô phân trang */
    }

    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
    }

    .pagination li.disabled a {
        color: #6c757d;
        pointer-events: none;
    }
    .btn-add {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    background-color: red;
    color: #fff;
    cursor: pointer;
}

    </style>
