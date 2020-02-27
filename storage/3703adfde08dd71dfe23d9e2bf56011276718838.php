;

<?php $__env->startSection('content'); ?>
    <div class=".container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                
                
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Evaluate</th>
                <th scope="col">Views</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="<?php echo e(BASE_URL . 'admin/add-product'); ?>">Add
                        product</a></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($product->id); ?></th>
                    <td><?php echo e($product->name); ?></td>
                    
                    
                    <td>
                        <?php
                            $parent = $product->getCategory();
                        ?>
                        <?php if($parent !== false): ?>
                            <?= $parent->cate_name; ?>
                        <?php endif; ?>
                    </td>
                    
                    <td><?php echo e($product->price); ?></td>
                    <td><img src="<?php echo e($product->image); ?>" width="100px" alt=""></td>
                    <td><?php echo e($product->star); ?></td>
                    <td><?php echo e($product->views); ?></td>
                    <td class="">
                        <a class="btn btn-sm btn-info" href="<?php echo e(BASE_URL . "admin/edit-product/$product->id"); ?>">Edit</a>
                        <a class="btn btn-sm btn-danger btn-remove"
                           href="<?php echo e(BASE_URL . "admin/remove-product/$product->id"); ?>">Delete</a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\baiTap1\app\views/admin/index.blade.php ENDPATH**/ ?>