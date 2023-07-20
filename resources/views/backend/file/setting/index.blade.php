@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Update Site Information</h3>
		</div>
		<div class="block-content">
		  <form action="{{route('setting.update', $information->id)}}" method="post" enctype="multipart/form-data">
		  	@csrf
		    <div class="row">
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Phone Number</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->phone}}" name="phone" placeholder="Enter Phone Number..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Mobile Number</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->mobile}}" name="mobile" placeholder="Enter Mobile Number..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Whatsapp Number</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->whatsapp_number}}" name="whatsapp_number" placeholder="Enter Whatsapp Number..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Email</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->email}}" name="email" placeholder="Enter Email..">
		          </div>
		        </div>
		      </div>


		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Facebook Link</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->fb_link}}" name="fb_link" placeholder="Enter Facebook Link..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Twitter Link</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->twitter_link}}" name="twitter_link" placeholder="Enter Twitter Link..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Youtube Link</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->youtube_link}}" name="youtube_link" placeholder="Enter Youtube Link..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Linkedin Link</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->linkedin_link}}" name="linkedin_link" placeholder="Enter Linkedin Link..">
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Instagram Link</label>
		            <input type="text" class="form-control form-control-lg" id="mega-firstname" value="{{$information->instagram_link}}" name="instagram_link" placeholder="Enter Instagram Link..">
		          </div>
		        </div>
		      </div>


		      <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Office Location</label>
		            <textarea class="form-control form-control-lg" rows="3" name="location">{{$information->location}}</textarea>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">About Details</label>
		            <textarea class="form-control form-control-lg editor" id="mega-bio" name="about_details">{{$information->about_details}}</textarea>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Privacy Policy Details</label>
		            <textarea class="form-control form-control-lg editor" id="mega-bio" name="privacy_details">{{$information->privacy_details}}</textarea>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Terms & Condition Details</label>
		            <textarea class="form-control form-control-lg editor" id="mega-bio" name="terms_details">{{$information->terms_details}}</textarea>
		          </div>
		        </div>
		      </div>
			  <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Invoice Return Policy</label>
		            <textarea class="form-control form-control-lg editor" id="mega-bio" name="return_policy">{{$information->return_policy}}</textarea>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Messenger Script</label>
		            <textarea class="form-control form-control-lg" rows="3" name="messenger_script">{{$information->messenger_script}}</textarea>
		          </div>
		        </div>
		      </div>
			  <div class="col-md-12">
		        <div class="row mb-4">
		          <div class="col-12">
		            <label class="form-label" for="mega-firstname">Copyright</label>
		            <input type="text" class="form-control editor" id="mega-firstname" value="{{$information->copyright}}" name="copyright" placeholder="Enter Copyright Text..">
		          </div>
		        </div>
		      </div>
		    </div>
		    <div class="mb-4">
		      <button type="submit" class="btn btn-primary">
		        Update
		      </button>
		    </div>
		  </form>
		</div>
	</div>
</div>
@endsection