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
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $categorie)
                    <tr data-expanded="true" class="item-{{ $categorie->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->description }}</td>


                        <td>
                        <form action="{{ route('categorie.restoredelete', $categorie->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Restore</button>
                                <a href="{{ route('categorie_destroy', $categorie->id) }}" id="{{ $categorie->id }}"
                                    class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>
@endsection
