@extends('backend.master')

@section('content-header')
	<section class="content-header">
		<h1>
			Danh sách người dùng
			<small>Control panel</small>
		</h1>
		<ul class="breadcrumb ">
			<li>
				<a href="{{ url('') }}"><i class="fa fa-dashboard"></i> Home</a>
			</li>
			<li class="active">Danh sách người dùng</li>
		</ul>
	</section>
@endsection
@section('content')

<div class="content">
	<style type="text/css">
		.right{
			float:right;
		}
	</style>

	<div class="box box-success">
		<div class="box-header">
			<h5 class="right">Số lượng: <strong class="label label-warning"><?php if (!empty($users)) {
	echo count($users);
} else {
	echo '0';
}
?></strong></h5>
			<a href="{{ route('backend.user.create') }}" class="btn btn-primary btn-sm" title="Thêm người dùng"><i class="fa fa-user-plus"></i> Thêm</a>
			<a href="{{ route('backend.user.export') }}" class="btn btn-success btn-sm" title="export excel"><i class="fa  fa-file-excel-o"></i> Excel</a>
		</div>
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th width="5%"><input type="checkbox" name="toggle" id="checkall" onclick="toggle(this)"></th>
						<th>STT </th>
						<th>Họ và tên</th>
						<th>Email</th>
						<th>Avatar</th>
						<th>Ngày sinh</th>
						<th>Giới tính</th>
						<!-- <th>Ngày khởi tạo</th>
						<th>Ngày sửa đổi</th> -->
						<th width="15%">Chức năng</th>
					</tr>
				</thead>

				<tbody>
					@foreach($users as $user)

					<tr>
						<td><input type="checkbox" name="check[]" value="" class="check"></td>
						<td>{{  $user['user_id']  }} </td>
						<td>{!! $user['user_fullname'] !!}</td>
						<td>{!! $user['email'] !!}</td>
						<td><img src="{!! url('public/backend/images/user/'.$user['user_image']) !!}" class=" img-responsive" style="width: 55px; height:35px;"></td>
						<td>{!! !empty($user['birthday']) ? date('d-m-Y',strtotime($user['birthday'])) : '' !!}</td>
						<td>{{  $user['sex']  }} </td>
						<!-- <td>{!! !empty($user['created_at']) ? date('d-m-Y | H:i:s',strtotime($user['created_at'])) : '' !!}</td>
						<td>{!! !empty($user['updated_at']) ? date('d-m-Y | H:i:s',strtotime($user['updated_at'])) : '' !!}</td> -->
						<td>
							<a href="{{ url('backend/user/edit/'.$user['user_id']) }}" class="btn btn-success btn-sm" title="Chỉnh sửa người dùng">
								<span class="fa fa-edit"></span> Sửa
							</a>
							<a onclick="aclick(this)" id="delete" data-href="{{ url('backend/user/delete/'.$user['user_id']) }}" class="btn btn-danger btn-sm" title="Xóa người dùng" >
								<span class="fa fa-remove"></span> Xóa
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		function aclick(a){

			bootbox.confirm({
				title:"Xác nhận",
				message:"<strong>Bạn muốn xóa!</strong>",
				size: 'small',
				buttons: {
			        confirm: {
			            label: 'Yes',
			            className: 'btn-success'
			        },
			        cancel: {
			            label: 'No',
			            className: 'btn-danger'
			        }
			    },
			    backdrop: true,
			    callback:function(result){
					if(result) window.location = $(a).attr('data-href');
				}
			});
		}
	</script>
</div>
@endsection