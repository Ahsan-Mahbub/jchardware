@extends('frontend.layouts.app')
@section('content')
<!-- Hero Section -->
<div class="contact-us-section pt-4">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mb-4">
				<div class="contact-part">
					<div class="contact-details">
						<div class="section-title title-style-center_text">
		                    <div class="title-header">
		                        <h5>JC Hardware & Construction Supply</h5>
		                        <h2 class="title">Office Location</h2>
		                    </div>
		                    <p>
								{{$information->location}}
							</p>
		                </div>

						<div class="contact-content text-dark">
							<ul>
								<li style="font-weight: 600;">
									<i class="fa fa-phone"></i>&nbsp; {{$information->phone}}
								</li>&nbsp;
								<li style="font-weight: 600;">
									<i class="fa fa-envelope"></i>&nbsp; {{$information->email}}
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
    				<div class="section-title title-style-center_text style2">
	                    <div class="title-header">
	                        <h5>Connect with Us</h5>
	                        <h2 class="title">Reach us Quickly</h2>
	                    </div>
	                </div>
    			</div>
                <form action="{{url('/messages')}}" method="post" enctype="multipart/form-data">
		            @csrf
		            <div class="row clearfix">
		            
		              <div class="form-group col-md-12 col-sm-12">
		                <label>Your name *</label>
		                <input type="text" name="name" placeholder="Enter Your Name..." required="">
		              </div>
		              
		              <div class="form-group col-md-6 col-sm-12">
		                <label>Email address </label>
		                <input type="email" name="email" placeholder="Enter Your Email...">
		              </div>
		              
		              <div class="form-group col-md-6 col-sm-12">
		                <label>Phone number *</label>
		                <input type="text" name="phone" placeholder="Enter Your Phone Number..." required="">
		              </div>
		              
		              <div class="form-group col-lg-12 col-md-12 col-sm-12">
		                <label>Your Message *</label>
		                <textarea name="message" rows="5" placeholder="Enter Your Enquires Message" required></textarea>
		              </div>
		              
		                <div class="col-md-12 mb-3">
                        	<button class="text-white main-btn">
	    						Submit
	    					</button>
                        </div>
		              
		            </div>
		          </form>

			</div>
		</div>
	</div>
</div>
@endsection