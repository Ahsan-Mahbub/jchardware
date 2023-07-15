@extends('frontend.layouts.app')
@section('content')
<?php
	$all_cart = Cart::content();
?>
<div class="shopping-cart-area pt-4 pb-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-title title-style-center_text style2">
                    <div class="title-header">
                        <h2 class="title">Shopping Cart</h2>
                    </div>
                </div>
			</div>

	        <div class="col-md-8" id="cart">
 				<table class="table table-bordered table-responsive">
				    <thead>
				      <tr class="text-center text-dark">
				        <th>Image</th>
				        <th>Product Name</th>
				        <th>Price</th>
				        <th>Qty</th>
				        <th>Total</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    @foreach($all_cart as $data)
				      <tr>
				        <td><img class="img-fluid" width="50" src="/{{$data->options->product_img}}"></td>
				        <td class="txt-cart">{{$data->name}}</td>
				        <td class="txt-cart">{{$data->price}}</td>
				        <td class="txt-cart">
				        	{{$data->qty}}
				        </td>
				        <td class="txt-cart">{{$data->options->total_price}}</td>
				        <td class="txt-cart"><a href="{{route('cart.delete',$data->rowId)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
				      </tr>
				    @endforeach
				    </tbody>
				</table>
				<div class="checkout cart-detailed-actions">
			        <div class="text-center">
			        	<a href="/" class="btn main-btn text-white">Continue Shopping</a>
			        </div>
				</div>
	        </div>

		    <aside class="col-md-4 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
			    <div class="cart-summary bg-white">          
					<div class="cart-detailed-totals text-dark">
					  <div class="cart-summary-products">
					  	<?php
					  		$data = Cart::content()->count();
					  		$total = Cart::subtotal();
					  	?>
					    <div class="summary-label">{{$data}} - items in your cart</div>
					  </div>

					  	<div class="group-price">
		                    <div class="cart-summary-line" id="cart-subtotal-products">
		          				<span class="label js-subtotal">
		                          Total Cart Items:
		                      	</span>
		         				<span class="value">{{$data}}</span>
		                    </div>
					    </div>
					    <div class="cart-summary-line cart-total has_border">
						    <div class="d-flex">
						      <span>
						        <span class="label">Total</span>
						      </span>
						      <span class="value ml-auto label">$ {{$total}}</span>
						    </div>
					    </div>
					</div>
					<div class="checkout cart-detailed-actions">
				        <div class="text-center">
							@if (Auth::guard('customers')->user())
				        		<a href="/customer/checkout" class="btn btn-primary">Checkout</a>
							@else
				        		<a href="/guest-checkout" class="btn btn-primary">Checkout</a>
							@endif
				        </div>
					</div>
         		 </div>
		  	</aside>
		</div>
	</div>
</div>
@endsection