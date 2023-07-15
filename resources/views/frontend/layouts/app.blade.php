<!DOCTYPE html>
<html>
<head>
	<title>JC Hardware & Construction Supply</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->
    <link rel="icon" href="/frontend/assets/img/core/logo.png"/>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/bootstrap.css">
    <!-- Template Css -->
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/toastr.min.css">
</head>
<body>
    <div class="side-whatsapp-buttons">
      <a href="https://wa.me/{{$information->whatsapp_number}}">
        <img height="60" src="/whatsapp.png">
      </a>
    </div>
    <!-- Page Wrapper Start -->
    <div class="page-wrapper">
	    @include('frontend.layouts.header')
	    @yield('content')
		  @include('frontend.layouts.footer')
    </div>
    <!-- Page Wrapper End -->

    <!-- Script Start -->
	<script src="/frontend/assets/js/jquery.js"></script>
	<script src="/frontend/assets/js/jQuery-plugin-progressbar.js"></script>
	<script src="/frontend/assets/js/jquery.waypoints.min.js"></script>
	<script src="/frontend/assets/js/jquery.counterup.min.js"></script>
	<script src="/frontend/assets/js/popper.min.js"></script>
	<script src="/frontend/assets/js/bootstrap.min.js"></script>
	<script src="/frontend/assets/js/jquery.fancybox.js"></script>
	<script src="/frontend/assets/js/owl.js"></script>
	<script src="/frontend/assets/js/wow.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js"></script>
	<script src="/frontend/assets/js/jquery-ui.js"></script>
	<script src="/frontend/assets/js/main.js" defer=""></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
	    AOS.init();
	</script>
	<script src="/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
      @endif
      @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
      @endif
      @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
      @endif
      @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
      @endif
    </script>
    @yield('javascript')
    {{$information->messenger_script}}
</body>
</html>