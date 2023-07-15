@extends('frontend.layouts.app')
@section('content')
<!-- Hero Section -->
<div class="details-section pt-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-title title-style-center_text style2">
                    <div class="title-header">
                        <h5>JC Hardware & Construction Supply</h5>
                        <h2 class="title">About Us</h2>
                    </div>
                </div>
				<p>
					{!! $information->about_details !!}
				</p>
			</div>
		</div>
	</div>
</div>
@endsection