<!DOCTYPE html>
<html>
<body>


<form action="<?php echo route('product.update',$product->id)?>" method ="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <label for="name">Tên:</label><br>
  <input type="text" id="name" name="name" value="{{$product->name}}"><br>

  <label for="description">Mô tả</label><br>
  <input type="text" id="description" name="description" value="{{$product->description}}"><br>

  <label for="price">Giá:</label><br>
  <input type="text" id="price" name="price" value="{{$product->price}}"><br>

  <label for="">Thuộc loại:</label><br>
  <select name="category_id" style="width: 177px;">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select><br><br>
  <label for="quantity">Số lượng:</label><br>
  <input type="text" id="quantity" name="quantity" value="{{$product->quantity}}"><br>

  <div>
            <label>Trạng thái</label>:</label><br>
            <select name="status" class="form-control">
                <option value="0" {{ $product->status ? 'selected' : '' }}>Còn hàng</option>
                <option value="1" {{ $product->status ? 'selected' : '' }}>Hết hàng</option>
            </select><br>
        </div>

  <label for="image">Ảnh:</label>
        <br>
        <input type="file" class="form-control-file" id="image" name="image">
        <br>
        <img src="{{ asset($product->image) ?? asset('public/images/' . old('image', $product->image)) }}" width="90px" height="90px" id="blah1" alt="">
        <br><br>
  <input type="submit" value="Cập nhật">
  <a href="{{ route('product.index') }}" class="btn">Quay lại</a>
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
