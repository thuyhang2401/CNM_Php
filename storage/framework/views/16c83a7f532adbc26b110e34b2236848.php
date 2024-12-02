<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị viên</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/main.css')); ?>">

    <!-- Favicon
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('admin/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('admin/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('admin/favicon-16x16.png')); ?>">
   <link rel="mask-icon" href="<?php echo e(asset('admin/safari-pinned-tab.svg')); ?>" color="#00b4b6"> -->
</head>
<body>

<div id="app">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item mobile-aside-button">
                <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
            </a>
            <div class="navbar-item">
                <div class="control">
                    <input placeholder="Tìm kiếm..." class="input">
                </div>
            </div>
        </div>

        <div class="navbar-brand is-right">
            <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
            </a>
        </div>

        <div class="navbar-item dropdown has-divider has-user-avatar">
            <a class="navbar-link">
                <div class="user-avatar">
                   <!-- <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full"> -->
                </div>
                <div class="is-user-name"><span>Thu Hiền</span></div>
                <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="navbar-dropdown">
                <a href="#" class="navbar-item">
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                    <span>My Profile</span>
                </a>
                <a class="navbar-item">
                    <span class="icon"><i class="mdi mdi-settings"></i></span>
                    <span>Settings</span>
                </a>
                <a class="navbar-item">
                    <span class="icon"><i class="mdi mdi-email"></i></span>
                    <span>Messages</span>
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="#">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>Log Out</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="aside is-placed-left is-expanded">
        <div class="aside-tools">
            <div>
                Trang <b class="font-black">Quản trị viên</b>
            </div>
        </div>
        <div class="menu is-menu-main">
            <p class="menu-label">Xem</p>
            <ul class="menu-list">
                <li class="active">
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                        <span class="menu-item-label">Thống kê</span>
                    </a>
                </li>
            </ul>
            <p class="menu-label">Chức năng</p>
            <ul class="menu-list">
                <li>
                    <a href="<?php echo e(route('admin.categories.index')); ?>">
                        <span class="icon"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">Quản lý danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Duyệt tài khoản chủ cho thuê</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.accounts.index')); ?>">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        <span class="menu-item-label">Cập nhật thông tin tài khoản</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Duyệt thanh toán</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>

<!-- Scripts
<script src="<?php echo e(asset('admin/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/chart.sample.min.js')); ?>"></script>
-->
</body>
</html>
<?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\admin\admin.blade.php ENDPATH**/ ?>