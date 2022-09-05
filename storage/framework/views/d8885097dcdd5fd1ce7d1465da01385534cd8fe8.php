
<?php $__env->startSection('content'); ?>
<main class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">eCommerce</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Products List</li>
        </ol>
      </nav>
    </div>
  </div>
    <div class="d-sm-flex mb-3">
    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <a href="<?php echo e(route('adminAddProduct')); ?>" class="btn btn-primary mb-3 mb-lg-0"><i class="bi bi-plus-square-fill"></i>Add Product</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="row">
    <div class="col-12">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e(session('success')); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(session('error')); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo e($error); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
  </div>

    <div class="card">
      <div class="card-header py-3">
        <div class="row align-items-center m-0">
          <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
            <select class="form-select">
              <option>All category</option>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </select>
          </div>
          <div class="col-md-2 col-6">
              <input type="date" class="form-control">
          </div>
          <div class="col-md-2 col-6">
              <select class="form-select">
                  <option>Status</option>
                  <option>Active</option>
                  <option>Disabled</option>
                  <option>Show all</option>
              </select>
          </div>
       </div>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table align-middle table-striped">
            <thead>
              <tr>
                <td></td>
                <td>Name</td>
                <td>Price</td>
                <td>Count</td>
                <td>Availability</td>
                <td>Category</td>
                <td>Data</td>
                <td></td>
              </tr>
            </thead>
            <tbody>


              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                  </td>
                  <td class="productlist">
                    <a class="d-flex align-items-center gap-2" href="#">
                      <div class="product-box">
                          <img src="/storage/img/<?php echo e($product->images[0]->name); ?>" alt="">
                      </div>
                      <div>
                          <h6 class="mb-0 product-title"><?php echo e($product->name); ?></h6>
                      </div>
                      </a>
                  </td>
                  <td><span>$<?php echo e($product->price); ?></span> 
                    <?php if($product->old_price != null): ?>
                      <del class="product-old-price">$<?php echo e($product->old_price); ?>.00</del>
                    <?php endif; ?>	</td>
                  <td><?php echo e($product->count); ?></td>
                  <td>
                    <?php if($product->status == 1): ?>
                    <span class="badge rounded-pill alert-success">Active</span>
                    <?php else: ?>
                    <span class="badge rounded-pill alert-danger">Deactive</span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($product->category->name); ?></td>
                  <td><span>5-31-2020</span></td>
                  <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                      <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                      <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                      <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                    </div>
                  </td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
            </tbody>
          </table>
        </div>

        <nav class="float-end mt-0" aria-label="Навигация по страницам"><?php echo e($products->onEachSide(1)->links()); ?></nav>

</div>
</div>

</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/'.$tamplate, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/pages/admin/products.blade.php ENDPATH**/ ?>