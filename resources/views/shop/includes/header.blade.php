<div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
               
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tùy chọn</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <button class="dropdown-item" type="button">Sign in</button> -->
                            <a class="dropdown-item" href="http://127.0.0.1:8000/shop/login">Đăng nhập</a>

                            <a class="dropdown-item" href="http://127.0.0.1:8000/shop/register">Đăng ký</a>

                            <form method="POST" action="{{ route('shop.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-brown">Đăng xuất</button>
                        </form>
                            <!-- <button class="dropdown-item" type="button">Sign up</button> -->
                        </div>
                    </div>
                    <!-- <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div> -->
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="{{route('shop.master')}}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">4 MATIC</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
            <form action="" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="keyword" placeholder="Nhập tên...">
            <button type="submit">Tìm</button>
        </div>
    </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0"></p>
                <h5 class="m-0">096 6868 68</h5>
            </div>
        </div>
    </div>
