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
                <form action="/staff/profile/{{$staff->staff_id}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column align-items-center">
                        <div class="text-center position-relative" style="display: inline-block;">
                            <a href="javascript:void(0);">
                                <img id="profileImage" class="rounded-circle border border-10 border-primary"
                                    src="{{ asset('img/' . $staff->avatar)}}" alt="Profile"
                                    style="width: 150px; height: 150px;">
                                <input type="file" name="avatar" id="imageInput" class="file-input" accept="image/*"
                                    onchange="changeImage(event)"
                                    style="position: absolute; top: 0; left: 0; width: 150px; height: 150px; opacity: 0; cursor: pointer;">
                            </a>
                        </div>
                    </div>


                    <div class="mt-3">
                        <label>Tên nhân viên</label>
                        <input name="fullname" type="text" class="form-control" id="prd-name" aria-describedby="name"
                            placeholder="Nhập tên sản phẩm" value="{{$staff->fullname}}">
                    </div>
                    <div class="mt-3">
                        <label>Giới tính</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="Nam"
                                {{$staff->gender === 'Nam' ? 'checked' : ''}}>
                            <label class="custom-control-label" for="customRadio1">Nam</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="Nữ"
                                {{$staff->gender === 'Nữ' ? 'checked' : ''}}>
                            <label class="custom-control-label" for="customRadio2">Nữ</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Ngày sinh</label>
                        <input name="dob" type="date" class="form-control" id="prd-unit" aria-describedby="name"
                            value="{{$staff->dob}}">
                    </div>
                    <div class="mt-3">
                        <label>Email</label>
                        <input type="text" class="form-control" id="prd-quantity" aria-describedby="name"
                            placeholder="Nhập email" value="{{$staff->account->email}}" disabled>
                    </div>
                    <div class="mt-3">
                        <label>Mật khẩu</label>
                        <input type="text" class="form-control" id="prd-quantity" aria-describedby="name"
                            placeholder="Nhập mật khẩu" value="{{$staff->account->password}}" disabled>
                    </div>
                    <div class="mt-3">
                        <label>Số điện thoại</label>
                        <input name="phone_number" type="number" class="form-control" id="prd-quantity"
                            aria-describedby="name" placeholder="Nhập số điện thoại" value="{{$staff->phone_number}}">
                    </div>
                    <div class="mt-3">
                        <label>Địa chỉ</label>
                        <input name="address" type="text" class="form-control" id="prd-quantity" aria-describedby="name"
                            placeholder="Nhập địa chỉ" value="{{$staff->address}}">
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-3" data-bs-dismiss="modal"
                            onclick="window.location.href='{{url('staff/products')}}'">Đóng</button>
                        <button type="button" class="btn btn-primary mr-3" data-bs-dismiss="modal">Thay đổi mật
                            khẩu</button>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </form>
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