@extends('layouts.frontend')

@section('content')
	<div class="card">
<link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />	
	<div id="slideshow">
	   <div class="slide-wrapper">
		 <div class="slide"><img src="public/images/hinh3.jpg " width="70%" height="70%" /></div>
		 <div class="slide"><img src="public/images/hinh2.jpg"  width="70%" height="70%" /></div>
		 <div class="slide"><img src="public/images/hinh1.jpg" width="70%" height="70%" /></div>
	   </div>
   </div>
		<div class="card-header" style="background-color:#FF99FF;margin:-120px 0px -5px 0px;">Trang chủ shop sức khỏe</div>
		<div class="card-body">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<div>
			<br/>
			<form action="{{ route('frontend.sanpham') }}" method="post" style="margin:-34px 205px -5px -17px;">
			@csrf
				<select class="form-control form-control-sm" id="sapxep" name="sapxep" onchange="if(this.value != 0) { this.form.submit(); }" style="color:black;font-size:15px;width: 60% !important;
        text-shadow: 5px 2px 4px #ADD8E6;background-color:#FF99FF;">
					
					<option value="default" {{ session('sapxep') == 'default' ? 'selected' : '' }} align="center">--Thứ tự sản phẩm--</option>
					<option value="popularity" {{ session('sapxep') == 'popularity' ? 'selected' : '' }} align="center">Bán chạy</option>
					<option value="date" {{ session('sapxep') == 'date' ? 'selected' : '' }} align="center">Mới nhất</option>
					<option value="price" {{ session('sapxep') == 'price' ? 'selected' : '' }} align="center">Giá: thấp đến cao</option>
					<option value="price-desc" {{ session('sapxep') == 'price-desc' ? 'selected' : '' }} align="center">Giá: cao xuống thấp</option>
				</select>
			</form>
			<div class="button-a">
			<form action="{{ route('timkiem') }}" method="post" class="" style="margin:-33px 40px -15px 700px;" />
				{{csrf_field()}}
				<div>
				<input name="keywords_submit" class="form-control me-2" type="text" placeholder="Bạn cần tìm gì??" aria-label="Search" required />
				<button class="btn me-2" type="submit" style="background-color:#FF99FF;margin:-77px 17px -15px 525px;"><i class="far fa-search"></i></button>
				</div>
			</form>
			</div>
			</div>
			<div class="d-flex justify-content-center mt-4">
				{{ $sanpham->links() }}
			</div>
			</br>
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-2">
				@foreach($sanpham as $value)
					<div class="col">
						<div class="card h-100">
							<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title product-name">{{ $value->tensanpham }}</h5>
								<p class="card-text product-price">{{ number_format($value->dongia) }}đ</p>
							</div>
							<div class="card-footer text-center">
								<a href="{{ route('giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" class="btn btn-sm btn-dark"><i class="fal fa-cart-plus"></i> Đặt hàng</a>
								<a href="{{ route('sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" class="btn btn-sm btn-warning"><i class="fal fa-info-circle"></i></a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			
			<div class="d-flex justify-content-center mt-4">
				{{ $sanpham->links() }}
			</div>
		</div>
	</div>
@endsection