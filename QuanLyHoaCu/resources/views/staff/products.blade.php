
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
                                            <td><img class="img-fluid img-thumbnail" src="assets/images/product/{{$product->image}}"></td>
                                            <td>{{$product->category->category_name}}</td>
                                            <th>{{$product->price}}</th>
                                            <td>{{$product->unit}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td class="text-justify">{{$product->description}}</td>
                                            <td class="d-flex">
                                                <a class="mr-1" href="/staff/products/{{$product->product_id}}"><i class="fas fa-edit"></i></a>
                                                <form action="/staff/products/{{$product->product_id}}" method="post">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button href="#" type="submit" class="delete-product-icon" style="border: none;background: #00000000;color: #ff4a4a;">
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
        <div class="toast fade show" data-autohide="false" style="position: absolute; top: 100px; right: 0;">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
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
                <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
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
@endsection

