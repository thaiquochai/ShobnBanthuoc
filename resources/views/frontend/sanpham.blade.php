@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header" style="background-color:#DDA0DD;">Shop sức khỏe</div>
		<div class="card-body">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-2">
				@foreach($danhmucsanpham as $value)
					<div class="col">
						<div class="card h-100">
							<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title product-name">{{ $value->tensanpham }}</h5>
								<p class="card-text product-price">{{ number_format($value->dongia) }}đ</p>
							</div>
							<div class="card-footer text-center">
								<a href="{{ route('giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" class="btn btn-sm btn-danger"><i class="fal fa-cart-plus"></i> Đặt hàng</a>
								<a href="{{ route('sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}" class="btn btn-sm btn-info"><i class="fal fa-info-circle"></i></a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			
			<div class="d-flex justify-content-center mt-4">
			</div>
		</div>
	</div>
@endsection