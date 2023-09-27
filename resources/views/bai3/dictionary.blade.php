<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Từ điển</h1>
    <form action="/dictionary" method = "POST">
    @csrf

    <p>
        <label>
        <input type="text" name="dictionary" placeholder="Nhập từ cần dịch">

        </label>
    </p>
    <p>
        <button type="submit">Dịch</button>
    </p>

    </form>
</body>
</html>
