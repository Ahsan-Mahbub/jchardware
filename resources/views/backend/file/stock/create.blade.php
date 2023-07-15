@extends('backend.layouts.app')
@section('content')
<style type="text/css">
	.block{
		margin-bottom: 0;
	}
</style>
<div class="content">
	<div class="block block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"> All Product</h3>
	    </div>
	    <div style="max-height: 610px; overflow-y: scroll;">
	    	<div class="container mt-4 mb-4">
	    	<div class="row">
	            @foreach($products as $value)
	            <div class="col-md-3 col-xl-2 stock_product mb-2" data-id="{{$value}}" style="cursor: pointer;">
	                <a class="block block-link-shadow">
	                    <div class="block-content block-content-full text-center p-0 pb-1" style="border-radius: 10px;
                        box-shadow: 1px 1px 1px 2px ">
	                        <div class="p-2 mb-2">
	                            <img width="100%" height="120" src=/{{$value->image}}>
	                        </div>
	                        <p class="font-size-lg font-w600 mb-0">
	                            {{ $value->product_name  }}
	                        </p>
	                    </div>
	                </a>
	            </div>
	            @endforeach
	        </div>
	    	</div>
	    </div>
	</div>
</div>

<div class="content">
	<div class="block block block-rounded">
	    <div class="block-header block-header-default">
            <h3 class="block-title">Add Product Stock</h3>
	    </div>
    	<form role="form" action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
            @csrf
	        <div class="block-content">
	            <div class="row items-push">
	            	<input type="hidden" id="product_id" name="product_id" required="">
	                <div class="col-xl-7">
	                    <div class="form-group row">
	                        <label class="col-12" for="product_name">Product Name</label>
	                        <div class="col-lg-12">
	                            <input type="text" class="form-control" id="product_name" disabled="">
	                        </div>
	                        @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
	                    </div>
	                </div>
	                <div class="col-xl-5">
	                    <div class="form-group row">
	                        <label class="col-12" for="quantity">Product Quantity <span class="text-danger">*</span></label>
	                        <div class="col-lg-12">
	                            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Product Quantity" required="">
	                        </div>
	                        @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
	                    </div>
	                </div>

                    <div class="form-group pl-10">
                        <button type="submit" id="submit" class="btn btn-alt-primary">Stock</button>
                    </div>
	            </div>
	        </div>
	    </form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('.stock_product').click(function(){
		let product_info = $(this).data('id');
		let product_ids = product_info.id;
		let product_names = product_info.product_name;

		document.getElementById('product_id').value = product_ids;
		document.getElementById('product_name').value = product_names;
		toastr.success(" Product Selected", "Success");
	})
</script>
<script type="text/javascript">
	function validateForm() {
		var x = document.forms["myForm"]["product_id"].value;
		if (x == "") {
		    toastr.warning(" Please Select Product", "Damage");
		    return false;
		}
	}
</script>
@endsection
