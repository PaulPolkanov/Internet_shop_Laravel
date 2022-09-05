@extends('layouts/'.$tamplate)
@section('content')
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
            <a href="{{route('adminAddProduct')}}" class="btn btn-primary mb-3 mb-lg-0"><i class="bi bi-plus-square-fill"></i>Add Product</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->
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
  </div>

    <div class="card">
      <div class="card-header py-3">
        <div class="row align-items-center m-0">
          <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
            <select class="form-select">
              <option>All category</option>
            @foreach ($category as $item)
            <option>{{$item->name}}</option>
            @endforeach
            
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


              @foreach ($products as $product)
                  <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                  </td>
                  <td class="productlist">
                    <a class="d-flex align-items-center gap-2" href="#">
                      <div class="product-box">
                          <img src="/storage/img/{{$product->images[0]->name}}" alt="">
                      </div>
                      <div>
                          <h6 class="mb-0 product-title">{{$product->name}}</h6>
                      </div>
                      </a>
                  </td>
                  <td><span>${{$product->price}}</span> 
                    @if ($product->old_price != null)
                      <del class="product-old-price">${{$product->old_price}}.00</del>
                    @endif	</td>
                  <td>{{$product->count}}</td>
                  <td>
                    @if ($product->status == 1)
                    <span class="badge rounded-pill alert-success">Active</span>
                    @else
                    <span class="badge rounded-pill alert-danger">Deactive</span>
                    @endif
                  </td>
                  <td>{{$product->category->name}}</td>
                  <td><span>5-31-2020</span></td>
                  <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                      <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                      <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                      <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                    </div>
                  </td>
                  </tr>
              @endforeach

              
            </tbody>
          </table>
        </div>

        <nav class="float-end mt-0" aria-label="Навигация по страницам">{{$products->onEachSide(1)->links() }}</nav>

</div>
</div>

</main>
@endsection