@extends('layouts/'.$tamplate)
@section('cont')
<div class="container">
<!-- Order Details -->
<div class="row order-details">
    <div class="section-title text-center">
        <h3 class="title">Your Card</h3>
    </div>
    <div class="order-summary">
        @if ($products != null)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">PRODUCT</th>
                <th scope="col">COUNT</th>
                <th scope="col">PRICE</th>
                <th scope="col">TOTAL</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <th scope="row">1</th>
                <td>
                    <img src="/storage/img/{{$product->images[0]->name}}" alt="" style="width: 100px">
                    <span>{{$product->name}}</span>
                </td>
                <td>2 шт.</td>
                <td>{{$product->price}} Rub</td>
                <td>{{$product->price*2}} Rub</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="order-col">
            <div>Shiping</div>
            <div><strong>FREE</strong></div>
        </div>
        <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">$2940.00</strong></div>
        </div>
        @else
            <h3>Card Empty</h3>
        @endif
    </div>
    <form action="/created-order" method="POST">
        @csrf
        <button type="submit" class="primary-btn order-submit">Place order</button>
    </form>
</div>
<!-- /Order Details -->
</div>
@endsection