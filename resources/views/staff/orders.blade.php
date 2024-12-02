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
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#wait-confirm">Chờ xác
                            nhận</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#confirmed">Đã xác nhận</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#delivering">Đang giao</a></li>
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
                                    @foreach ($waitConfirm as $item)
                                        <tr>
                                            <th scope="row">{{$item->order_id}}</th>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <p class="m-0 p-0">{{$item->customer_name}}</p>
                                                <p class="font-weight-light m-0 p-0"><small>{{$item->phone_number}}</small>
                                                </p>
                                                <p class="font-weight-light m-0 p-0">
                                                    <small>{{$item->shipping_address}}</small></p>
                                            </td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->total_price}}</td>
                                            <td><a href="/staff/orders/{{$item->order_id}}" class="text-primary"><small>Xem
                                                        chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="confirmed" class="tab-pane fade">
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
                                    @foreach ($confirmed as $item)
                                        <tr>
                                            <th scope="row">{{$item->order_id}}</th>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <p class="m-0 p-0">{{$item->customer_name}}</p>
                                                <p class="font-weight-light m-0 p-0"><small>{{$item->phone_number}}</small>
                                                </p>
                                                <p class="font-weight-light m-0 p-0">
                                                    <small>{{$item->shipping_address}}</small></p>
                                            </td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->total_price}}</td>
                                            <td><a href="/staff/orders/{{$item->order_id}}" class="text-primary"><small>Xem
                                                        chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="delivering" class="tab-pane fade">
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
                                    @foreach ($delivering as $item)
                                        <tr>
                                            <th scope="row">{{$item->order_id}}</th>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <p class="m-0 p-0">{{$item->customer_name}}</p>
                                                <p class="font-weight-light m-0 p-0"><small>{{$item->phone_number}}</small>
                                                </p>
                                                <p class="font-weight-light m-0 p-0">
                                                    <small>{{$item->shipping_address}}</small></p>
                                            </td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->total_price}}</td>
                                            <td><a href="/staff/orders/{{$item->order_id}}" class="text-primary"><small>Xem
                                                        chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="delivered" class="tab-pane fade">
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
                                    @foreach ($delivered as $item)
                                        <tr>
                                            <th scope="row">{{$item->order_id}}</th>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <p class="m-0 p-0">{{$item->customer_name}}</p>
                                                <p class="font-weight-light m-0 p-0"><small>{{$item->phone_number}}</small>
                                                </p>
                                                <p class="font-weight-light m-0 p-0">
                                                    <small>{{$item->shipping_address}}</small></p>
                                            </td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->total_price}}</td>
                                            <td><a href="/staff/orders/{{$item->order_id}}" class="text-primary"><small>Xem
                                                        chi tiết<i class="icon-arrow-right"></i></small></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="canceled" class="tab-pane fade">
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
                                    @foreach ($rejected as $item)
                                        <tr>
                                            <th scope="row">{{$item->order_id}}</th>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <p class="m-0 p-0">{{$item->customer_name}}</p>
                                                <p class="font-weight-light m-0 p-0"><small>{{$item->phone_number}}</small>
                                                </p>
                                                <p class="font-weight-light m-0 p-0">
                                                    <small>{{$item->shipping_address}}</small></p>
                                            </td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->total_price}}</td>
                                            <td><a href="/staff/orders/{{$item->order_id}}" class="text-primary"><small>Xem
                                                        chi tiết<i class="icon-arrow-right"></i></small></a></td>
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

@endsection