@extends('admin.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        /* CSS cho form */
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
        }

        .form-group .form-control {
            height: auto;
        }

        .form-group .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .user-image {
        max-width:50px;
        max-height:50px;
    }
    .custom-button {
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    text-decoration: none;
}

.custom-button:hover {
    background-color: #0056b3;
    /* Màu nền khi di chuột qua */
}
    </style>
</head>
<body>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" value="{{ $categorie->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <input type="email" id="description" name="description" value="{{ $categorie->description }}" readonly>
            </div>

                <a href="{{ route('categorie.index') }}" class="btn custom-button">Quay lại</a>

            </div>
        </form>
    </div>
</body>
</html>
@endsection
