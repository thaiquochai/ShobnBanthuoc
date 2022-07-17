@extends('layouts.frontend')

@section('content')
	<div class="card">
		<div class="card-header" align="center">Giỏ hàng của bạn</div>
		<div class="card-body">
		<img src="{{ asset('public/images/rong.png') }}" alt="" 
		style="margin:auto;filter: drop-shadow(0 0 5px blue);position:relative; top: 35%;left: 35%;" width="30%"   >
			<p align="center">
				<marquee direction="Right"> <font size=6 >Bạn chưa mua sản phầm nào </font></marquee>
			</p>

		</div>
	</div>
@endsection