@extends('layouts.staff_app')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Chi tiết đơn hàng</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page"><a
                                    href="{{url('staff/orders')}}">Quản lý đơn hàng</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-2">
                        <div class="modal-body">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <p class="text-primary"><strong>Thông tin đơn hàng</strong></p>
                                    <p>Mã đơn hàng: <span class="order-id">{{$data->order_id}}</span></p>
                                    <p>Ngày tạo đơn hàng: <span class="order-created-at">{{$data->created_at}}</span>
                                    </p>
                                    <p>Trạng thái hiện tại: <span class="order-status">{{$data->status}}</span></p>
                                </div>
                                <div>
                                    <p class="text-primary"><strong>Thông tin người nhận</strong></p>
                                    <p>Tên người nhận: <span class="order-">{{$data->customer_name}}</span></p>
                                    <p>Số điện thoại: <span class="order-id">{{$data->phone_number}}</span></p>
                                    <p>Địa chỉ nhận hàng: <span class="order-id">{{$data->shipping_address}}</span></p>
                                </div>
                            </div>
                            <div>
                                <p class="text-primary"><strong>Thông tin chi tiết</strong></p>
                                <p>Sản phẩm: </p>
                                @foreach ($products as $product)
                                    <div class="media border-bottom">
                                        <div class="media-left">
                                            <img src="{{ asset('img/' . $product->image)}}" class="media-object"
                                                style="width:60px">
                                        </div>
                                        <div class="media-body ml-3">
                                            <p class="media-heading"><small>{{$product->name}}</small></p>
                                            <p><small>x{{$product->quantity}}</small></p>
                                        </div>
                                        <div class="media-right">
                                            <p>{{$product->price}} VNĐ</p>
                                        </div>
                                    </div>
                                @endforeach
                                <p>Phí giao hàng: <span class="order-delivery-fee">{{$data->delivery_fee}}</span></p>
                                <p>Ghi chú: <span class="order-note">{{$data->note}}</span></p>
                                <p class="text-right">Tổng tiền: <strong class="order-total-fee"
                                        style="font-size:40px">{{$data->total_price}} VNĐ</strong></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="window.location.href='{{url('staff/orders')}}'" type="button"
                                class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                @if ($data->status === 'Chờ xác nhận')
                                    <button type="submit" formaction="/staff/orders/reject/{{$data->order_id}}"
                                        value="reject" class="btn btn-danger">Từ chối
                                        đơn</button>
                                    <button type="submit" formaction="/staff/orders/confirm/{{$data->order_id}}"
                                        name="action" value="confirm" class="btn btn-primary">Xác nhận
                                        đơn</button>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@if (session('success'))

    <div id="success-header-modal" class="modal fade show" tabindex="-1" role="dialog"
        aria-labelledby="success-header-modalLabel" style="padding-right: 16px; background: #22222294;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Thông báo
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        {{ session('success') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endif

@if ($errors->any())

    <div id="danger-header-modal" class="modal fade show" tabindex="-1" role="dialog"
        aria-labelledby="danger-header-modalLabel" style="padding-right: 16px; background: #22222294;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Thông báo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Hiển thị modal thông báo thành công nếu tồn tại session
        if (document.getElementById('success-header-modal')) {
            const successModal = new bootstrap.Modal(document.getElementById('success-header-modal'));
            successModal.show();
        }

        // Hiển thị modal thông báo lỗi nếu tồn tại lỗi
        if (document.getElementById('danger-header-modal')) {
            const dangerModal = new bootstrap.Modal(document.getElementById('danger-header-modal'));
            dangerModal.show();
        }
    });
</script>
@endsection