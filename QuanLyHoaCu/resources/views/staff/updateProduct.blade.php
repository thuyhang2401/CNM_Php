@extends('layouts.staff_app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cập nhật sản phẩm</h4>
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
                <form id="edit-product-form" action="/staff/products/{{$product->product_id}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="card">
                        <div class="modal-body">
                        <input type="hidden" id="edit-product-id" name="product_id">
                        <div class="form-group">
                            <div class="d-flex flex-column align-items-center">
                                <!-- Hiển thị ảnh hiện tại -->
                                <img id="current-image" 
                                    src="{{ asset('staff/assets/images/product/'.$product->image)}}" 
                                    alt="Current Image" 
                                    width="150" name="image">

                                <!-- Nút chọn ảnh -->
                                <input type="file" class="form-control-file w-40 mt-3" id="image-input" accept="image/*" style="display: none;"  name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit-product-name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="edit-product-name" name="product_name"
                                value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="edit-category-name">Danh mục</label>
                            <select class="form-control" id="edit-category-name" name="category_id"
                                value="{{$product->category_id}}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-product-price">Giá</label>
                            <input type="number" class="form-control" id="edit-product-price" name="price"
                                value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="edit-product-unit">Đơn vị tính</label>
                            <input type="text" class="form-control" id="edit-product-unit" name="unit"
                                value="{{$product->unit}}">
                        </div>
                        <div class="form-group">
                            <label for="edit-product-quantity">Số lượng trong kho</label>
                            <input type="number" class="form-control" id="edit-product-quantity" name="quantity"
                                value="{{$product->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="edit-product-description">Mô tả</label>
                            <textarea class="form-control" id="edit-product-description" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
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