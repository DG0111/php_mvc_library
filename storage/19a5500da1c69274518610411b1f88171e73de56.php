<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class=".container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">detail</th>
                <th scope="col">Short desc</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Evaluate</th>
                <th scope="col">Views</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="<?php echo e(BASE_URL . 'products/add-product'); ?>">Add
                        product</a></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($product->id); ?></th>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->detail); ?></td>
                    <td><?php echo e($product->short_desc); ?></td>
                    <td><?php echo e($product->cate_id); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><img src="<?php echo e($product->image); ?>" width="50px" alt=""></td>
                    <td><?php echo e($product->star); ?></td>
                    <td><?php echo e($product->views); ?></td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="<?php echo e(BASE_URL . "products/remove/$product->id"); ?>">Delete</a>
                        <a class="btn btn-sm btn-danger" href="<?php echo e(BASE_URL . "products/edit/$product->id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\baiTap1\app\views/home/home.blade.php ENDPATH**/ ?>