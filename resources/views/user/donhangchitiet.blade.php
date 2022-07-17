@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header">Đơn hàng chi tiết</div>
		<div class="card-body table-responsive">
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="45%">Tên sản phẩm </th>
						<th width="10%">SL</th>
						<th width="20%">Đơn giá bán</th>
						<th width="20%">Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					@php $tongtien = 0; @endphp
					@foreach($donhangchitiet as $value) 
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->sanpham->tensanpham }}</td>
							<td class="text-end">{{ $value->soluongban }}</td>
							<td class="text-end">{{ number_format($value->dongiaban) }}<sup><u>đ</u></sup></td>
							<td class="text-end">{{ number_format($value->soluongban * $value->dongiaban) }}<sup><u>đ</u></sup></td>
						</tr>
						@php $tongtien += $value->soluongban * $value->dongiaban; @endphp
					@endforeach
					<tr>
						<td colspan="4">Tổng tiền sách:</td>
						<td class="text-end"><strong>{{ number_format($tongtien) }}</strong><sup><u>đ</u></sup></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection