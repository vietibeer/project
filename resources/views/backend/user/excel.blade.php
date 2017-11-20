<h1>Danh sách người dùng</h1>
<table id="example1" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Tài khoản</th>
			<th>Họ và tên</th>
			<th>Email</th>
			<th>Ngày sinh</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach($users as $user)

		<tr>
			<td>{!! $user['name'] !!}</td>
			<td>{!! $user['fullname'] !!}</td>
			<td>{!! $user['email'] !!}</td>
			<td>{!! !empty($user['birthday']) ? date('d-m-Y',strtotime($user['birthday'])) : '' !!}</td>
		</tr>
		@endforeach
	</tbody>
</table>