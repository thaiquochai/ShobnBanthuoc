<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<title>@yield('title', 'Trang chủ quản trị') - {{ config('app.name', 'Laravel') }}</title>
	
	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
	@yield('javascript')
	
	<link rel="shortcut icon" href="{{ asset('public/images/favicon1.jpg') }}" type="image/x-icon">

	<!-- Styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" />
</head>
<body>
	
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-warning mb-2">
			<div class="container-fluid">
			
				<a class="navbar-brand" href="{{ route('admin.home') }}">
					<img src="{{asset('public/images/thuoc.jpg') }}" alt="" width="30" height="30" class="d-inline-block align-text-top">
					{{ config('app.name', 'shopsuckhoe') }}
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					
					<ul class="navbar-nav ms-auto">
						@guest
							@if(Route::has('login'))
								<li class="nav-item">
									<a class="nav-link active" href="{{ route('login') }}"><i class="fal fa-fw fa-sign-in-alt"></i> Đăng nhập</a>
								</li>
							@endif
							@if(Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}"><i class="fal fa-fw fa-user-plus"></i> Đăng ký</a>
								</li>
							@endif
						@else
							@if (Auth::user()-> role == 'admin')
						<ul class="navbar-nav me-auto">
						
						</ul>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fal fa-fw fa-cog"></i> Quản lý
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="{{ route('admin.loaisanpham') }}"><i class="fal fa-fw fa-list"></i> Loại sản phẩm</a></li>
									<li><a class="dropdown-item" href="{{ route('admin.hangsanxuat') }}"><i class="fal fa-fw fa-copyright"></i> Hãng sản xuất</a></li>
									<li><a class="dropdown-item" href="{{ route('admin.tinhtrang') }}"><i class="fal fa-fw fa-ballot-check"></i> Tình trạng</a></li>
									<li><a class="dropdown-item" href="{{ route('admin.sanpham') }}"><i class="fal fa-fw fa-cubes"></i> Sản phẩm</a></li>
									<li><a class="dropdown-item" href="{{ route('admin.donhang') }}"><i class="fal fa-fw fa-file-invoice"></i> Đơn hàng</a></li>
									<li><a class="dropdown-item" href="{{ route('admin.nguoidung') }}"><i class="fal fa-fw fa-users"></i> Tài khoản người dùng</a></li>
									<li><a class="dropdown-item" href="{{ route('admin.doanhthu') }}"><i class="fal fa-fw fa-users"></i> Doanh thu</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fal fa-fw fa-user-circle"></i> {{ Auth::user()->name }}
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="{{ route('password.update') }}"><i class="fal fa-fw fa-key"></i> Đổi mật khẩu</a></li>
									<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fal fa-fw fa-power-off"></i> Đăng xuất</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
										@csrf
									</form>
								</ul>
							</li>
							@endif
							
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		
		@yield('content')
		
		<hr />
		<footer>Bản quyền &copy; {{ date('Y') }} Bùi Ngọc Sơn.</footer>
	</div>

</body>
</html>