@extends('admin.admin')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Quản trị viên</li>
            <li>Quản lý danh mục</li>
        </ul>
    </div>
</section>

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Quản lý danh mục
        </h1>
    </div>
</section>
<a href="{{ route('admin.categories.create') }}"
    style="display: inline-block; margin-bottom: 15px; margin-left: 30px; text-decoration: none; background-color: #007bff; color: white; padding: 8px 12px; border-radius: 4px;">
    Tạo danh mục</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->category_id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}"
                        style="text-decoration: none; color: #007bff;">Sửa</a>
                    <form id="delete-category-form-{{ $category->category_id }}"
                        action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button type="button" onclick="confirmDelete({{ $category->category_id }})"
                        class="delete-button">Xóa</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    table {
        margin-left: 30px;
        width: 93%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 100px;
        font-family: Arial, sans-serif;
    }

    th,
    td {
        border: 1.5px solid #ddd;
        text-align: left;
        padding: 10px;
    }

    th {
        background-color: #f4f4f4;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    .delete-button {
        border: none;
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    .delete-button:hover {
        background-color: #c82333;
    }
</style>

<script src="{{ asset('font_admin/js/confirm-delete.js') }}"></script>

@endsection