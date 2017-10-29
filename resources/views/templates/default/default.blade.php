<!doctype html>
<html lang="en">

	<head>

		@include('templates.default.components.header')
		
	</head>


	<body>

		@include('templates.default.components.navbar')

		<div id="main_content" class="container">

			@yield('content')

		</div>

	</body>


	<footer>

		@include('templates.default.components.footer')

	</footer>

	@yield('js')
</html>