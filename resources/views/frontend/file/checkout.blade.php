@extends('frontend.layouts.app')
@section('content')
<?php
	$all_cart = Cart::content();
	$data = Cart::content()->count();
	$total = Cart::subtotal();
?>
<form class="form-horizontal form-payment pt-4 pb-3" action="{{url('/customer/order-store')}}" method="post">
	@csrf
	<div class="checkout-area mb-15 mt-4 text-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
				<div class="section-title title-style-center_text style2">
	                    <div class="title-header">
	                        <h2 class="title">Checkout</h2>
	                    </div>
	                </div>
				</div>

				<div class="col-md-6">
	    	    	<div class="section-right">
	                    <div class="checkout-content checkout-cart">
						    <h2 class="secondary-title">Shopping Cart </h2>
						    <div class="box-inner">
						        <div class="cart-container" id="cart">
									<table class="table table-bordered table-responsive">
									    <thead>
									      <tr class="text-center">
									        <th>Image</th>
									        <th>Product Name</th>
									        <th>Category</th>
									        <th>Price</th>
									        <th>Qty</th>
									        <th>Total</th>
									      </tr>
									    </thead>
									    <tbody>
									    @foreach($all_cart as $data)
									      <tr>
									        <td>
									        	<input type="hidden" name="product_id[]" value="{{$data->id}}">

									        	<img class="img-fluid" width="50" src="/{{$data->options->product_img}}">
									        	<input type="hidden" name="product_img[]" value="{{$data->options->product_img}}">

									        </td>
									        <td class="txt-cart">
									        	{{$data->name}}
									        	<input type="hidden" name="product_name[]" value="{{$data->name}}">
									        </td>
									        <td class="txt-cart">
									        	{{$data->options->category_name}}
									        	<input type="hidden" name="category_name[]" value="{{$data->options->category_name}}">
									        </td>
									        <td class="txt-cart">
									        	{{$data->price}}
									        	<input type="hidden" name="price[]" value="{{$data->price}}">
									        </td>
									        <td class="txt-cart">
									        	{{$data->qty}}
									        	<input type="hidden" name="qty[]" value="{{$data->qty}}">
									        </td>
									        <td class="txt-cart">
									        	{{$data->options->total_price}}
									        	<input type="hidden" name="total_price[]" value="{{$data->options->total_price}}">
									        </td>
									      </tr>
									    @endforeach
									    </tbody>
									</table>
								    <table class="table table-bordered table-hover">
							            <tfoot>
							                <tr>
						                        <td colspan="4" class="text-left">Total:</td>
						                        <td class="text-right">$ {{$total}}</td>
						                        <input type="hidden" name="total_ammount" value="{{$total}}">
						                    </tr>
							            </tfoot>
						            </table>
				 				</div>
						    </div>
						</div>
					</div>
	    	    </div>
		        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="section-left">
		    			<div class="checkout-content checkout-payment-form">
			            	<h2 class="secondary-title">Billing Address </h2>
					        <div class="box-inner">
					            <div id="payment-new" style="display: block">
					                <div class="form-group required">
					                    <input type="text" name="name" required placeholder="Name *" class="form-control" value="{{Auth::guard('customers')->user()->name}}">
										@error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
					                </div>
					                <div class="form-group required">
					                    <input disabled="" placeholder="Email *" class="form-control" value="{{Auth::guard('customers')->user()->email}}">
					                </div>
					                <div class="form-group company-input">
					                    <input type="tel" name="phone" required placeholder="Phone *" class="form-control" value="{{Auth::guard('customers')->user()->phone}}">
										@error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
					                </div>
					                <div class="form-group required">
					                    <input type="text" name="address" required placeholder="Address *" class="form-control" value="{{Auth::guard('customers')->user()->address}}">
										@error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
					                </div>
				                    <div class="text-center">
				                    	<button type="submit" class="btn main-btn text-white">Confirm Order</button>
							        </div>
					            </div>
						    </div>
						</div>
					</div>
	    	    </div>
			</div>
		</div>
	</div>
</form>
<!-- End Chekout Product Area-->
@endsection