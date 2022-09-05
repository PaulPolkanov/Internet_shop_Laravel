<?php echo e($status); ?>

<?php if($status == null): ?>
<h2>Choose cars</h2>
<form action="/shop" method="POST">
    <?php echo csrf_field(); ?>
<?php $__currentLoopData = $porshe_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index_p=>$porshe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label ></label><input type="checkbox" name="<?php echo e($index_p); ?>" > <?php echo e($index_p); ?> - <?php echo e($porshe); ?> </label>
    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
<input type="submit" value="Bay...">
</form>
<br>
<p style="color: #ff0000; font-weight: bold; padding: 0; margin: 0; font-size: 20px;"><?php echo e($error); ?></p>
<?php endif; ?>
<?php if($status == "You card"): ?>
<ul>
    <?php $__currentLoopData = $mycars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
        <?php $__currentLoopData = $car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($index); ?> - <?php echo e($value); ?>;
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<a href="/card?status=0">Clean card</a>
<?php endif; ?>

<?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/pages/shop.blade.php ENDPATH**/ ?>