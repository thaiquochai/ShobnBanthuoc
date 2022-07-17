@extends('layouts.frontend')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
</head>
<body>
	
	<div class="card">
		<div class="card-header">Trang chủ khách hàng.</div>
		<br/>
		<div class="card-body">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<div id="slideshow">
   <div class="slide-wrapper">
     <div class="slide"><img src="public/images/hinh3.jpg"></div>
     <div class="slide"><img src="public/images/hinh2.jpg"></div>
     <div class="slide"><img src="public/images/hinh1.jpg"></div>
   </div>
 </div>
	</div>
	
</body>
</html>
@endsection