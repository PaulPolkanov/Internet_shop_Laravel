<ul class="newsletter-follow">
    @foreach ($request as $link)
    <li>
        <a href="{{$link['link']}}"><i class="fa {{$link['name']}}"></i></a>
    </li>
    @endforeach
</ul>