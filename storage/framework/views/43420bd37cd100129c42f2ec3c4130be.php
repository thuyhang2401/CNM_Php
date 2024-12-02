<?php $__env->startSection('content'); ?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Chi tiết đơn hàng</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page"><a
                                    href="<?php echo e(url('staff/orders')); ?>">Quản lý đơn hàng</a></li>
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
                        <div class="modal-body">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <p class="text-primary"><strong>Thông tin đơn hàng</strong></p>
                                    <p>Mã đơn hàng: <span class="order-id"><?php echo e($data->order_id); ?></span></p>
                                    <p>Ngày tạo đơn hàng: <span class="order-created-at"><?php echo e($data->created_at); ?></span>
                                    </p>
                                    <p>Trạng thái hiện tại: <span class="order-status"><?php echo e($data->status); ?></span></p>
                                </div>
                                <div>
                                    <p class="text-primary"><strong>Thông tin người nhận</strong></p>
                                    <p>Tên người nhận: <span class="order-"><?php echo e($data->customer_name); ?></span></p>
                                    <p>Số điện thoại: <span class="order-id"><?php echo e($data->phone_number); ?></span></p>
                                    <p>Địa chỉ nhận hàng: <span class="order-id"><?php echo e($data->shipping_address); ?></span></p>
                                </div>
                            </div>
                            <div>
                                <p class="text-primary"><strong>Thông tin chi tiết</strong></p>
                                <p>Sản phẩm: </p>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="media border-bottom">
                                        <div class="media-left">
                                            <img src="<?php echo e(asset('img/' . $product->image)); ?>" class="media-object"
                                                style="width:60px">
                                        </div>
                                        <div class="media-body ml-3">
                                            <p class="media-heading"><small><?php echo e($product->name); ?></small></p>
                                            <p><small>x<?php echo e($product->quantity); ?></small></p>
                                        </div>
                                        <div class="media-right">
                                            <p><?php echo e($product->price); ?> VNĐ</p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p>Phí giao hàng: <span class="order-delivery-fee"><?php echo e($data->delivery_fee); ?></span></p>
                                <p>Ghi chú: <span class="order-note"><?php echo e($data->note); ?></span></p>
                                <p class="text-right">Tổng tiền: <strong class="order-total-fee"
                                        style="font-size:40px"><?php echo e($data->total_price); ?> VNĐ</strong></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="window.location.href='<?php echo e(url('staff/orders')); ?>'" type="button"
                                class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <form method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <?php if($data->status === 'Chờ xác nhận'): ?>
                                    <button type="submit" formaction="/staff/orders/reject/<?php echo e($data->order_id); ?>"
                                        value="reject" class="btn btn-danger">Từ chối
                                        đơn</button>
                                    <button type="submit" formaction="/staff/orders/confirm/<?php echo e($data->order_id); ?>"
                                        name="action" value="confirm" class="btn btn-primary">Xác nhận
                                        đơn</button>
                                <?php endif; ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php if(session('success')): ?>

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
                        <?php echo e(session('success')); ?>

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>

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
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staff_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\staff\orderDetail.blade.php ENDPATH**/ ?>