
@extends('layouts.staff_app')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Quản lý đơn hàng</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Quản lý đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#wait-confirm">Chờ xác nhận</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#confirmed">Đã xác nhận</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#delivered">Đã giao</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#canceled">Đã hủy</a></li>
                    </ul>
                        
                    <div class="tab-content">
                        <div id="wait-confirm" class="tab-pane fade show active">
                            <div class="card border border-primary">
                                <div class="card-body">
                                    <h4 class="card-title">Danh sách đơn hàng</h4>
                                </div>
                                <table class="table table-sm table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Thời gian tạo</th>
                                            <th scope="col">Bên nhận</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Tổng phí</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item->$order_id}}</th>
                                            <td>01/01/2024</td>
                                            <td>
                                                <p class="m-0 p-0">Nguyễn Văn A</p>
                                                <p class="font-weight-light m-0 p-0"><small>0123456789</small></p>
                                                <p class="font-weight-light m-0 p-0"><small>Điện Biên Phủ - Thanh Khê - Đà Nẵng</small></p>
                                            </td>
                                            <td>Đã giao hàng</td>
                                            <td>150 000 VNĐ</td>
                                            <td><a href="" class="text-primary" data-toggle="modal" data-target="#form-order-detail"><small>Xem chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                        @endforeach
                                        
                                        <tr>
                                            <th scope="row">OD001</th>
                                            <td>01/01/2024</td>
                                            <td>
                                                <p class="m-0 p-0">Nguyễn Văn A</p>
                                                <p class="font-weight-light m-0 p-0"><small>0123456789</small></p>
                                                <p class="font-weight-light m-0 p-0"><small>Điện Biên Phủ - Thanh Khê - Đà Nẵng</small></p>
                                            </td>
                                            <td>Đã giao hàng</td>
                                            <td>150 000 VNĐ</td>
                                            <td><a href="" class="text-primary"><small>Xem chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">OD001</th>
                                            <td>01/01/2024</td>
                                            <td>
                                                <p class="m-0 p-0">Nguyễn Văn A</p>
                                                <p class="font-weight-light m-0 p-0"><small>0123456789</small></p>
                                                <p class="font-weight-light m-0 p-0"><small>Điện Biên Phủ - Thanh Khê - Đà Nẵng</small></p>
                                            </td>
                                            <td>Đã giao hàng</td>
                                            <td>150 000 VNĐ</td>
                                            <td><a href="" class="text-primary"><small>Xem chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="confirmed" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <div id="delivered" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                        <div id="canceled" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
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
    
@endsection