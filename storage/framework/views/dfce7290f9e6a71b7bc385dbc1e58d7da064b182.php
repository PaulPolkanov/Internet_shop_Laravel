
<?php $__env->startSection('page'); ?>
My number!!! May be.... But fuck it.....
<h1> <?php echo e($page); ?> </h1>
<p><?php echo e($a); ?></p>
<p><?php echo e($status); ?></p>



<?php if($status == null): ?>
<form action="/obr" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="name">
    <input type="submit" value="Send">
</form>
<?php endif; ?> 

<form action="/obr" method="POST">
<?php $__currentLoopData = $fruits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="checkbox" ><?php echo e($fruit); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/'.$tamplate, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/pages/contacts.blade.php ENDPATH**/ ?>