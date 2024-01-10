<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="post" class="form">
                    @csrf
                    <legend>Lấy lại mật khẩu</legend>
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        @if(session('successMessage'))
                        <div class="alert alert-success">{{ session('successMessage') }}</div>
                        @endif
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Vui lòng nhập Email" />
                        <label class="form-label" for="email">Email</label>
                        @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror

                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg">Gửi yêu cầu</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Content of the footer -->
    </div>
</section>
