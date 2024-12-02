<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PaintMasters - Painting Tools Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123/ABC, Đà Nẵng</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Capybara@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Chính sách bảo mật</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Điều khoản sử dụng</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Bán hàng và hoàn tiền</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="{{ route('product.index') }}" class="navbar-brand">
                    <h1 class="text-primary display-6">PaintMasters</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('product.index') }}" class="nav-item nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">Trang chủ</a>
                        <a href="{{ route('product.shop') }}" class="nav-item nav-link {{ request()->routeIs('product.shop') ? 'active' : '' }}">Sản phẩm</a>
                        <a href="{{ route('cart.list') }}" class="nav-item nav-link {{ request()->routeIs('cart.list') ? 'active' : '' }}">Giỏ hàng</a>
                        <a href="contact.html" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Liên hệ</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                        <a href="{{ route('cart.list') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ $cartQuantity }}</span>
                        </a>

                        <div class="nav-item dropdown">
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="#" class="dropdown-item">Tài khoản của tôi</a>
                                <a href="{{ route('orders.index') }}" class="dropdown-item">Đơn hàng</a>
                                <a href="#" class="dropdown-item">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm bằng từ khóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Danh sách đơn hàng</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
            <li class="breadcrumb-item active text-white">Danh sách đơn hàng</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid contact py-4">
        <div class="container py-4">
            <div class="p-4 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#wait-confirm">Chờ xác
                                    nhận</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#confirmed">Đã xác nhận</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#delivering">Đang giao</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#delivered">Đã giao</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#canceled">Đã hủy</a></li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div id="wait-confirm" class="tab-pane fade show active">
                                <div class="card">
                                    <table class="table table-sm table-striped mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Thời gian tạo</th>
                                                <th scope="col">Bên nhận</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Tổng phí</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($waitConfirm as $order)
                                            <tr>
                                                <th scope="row">{{ $order->order_id }}</th>
                                                <td>{{ $order->created_at }}</td>
                                                <td class="text-start">
                                                    <p class="m-0 p-0">{{ $order->name }}</p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->phone_number }}</small>
                                                    </p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->shipping_address }}</small>
                                                    </p>
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ number_format($order->total_price, 0, '', ',') }} VNĐ</td>
                                                <td><a href="{{ route('orders.show', $order->order_id) }}" class="text-primary">
                                                        <small>Xem chi tiết >></small></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="confirmed" class="tab-pane fade show">
                                <div class="card">
                                    <table class="table table-sm table-striped mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Thời gian tạo</th>
                                                <th scope="col">Bên nhận</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Tổng phí</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach ($confirmed as $order)
                                            <tr>
                                                <th scope="row">{{ $order->order_id }}</th>
                                                <td>{{ $order->created_at }}</td>
                                                <td class="text-start">
                                                    <p class="m-0 p-0">{{ $order->name }}</p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->phone_number }}</small>
                                                    </p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->shipping_address }}</small>
                                                    </p>
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ number_format($order->total_price, 0, '', ',') }} VNĐ</td>
                                                <td><a href="{{ route('orders.show', $order->order_id) }}" class="text-primary">
                                                        <small>Xem chi tiết >></small></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="delivering" class="tab-pane fade show">
                                <div class="card">
                                    <table class="table table-sm table-striped mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Thời gian tạo</th>
                                                <th scope="col">Bên nhận</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Tổng phí</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($delivering as $order)
                                            <tr>
                                                <th scope="row">{{ $order->order_id }}</th>
                                                <td>{{ $order->created_at }}</td>
                                                <td class="text-start">
                                                    <p class="m-0 p-0">{{ $order->name }}</p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->phone_number }}</small>
                                                    </p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->shipping_address }}</small>
                                                    </p>
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ number_format($order->total_price, 0, '', ',') }} VNĐ</td>
                                                <td><a href="{{ route('orders.show', $order->order_id) }}" class="text-primary">
                                                        <small>Xem chi tiết >></small></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="delivered" class="tab-pane fade show">
                                <div class="card">
                                    <table class="table table-sm table-striped mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Thời gian tạo</th>
                                                <th scope="col">Bên nhận</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Tổng phí</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($delivered as $order)
                                            <tr>
                                                <th scope="row">{{ $order->order_id }}</th>
                                                <td>{{ $order->created_at }}</td>
                                                <td class="text-start">
                                                    <p class="m-0 p-0">{{ $order->name }}</p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->phone_number }}</small>
                                                    </p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->shipping_address }}</small>
                                                    </p>
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ number_format($order->total_price, 0, '', ',') }} VNĐ</td>
                                                <td><a href="{{ route('orders.show', $order->order_id) }}" class="text-primary">
                                                        <small>Xem chi tiết >></small></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div id="canceled" class="tab-pane fade show">
                                <div class="card">
                                    <table class="table table-sm table-striped mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Thời gian tạo</th>
                                                <th scope="col">Bên nhận</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Tổng phí</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach ($rejected as $order)
                                            <tr>
                                                <th scope="row">{{ $order->order_id }}</th>
                                                <td>{{ $order->created_at }}</td>
                                                <td class="text-start">
                                                    <p class="m-0 p-0">{{ $order->name }}</p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->phone_number }}</small>
                                                    </p>
                                                    <p class="font-weight-light m-0 p-0">
                                                        <small>{{ $order->shipping_address }}</small>
                                                    </p>
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ number_format($order->total_price, 0, '', ',') }} VNĐ</td>
                                                <td><a href="{{ route('orders.show', $order->order_id) }}" class="text-primary">
                                                        <small>Xem chi tiết >></small></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="{{ route('product.index') }}">
                            <h1 class="text-primary mb-0">PaintMasters</h1>
                            <p class="text-secondary mb-0">Họa cụ chất lượng</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Nhập email của bạn">
                            <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Theo dõi</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Lý do chọn chúng tôi!</h4>
                        <p class="mb-4">Mang đến trải nghiệm mua sắm tuyệt vời nhất đến với người tiêu dùng.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Thông tin cửa hàng</h4>
                        <a class="btn-link" href="">Giới thiệu</a>
                        <a class="btn-link" href="">Liên hệ</a>
                        <a class="btn-link" href="">Chính sách bảo mật</a>
                        <a class="btn-link" href="">Điều khoản & Điều kiện</a>
                        <a class="btn-link" href="">Chính sách trả hàng</a>
                        <a class="btn-link" href="">Câu hỏi thường gặp & Trợ giúp</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Tài khoản</h4>
                        <a class="btn-link" href="">Thông tin tài khoản</a>
                        <a class="btn-link" href="">Giỏ hàng</a>
                        <a class="btn-link" href="">Danh sách yêu thích</a>
                        <a class="btn-link" href="">Lịch sử đặt hàng</a>
                        <a class="btn-link" href="">Đơn hàng quốc tế</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Liên hệ</h4>
                        <p>Địa chỉ: 123/ABC, Đà Nẵng</p>
                        <p>Email: Capybara@gmail.com</p>
                        <p>Số điện thoại: +0123 4567 8910</p>
                        <p>Chấp nhận thanh toán bằng</p>
                        <img src="{{ asset('img/payment.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>