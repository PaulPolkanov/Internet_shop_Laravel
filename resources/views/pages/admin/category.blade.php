@extends('layouts/'.$tamplate)
@section('content')


<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Do you want delet this category!?</p>
        </div>
        <div class="modal-footer">
            <form action="/admin/deleteCategory" method="POST">
                @csrf
                <input type="hidden" name="category_id" value="" class="category_id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Modal delete -->
{{-- <!-- Modal Edit category -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="row g-3" method="POST" action="/admin/addCategory">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCategoryModalLabel">Edit category:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">
              <div class="col-12">
                <label class="form-label"><ya-tr-span data-index="143-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Name" data-translation="Имя" data-ch="0" data-type="trSpan" name="name">Имя</ya-tr-span></label>
                <input type="text" class="form-control" placeholder="Название категории" name="name">
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
              <textarea class="form-control" rows="3" cols="3" placeholder="Описание продукта" name="description"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- End modal Edit category --> --}}
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3"><ya-tr-span data-index="135-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="eCommerce" data-translation="Электронная коммерция" data-ch="1" data-type="trSpan">Электронная коммерция</ya-tr-span></div>
      <div class="ps-3">
        <nav aria-label="хлебная крошка">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><ya-tr-span data-index="136-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Categories" data-translation="Категории" data-ch="1" data-type="trSpan">Категории</ya-tr-span></li>
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
          <h6 class="mb-0"><ya-tr-span data-index="142-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Add Product Category" data-translation="Добавить категорию продукта" data-ch="0" data-type="trSpan">Добавить категорию продукта</ya-tr-span></h6>
        </div>
        <div class="card-body">
           <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    
                @endif
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endforeach
                @endif
            </div>
             <div class="col-12 col-lg-4 d-flex">
               <div class="card border shadow-none w-100">
                 <div class="card-body">
                   <form class="row g-3" method="POST" action="/admin/addCategory">
                        @csrf
                     <div class="col-12">
                       <label class="form-label"><ya-tr-span data-index="143-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Name" data-translation="Имя" data-ch="0" data-type="trSpan" name="name">Имя</ya-tr-span></label>
                       <input type="text" class="form-control" placeholder="Название категории" name="name">
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
                      <textarea class="form-control" rows="3" cols="3" placeholder="Описание продукта" name="description"></textarea>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button class="btn btn-primary"><ya-tr-span data-index="151-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Add Category" data-translation="Добавить категорию" data-ch="0" data-type="trSpan">Добавить категорию</ya-tr-span></button>
                      </div>
                    </div>
                   </form>
                 </div>
               </div>
             </div>
             <div class="col-12 col-lg-8 d-flex">
              <div class="card border shadow-none w-100">
                <div class="card-body">
                  <div class="table-responsive">
                     <table class="table align-middle">
                       <thead class="table-light">
                         <tr>
                           <th><input class="form-check-input" type="checkbox"></th>
                           <th><ya-tr-span data-index="152-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="ID" data-translation="ID" data-ch="0" data-type="trSpan">ID</ya-tr-span></th>
                           <th><ya-tr-span data-index="153-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Name" data-translation="Имя" data-ch="1" data-type="trSpan">Имя</ya-tr-span></th>
                           <th><ya-tr-span data-index="154-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Description" data-translation="Описание" data-ch="1" data-type="trSpan">Описание</ya-tr-span></th>
                           <th><ya-tr-span data-index="156-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Order" data-translation="Заказать" data-ch="0" data-type="trSpan">Products</ya-tr-span></th>
                           <th><ya-tr-span data-index="157-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Action" data-translation="Экшен" data-ch="1" data-type="trSpan">Экшен</ya-tr-span></th>
                         </tr>
                       </thead>

                       <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>#{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    {{count($item->products)}}
                                </td>
                                <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Число просмотров"><i class="bi bi-eye-fill"></i></a>
                                <a href="{{ url('/admin/editCategory', [$item->id])}}" class="text-warning" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Редактировать"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger on_delete_category" data-bs-placement="bottom" data-id-category="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal" title="" data-bs-original-title="Delete" aria-label="Удалить"><i class="bi bi-trash-fill"></i></a>
                                </div>
                                </td>
                          </tr>
                        @endforeach
                         
                       </tbody>
                     </table>
                  </div>
                  <nav class="float-end mt-0" aria-label="Навигация по страницам">{{$category->onEachSide(1)->links() }}</nav>
                </div>
              </div>
            </div>
           </div><!--end row-->
        </div>
      </div>

  </main>
  <script>
    let categories = document.querySelectorAll('.on_delete_category');

    for(category of categories){
      category.addEventListener('click', function(evt){
          evt.preventDefault();
          let link = null;


          for(let item of evt.path){
            if(item.tagName == 'A' && item.classList.contains('on_delete_category')){
              link = item;
              break;
            }
          }
          console.log(link);
          if(link != null){
            document.querySelector('#deleteModal .category_id').value = link.getAttribute('data-id-category');
          }
      });
    }
  </script>
  @endsection