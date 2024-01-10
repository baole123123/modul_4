<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="http://127.0.0.1:8000/product" target="_blank">
            <span class="ms-1 font-weight-bold text-white">Trang chủ</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white " href="http://127.0.0.1:8000/categorie">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Các Loại Hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="{{ route('products.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shopping_bag</i>
                    </div>
                    <span class="nav-link-text ms-1">Các Mặt Hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="http://127.0.0.1:8000/categorie/trash">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">delete</i>
                    </div>
                    <span class="nav-link-text ms-1">Thùng rác loại hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="http://127.0.0.1:8000/product/trash">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">delete</i>
                    </div>
                    <span class="nav-link-text ms-1">Thùng rác mặt hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="http://127.0.0.1:8000/groups">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Nhân viên</span>
                </a>
            <li class="nav-item">
                <a class="nav-link text-white " href="http://127.0.0.1:8000/user">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý nhân sự</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('orders.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shopping_cart</i>
                    </div>
                    <span class="nav-link-text ms-1">Đơn hàng</span>
                </a>
            </li>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="background-color: hotpink; border-color: hotpink;" onclick="return confirm('Are you sure you want to log out')">Đăng xuất</button>
                <!-- <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a> -->
                <!-- <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a> -->
        </div>
    </div>

</aside>
