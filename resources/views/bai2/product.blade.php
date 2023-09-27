<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1> tính lượng chiết khấu</h1>
    <form action="/product" method = "POST">
    @csrf
    <p>
    <label>
    <input type="text" name="product" placeholder="Mô tả sản phẩm">

    </label>
    </p>
    <p>
        <label>
        <input type="number" name="price" placeholder="Giá niêm yết">

        </label>
    </p>
    <p>
        <label>
        <input type="number" name="percent" placeholder="Tỉ lệ chiết khấu">

        </label>
    </p>
    <p>
        <button type="submit">Tính chiết khấu</button>
    </p>

    </form>
</body>
</html>
