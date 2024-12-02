@extends('admin.admin')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding-top: 80px;
        background-color: #f9f9f9;
    }

    .create-category-container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .create-category-container h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333333;
    }

    .create-category-container label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555555;
    }

    .create-category-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .create-category-container input:focus {
        border-color: #007bff;
        outline: none;
    }

    .create-category-container button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .create-category-container button:hover {
        background-color: #0056b3;
    }
</style>

<div class="create-category-container">
    <h1>Tạo danh mục mới</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label for="category_name">Tên danh mục</label>
        <input type="text" name="category_name" id="category_name" required>

        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description">

        <button type="submit">Tạo mới danh mục</button>
    </form>
</div>
@endsection