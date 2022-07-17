@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">Sản phẩm</div>
		<div class="card-body table-responsive pb-0">
			<p>
				<a href="{{ route('admin.sanpham.them') }}" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="{{ route('admin.sanpham.xuat') }}" class="btn btn-success"><i class="fal fa-download"></i> Xuất ra Excel</a>
			</p>
			<div class="button-a">
			<form action="{{ route('admin.timkiem') }}" method="post" class="" style="margin:-33px 40px -15px 700px;" />
				{{csrf_field()}}
				<div>
				<input name="keywords_submit" class="form-control me-2" type="text" placeholder="Bạn cần tìm gì??" aria-label="Search" required />
				<button class="btn me-2" type="submit" style="background-color:#87CEFA;margin:-77px 17px -15px 525px;"><i class="far fa-search"></i></button>
				</div>
			</form>
			</div>
			{{ $sanpham->links() }}
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
					@foreach($sanpham as $value)
						<tr>
							<td>{{$sanpham->firstItem() + $loop -> index }}</td>
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
			{{ $sanpham->links() }}
		</div>
	</div>
	
	<form action="{{ route('admin.sanpham.nhap') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-0">
							<label for="file_excel" class="form-label">Chọn tập tin Excel</label>
							<input type="file" class="form-control" id="file_excel" name="file_excel" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fal fa-times"></i> Hủy bỏ</button>
						<button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection