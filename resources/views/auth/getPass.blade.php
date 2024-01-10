<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="post" class="login-form">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <legend>Đặt lại mật khẩu</legend>

                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Vui lòng nhập mật khẩu" value="{{ old('password') }}" />
                        <label class="form-label" for="password">Mật khẩu</label>
                        @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror

                    </div>

                    <!-- Password input -->
                    <!-- Confirm Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" placeholder="Vui lòng xác nhận mật khẩu" />
                        <label class="form-label" for="confirm_password">Xác nhận mật khẩu</label>
                        @error('confirm_password') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Cập nhật</button>
            </div>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
            @if (session('successMessage'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '<h6>{{ session('successMessage') }}</h6>',
                    showConfirmButton: false,
                    timer: 2000,
                    width: '300px',
                    customClass: {
                        popup: 'animated bounce',
                    },
                    background: '#F4F4F4',
                    iconColor: '#00A65A',
                });
            </script>
            @endif

            <div class="text-center text-lg-start mt-4 pt-2">

                </form>

            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Content of the footer -->
    </div>
</section>
