@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">Doanh thu</div>
		<div class="card-body table-responsive">
		
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="85%">#</th>
						<th width="15%">Doanh thu</th>
					</tr>
				</thead>
				<tbody>
					
						<tr>
							<td>Doanh thu của shop sức khỏe đến hiện tại là: </td>
							<td>{{ $doanhthu }}</td>
							
						</tr>
					
				</tbody>
			</table>
		</div>
	</div>
@endsection