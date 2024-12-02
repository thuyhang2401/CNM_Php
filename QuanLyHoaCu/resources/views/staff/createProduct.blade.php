@extends('layouts.staff_app')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Thêm mới sản phẩm</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page"><a
                                    href="{{url('staff/products')}}">Quản lý sản phẩm</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{url('/staff/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="d-flex flex-column align-items-center">
                                    <!-- Hiển thị ảnh hiện tại -->
                                    <img id="current-image"
                                        src="{{ old('image') ? asset('storage/' . old('image')) : asset('img/product_upload.png') }}"
                                        alt="Current Image" width="150" name="image">

                                    <!-- Nút chọn ảnh -->
                                    <input type="file" class="form-control-file w-40 mt-3" id="image-input" value=""
                                        accept="image/*" style="display: none;" name="image">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>Tên sản phẩm</label>
                                <input name="product_name" type="text" class="form-control" id="prd-name"
                                    aria-describedby="name" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="mt-3">
                                <label>Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label>Giá tiền</label>
                                <input name="price" type="number" class="form-control" id="prd-price"
                                    aria-describedby="name" placeholder="Nhập giá tiền">
                            </div>
                            <div class="mt-3">
                                <label>Đơn vị tính</label>
                                <input name="unit" type="text" class="form-control" id="prd-unit"
                                    aria-describedby="name" placeholder="Nhập đơn vị tính">
                            </div>
                            <div class="mt-3">
                                <label>Số lượng</label>
                                <input name="quantity" type="number" class="form-control" id="prd-quantity"
                                    aria-describedby="name" placeholder="Nhập số lượng">
                            </div>
                            <div class="mt-3">
                                <label>Mô tả</label>
                                <textarea name="description" class="form-control" id="prd-desc" rows="3"
                                    placeholder="Nhập mô tả"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='{{url('staff/products')}}'">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
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

    document.getElementById('current-image').addEventListener('click', function () {
        // Mô phỏng hành động click vào input file khi người dùng nhấp vào ảnh
        document.getElementById('image-input').click();
    });

    document.addEventListener('DOMContentLoaded', () => {
        const imageInput = document.getElementById('image-input');
        const currentImage = document.getElementById('current-image');

        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0]; // Lấy file đầu tiên được chọn

            if (file) {
                // Kiểm tra xem file có phải là ảnh
                if (file.type.startsWith('image/')) {
                    // Tạo URL tạm thời cho ảnh được chọn
                    const imageURL = URL.createObjectURL(file);

                    // Thay thế ảnh hiện tại bằng ảnh mới
                    currentImage.src = imageURL;
                } else {
                    alert('Vui lòng chọn một file ảnh hợp lệ!');
                }
            }
        });

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