<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('staff/assets/images/favicon.png')); ?>">
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
    <link href="<?php echo e(asset('staff/dist/css/style.min.css')); ?>" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    
        <?php echo $__env->make('partials.staff_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('partials.staff_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="<?php echo e(asset('staff/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/dist/js/app-style-switcher.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/dist/js/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/assets/extra-libs/sparkline/sparkline.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/dist/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('staff/dist/js/custom.min.js')); ?>"></script>
</body>

</html><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\layouts\staff_app.blade.php ENDPATH**/ ?>