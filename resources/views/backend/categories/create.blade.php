@extends('backend.master')

@section('content-header')
	<section class="content-header">
		<h1>
			Thêm người dùng
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
		th{
			width:20%;
		}
		textarea{
			max-width:330px;
			max-height:120px;
		}
		.right{
			float:right;
		}
	</style>

	<div class="box box-default">
		<div class="box-header">
			<a href="{{ route('backend.categories.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left"></i> Quay lại</a>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group {{ !empty($errors->first('cat_name')) ? 'has-error' : ''}}">
					<label class="control-label col-md-2" for="cat_name">Tên danh mục:<small></small></label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="cat_name" id="cat_name" value="{!! old('cat_name') !!}" placeholder="Nhập tên danh mục">
						<span class="error">{{ $errors->first('cat_name') }}</span>
					</div>
				</div>
				<div class="form-group {{ !empty($errors->first('cat_img')) ? 'has-error' : ''}}">
					<label class="control-label col-md-2" for="cat_img">Image:</label>
					<div class="col-md-4">
						<input type="file" class="form-control" name="cat_img" id="cat_img">
						<span class="error">{{ $errors->first('cat_img') }}</span>
					</div>
				</div>
				<div class="form-group {{ !empty($errors->first('cat_detail')) ? 'has-error' : ''}}">
					<label class="control-label col-md-2" for="detail">Chi tiết:</label>
					<div class="col-md-4"> 
						<textarea rows="4" cols="50" name="cat_detail" id="cat_detail" placeholder="Your enter here..."></textarea>
						<span class="error">{{ $errors->first('cat_detail') }}</span>
					</div>
				</div>
				<div class="form-group {{ !empty($errors->first('parent_id')) ? 'has-error' : ''}}">

					<label class="control-label col-md-2" for="parent_id">Parent ID:</label>
					<div class="col-md-4">
						<input type="number" class="form-control" id="parent_id" name="parent_id" value="{!! old('parent_id') !!}" placeholder="Parent ID">
						<span class="error">{{ $errors->first('parent_id') }}</span>
					</div>

				</div>
				<div class="form-group"> 	
					<div class="col-md-offset-2 col-md-4">
						<input type="submit" name="save" class="btn btn-primary btn-sm" value="Create">
						<input type="reset" name="reset" value="Nhập lại" class="btn btn-default btn-sm">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection