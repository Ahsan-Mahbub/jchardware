@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Product Table
	        </h3>
	        <a href="{{route('product.create')}}" class="btn btn-alt-primary"><i class="fa fa-plus mr-5"></i> Add Product</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Category &nbsp;</th>
	                <th class="text-center">Product Name &nbsp;</th>
	                <th class="text-center">Price &nbsp;</th>
					<th class="text-center">Stock Qty &nbsp;</th>
	                <th class="text-center">Image &nbsp;</th>
	                <th class="text-center">Featured &nbsp;</th>
	                <th class="text-center">Access &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_product as $product)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$product->category ? $product->category->category_name : 'Not Set'}}</td>
			            <td class="text-center">{{$product->product_name}}</td>
			            <td class="text-center">{{$product->main_price}}</td>
			            <td class="text-center">{{$product->stock}}</td>
			            <td class="text-center"><img style="width: auto; height: 50px;" src="{{$product->image ? '/' . $product->image :  '/demo.svg'}}"></td>
			            <td class="text-center">
			            	<a href="{{route('product.feature',$product->id)}}" class="btn btn-sm {{$product->feature == 1 ? 'btn-success' : 'btn-secondary'}} js-bs-tooltip-enabled">
                                {{$product->feature == 1 ? 'Feature' : 'None'}}
                            </a>
			            </td>
			            <td class="text-center">
			                @if($product->status == 1)
		            			<span class="badge bg-success">Active</span>
		            		@else
		            			<span class="badge bg-danger">Inactive</span>
		            		@endif
			            </td>
			            <td class="text-center">
			            	<div class="btn-group">
				            	<form action="{{route('product.destroy',$product->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('product.status',$product->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-refresh {{$product->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-secondary">
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
@endsection