<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="{{ route('checklogin') }}" method="post" class="login-form">
                    @csrf
                    <!-- <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Đăng nhập bằng</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <a href="{{ url('auth/google') }}" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-google"></i> Đăng nhập bằng Google
                        </a>
                    </div> -->
<!--
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
                    </div> -->

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Vui lòng nhập Email" value="{{ old('email') }}" />
                        <label class="form-label" for="email">Email</label>
                        @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Vui lòng nhập mật khẩu" value="{{ old('password') }}" />
                        <label class="form-label" for="password">Mật khẩu</label>
                        @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror

                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember" onclick="togglePasswordVisibility()">
                            <label class="form-check-label" for="remember">
                                Hiển thị mật khẩu
                            </label>
                        </div>
                        <a href="{{route('user.forgetPass')}}" class="text-body">Quên mật khẩu?</a>
                    </div>
                   
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Content of the footer -->
    </div>
</section>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
