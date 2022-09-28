<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">


<head>
	@include('website.components.head')
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BGLGWPW7P7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BGLGWPW7P7');
</script>

fc fc-unthemed fc-ltr 
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
