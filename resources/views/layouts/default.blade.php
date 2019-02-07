<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	@include('includes.head')
</head>
<body>
	@yield('content')
	<footer class="main-footer">
		<div class="container-fluid p-1">
			<div class="footer-message text-center">
				<p class="footer-copyright m-1">© Runkitek 2019</p>
			</div>
		</div>
	</footer>
</body>
</html>