
<?php $__env->startSection('content'); ?>
<main class="page-content">
  <!--breadcrumb-->
  <form class="row g-3" action="/admin/addingProduct" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
          </ol>
      </nav>
      </div>
      <div class="ms-auto">
      <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
          <a class="dropdown-item" href="javascript:;">Another action</a>
          <a class="dropdown-item" href="javascript:;">Something else here</a>
          <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
      </div>
      </div>
  </div>
  <!--end breadcrumb-->

      <div class="row">
          <div class="col-lg-12 mx-auto">
          <div class="card">
          <div class="card-header py-3 bg-transparent"> 
              <div class="d-sm-flex align-items-center">
              <h5 class="mb-2 mb-sm-0">Add New Product</h5>
              <div class="ms-auto">
                  <button type="submit" class="btn btn-secondary">Save to Draft</button>
                  <button type="button" class="btn btn-primary">Publish Now</button>
              </div>
              </div>
              </div>
          <div class="card-body">
              <div class="row g-3">
                  <div class="col-12 col-lg-8">
                  <div class="card shadow-none bg-light border">
                      <div class="card-body">
                      
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                        <label class="form-label">????????????????</label>
                        <input type="text" class="form-control" placeholder="Product title" name="name">
                        </div>
                        <div class="col-12">
                        <label class="form-label">????????????????????</label>
                        <input type="text" class="form-control" placeholder="????????????????????"  name="count">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Images</label>
                            <input class="form-control" type="file" name="img" value="default.png">
                        </div>
                        <div class="col-12 more_product_images">
                            
                        </div>
                        <div class="col-12 ">
                            <button type="button" class="btn btn-primary btnAddImg">Add images</button>
                        </div>
                        <div class="col-12">
                        <label class="form-label">Full description</label>
                        <textarea class="form-control" placeholder="Full description" rows="4" cols="4"></textarea>
                        </div>
                      
                      </div>
                  </div>
                  </div>

                  <div class="col-12 col-lg-4">
                  <div class="card shadow-none bg-light border">
                      <div class="card-body">
                          <div class="row g-3">
                          <div class="col-12">
                              <label class="form-label">????????</label>
                              <input type="text" class="form-control" placeholder="Price"  name="price">
                          </div>
                          <div class="col-12">
                              <label class="form-label">???????????? ????????</label>
                              <input type="text" class="form-control" placeholder="Price"  name="old_price">
                          </div>
                          <div class="col-12">
                              <label class="form-label">????????????</label>
                              <select class="form-select"  name="status">
                                <option value="0">???? ??????????????????????</option>
                                <option value="1">????????????????????????</option>
                              </select>
                          </div>
                          <div class="col-12">
                            
                              <label class="form-label">Tags</label>
                              <input type="hidden" class="form-control" placeholder="Tags" name="tags[]">
                              <div class="d-flex align-items-center gap-2 selected_tags" >
                              </div>
                          </div>
                          <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <label class="form-label">???????????????? ????????:</label>
                                </div>
                              <div class="d-flex align-items-center gap-2">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm bg-white tag_on" data-id="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?><i class="bi bi-x"></i></a>
                                
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                          </div>
                          <div class="col-12">
                              <h5>??????????????????</h5>
                              <div class="category-list">
                                  <select class="form-select" name="category">
                                    <option value="null" disabled selected>-Choose category-</option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>
                          </div>

                          </div><!--end row-->
                      </div>
                  </div>  
              </div>

              </div><!--end row-->
              </div>
          </div>
          </div>
      </div><!--end row-->
      </form>
  </main>
  <script>
    let addImageBtn = document.querySelector(".btnAddImg");
    let MoreImages = document.querySelector(".more_product_images");
    addImageBtn.addEventListener('click', ()=>{
        let counter = Math.random(10000)*100+1;
        MoreImages.innerHTML += `<div class="new_imge" style="display: flex; margin: 5px 0; justify-content: space-between;"> 
                                    <input class="form-control" type="file" name="imag${counter}">
                                    <button type="button" class="btn-close btnDeleteImg" style="margin-top: 8.5px;" aria-label="Close"></button>
                                </div>`;
        
    });
    let newImages = document.querySelectorAll(".new_imge");
    let deleteImageBtns = document.querySelector(".btnDeleteImg");
        console.log(deleteImageBtns);
  </script>
  <script>
    let tagsEl = document.querySelectorAll(".tag_on");
    let tags = [];
    let tagsSelected = [];
    for(let tagEl of tagsEl){
        tags.push({'id': tagEl.getAttribute('data-id'), 'name': tagEl.innerHTML});
            tagEl.addEventListener('click', (evt)=>{
            evt.preventDefault();
            let id = evt.target.getAttribute('data-id');
            for(let tag of tags){
                    if(tag.id == id){
                        tagsSelected.push(tag);
                        document.querySelector(".selected_tags").innerHTML += `<a href="javascript:;" class="btn btn-sm btn-light border shadow-sm bg-white tag_on" data-id="${tag.id}">${tag.name}</a>`;
                        break;
                    }
                }

        });

    }
    console.log(tags);
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/'.$tamplate, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/pages/admin/addProduct.blade.php ENDPATH**/ ?>