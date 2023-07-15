@extends('frontend.layouts.app')
@section('content')
<!-- Begin Chekout Area-->
<section class="my-profile-area mb-15 bg-F7F8FA">
	<div class="container">
		<div class="row">
        	@include('frontend.file.customer.sidebar')
		    <div class="col-12 col-md-9 pt-4">
		    	<div class="block_content-right text-dark p-3">
        			<h2 class="font-25 font-bold">Order History</h2>
        			<address>
                        #{{$order->invoice}}<br>
                        $ {{$order->total_ammount}}<br>
                        @if($order->status == 1)
                			<span class="badge badge-success">Deliverd</span>
                		@elseif($order->status == 2)
                			<span class="badge badge-warning">Panding</span>
                		@elseif($order->status == 0)
                			<span class="badge badge-danger">Rejected</span>
                		@endif
                    </address>
                  	<div class="table-responsive">
                  		<table class="table table-striped table-bordered">
				            <thead class="thead-default">
				              <tr class="text-dark">
				                <th class="text-center">Image</th>
				                <th class="text-center">Product Name</th>
				                <th class="text-center">Category</th>
				                <th class="text-center">Price</th>
				                <th class="text-center">Qty</th>
				                <th class="text-center">Total Price</th>
				              </tr>
				            </thead>
				            <tbody>
				            	@foreach($products as $product)
				                <tr class="text-darl">
				                  	<th class="text-center"><img style="width: 50px; height: 50px;" src="{{$product->product_img ? '/' . $product->product_img :  '/asset/backend_asset/assets/media/photos/file-image-svgrepo-com.svg'}}"></th>
				                  	<td class="text-center">{{$product->product_name}}</td>
				                  	<td class="text-center">{{$product->category_name}}</td>
				                 	<td class="text-center">$ {{$product->price}}</td>
				                  	<td class="text-center">
		                            	<span class="badge badge-pill badge-primary">{{$product->qty}}</span>
		                            </td>
		                            <td class="text-right">$ {{$product->total_price}}</td>
				                </tr>
				                @endforeach
				                <tr class="table-warning">
		                            <td colspan="5" class="font-w700 text-uppercase text-right">Sub Total</td>
		                            <td class="font-w700 text-right">$ {{$order->total_ammount}}</td>
		                        </tr>
				            </tbody>
	          			</table>
                  	</div>
                </div>
		    </div>
		</div>
	</div>
</section>
<!-- End Chekout Product Area-->
@endsection