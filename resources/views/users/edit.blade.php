<!DOCTYPE html>
<html>
<body>


<form action="<?php echo route('user.update',$user->id)?>" method ="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="{{$user->name}}"><br>
  <label for="email ">Email:</label><br>
  <input type="text" id="email" name="email" value="{{$user->email}}"><br>
  <label for="password">PassWord:</label><br>
  <input type="text" id="password" name="password" value="{{$user->password}}"><br><br>
  <label for="image">Image:</label>
        <br>
        <input type="file" class="form-control-file" id="image" name="image">
        <br>
        <img src="{{ asset($user->image) ?? asset('public/images/' . old('image', $user->image)) }}" width="90px" height="90px" id="blah1" alt="">
        <br><br>
  <input type="submit" value="Submit">
  <a href="{{ route('user.index') }}" class="btn">Back</a>
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
