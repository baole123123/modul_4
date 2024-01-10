@extends('admin.master')
@section('content')

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
                        Thao tác
                    </th>
                </tr>
            </thead>
            <tbody>
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
                @foreach ($categories as $key => $categorie)
                    <tr data-expanded="true" class="item-{{ $categorie->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->description }}</td>


                        <td>
                        <form action="{{ route('categorie.restoredelete', $categorie->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi phục</button>
                                <a href="{{ route('categorie_destroy', $categorie->id) }}" id="{{ $categorie->id }}"
                                    class="btn btn-danger">Xóa</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>
@endsection
