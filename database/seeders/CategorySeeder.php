<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_name' => 'Bút vẽ', 'description' => 'Các loại bút vẽ cho nghệ thuật và thiết kế'],
            ['category_name' => 'Màu nước', 'description' => 'Sản phẩm màu nước cho tranh vẽ và sáng tạo'],
            ['category_name' => 'Giấy vẽ', 'description' => 'Giấy chất lượng cao dành cho các loại hình nghệ thuật'],
            ['category_name' => 'Cọ vẽ', 'description' => 'Đủ loại cọ vẽ cho mọi nhu cầu sáng tác'],
            ['category_name' => 'Phụ kiện nghệ thuật', 'description' => 'Các phụ kiện hỗ trợ cho việc vẽ và sáng tạo'],
            ]);
    }
}
