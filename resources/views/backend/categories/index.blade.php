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
			<h5 class="right">Số lượng: <strong class="label label-warning"><?php if(!empty($categories)) echo count($categories); else echo '0';  ?></strong></h5>
			<a href="{{ route('backend.categories.create') }}" class="btn btn-primary btn-sm" title="Thêm người dùng"><i class="fa fa-user-plus"></i> Thêm</a>
		</div>
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th width="5%"><input type="checkbox" name="toggle" id="checkall" onclick="toggle(this)"></th>
						<th>STT </th>
						<th>Categories</th>
						<th>Detail</th>
						<th>Images</th>
						<th>Parent_id</th>
						<th width="15%">Chức năng</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($categories as $category)

					<tr>
						<td><input type="checkbox" name="check[]" value="" class="check"></td>
						<td>{{  $category->cat_id  }} </td>
						<td>{!! $category->cat_name !!}</td>
						<td>{!! $category->cat_detail !!}</td>
						<td>{!! $category->cat_img !!}</td>
						<td>{!! $category->parent_id !!}</td>
						{{--<td>{!! !empty($category['created_at']) ? date('d-m-Y',strtotime($category['created_at'])) : '' !!}</td>--}}
						<td>
							<a href="{{ url('backend/categories/edit/'.$category->cat_id) }}" class="btn btn-success btn-sm" title="Chỉnh sửa người dùng">
								<span class="fa fa-edit"></span> Sửa
							</a>
							<a onclick="aclick(this)" id="delete" data-href="{{ url('backend/categories/delete/'.$category->cat_id) }}" class="btn btn-danger btn-sm" title="Xóa người dùng">
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