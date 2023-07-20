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
				<form action="javascript:void(0)" method="GET">
					<div class="form-group row offset-lg-2">
						<label class="col-3 col-form-label text-end">Search Product :</label>
						<div class="col-6">
							<input class="form-control" name="product_name" id="search"
								placeholder="Product Name">
						</div>
					</div>
				</form>
				<div class="show_search_product">
					@include('backend.file.stock.search-product')
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
	$("body").on("keyup", "#search", function () {
		let searchData = $("#search").val();
		let searchDataLength = searchData.length;
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			type: "POST",
			url: "stock-search-product",
			data: {
				search: searchData,
				searchDataLength: searchDataLength,
			},
			success: function (result) {
				$(".show_search_product").html(result);
			},
		});
	});
	$(document).on("click", ".stock_product", function(){
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
