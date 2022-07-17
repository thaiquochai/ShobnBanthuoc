@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header nut">Sản phẩm chi tiết</div>
		<div class="card-body table-responsive pb-0">
		
				@foreach($sanpham_chitiet as $value)
				<div style="margin-bottom:16px;" >
					<div class="container">
						<div class="row">
						<div class="col-md-12">
							<div style="margin-bottom:16px">
							<h2 style="margin-bottom:16px;text-shadow: 2px 4px 3px rgba(0,0,0,0.3);" >{{ $value->tensanpham }}</h2>
							</div>
						</div>
						<div class="col-md-6">
							<div class="right-image">
							<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" alt="" width="400" class="img-thumbnail">
							</div>
						</div>
						<div class="col-md-6">
							<div class="left-content">
							<p>Loại: {{ $value->loaisanpham->tenloai }}</p>
							<p style="margin-bottom:16px;font-size:20px;">{{ number_format($value->dongia) }}<sup><u>đ</u></sup></p>
							<p>Hãng sản xuất: {{ $value->hangsanxuat->tenhang }}</p>
							<p>Mô tả: {{ $value->motasanpham }}</p>
								<li type="none"><a style="font-size:20px;" href="{{ route('giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" class="btn btn-sm btn-info" onclick="return confirm('Đã thêm vào giỏ hàng')"><i class="fal fa-cart-plus"></i> Đặt hàng</a></li>
								
							</div>
						</div>
						</div>
					</div>
				</div>
				@endforeach
		</div>
	</div>
@endsection