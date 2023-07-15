<!-- Header Section Start -->
<header class="header">
    <!-- Mobile Menu -->
    <div class="mobile-menu-container">
        <div class="mobile-menu-close"></div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Mobile Menu End -->

    <!-- Bottom Header & Main Menu -->
    <div class="header_main">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-0 order-1">
                    <!-- site-branding -->
                    <div class="site-branding">
                        <a class="home-link" href="/">
                            <img class="pc-image" id="logo-img" class="img-center" src="/frontend/assets/img/core/logo.png" alt="logo-img" width="100%">
                        </a>
                    </div><!-- site-branding end -->
                </div>
                <div class="col-lg-6 col-7 col-md-8 col-xs-12 col-sm-12 col-12 order-lg-2 order-2 text-lg-left">
                    <div class="header_search"><!-- header_search -->
                        <div class="header_search_content">
                            <div id="search_block_top" class="search_block_top">
                                <form id="searchbox" action="{{ url('/product-search') }}" method="GET">
                                    <input class="search_query form-control" type="text" id="search_query_top" name="product_name" placeholder="Search For Shopping...." value="">           
                                    <div class="categories-block">               
                                        <select id="search_category" name="category_id" class="form-control">
                                            <option value="">All Categories</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" name="submit_search" class="btn btn-default button-search"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>    
                    <!-- header_search end -->
                </div>
                <div class="col-lg-3 col-5 col-md-4 col-sm-12 col-xs-12 col-12 order-lg-3 order-3 text-lg-left">
                    <!-- header_extra -->
                    <div class="header_extra d-flex flex-row align-items-center justify-content-end ">
                        <div class="account dropdown">
                            <div class="d-flex flex-row align-items-center justify-content-start">
                                <div class="account_icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="account_content">
                                	<?php
									    if (Auth::guard('customers')->user()) {
									    	?>
                                    			<div class="account_text"><a href="/customer/dashboard">&nbsp; Account</a></div>
										    <?php
									    }else{
									    	?>
                                    			<div class="account_text"><a href="/customer-login">&nbsp; Sign In</a></div>
									    	<?php
									    }
									?>
                                </div>
                            </div>
                        </div>
                        <div class="cart dropdown">
                            <a href="/cart">
                            	<div class="dropdown_link d-flex flex-row align-items-center justify-content-end">
	                                <div class="cart_icon">
	                                    <i class="fa fa-shopping-cart"></i>
	                                    <?php
	                                    	$cart_data = Cart::content()->count();
	                                    	$total = Cart::subtotal();
	                                    ?>
	                                    <div class="cart_count">{{$cart_data}}</div>
	                                </div>
	                                <div class="cart_content">
	                                    <div class="cart_text"><a href="/cart"> My Cart</a></div>
	                                    <div class="cart_price">$ {{$total}}</div>
	                                </div>
	                            </div>
                            </a>
                        </div>
                    </div><!-- header_extra end -->
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light w-100 site-navigation">
			  		<a class="navbar-brand" href="/" class="toggle-image">
						<img class="toggle-image" src="/frontend/assets/img/core/logo.png" alt="" >
			  		</a>
			  		<!-- Toggle Button -->
				  	<button class="mobile-menu-trigger"> 
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
				 	
				  	<div class="navbar-collapse site-menu-wrap">
				  		<!-- Close Menu Icon -->
					 	<div class="close-menu-wrap">
					 		<span class="fa fa-times close-menu-icon"></span>
					 	</div>

					    <ul class="navbar-nav m-auto site-menu">
					    	<div class="cat_menu_container">
                                <a class="cat_menu flex-row align-items-center" onclick="showProductCat()">
                                    <div class="cat_icon"><i class="fa fa-bars"></i></div>
                                    <div class="cat_text"><span>Shop by</span><h4>Categories</h4></div>
                                </a>
                                <ul class="cat_menu_list menu-vertical" id="product-cat">
                                	@foreach($categories as $category)
                                    <li>
								        <a href="/cat/product/{{$category->slug}}">{{$category->category_name}}</a>
								    </li>
								    @endforeach
                                </ul>
                            </div>
						    <li class="nav-item ">
						        <a class="menu-link" href="/">Home</a>
						    </li>

						    <li class="nav-item has-children mobile-category">
						        <a class="menu-link" href="javascript::void(0)">Categories
						        	<span class="flaticon-angle-arrow-down"></span>
						        </a>
						        <ul class="navigation-mega-menu dropdown">
						        	@foreach($categories as $category)
									<li class="nav-item has-children">
										<a href="/cat/product/{{$category->slug}}">
											{{$category->category_name}}
										</a>
									</li>
									@endforeach
								</ul>
						    </li>

						    <li class="nav-item ">
						        <a class="menu-link" href="/product">Products</a>
						    </li>
						    <li class="nav-item">
						        <a class="menu-link" href="/about-us">About Us</a>
						    </li>
						    <li class="nav-item">
						        <a class="menu-link" href="/connect-with-us">Contact Us</a>
						    </li>
						</ul>
				  	</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- Header Section End -->