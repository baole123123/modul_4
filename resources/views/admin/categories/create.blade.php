<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('categorie.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="fname">Name:</label><br>
        <input type="text" id="fname" name="name"><br>
        <label for="lname">Mô tả:</label><br>
        <input type="text" id="lname" name="description"><br>
        @error('name')
        <div style="color: red">{{ $message }}</div>
        @enderror

        <input type="submit" value="Submit">

        <a href="{{ route('categorie.index') }}" class="btn">Back</a>
    </form>

</body>

</html>
<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #f44336;
        /* Đỏ */
        color: #ffffff;
        /* Trắng */
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #d32f2f;
        /* Đỏ nhạt khi hover */
    }

    /* CSS cho nút Submit */
    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4caf50;
        /* Màu xanh lá cây */
        color: #ffffff;
        /* Màu chữ trắng */
        font-size: 16px;
        cursor: pointer;
    }

    /* CSS cho các nhãn và ô nhập liệu */
    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 100%;
        box-sizing: border-box;
        font-size: 14px;
    }

    input[type="file"] {
        margin-bottom: 10px;
    }

    /* CSS cho toàn bộ biểu mẫu */
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
</style>
