@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
			<h3 class="block-title">#{{$order->invoice}}</h3>
			<button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
				<i class="si si-printer"></i> Print Invoice
			</button>
	    </div>
	    <div class="block-content" id="printableArea">
	      <!-- Invoice Info -->
	      <div class="row my-3 fs-sm">
	        <!-- Company Info -->
	        <div class="col-sm-4" style="width: 50%">
				<img src="/frontend/assets/img/core/logo.png" width="100%">
				<address style="width: 100%">
					JC Hardware & Construction Supply<br>
					{{$information->location}}<br>
					Order Create : {{$order->type}}
				</address>
	        </div>
	        <!-- END Company Info -->

	        <!-- Client Info -->
	        <div class="col-sm-8 text-end" style="width: 40%">
				<address>
					#{{$order->invoice}}<br>
					$ {{$order->total_ammount}}<br>
					@if($order->status == 1)
						<span class="badge bg-success">Deliverd</span>
					@elseif($order->status == 2)
						<span class="badge bg-warning">Panding</span>
					@elseif($order->status == 0)
						<span class="badge bg-danger">Rejected</span>
					@endif
				</address>
				<address>
					{{$order->name}}<br>
					@if($order->email)
					{{$order->email}}<br>
					@endif
					{{$order->phone}}<br>
					{{$order->address}}
				</address>
	        </div>
	        <!-- END Client Info -->
	      <!-- END Invoice Info -->

	      <!-- Table -->
	      <div class="table-responsive push">
	        <table class="table table-bordered table-hover">
	          <thead>
	            <tr>
	               <th class="text-center">S/L</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Total Price</th>
	            </tr>
	          </thead>
	          <tbody>
	            @php $sl = 1; @endphp
            	@foreach($products as $product)
                <tr>
                    <td class="text-center">{{$sl++}}</td>
                    <td>
                        <img style="width: 50px; height: 50px;" src="{{$product->product_img ? '/' . $product->product_img :  '/demo.svg'}}">
                    </td>
                    <td class="text-center">
                    	{{$product->product_name}}
                    </td>
                    <td class="text-center">{{$product->category_name}}</td>
                    <td class="text-center">$ {{$product->price}}</td>
                    <td class="text-center">
                    	<span class="badge bg-primary">{{$product->qty}}</span>
                    </td>
                    <td class="text-end">$ {{$product->total_price}}</td>
                </tr>
                @endforeach
	            <tr class="table-info">
	              <td colspan="6" class="fw-bold text-uppercase text-end">Sub Total</td>
	              <td class="fw-bold text-end">$ {{$order->total_ammount}}</td>
	            </tr>
	          </tbody>
	        </table>
	      </div>
	      <!-- END Table -->

	      <!-- Footer -->
	      <p class="fa-sm text-muted">
			{!! $information->return_policy !!}
	      </p>
	      <!-- END Footer -->
	    </div>
	</div>
</div>
@endsection

@section('script')
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>
@endsection