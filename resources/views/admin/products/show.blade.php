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
    </style>
</head>
<body>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <input type="text" id="description" name="description" value="{{ $product->description }}" readonly>
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" id="price" name="price" value="{{ $product->price }}" readonly>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="text" id="quantity" name="quantity" value="{{ $product->quantity }}" readonly>
            </div>



@php
    $statusText = ($product->status == 0) ? 'Còn hàng' : 'Hết hàng';
@endphp

<p>Trạng thái: {{ $statusText }}</p>
            <div class="form-group">
            <label for="image">Ảnh:</label>
                <img src="{{ asset($product->image) }}" alt="Product Image">



                <a href="{{ route('product.index') }}" class="btn">Quay lại</a>
            </div>
        </form>
    </div>
</body>
</html>

