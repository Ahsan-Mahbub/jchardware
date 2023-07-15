@extends('frontend.layouts.app')
@section('content')
<section class="product-section pt-5 pb-3">
    <div class="container"> 
        <!-- row -->
        <div class="row">
            <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                <!-- section title -->
                <div class="section-title title-style-center_text style2">
                    <div class="title-header">
                        <h5>Buying our products</h5>
                        <h2 class="title">Search Products</h2>
                    </div>
                </div><!-- section title end -->
            </div>
        </div><!-- row end -->
        @include('frontend.file.product.include-product')

        {{ $products->links() }}
    </div>
</section>
@endsection