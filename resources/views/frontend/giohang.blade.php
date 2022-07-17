@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header">Giỏ hàng của bạn</div>
		<div class="card-body table-responsive pb-0">
			<p>
				<a href="{{ route('home') }}" class="btn btn-info"><i class="fal fa-plus"></i> Tiếp tục mua hàng</a>
			</p>
			<table class="table table-bordered table-hover table-sm mt-3 mb-3">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Hình ảnh</th>
						<th width="40%">Tên sản phẩm</th>
						<th width="15%">Số lượng</th>
						<th width="10%">Đơn giá</th>
						<th width="15%">Thành tiền</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Cart::content() as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" width="80" class="img-thumbnail" /></td>
							<td>{{ $value->name }}</td>
							
							<td class="text-center">
								<div class="input-group mb-3">
									<span class="input-group-text"><a href="{{ route('giohang.giam', ['row_id' => $value->rowId]) }}"><i class="fal fa-minus"></i></a></span>
									<input type="text" class="form-control text-center" value="{{ $value->qty }}" />
									<span class="input-group-text"><a href="{{ route('giohang.tang', ['row_id' => $value->rowId]) }}"><i class="fal fa-plus"></i></a></span>
								</div>
							</td>
							
							<td class="text-end">{{ number_format($value->price, 0, ',', '.') }}</td>
							<td class="text-end">{{ number_format($value->qty * $value->price, 0, ',', '.') }}</td>
							<td class="text-center"><a href="{{ route('giohang.xoa', ['row_id' => $value->rowId]) }}"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
					<tr>
						<td colspan="5">Tổng thành tiền</td>
						<td colspan="2" class="text-end fw-bold text-primary">{{ Cart::priceTotal() }}</td>
					</tr>
					<tr>
						<td colspan="5">Tổng tiền thuế (10% VAT)</td>
						<td colspan="2" class="text-end fw-bold text-primary">{{ Cart::tax() }}</td>
					</tr>
					<tr>
						<td colspan="5">Tổng tiền phải thanh toán</td>
						<td colspan="2" class="text-end fw-bold text-primary">{{ Cart::total() }}</td>
					</tr>
				</tbody>
			</table>
			<p>
				<a href="{{ route('giohang.xoatatca') }}" class="btn btn-danger"><i class="fal fa-trash-alt"></i> Xóa giỏ hàng</a>
				<a href="{{ route('dathang') }}" class="btn btn-success"><i class="fal fa-credit-cart"></i> Thanh toán</a>
			</p>
		</div>
	</div>
@endsection