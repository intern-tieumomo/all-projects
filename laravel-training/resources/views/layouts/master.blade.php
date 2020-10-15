<!DOCTYPE html>
<html>
<head>
	<title>Master</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	@include('layouts.header')
	<div id="content">
		<h1>Pham Hong Quan</h1>
		@yield('content')	
	</div>
	@include('layouts.footer')
</body>
</html>