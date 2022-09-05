{{$status}}
@if($status == null)
<h2>Choose cars</h2>
<form action="/shop" method="POST">
    @csrf
@foreach($porshe_cars as $index_p=>$porshe)
    <label ></label><input type="checkbox" name="{{$index_p}}" > {{$index_p}} - {{$porshe}} </label>
    <br>
@endforeach
<br>
<input type="submit" value="Bay...">
</form>
<br>
<p style="color: #ff0000; font-weight: bold; padding: 0; margin: 0; font-size: 20px;">{{$error}}</p>
@endif
@if($status == "You card")
<ul>
    @foreach($mycars as $car)
        <li>
        @foreach($car as $index=>$value)
            {{$index}} - {{$value}};
        @endforeach
        </li>
    @endforeach
</ul>
<a href="/card?status=0">Clean card</a>
@endif

