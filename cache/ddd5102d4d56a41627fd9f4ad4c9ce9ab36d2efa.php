
<?php $__env->startSection('title-content'); ?>
Sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container">
<table class= table table-striped>
<thead>
<th>STT</th>
<th>Tên người dùng</th>
<th>email</th>
<th>Ảnh</th>
<th>Quyền</th>
<th>
<a href="<?php echo e(getClientURL('add-user')); ?>">Thêm</a>
</th>
</thead>
<tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($us->id); ?></td>
<td><?php echo e($us->name); ?></td>
<td><?php echo e($us->email); ?></td>
<td><img src="<?php echo e($us->avatar); ?>" width="200px" alt=""></td>
<td><?php echo e($us->role); ?></td>
<td>
<a href="<?php echo e(getClientURL('edit-user',['id'=>$us->id])); ?>">Sửa</a>
</td>
<td>
<a href="<?php echo e(getClientURL('remove-user',['id'=>$us->id])); ?>">Xóa</a>
</td>
</tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\app\views/users/index.blade.php ENDPATH**/ ?>