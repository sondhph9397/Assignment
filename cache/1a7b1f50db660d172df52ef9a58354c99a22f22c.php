
<?php $__env->startSection('title-content'); ?>
Sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container">
<table class= table table-striped>
<thead>
<th>Ma SP</th>
<th>Tên SP</th>
<th>Loại sản phẩm</th>
<th>Đánh giá</th>
<th>Giá tiền</th>
<th colspan="2">
<a href="<?php echo e(getClientURL('add-product')); ?>">Thêm</a>
</th>
</thead>
<tbody>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($item->id); ?></td>
<td><?php echo e($item->name); ?></td>
<td><?php echo e($item->getCateName->cate_name); ?></td>
<td><?php echo e($item->star); ?> <i class="fas fa-star"></i> </td>
<td><?php echo e($item->price); ?></td>
<td>
<a href="<?php echo e(getClientURL('edit-product',['id'=>$item->id])); ?>">Sửa</a>
</td>
<td>
<a class="btn-remove" href="<?php echo e(getClientURL('remove-product',['id'=>$item->id])); ?>">Xóa</a>
</td>
</tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\app\views/products/index.blade.php ENDPATH**/ ?>