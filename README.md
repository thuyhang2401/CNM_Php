# CNM_Php
- Bài tập lớn cuối kỳ CNM sử dụng php và MySQL
- Clone project:
```sh
git clone https://github.com/thuyhang2401/CNM_Php.git
In terminal:
- cd QuanLyHoaCu
- composer install --ignore-platform-reqs
- php artisan key:generate
```
- Connect DB:
```sh
- Tạo schema 'quanlyhoacu' trong MySQL 
- Trong file .env và .env.example của project: 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=quanlyhoacu
    DB_USERNAME=root
    DB_PASSWORD=hang123 //sửa lại
- php artisan migrate
```
