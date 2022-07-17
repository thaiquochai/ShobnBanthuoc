@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header">Thông tin giao hàng</div>
		<div class="card-body">
			<form action="{{route('dathang') }}" method="post">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="dienthoaigiaohang">Số Điện thoại</label>
					<input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror" id="dienthoaigiaohang" name="dienthoaigiaohang" value="{{ old('dienthoaigiaohang') }}" required />
					@error('dienthoaigiaohang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				<div class="mb-3">
					<label class="form-label" for="diachigiaohang">Tỉnh-Huyện-Xã-Ấp-Tổ</label>
					<input type="text" class="form-control @error('diachigiaohang') is-invalid @enderror" id="diachigiaohang" name="diachigiaohang" value="{{ old('diachigiaohang') }}" required />
					@error('diachigiaohang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-check"></i> Xác nhận thanh toán</button>
			</form>
		</div>
	</div>
	
	<div class="card mt-3">
		<div class="card-header">Sản phẩm bạn đã đặt</div>
		<div class="card-body table-responsive pb-0">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Hình ảnh</th>
						<th width="40%">Tên sản phẩm</th>
						<th width="15%">Số lượng</th>
						<th width="10%">Đơn giá</th>
						<th width="15%">Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Cart::content() as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" width="80" class="img-thumbnail" /></td>
							<td>{{ $value->name }}</td>
							<td class="text-end">{{ $value->qty }}</td>
							<td class="text-end">{{ number_format($value->price, 0, ',', '.') }}</td>
							<td class="text-end">{{ number_format($value->qty * $value->price, 0, ',', '.') }}</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="5">Tổng thành tiền</td>
						<td class="text-end fw-bold text-primary">{{ Cart::priceTotal() }}</td>
					</tr>
					<tr>
						<td colspan="5">Tổng tiền thuế (10% VAT)</td>
						<td class="text-end fw-bold text-primary">{{ Cart::tax() }}</td>
					</tr>
					<tr>
						<td colspan="5">Tổng tiền phải thanh toán</td>
						<td class="text-end fw-bold text-primary">{{ Cart::total() }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection