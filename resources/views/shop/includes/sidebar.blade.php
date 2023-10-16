<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Loại hàng</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Nước rửa chén <i class="fa fa-angle-down float-right mt-1"></i></a>

                        <a href="#" class="nav-link" data-toggle="dropdown">Nước gi <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="" class="dropdown-item">Men's Dresses</a>
                            <a href="" class="dropdown-item">Women's Dresses</a>
                            <a href="" class="dropdown-item">Baby's Dresses</a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Trảng chủ</a>
                        <a href="shop.html" class="nav-item nav-link">Cửa hàng</a>
                        <a href="detail.html" class="nav-item nav-link">Chi tiết</a>
                        <a href="contact.html" class="nav-item nav-link">Tư vấn</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">TÔi</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('login.index') }}" class="nav-item nav-link">Đăng nhập</a>
                                <a href="{{ route('shop.register') }}" class="nav-item nav-link">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-flex justify-content-between align-items-center">
                        <form method="POST" action="{{ route('shop.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-bro  wn">Đăng xuất</button>

                            <body>

                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
                                @if (session('successMessage'))
                                <script>
                                    Swal.fire({
                                        title: "<h6>{{ session('successMessage') }}</h6>",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        width: "300px"
                                    });
                                </script>
                                @elseif(session('successMessage1'))
                                <script>
                                    Swal.fire({
                                        title: "<h6>{{ session('successMessage1') }}</h6>",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        width: "300px"
                                    });
                                </script>
                                @elseif(session('successMessage2'))
                                <script>
                                    Swal.fire({
                                        title: "<h6>{{ session('successMessage2') }}</h6>",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        width: "300px"
                                    });
                                </script>
                                @elseif(session('successMessage3'))
                                <script>
                                    Swal.fire({
                                        title: "<h6>{{ session('successMessage3') }}</h6>",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        width: "300px"
                                    });
                                </script>
                                @endif


                            </body>
                        </form>
                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="{{asset('shops/img/tt.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">giảm 30 % khi đặt 2 sản phẩm</h4>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="{{asset('shops/img/th.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">giảm 30 % khi đặt 2 sản phẩm</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>