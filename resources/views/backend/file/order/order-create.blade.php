@extends('backend.layouts.app')
@section('content')
<style type="text/css">
    .block {
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
                        <form action="javascript:void(0)" method="GET">
                            <div class="form-group row offset-lg-2">
                                <label class="col-3 col-form-label text-end">Search Product :</label>
                                <div class="col-6">
                                    <input class="form-control" name="product_name" id="search"
                                        placeholder="Product Name">
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary search-button">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="show_search_product">
                            @include('backend.file.order.search-product')
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
                    <form action="" method="POST" onsubmit="return false;">
                        @csrf
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
                        <div class="add_item" id="add_item">

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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    //  search product by ajax
    $("body").on("keyup", "#search", function() {
      let searchData = $("#search").val();
      let searchDataLength = searchData.length;
      // console.log(searchData);
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          url: "admin-order-search-product",
          data: {
              search: searchData,
              searchDataLength: searchDataLength,
          },
          success: function(result) {     
              $('.show_search_product').html(result);     
              console.log(result);      
          }
        });
    });
  
    //  Admin order product by ajax
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click", ".addEvenMore", function(){
            let product_id = $(this).attr('product_id');
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            var addItem = $("#add_item");
            console.log(product_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "admin-order-get-product-details",
                type: "POST",
                data: {product_id:product_id},
                success: function(resp){
                    addItem.append(`
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                            <div class="form-row">
                                <div class="row mb-4">
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="register3-firstname" name="register3-firstname" placeholder="Product Name.." value="${resp.product_name}" readonly>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Product Price.." value="${resp.price}">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="register3-lastname" name="register3-lastname" placeholder="Quantity..">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger me-1 mb-1 removeEvenMore">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                },
                error: function(){
                    alert('error');
                }
            });
            
            
            counter ++;
        });
        $(document).on("click", ".removeEvenMore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>

@endsection