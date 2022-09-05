<div class="col-md-6">
    <div class="header-search">
        <form action="<?php echo e(url('resaltserch')); ?>">
            <select class="input-select">
                <option value="0">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="1"><?php echo e($category->name); ?></option> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input class="input" placeholder="Search here">
            <button class="search-btn">Search</button>
        </form>
    </div>
</div><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/providers/search.blade.php ENDPATH**/ ?>