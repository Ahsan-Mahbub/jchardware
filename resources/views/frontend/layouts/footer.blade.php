<!-- Footer -->
<footer class="footer" id="footer">
    <div class="background-main">
    	<div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 footer-item line-left-item col-logo">
                    <div class="footer-item-inner p-relative h-100">
                        <div class="footer-logo">
                            <a href="/" class="pb-2">
                                <img height="125" src="/frontend/assets/img/core/logo.jpeg" alt="" width="100%" style="object-fit: contain;" class="logo-dark">
                            </a>
                            <p class="text-white mt-2">
                            	{{$information->location}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 footer-item line-left-item col-menu">
                    <div class="footer-item-inner p-relative h-100">
                        <h4 class="footer-title line-after p-relative">Quick Link</h4>

                        <div class="footer-menu-container">
                            <ul>
                                <li>
                                    <a href="/about-us">About Us</a>
                                </li>
                                <li>
                                    <a href="/privacy-policy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="/terms-condition">Terms & Condition</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 footer-item line-left-item col-contact">
                    <div class="footer-item-inner p-relative h-100">
                        <h4 class="footer-title line-after p-relative">Contact</h4>

                        <ul>
                            <li>
                                <strong>P</strong>
                                <span>:</span>
                                <a href="tel:{{$information->phone}}">{{$information->phone}}</a>
                            </li>
                            <li>
                                <strong>M</strong>
                                <span>:</span>
                                <a href="tel:{{$information->mobile}}">{{$information->mobile}}</a>
                            </li>
                            <li class="over-hidden">
                                <strong>E</strong>
                                <span>:</span>
                                <a class="link-hover" href="mailto:{{$information->email}}">{{$information->email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 footer-item line-left-item col-address">
                    <div class="footer-item-inner p-relative h-100">
                        <h4 class="footer-title line-after p-relative">Social Media</h4>

                        <ul class="social-icon">
                			@if($information->fb_link)
                            <li>
                                <a href="{{$information->fb_link}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            @endif
                            @if($information->twitter_link)
                            <li>
                                <a href="{{$information->twitter_link}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            @endif
                            @if($information->linkedin_link)
                            <li>
                                <a href="{{$information->linkedin_link}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                            @endif
                            @if($information->youtube_link)
                            <li>
                                <a href="{{$information->youtube_link}}" target="_blank"><i class="fa fa-youtube"></i></a>
                            </li>
                            @endif
                            @if($information->instagram_link)
                            <li>
                                <a href="{{$information->instagram_link}}" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                            @endif
                		</ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright background-main">
        <div class="container">
        	<div class="row">
            	<div class="col-md-12 col-12">
                    <p class="text-center copy-right">{{$information->copyright}}</p>
            	</div>
            </div>
        </div>
    </div>
</footer>