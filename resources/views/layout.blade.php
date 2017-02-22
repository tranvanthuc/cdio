<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
	
</head>
<body>
	
	@yield('content')

	@yield('footer')
	<script src="{{ asset('admin/js/jquery.min.js')}}"></script>

	<script src="{{ asset('admin/js/myscript.js')}}"></script>
</body>
</html>