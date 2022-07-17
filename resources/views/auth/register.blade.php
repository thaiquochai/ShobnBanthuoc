@extends('layouts.admin')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Đăng ký tài khoản</div>
				<div class="card-body">
					<form method="post" action="{{ route('register') }}">
						@csrf
						<div class="mb-3">
							<label class="form-label" for="name">Họ và tên</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
							@error('name')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label" for="email">Địa chỉ email</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
							@error('email')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label" for="password">Mật khẩu</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
							@error('password')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label" for="password-confirm">Xác nhận mật khẩu</label>
							<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" required />
							@error('password_confirmation')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-0">
							<button type="submit" class="btn btn-primary"><i class="fal fa-user-plus"></i> Đăng ký</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection