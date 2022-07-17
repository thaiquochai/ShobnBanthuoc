@extends('layouts.admin')

@section('content')
	<div class="card">
			<div class="card-header">Kết quả tìm kiếm {{count($search_sanpham)}}</div>
			<div class="card-body">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-2">
			<table class="table table-bordered table-hover table-sm mt-3 mb-3">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Hình ảnh</th>
						<th width="15%">Loại sản phẩm</th>
						<th width="10%">HSX</th>
						<th width="35%">Tên sản phẩm</th>
						<th width="5%">SL</th>
						<th width="10%">Đơn giá</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($search_sanpham as $value)
						<tr>
							<td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" width="80" class="img-thumbnail" /></td>
							<td>{{ $value->LoaiSanPham->tenloai }}</td>
							<td>{{ $value->HangSanXuat->tenhang }}</td>
							<td>{{ $value->tensanpham }}</td>
							<td class="text-end">{{ $value->soluong }}</td>
							<td class="text-end">{{ number_format($value->dongia) }}</td>
							<td class="text-center"><a href="{{ route('admin.sanpham.sua', ['id' => $value->id]) }}"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ route('admin.sanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa sản phẩm {{ $value->tensanpham }} không?')"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			</div>
		</div>
	</div>
@endsection