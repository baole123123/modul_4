<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<label for="name">Tên:<br></label>
  <input type="text" id="lname" name="name"><br>

  <label for="">Thuộc danh mục:<br></label>
            <select name="category_id" style="width:177px;">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>

  <label for="lname">Giá:</label><br>
  <input type="text" id="lname" name="price"><br>
  <label for="lname">Mô tả:</label><br>
  <input type="text" id="lname" name="description"><br>
  <label for="lname">Số lượng:</label><br>
  <input type="text" id="lname" name="quantity"><br>
  <div>
        Trạng thái:<br>
        <select name="status" class="form-control">
                <option value="0">Còn hàng</option>
                <option value="1">Hết hàng</option>
        </select><br>
    </div>
  <label>Ảnh:</label><br>
  <input type="file" name="image" value="" ><br><br>
  <input type="submit" value="Submit">



  <a href="{{ route('product.index') }}" class="btn">Back</a>
</form>

</body>
</html>
<style>
    .btn {
  display: inline-block;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #f44336; /* Đỏ */
  color: #ffffff; /* Trắng */
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
}

.btn:hover {
  background-color: #d32f2f; /* Đỏ nhạt khi hover */
}
    /* CSS cho nút Submit */
input[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #4caf50; /* Màu xanh lá cây */
  color: #ffffff; /* Màu chữ trắng */
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
