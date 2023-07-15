@extends('frontend.layouts.app')
@section('content')
<section class="product-details-section pt-4">
	<div class="container">
		<form action="{{route('cart.add')}}" method="post">
    	@csrf
    	<input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
			<div class="row">
				<div class="col-md-5 col-12">
					<div class="product-image-box">
						<img src="/{{$product->image}}" class="main-product-img">
				        <input type="hidden" name="product_img" value="{{$product->image}}">

						<ul>
							<li>
								<img src="/{{$product->image}}" class="product-thumbnail">
							</li>
							<li>
								<img src="/{{$product->image2}}" class="product-thumbnail">
							</li>
							@if($product->image3)
							<li>
								<img src="/{{$product->image3}}" class="product-thumbnail">
							</li>
							@endif
							@if($product->image4)
							<li>
								<img src="/{{$product->image4}}" class="product-thumbnail">
							</li>
							@endif
						</ul>
					</div>
				</div>
				<div class="col-md-7 col-12 pt-2">
					<div class="single-product-details-head">
						<div class="single-product-basic-left-info">
							<div class="title-header">
		                        <h2 class="title">{{$product->product_name}}</h2>
		                        <input type="hidden" name="product_name" value="{{$product->product_name}}">
		                    </div>
							<div class="mt-2 mb-2 text-dark">
								<strong>Category:&nbsp; {{$product->category ? $product->category->category_name : 'Not Set'}}</strong>
								<input type="hidden" name="category_name" value="{{$product->category ? $product->category->category_name : 'Not Set'}}">
							</div>
							<div class="mt-2 mb-2 text-dark">
								<strong>Price:&nbsp; $ {{$product->main_price}}</strong>
								<input type="hidden" name="product_price" value="{{$product->main_price}}">
							</div>
						</div>

						<hr>

						<div class="form-group form-action mt-2 text-dark">
							<strong>Quantity:&nbsp;</strong>
							<button type="button" class="value-button decrease_" onclick="decrease()"><i class="fa fa-minus"></i></button>
							<input type="number" name="quentity" id="qntnumber" min="1" value="1">
							<button type="button" class="value-button increase_" onclick="increase()"><i class="fa fa-plus"></i></button>
						</div>

						<hr>

						<div class="product-details-box">
							<strong class="text-dark">Details:&nbsp;</strong>
							<p class="desc">
								{!! $product->details !!}
							</p>
						</div>
						
						<div class="text-left">
							@if($product->stock > 0 )
							<button type="submit" class="btn btn-info">Add to Cart</button>
							@else
							<button disabled class="btn btn-info">Add to Cart</button>
							@endif
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
@if(count($products) > 0)
<section class="product-section pt-5">
    <div class="container"> 
        <!-- row -->
        <div class="row">
            <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                <!-- section title -->
                <div class="section-title title-style-center_text style2">
                    <div class="title-header">
                            <h5>Categories Related produuct</h5>
                        <h2 class="title">Related Products</h2>
                    </div>
                </div><!-- section title end -->
            </div>
        </div><!-- row end -->
        @include('frontend.file.product.include-product')
    </div>
</section>
@endif
@endsection
@section('javascript')
<script type="text/javascript">
	function increase() {
	    var a = 1;
	    var textBox = document.getElementById("qntnumber");
	    textBox.value++;
	}    
	function decrease() {
	    var textBox = document.getElementById("qntnumber");
	    textBox.value--;
	    var descreseValue = $("#qntnumber").val();
	    if(descreseValue <= 1){
	    	document.getElementById("qntnumber").value = "1";
	    }
	}
</script>
@endsection