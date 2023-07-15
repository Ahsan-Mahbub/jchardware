@if(count($products) > 0)
<div class="row">
	@foreach($products as $product)
	<!-- product -->
    <div class="product col-md-3 col-6 col-xs-6">
        <a href="/product/{{$product->slug}}">
        	<div class="product-box">
	            <!-- product-box-inner -->
	            <div class="product-box-inner">
	                <div class="product-image-box">
						@if($product->stock <= 0 )
						<div class="onsale">Stock Out</div>
						@endif
	                    <img class="img-fluid pro-image-front" src="/{{$product->image}}" alt="product-front">
	                    <img class="img-fluid pro-image-back" src="/{{$product->image2}}" alt="product-back">
	                </div>
	            </div><!-- product-box-inner end -->
	            <div class="product-content-box">
	                <a class="product-title" href="/product/{{$product->slug}}">
	                    <h2>{{$product->product_name}}</h2>
	                </a>
	                <span class="price">
	                    <ins><span class="product-Price-amount">
	                            <span class="product-Price-currencySymbol">$</span>{{$product->main_price}}
	                        </span>
	                    </ins>
	                    @if($product->discount)
	                    <del><span class="product-Price-amount">
	                            <span class="product-Price-currencySymbol">$</span>{{$product->price}}
	                        </span>
	                    </del>
	                    @endif
	                </span>
	            </div>
	        </div>
        </a>
    </div><!-- product end -->
    @endforeach
</div>
@else
<div class="row justify-content-center">
	<div class="col-md-6">
		<img src="/no-product-found.png" width="100%">
	</div>
</div>
@endif