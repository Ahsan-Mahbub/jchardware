@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Product Stock Table
	        </h3>
	        <a href="{{route('stock.create')}}" class="btn btn-alt-primary"><i class="fa fa-plus mr-5"></i> Add Stock</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Product Name &nbsp;</th>
	                <th class="text-center">Quantity &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_stock as $stock)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$stock->product ? $stock->product->product_name : 'Not Set'}}</td>
			            <td class="text-center">{{$stock->quantity}}</td>
		          	</tr>
		          	@endforeach
		        </tbody>
		    </table>
	    </div>
	</div>
</div>
@endsection