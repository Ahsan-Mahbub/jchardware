@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Category Table
	        </h3>
	        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus mr-5"></i> Add Category</button>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Category Name &nbsp;</th>
	                <th class="text-center">Access &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_category as $category)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$category->category_name}}</td>
			            <td class="text-center">
			                @if($category->status == 1)
		            			<span class="badge bg-success">Active</span>
		            		@else
		            			<span class="badge bg-danger">Inactive</span>
		            		@endif
			            </td>
			            <td class="text-center">
			            	<div class="btn-group">
				            	<form action="{{route('category.destroy',$category->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('category.status',$category->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-refresh {{$category->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editcategory" data="{{$category->id}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-edit"></i>
		                            </a>
	                                @csrf
	                                @method('delete')
	    	                    	<button type="submit" class="btn btn-sm btn-secondary js-bs-tooltip-enabled delete-confirm">
		                                <i class="fa fa-times"></i>
		                            </button>
		                        </form>
                            </div>
		                </td>
		          	</tr>
		          	@endforeach
		        </tbody>
		    </table>
	    </div>
	</div>
</div>

<!-- Add Modal -->
<div class="modal" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Add Category</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
	                	@csrf
	                	<div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Category Name <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <input type='text' class="form-control" required name="category_name" placeholder="Category Name">
                            </div>
	                    </div>
	                    <div class="form-group text-center mt-4 mb-4">
	                        <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
	                    </div>
	                </form>
	          	</div>
	        </div>
      	</div>
    </div>
</div>
<!-- END Add Modal -->

<!-- Edit Modal -->
<div class="modal" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Update Category</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
	                	@csrf
	                	<input type="hidden" name="id" id="category_id">
	                	<div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Category Name <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <input type='text' class="form-control" required name="category_name" id="category_name" placeholder="Category Name">
                            </div>
	                    </div>
	                    <div class="form-group text-center mt-4 mb-4">
	                        <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
	                    </div>
	                </form>
	          	</div>
	        </div>
      	</div>
    </div>
</div>
<!-- END Edit Modal -->

@endsection
@section('script')
<script type="text/javascript">
	$(document).on("click", "#editcategory", function () {
        let id = $(this).attr("data");
        $.ajax({
            url: "/admin/category/edit/"+id,
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#category_id").val(response.id);
                $("#category_name").val(response.category_name);
            }
        })
    }) 
</script>
@endsection