<div class="row">

    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">New Products</h3>
            <div class="section-nav">
                <ul class="section-tab-nav tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                    <li><a data-toggle="tab" href="/#tab1">Smartphones</a></li>
                    <li><a data-toggle="tab" href="/#tab1">Cameras</a></li>
                    <li><a data-toggle="tab" href="/#tab1">Accessories</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /section title -->

    <!-- Products tab & slick -->
    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                    <div class="products-slick slick-initialized slick-slider" data-nav="#slick-nav-1">
                        <!-- product -->
                        <div class="slick-list draggable">
                                @foreach ($data as $item)
                                    @if($item->status == 1)
                                    <div class="product slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 213px;">
                                        <div class="product-img">
                                            <img src="/storage/img/{{$item->images[0]->name}}" alt="">
                                            <div class="product-label">
                                                @if ($item->old_price != null)
												<span class="sale">{{round(100*$item->price/$item->old_price-100);}}%</span>
											@endif
											@foreach ($item->tags as $tag)
											
											<span class="new">{{$tag->name}}</span>
											@endforeach
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$item->category->name}}</p>
                                            <h3 class="product-name"><a href="#" tabindex="-1">{{$item->name}}</a></h3>
                                            <h4 class="product-price">${{$item->price}}.00 
                                                @if ($item->old_price != null)
                                                    <del class="product-old-price">${{$item->old_price}}.00</del>
                                                @endif	
                                                </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist" tabindex="-1"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare" tabindex="-1"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view" tabindex="-1"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn" tabindex="-1"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                </div>
                <div id="slick-nav-1" class="products-slick-nav"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: inline-block;">Previous</button><button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: inline-block;">Next</button></div>
            </div>
                <!-- /tab -->
        </div>
    </div>
</div>