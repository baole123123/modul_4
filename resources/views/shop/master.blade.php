<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('shops/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('shops/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('shops/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('shops/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    @include('shop.includes.header')
    <!-- Topbar End -->


    <!-- Navbar Start -->
   @include('shop.includes.sidebar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('shops/img/img-11.jpg')}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Sản phẩm mới ra mắt</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"></p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('shops/img/img-12.jpg')}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Các loại giày cao cấp</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('shops/img/123.jpg')}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Phụ kiện chính hãng</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{asset('shops/img/1234.jpg')}}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Sale 20%</h6>
                        <h3 class="text-white mb-3">Giảm giá đặc biệt</h3>
                        <a href="" class="btn btn-primary">Xem ngay</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{asset('shops/img/11.jpg')}}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Sale 20%</h6>
                        <h3 class="text-white mb-3">Tri ân khách hàng</h3>
                        <a href="" class="btn btn-primary">xem ngay </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Products Start -->
@yield('content')
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    <div class="card-footer">

</div>

    <!-- Footer Start -->
    @include('shop.includes.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@yield('scripts')
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<style>
    .card-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        background-color: #f7f7f7;
        padding: 10px;
    }

    .card-footer nav {
        display: flex;
        align-items: center;
    }

    .card-footer nav ul.pagination {
        display: flex;
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .card-footer nav ul.pagination li {
        margin-right: 5px;
    }

    .card-footer nav ul.pagination li a,
    .card-footer nav ul.pagination li span {
        padding: 5px 10px;
        border: 1px solid #ccc;
        text-decoration: none;
        color: #333;
    }

    .card-footer nav ul.pagination li.active span {
        background-color: #007bff;
        color: #fff;
    }
</style>


