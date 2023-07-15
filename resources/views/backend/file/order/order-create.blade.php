@extends('backend.layouts.app')
@section('content')
<style type="text/css">
	.block{
		margin-bottom: 0;
	}
</style>
<div class="content">
	<div class="row">
        <div class="col-md-12">
            <div class="block block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title"> All Product</h3>
                </div>
                <div style="max-height: 610px; overflow-y: scroll;">
                    <div class="container mt-4 mb-4">
                        <form action="" method="GET">
                            <div class="form-group row offset-lg-2">
                                <label class="col-3 col-form-label text-end">Search Product :</label>
                                <div class="col-6">
                                    <input class="form-control" name="product_name" required placeholder="Product Name">
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-5">
                            @foreach($products as $value)
                            <div class="col-md-3 col-xl-2 col-6 stock_product mb-2" data-id="{{$value}}" style="cursor: pointer;">
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
        <div class="col-md-8">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Cart Item Information</h3>
                </div>
                <div class="block-content">
                  <form action="be_forms_premade.html" method="POST" onsubmit="return false;">
                    <div class="row mb-4">
                      <div class="col-4">
                        <label class="form-label" for="register3-firstname">Product Name</label>
                      </div>
                      <div class="col-3">
                        <label class="form-label" for="register3-lastname">Price</label>
                      </div>
                      <div class="col-3">
                        <label class="form-label" for="register3-lastname">Quantity</label>
                      </div>
                      <div class="col-2">
                        <label class="form-label" for="register3-lastname">Action</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4">
                          <input type="text" class="form-control" id="register3-firstname" name="register3-firstname" placeholder="Product Name..">
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Product Price..">
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Quantity..">
                        </div>
                        <div class="col-2">
                          <button type="button" class="btn btn-danger me-1 mb-1">
                              <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4">
                          <input type="text" class="form-control" id="register3-firstname" name="register3-firstname" placeholder="Product Name..">
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Product Price..">
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Quantity..">
                        </div>
                        <div class="col-2">
                          <button type="button" class="btn btn-danger me-1 mb-1">
                              <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4">
                          <input type="text" class="form-control" id="register3-firstname" name="register3-firstname" placeholder="Product Name..">
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Product Price..">
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Quantity..">
                        </div>
                        <div class="col-2">
                          <button type="button" class="btn btn-danger me-1 mb-1">
                              <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="block block-rounded mb-0">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Customer Information</h3>
                </div>
                <div class="block-content">
                  <form action="be_forms_premade.html" method="POST" onsubmit="return false;">
                    <div class="mb-4">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="name" placeholder="Enter Customer">
                        <label class="form-label" for="register4-company">Customer Name</label>
                      </div>
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">
                        Checkout
                      </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
