<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">


<head>
	@include('website.components.head')
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="ABgBjhuZ"></script>
	<header>
		@include('website.components.header')
	</header>
	@yield('main')
  
	@include('website.components.FooterBanner')
	@include('website.components.footer')
	@include('website.components.scripts')
	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
