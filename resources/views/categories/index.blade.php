@extends('admin.master')

@section('content')
<form action="{{ route('categorie.index') }}" method="GET">
    <input type="text" name="keyword" placeholder="Nhập...">
    <button type="submit">Search</button> <br> <br>

<a href="{{ route('categorie.create') }}" class="btn btn-add">Thêm mới</a>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Các loại hàng</h6>
</div>

<div class="table-responsive p-0">
@if (session('status'))
    <div id="success-alert" class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); // 3 giây
    </script>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $categorie)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $categorie->name }}</td>
                <td>{{ $categorie->description }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('categorie.edit',$categorie->id) }}">
                            <button type="button" class="btn btn-primary">Sửa</button>
                        </a>
                        <a href="{{ route('categorie.show',$categorie->id) }}">
                            <button type="button" class="btn btn-success mb-2">Xem</button>
                        </a>
                        <form method="POST" action="{{ route('categorie.destroy',$categorie->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer">
    <nav class="float-right">
        {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
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
