@extends('backend.master')

@section('content')
<section class="content-header">
	<h1>
		Trang quản trị
		<small>Control panel</small>
	</h1>
	<ul class="breadcrumb">
		<li>
			<a href="#"><i class="fa fa-dashboard"></i> Home</a>
		</li>
		<li class="active">Trang quản trị</li>
	</ul>
</section>
<section class="content">
Chào mừng đến với trang quản trị
{{ Auth::check() }}
</section>
@endsection