@extends('layouts.staff_app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Quản lý sản phẩm</h4>
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
                <div class="card">
                    <div class="card-body p-2">
                        <a type="button" class="btn btn-primary" href="/staff/products/create">
                            Thêm sản phẩm
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead class="small">
                                    <tr>
                                        <th scope="col">Mã sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col" class="w-20">Hình ảnh</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Giá tiền</th>
                                        <th scope="col">Đơn vị tính</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col" class="w-25">Mô tả</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="small">
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{$product->product_id}}</th>
                                            <td class="text-justify">{{$product->product_name}}</td>
                                            <td><img class="img-fluid img-thumbnail"
                                                    src="{{ asset('img/' . $product->image)}}"></td>
                                            <td>{{$product->category->category_name}}</td>
                                            <th>{{$product->price}}</th>
                                            <td>{{$product->unit}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td class="text-justify">{{$product->description}}</td>
                                            <td class="d-flex">
                                                <a class="mr-1" href="/staff/products/{{$product->product_id}}"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="/staff/products/{{$product->product_id}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href="#" type="submit" class="delete-product-icon"
                                                        style="border: none;background: #00000000;color: #ff4a4a;">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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