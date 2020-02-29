;

<?php $__env->startSection('content'); ?>
    <div class=".container-fluid">
        <div>
            <form action="<?php echo e(BASE_URL . 'brand/search'); ?>" method="get">
                <input required name="search" placeholder="Tìm Kiếm" type="text">
                <button class="btn-danger" type="submit">SEARCH</button>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Logo</th>
                <th scope="col">Country</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="<?php echo e(BASE_URL . 'brand/add-brand'); ?>">Add
                        brand</a></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($brand->id); ?></th>
                    <td><?php echo e($brand->brand_name); ?></td>
                    <td><img src="<?php echo e($brand->logo); ?>" width="100px" alt=""></td>
                    <td><?php echo e($brand->country); ?></td>
                    <td class="">
                        <a class="btn btn-sm btn-info" href="<?php echo e(BASE_URL . "brand/edit-brand/$brand->id"); ?>">Edit</a>
                        <a class="btn btn-sm btn-danger btn-remove"
                           href="<?php echo e(BASE_URL . "brand/remove-brand/$brand->id"); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(isset($_GET['msg'])): ?>
            <input type="hidden" id="msg" value="<?php echo e($_GET['msg']); ?>">
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            if ($('#msg').length > 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: $('#msg').val(),
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            $('.btn-remove').click(function () {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa sản phẩm này ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = redirectUrl;
                    }
                })
                return false;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\baiTap2\app\views/admin/brand/index.blade.php ENDPATH**/ ?>