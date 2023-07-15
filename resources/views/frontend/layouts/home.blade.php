@extends('frontend.layouts.app')
@section('content')
<!-- Hero Section -->
<div class="hero-section">
	<div class="hero-sliders">
		<div class="hero-slide-inner owl-carousel">
            @foreach($sliders as $slider)
			<div class="hero-slide-item bg-img" style="background-image: url('/{{$slider->image}}');">
				<div class="container">
					<div class="slide-content">
						<h1 class="slide-title">JC Hardware & Construction Supply <br> <span>Best Hardware Store in USA</span></h1>
						<h2></h2>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</div>



<section class="banner-box-section clearfix pt-4">
    <div class="container">
        <div class="d-md-flex flex-row justify-content-start">
            <div class="left-image-group">
                <div class="d-sm-flex flex-row justify-content-start">
                    <!-- banner-image -->
                    @if($banner->status == 1 && $banner->image)
                    <div class="banner-image pt-4">
                        <a href="#"><img class="img-fluid" src="/{{$banner->image}}" alt="banner"></a>
                    </div>
                    @endif
                    @if($banner->status2 == 1 && $banner->image2)
                    <div class="banner-image pt-4 pl-4 pr-4">
                        <a href="#"><img class="img-fluid" src="/{{$banner->image2}}" alt="banner"></a>
                    </div>
                    @endif
                    <!-- banner-image end -->
                </div>
                <div class="d-flex flex-row justify-content-start">
                    @if($banner->status3 == 1 && $banner->image3)
                   <!-- banner-image -->
                    <div class="banner-image pt-4 pr-4 res-767-pr-0">
                        <a href="#"><img class="img-fluid" src="/{{$banner->image3}}" alt="banner"></a>
                    </div>
                    @endif
                    <!-- banner-image end -->
                </div>
            </div>
            <div class="left-image-single">
                @if($banner->status4 == 1 && $banner->image4)
                <!-- banner-image -->
                <div class="banner-image pt-4">
                    <figure class="ttm-figure">
                        <a href="#"><img class="img-fluid" src="/{{$banner->image4}}" alt="banner"></a>
                    </figure>
                </div><!-- banner-image end -->
                @endif
            </div>
        </div>
    </div>
</section>

@if(count($products) > 0)
<section class="product-section pt-5">
    <div class="container"> 
        <!-- row -->
        <div class="row">
            <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                <!-- section title -->
                <div class="section-title title-style-center_text style2">
                    <div class="title-header">
                        <h5>Buying our products</h5>
                        <h2 class="title">Featured Products</h2>
                    </div>
                </div><!-- section title end -->
            </div>
        </div><!-- row end -->
        @include('frontend.file.product.include-product')
    </div>
</section>
@endif

<section class="banner-section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- banner-image -->
                @if($banner->status5 == 1 && $banner->image5)
                <div class="banner-image">
                    <figure class="ttm-figure">
                        <a href="#"><img class="img-fluid" src="/{{$banner->image5}}" alt="banner"></a>
                    </figure>
                </div>
                @endif
                @if($banner->status6 == 1 && $banner->image6)
                <div class="banner-image pt-2">
                    <figure class="ttm-figure">
                        <a href="#"><img class="img-fluid" src="/{{$banner->image6}}" alt="banner"></a>
                    </figure>
                </div>
                @endif
                <!-- banner-image end -->
            </div>
        </div>
    </div>
</section>

@foreach($home_categories as $category)
<section class="product-section pt-5">
    <div class="container"> 
        <!-- row -->
        <div class="row">
            <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                <!-- section title -->
                <div class="section-title title-style-center_text style2">
                    <div class="title-header">
                            <h5>{{$category->category_name}} Produuct</h5>
                        <h2 class="title">{{$category->category_name}}</h2>
                    </div>
                </div><!-- section title end -->
            </div>
        </div><!-- row end -->
        <div class="row">
            @foreach($category['product'] as $product)
            <!-- product -->
            <div class="product col-md-3 col-6 col-xs-6">
                <a href="/product/{{$product->slug}}">
                    <div class="product-box">
                        <!-- product-box-inner -->
                        <div class="product-box-inner">
                            <div class="product-image-box">
                                @if($product->stock <= 0 )
                                <div class="onsale">Stock Out</div>
                                @endif
                                <img class="img-fluid pro-image-front" src="/{{$product->image}}" alt="product-front">
                                <img class="img-fluid pro-image-back" src="/{{$product->image2}}" alt="product-back">
                            </div>
                        </div><!-- product-box-inner end -->
                        <div class="product-content-box">
                            <a class="product-title" href="/product/{{$product->slug}}">
                                <h2>{{$product->product_name}}</h2>
                            </a>
                            <span class="price">
                                <ins><span class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">$</span>{{$product->main_price}}
                                    </span>
                                </ins>
                                @if($product->discount)
                                <del><span class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">$</span>{{$product->price}}
                                    </span>
                                </del>
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
            </div><!-- product end -->
            @endforeach
        </div>
    </div>
</section>
@endforeach
@endsection