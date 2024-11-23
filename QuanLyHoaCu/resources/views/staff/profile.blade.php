
@extends('layouts.staff_app')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tài khoản của tôi</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Tài khoản của tôi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="text-center position-relative" style="display: inline-block;">
                            <a href="javascript:void(0);">
                                <img id="profileImage" class="rounded-circle border border-10 border-primary" 
                                        src="assets/images/users/4.jpg" 
                                        alt="Profile" 
                                        style="width: 150px; height: 150px;">
                                <input type="file" 
                                        id="imageInput" 
                                        class="file-input" 
                                        accept="image/*" 
                                        onchange="changeImage(event)" 
                                        style="position: absolute; top: 0; left: 0; width: 150px; height: 150px; opacity: 0; cursor: pointer;">
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <label>Tên nhân viên</label>
                        <input type="text" class="form-control" id="prd-name" aria-describedby="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label>Giới tính</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="customRadio1">Nam</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Nữ</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" id="prd-unit" aria-describedby="name" value="2003-12-15">
                    </div>
                    <div class="mt-3">
                        <label>Email</label>
                        <input type="text" class="form-control" id="prd-quantity" aria-describedby="name" placeholder="Nhập email" value="hongthuy@gmail.com" disabled>
                    </div>
                    <div class="mt-3">
                        <label>Mật khẩu</label>
                        <input type="text" class="form-control" id="prd-quantity" aria-describedby="name" placeholder="Nhập mật khẩu" value="*****************" disabled>
                    </div>
                    <div class="mt-3">
                        <label>Số điện thoại</label>
                        <input type="number" class="form-control" id="prd-quantity" aria-describedby="name" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="mt-3">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" id="prd-quantity" aria-describedby="name" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-3" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary mr-3" data-bs-dismiss="modal">Thay đổi mật khẩu</button>
                        <button type="button" class="btn btn-success">Lưu</button>
                    </div>
                </div>
                
            </div>
        </div>

    <!-- Order detail -->
    <div class="modal fade" id="form-order-detail" tabindex="-1" role="dialog" aria-labelledby="form-add-prdTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chi tiết đơn hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="text-primary"><strong>Thông tin đơn hàng</strong></p>
                        <p>Mã đơn hàng: <span class="order-id">OD001</span></p>
                        <p>Ngày tạo đơn hàng: <span class="order-created-at">01/01/2024</span></p>
                        <p>Trạng thái hiện tại: <span class="order-status">Chờ xác nhận</span></p>
                    </div>
                    <div>
                        <p class="text-primary"><strong>Thông tin người nhận</strong></p>
                        <p>Tên người nhận: <span class="order-">Nguyễn Văn A</span></p>
                        <p>Số điện thoại: <span class="order-id">01/01/2024</span></p>
                        <p>Địa chỉ nhận hàng: <span class="order-id">Điện Biên Phủ - An Khê - Thanh Khê - Đà Nẵng</span></p>
                    </div>
                    <div>
                        <p class="text-primary"><strong>Thông tin chi tiết</strong></p>
                        <p>Sản phẩm: </p>
                        <div class="media border-bottom">
                            <div class="media-left">
                                <img src="assets/images/product/p3.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <p class="media-heading"><small>Bộ cọ vẽ MONT MARTE (đủ dáng) tập vẽ màu Nước, Acrylic, Gouache</small></p>
                                <p><small>x1</small></p>
                            </div>
                            <div class="media-right">
                                <p>500 000 VNĐ</p>
                            </div>
                        </div>
                        <div class="media border-bottom">
                            <div class="media-left">
                                <img src="assets/images/product/p3.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <p class="media-heading"><small>Bộ cọ vẽ MONT MARTE (đủ dáng) tập vẽ màu Nước, Acrylic, Gouache</small></p>
                                <p><small>x1</small></p>
                            </div>
                            <div class="media-right">
                                <p>500 000 VNĐ</p>
                            </div>
                        </div>
                        <div class="media border-bottom">
                            <div class="media-left">
                                <img src="assets/images/product/p3.jpg" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <p class="media-heading"><small>Bộ cọ vẽ MONT MARTE (đủ dáng) tập vẽ màu Nước, Acrylic, Gouache</small></p>
                                <p><small>x1</small></p>
                            </div>
                            <div class="media-right">
                                <p>500 000 VNĐ</p>
                            </div>
                        </div>
                        <p>Phí giao hàng: <span class="order-delivery-fee">500 000 VNĐ</span></p>
                        <p>Ghi chú: <span class="order-note">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span></p>
                        <p>Tổng tiền: <span class="order-total-fee">500 000 VNĐ</span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger">Từ chối đơn</button>
                    <button type="button" class="btn btn-primary">Xác nhận đơn</button>
                </div>
            </div>
        </div>
    </div>    

    </div>
    
    <script>
        // Hàm thay đổi hình ảnh
        function changeImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
    