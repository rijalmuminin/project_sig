<!-- /*
* Template Name: Archiark
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('assets/front/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/fonts/flaticon/font/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">

	<title>Sistem Informasi Geografis</title>
    @yield('styles')
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

  {{-- NAVBAR --}}
  @include('layouts.components-front.navbar')
  {{-- END NAVBAR --}}
 
	
  @yield('content')

  {{-- NAVBAR --}}
  @include('layouts.components-front.footer')
  {{-- END NAVBAR --}}
	

	
	<!-- Preloader -->
	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>

	<script src="{{asset('assets/front/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/front/js/tiny-slider.js')}}"></script>
	<script src="{{asset('assets/front/js/aos.js')}}"></script>
	<script src="{{asset('assets/front/js/glightbox.min.js')}}"></script>
	<script src="{{asset('assets/front/js/navbar.js')}}"></script>
	<script src="{{asset('assets/front/js/counter.js')}}"></script>
	<script src="{{asset('assets/front/js/custom.js')}}"></script>
    @stack('scripts')
</body>
</html>
