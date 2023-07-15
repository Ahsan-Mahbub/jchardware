@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Add Product</h3>
		  <div class="block-options">
		    <a href="{{route('product.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Product List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            	@csrf
            	<div class="row">
            		<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Category Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="category_id" required>
										<option value="">Select One</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->category_name}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Product Name <small>(For scan please click product name filed)</small> <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type='text' class="form-control" required name="product_name" placeholder="Product Name or Scan Product Here">
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Price <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type='number' class="form-control" required name="price" placeholder="Product Price">
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Discount </label>
								<div class="col-lg-12">
									<input type='number' class="form-control" name="discount" min="0" value="0" placeholder="Discount">
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Stock Quantity </label>
								<div class="col-lg-12">
									<input type='number' class="form-control" name="stock" min="0" value="0" placeholder="Stock Quantity">
								</div>
							</div>

							<div class="form-group col-md-12 pb-3">
								<label class="col-12 pb-2">Details <span class="text-danger">*</span> </label>
								<div class="col-lg-12">
		            				<textarea class="form-control form-control-lg editor" id="mega-bio" name="details"></textarea>
								</div>
							</div>

							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Front Image <span class="text-danger">*</span> </label>
								<div class="col-lg-12">
		            				<input type='file' class="form-group" required name="image" onchange="readURL(this);" />
                    				<img id="blah" src="/demo.svg" class="pt-2" height="200" width="auto" alt="product" /><br>
								</div>
							</div>
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Back Image <span class="text-danger">*</span> </label>
								<div class="col-lg-12">
		            				<input type='file' class="form-group" required name="image2" onchange="readURL2(this);" />
                    				<img id="blah2" src="/demo.svg" class="pt-2" height="200" width="auto" alt="product" /><br>
								</div>
							</div>
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Extra Image </label>
								<div class="col-lg-12">
		            				<input type='file' class="form-group" name="image3" onchange="readURL3(this);" />
                    				<img id="blah3" src="/demo.svg" class="pt-2" height="200" width="auto" alt="product" /><br>
								</div>
							</div>
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Extra Image </label>
								<div class="col-lg-12">
		            				<input type='file' class="form-group" name="image4" onchange="readURL4(this);" />
                    				<img id="blah4" src="/demo.svg" class="pt-2" height="200" width="auto" alt="product" /><br>
								</div>
							</div>

						</div>
						
					</div>
            	</div>
                <div class="form-group text-left mt-4 mb-4">
                    <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#blah')
	            .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	function readURL2(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#blah2')
	            .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	function readURL3(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#blah3')
	            .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	function readURL4(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#blah4')
	            .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>
@endsection