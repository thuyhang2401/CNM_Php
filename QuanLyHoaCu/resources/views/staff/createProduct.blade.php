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
                            <li class="breadcrumb-item text-muted active" aria-current="page"><a href="{{url('staff/products')}}">Quản lý sản phẩm</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="modal-body">
                        <div class="form-group">
                            <div class="d-flex flex-column align-items-center">
                                <!-- Hiển thị ảnh hiện tại -->
                                <img id="current-image" 
                                    src="{{ asset('staff/assets/images/product/product_upload.png')}}" 
                                    alt="Current Image" 
                                    width="150" name="image">

                                <!-- Nút chọn ảnh -->
                                <input type="file" class="form-control-file w-40 mt-3" id="image-input" value="" accept="image/*" style="display: none;" name="image">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


@if (session('success'))
    <div class="toast fade show" data-autohide="false" style="position: absolute; top: 100px; right: 0;">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect fill="#22ca80" width="100%" height="100%"></rect>
            </svg>
            <strong class="mr-auto">Thông báo</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="toast fade show" data-autohide="false" style="position: absolute; top: 100px; right: 0;">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect fill="#ff4f70" width="100%" height="100%"></rect>
            </svg>
            <strong class="mr-auto">Thông báo</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<script>

document.getElementById('current-image').addEventListener('click', function() {
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
});

</script>
@endsection