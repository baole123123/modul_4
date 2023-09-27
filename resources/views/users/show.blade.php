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
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="{{ $user->password }}" readonly>
            </div>
            <div class="form-group">
            <label for="image">Ảnh:</label>
                <img src="{{ asset($user->image) }}" alt="User Image"  class="img-fluid" style="width: 150px">
            <div class="form-group">
                <a href="{{ route('user.edit', $user->id) }}" class="btn">Edit</a>
                <a href="{{ route('user.index') }}" class="btn">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
