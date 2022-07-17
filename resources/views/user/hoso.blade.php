@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header">Thông tin cá nhân</div>
		<div class="card-body table-responsive">
			<form  method="post">
				<div class="mb-3">
					<label class="form-label" for="name">Họ và tên</label>
					@foreach($nguoidung as $value)
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $value->name }}" required />
					@endforeach
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="email">Địa chỉ email</label>
					@foreach($nguoidung as $value)
						<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $value->email }}" required />
					@endforeach
				</div>

				<button class="btn btn-primary"><a style="color:white" href="{{ route('user.sua_hoso', ['id' => $value->id]) }}"><i class="fas fa-users-cog"></i> Thay đổi thông tin người dùng</a></button>
			</form>
		</div>
	</div>
@endsection