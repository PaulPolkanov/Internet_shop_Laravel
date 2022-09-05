
<?php $__env->startSection('content'); ?>
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><ya-tr-span data-index="135-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="eCommerce" data-translation="Электронная коммерция" data-ch="1" data-type="trSpan">Электронная коммерция</ya-tr-span></div>
        <div class="ps-3">
          <nav aria-label="хлебная крошка">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><ya-tr-span data-index="136-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Categories" data-translation="Категории" data-ch="1" data-type="trSpan">Категория</ya-tr-span></li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <button type="button" class="btn btn-primary"><ya-tr-span data-index="137-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Settings" data-translation="Настройки" data-ch="0" data-type="trSpan">Настройки</ya-tr-span></button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden"><ya-tr-span data-index="137-1" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Toggle Dropdown" data-translation="Переключить выпадающий список" data-ch="0" data-type="trSpan">Переключить выпадающий список</ya-tr-span></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;"><ya-tr-span data-index="138-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Action" data-translation="Экшен" data-ch="0" data-type="trSpan">Экшен</ya-tr-span></a>
              <a class="dropdown-item" href="javascript:;"><ya-tr-span data-index="139-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Another action" data-translation="Еще одно действие" data-ch="0" data-type="trSpan">Еще одно действие</ya-tr-span></a>
              <a class="dropdown-item" href="javascript:;"><ya-tr-span data-index="140-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Something else here" data-translation="Здесь что-то еще" data-ch="0" data-type="trSpan">Здесь что-то еще</ya-tr-span></a>
              <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;"><ya-tr-span data-index="141-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Separated link" data-translation="Отдельная ссылка" data-ch="0" data-type="trSpan">Отдельная ссылка</ya-tr-span></a>
            </div>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="card">
        <div class="card-header py-3">
          <h6 class="mb-0"><ya-tr-span data-index="142-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Add Product Category" data-translation="Добавить категорию продукта" data-ch="0" data-type="trSpan">Редактировать категорию продукта</ya-tr-span></h6>
        </div>
        <div class="card-body">
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
             <div class="col-12 col-lg-12 d-flex">
               <div class="card border shadow-none w-100">
                 <div class="card-body">
                   <form class="row g-3" method="POST" action="/admin/changeCategory">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                     <div class="col-12">
                       <label class="form-label"><ya-tr-span data-index="143-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Name" data-translation="Имя" data-ch="0" data-type="trSpan" name="name">Имя</ya-tr-span></label>
                       <input type="text" class="form-control" placeholder="Название категории" name="name" value="<?php echo e($category->name); ?>">
                     </div>
                    <div class="col-12">
                      <label class="form-label"><ya-tr-span data-index="145-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Parent" data-translation="Родительский" data-ch="0" data-type="trSpan">Родительский</ya-tr-span></label>
                      <select class="form-select">
                        <option>Ультрамодные модели</option>
                        <option>Электроника</option>
                        <option>Мебель</option>
                        <option>Спорт</option>
                      </select> 
                    </div>
                    <div class="col-12">
                      <label class="form-label"><ya-tr-span data-index="150-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Description" data-translation="Описание" data-ch="0" data-type="trSpan" name="description">Описание</ya-tr-span></label>
                      <textarea class="form-control" rows="3" cols="3" placeholder="Описание продукта" name="description"><?php echo e($category->description); ?></textarea>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-12 col-lg-9 d-grid">
                            
                        </div>
                        <div class="col-12 col-lg-1 d-grid">
                            <a href="<?php echo e(route('adminCategory')); ?>" class="btn btn-secondary">Отмена</a>
                        </div>
                        <div class="col-12 col-lg-2 d-grid">
                            <button class="btn btn-primary"><ya-tr-span data-index="151-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Add Category" data-translation="Добавить категорию" data-ch="0" data-type="trSpan">Сохранить</ya-tr-span></button>
                        </div>
                    </div>
                   </form>
                 </div>
               </div>
             </div>
           </div><!--end row-->
        </div>
      </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/'.$tamplate, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/pages/admin/editCategory.blade.php ENDPATH**/ ?>