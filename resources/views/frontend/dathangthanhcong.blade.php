@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header" align="center">Thành công</div>
		<div class="card-body">
		<img src="{{ asset('public/images/dathangthanhcong.png') }}" alt="" 
		style="margin:auto;filter: drop-shadow(0 0 5px blue);position:relative; top: 40%;left: 40%;" width="30%"   >
			<p align="center">
				<marquee direction="Right"> <font size=6 > Bạn đã đặt hàng thành công!!! Chúc bạn sức khoẻ </font></marquee>
				
			</p>

		</div>
	</div>
@endsection