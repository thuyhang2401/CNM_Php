<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị viên</title>

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{ asset('font_admin/css/main.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('font_admin/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('font_admin/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('font_admin/img/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ asset('font_admin/img/safari-pinned-tab.svg') }}" color="#00b4b6">
    <script src="{{ asset('font_admin/js/confirm-delete.js') }}"></script>
    <style>
        .alert {
            width: 50%;
            /* Thay đổi chiều rộng nếu cần */
            max-width: 600px;
            /* Đặt chiều rộng tối đa */
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            /* Tăng padding */
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 5px;
            /* Tăng khoảng cách dưới */
            margin-left: auto;
            /* Căn giữa */
            margin-right: auto;
            /* Căn giữa */
            text-align: center;
            /* Xóa margin-top âm nếu không cần thiết */
        }
    </style>
</head>

<body>

    <div id="app">

        <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
                <div class="navbar-item">
                    <div class="control"><input placeholder="Tìm kiếm..." class="input"></div>
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
                        <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe"
                            class="rounded-full">
                    </div>
                    <div class="is-user-name"><span>Thu Hiền</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="profile.html" class="navbar-item">
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
            <a href="https://justboil.me/tailwind-admin-templates" class="navbar-item has-divider desktop-icon-only">
                <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                <span>About</span>
            </a>
            <a title="Log out" class="navbar-item desktop-icon-only" href="{{ route('logout') }}">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log out</span>
            </a>
        </nav>

        <aside class="aside is-placed-left is-expanded">
            <div class="aside-tools">
                <div>
                    Trang <b class="font-black">Quản trị viên</b>
                </div>
            </div>
            <div class="menu is-menu-main">
                <p class="menu-label">Xem</p>
                <ul class="menu-list">
                    <li class="{{ request()->is('admin/index') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                            <span class="menu-item-label">Thống kê</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Chức năng</p>
                <ul class="menu-list">
                    <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Quản lý danh mục</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/accounts*') ? 'active' : '' }}">
                        <a href="{{ route('admin.accounts.index') }}">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label">Quản lý tài khoản</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/profile*') ? 'active' : '' }}">
                        <a href="#">
                            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                            <span class="menu-item-label">Cập nhật thông tin tài khoản</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('admin/order*') ? 'active' : '' }}">
                        <a href="#">
                            <span class="icon"><i class="mdi mdi-view-list"></i></span>
                            <span class="menu-item-label">Quản lý đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
    <!-- Main Content -->
    <main>
        @if(session('info'))
            <div style="background-color: #17a2b8; color: white; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                {{ session('info') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="{{ asset('font_admin/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('font_admin/js/main.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{ asset('font_admin/js/chart.sample.min.js') }}"></script>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

    <style>
        .menu-list li.active a {
            background-color: #007bff;
            /* Màu nền khi được chọn */
            color: white;
            /* Màu chữ khi được chọn */
        }
    </style>
</body>

</html>