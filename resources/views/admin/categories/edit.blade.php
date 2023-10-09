<!DOCTYPE html>
<html>
<body>


<form action="<?php echo route('categorie.update',$categorie->id)?>" method ="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <label for="name">Tên:</label><br>
  <input type="text" id="name" name="name" value="{{$categorie->name}}"><br>
  <label for="description ">Mô tả:</label><br>
  <input type="text" id="description" name="description" value="{{$categorie->description}}"><br>

  <input type="submit" value="Cập nhật">
  <a href="{{ route('categorie.index') }}" class="btn">Quay lại</a>
</form>


</body>
</html>
<style>
        /* CSS cho các phần tử trong form */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }


        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        /* CSS cho hình ảnh */
        img {
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* CSS cho nút Back */
        .btn {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            border-radius: 5px;
        }
    </style>
