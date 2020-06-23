
<?php $__env->startSection('title-content'); ?>
Sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container">
<table class= table table-striped>
<thead>
<th>mã danh mục</th>
<th>Tên danh mục</th>
<th colspan="2">
<a href="<?php echo e(getClientURL('add-category')); ?>">Thêm</a>
</th>
</thead>
<tbody>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($cate->id); ?></td>
<td><?php echo e($cate->cate_name); ?></td>
<td>
<a href="<?php echo e(getClientURL('edit-category',['id'=>$cate->id])); ?>">Sửa</a>
</td>
<td>
<a class="btn-remove" href="<?php echo e(getClientURL('remove-category',['id'=>$cate->id])); ?>">Xóa</a>
</td>
</tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\app\views/categories/index.blade.php ENDPATH**/ ?>