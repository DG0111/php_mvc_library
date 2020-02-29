<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title','Quản Trị'); ?></title>
    <!-- plugins:css -->
    <?php echo $__env->make('layouts.admin_link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
<?php echo $__env->make('layouts.admin_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            <!-- partial:partials/_settings-panel.html -->
            <?php echo $__env->make('layouts.admin_theme_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.admin_sitebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('layouts.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<!-- script -->
<?php echo $__env->make('layouts.admin_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End script-->
</body>
<?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\xampp\htdocs\baiTap2\app\views/layouts/admin.blade.php ENDPATH**/ ?>