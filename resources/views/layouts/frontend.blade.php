<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
	@yield('javascript')

	<link rel="shortcut icon" href="{{ asset('public/images/favicon1.jpg') }}" type="image/x-icon">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">	
	<!-- Styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" />
	
	<div>
</head>
<body>
	
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light mb-2" style="background-color:#66FF66;">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('home') }}" style="color:black;font-size:18pt;text-shadow: 5px 2px 4px #ADD8E6;">
					<img src="{{asset('public/images/thuoc.jpg') }}" alt="" width="30" height="30" class="d-inline-block align-text-top">
					{{ config('app.name', 'shopsuckhoe') }}
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto">
					<li>
						<li class="nav-item dropdown" >
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
							<i class="fal fa-fw "></i><img src="{{ asset('public/images/join.png') }}" alt="" width="30" height="20"/> <b>Sản phẩm</b>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							@foreach($navbar_loaisanpham as $value)
								<li><a class="dropdown-item" href="{{ route('sanpham.danhmuc', ['id' => $value->id]) }}"><i class="fal fa-fw fa-list"></i> {{ $value->tenloai }}</a></li>
							@endforeach	
						</ul>
					</li>
					</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('giohang') }}"><i class="fal fa-fw fa-shopping-cart"></i> <b> Giỏ hàng </b></a>
						</li>
					</ul>
					<ul class="navbar-nav ms-auto">
						@guest
							@if(Route::has('login'))
								<li class="nav-item">
									<a class="nav-link active" href="{{ route('dangnhap') }}"><i class="fal fa-fw fa-sign-in-alt"></i> Đăng nhập</a>
								</li>
							@endif
							@if(Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('dangky') }}"><i class="fal fa-fw fa-user-plus"></i> Đăng ký</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fal fa-fw fa-user-circle"></i> {{ Auth::user()->name }}
									
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="{{ route('user.donhang') }}"><i class="fal fa-fw fa-file-invoice"></i> Quản lý đơn hàng</a></li>
									<li><a class="dropdown-item" href="{{ route('user.hoso') }}"><i class="fal fa-fw fa-id-card"></i> Thông tin cá nhân</a></li>
									<li><a class="dropdown-item" href="{{  route('password.update') }}"><i class="fal fa-fw fa-key"></i> Đổi mật khẩu</a></li>
									<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fal fa-fw fa-power-off"></i> Đăng xuất</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
										@csrf
									</form>
								</ul>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		<div>
		@yield('content')
		<footer class="text-center text-black" style="background-color:#FF99FF;" >
			<div class="container p-4">
				<section class="mb-4">
					<a class="btn btn-outline-light btn-floating m-1" href="{{ route('home') }}" role="button">
						<i class=""></i> Trang chủ
					</a>
				</section>
				<section class="">
					<div class="row">
						<div class="col">
							<h5 class="text-uppercase">Địa chỉ liên hệ</h5>

							<ul class="list-unstyled mb-0">
								<li>
									<a href="#!" class="text-white">Shop sức khỏe</a>
								</li>
								<li>
									<a href="#!" class="text-white">Trường đại học An Giang</a>
								</li>
								<li>
									Email: <a href="mailto:bnson_19th2@student.agu.edu.vn">bnson_19th2@student.agu.edu.vn</a></a>
		
								</li>
							</ul>
						</div>
						<div class="col">
							<h5 class="text-uppercase">Điện thoại liên hệ</h5>
		 
							<ul class="list-unstyled mb-0">
								<li>
									<a href="#!" class="text-white">Cố định</a>
								</li>
								<li>
									<a href="tel:+84358482543">0358 482 543</a>
								</li>
								
							</ul>
						</div>
						

						
						
						
						  <div id="map" style="width: 1500px; height: 50px;"></div>
				</div>	
				<div class="row">
						<div class="col">
							<h5 class="text-uppercase">Vị Trí</h5>
							
							<div style="font-size: 15px; color: white;">shop sức khỏe <a href="https://www.google.com/maps/place/10%C2%B022'32.1%22N+105%C2%B025'05.8%22E/@10.278967,105.3495952,21z/data=!4m5!3m4!1s0x0:0xdcdd62777adf5401!8m2!3d10.37557!4d105.41829">Xem đường đi</a></div>
						</div>
						<div class="col">
							<h5 class="text-uppercase">Link Facebook</h5>
							<a href="https://www.facebook.com/profile.php?id=100008609012712"><i class="fab fa-facebook">SơnCr7</i></a>
						</div>
				</div>	  
                  
                <script>
                  var map = L.map('map').setView([10.37557,105.41829], 14);
                  L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=iVYhDBTWyIDVzX3NyM2q',{
                    tileSize: 512,
                    zoomOffset: -1,
                    minZoom: 1,
                    attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
                    crossOrigin: true
                  }).addTo(map);
                  var popup = L.popup();

                    function onMapClick(e) {
                        popup
                            .setLatLng(e.latlng)
                            .setContent("Bạn đang click vào bản đồ tại tọa độ " + e.latlng.toString())
                            .openOn(map);
                    }

                map.on('click', onMapClick);
                    var redIcon = new L.Icon({
                        iconUrl: 'images/marker-icon-2x-red.png',
                        shadowUrl: 'images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41] 
                });
                    L.marker([10.37156081077938, 105.43226379459502], {icon: redIcon}).addTo(map).bindPopup('shop linh kiện').openPopup();
                   </script> 

               </div>
					</div>
				</section>
			</div>
			<div class="container">
				<div class="copyright-text text-center">Bản quyền &copy; {{ date('Y') }} Bùi Ngọc Sơn.
			</div>
		</footer>
	</div>
</body>
</html>