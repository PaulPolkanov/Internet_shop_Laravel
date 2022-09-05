<div class="col-md-6">
    <div class="header-search">
        <form action="{{url('resaltserch')}}">
            <select class="input-select">
                <option value="0">All Categories</option>
                @foreach ($categories as $category)
                <option value="1">{{$category->name}}</option> 
                @endforeach
            </select>
            <input class="input" placeholder="Search here">
            <button class="search-btn">Search</button>
        </form>
    </div>
</div>