@extends('admin.master')

@section('content')
<form action="{{ route('categorie.index') }}" method="GET">
    <input type="text" name="keyword" placeholder="Nhập...">
    <button type="submit">Tìm</button> <br> <br>
</form>

<li class="nav-item dropdown">
                    <select class="form-control changeLang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
                        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>VI</option>
                    </select>
                </li>

<a href="{{ route('categorie.create') }}" class="btn btn-add">Thêm mới</a>
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">{{ __('language.category' ) }}</h6>
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
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('language.category_ordinal' ) }}</th>
                <th>{{ __('language.category_name' ) }}</th>
                <th>{{ __('language.category_description' ) }}</th>
                <th>{{ __('language.category_operation' ) }}</th>
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

                        @if (Auth::user()->hasPermission('categories_delete'))
                        <form method="POST" action="{{ route('categorie.softdeletes',$categorie->id) }}">
                        @method('PUT')

                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</button>
                        </form>
                        @endif
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

@endsection
