<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('public/backend/dist/img/avatar04.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()['name'] }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">

			<li class="treeview">
          <a href="#">
          	<i class="fa fa-user-circle-o"></i> <span>Quản lý người dùng</span>
          	<span class="pull-right-container">
          		<i class="fa fa-angle-left pull-right"></i>
          	</span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="{{ route('backend.user.create') }}"><i class="fa fa-user-plus"></i> Thêm người dùng</a></li>
          	<li><a href="{{ route('backend.user.index') }}"><i class="fa fa-list-alt"></i> Danh sách người dùng</a></li>
          </ul>
      </li>

      <li class="treeview">
      	<a href="#">
      		<i class="fa fa-server"></i>
      		<span>Quản lý danh mục</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu">
      		<li><a href="{{ route('backend.categories.index') }}"><i class="fa fa-circle-o"></i> Menu</a></li>
      		<li><a href="{{ route('backend.categories.create') }}"><i class="fa fa-circle-o"></i> Thêm Menu/danh mục</a></li>
      	</ul>
      </li>
      {{--<li class="treeview">--}}
          {{--<a href="#">--}}
          	{{--<i class="fa fa-desktop"></i> <span>Quản lý Slide</span>--}}
          	{{--<span class="pull-right-container">--}}
          		{{--<i class="fa fa-angle-left pull-right"></i>--}}
          	{{--</span>--}}
          {{--</a>--}}
          {{--<ul class="treeview-menu">--}}
          	{{--<li><a href=""><i class="fa fa-user-plus"></i> Slide</a></li>--}}
          	{{--<li><a href=""><i class="fa fa-list-alt"></i> Thêm slide</a></li>--}}
          {{--</ul>--}}
      {{--</li>--}}
      <li class="treeview">
      	<a href="#">
      		<i class="glyphicon glyphicon-shopping-cart"></i> <span>Quản lý sản phẩm</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu">
      		<li><a href=""><i class="fa fa-circle-o"></i> Quản lý dòng sản phẩm</a></li>
      		<li><a href=""><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
      		<li><a href=""><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
      	</ul>
      </li>
      <li class="treeview">
      	<a href="#">
      		<i class="glyphicon glyphicon-list-alt"></i> <span>Quản lý tin tức</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu">
      		<li><a href=""><i class="fa fa-circle-o"></i> Danh sách tin tức</a></li>
      		<li><a href=""><i class="fa fa-circle-o"></i> Thêm mới tin tức</a></li>
      	</ul>
      </li>
      <li>
      	<a href="">
      		<i class="glyphicon glyphicon-wrench"></i> <span>Quản lý cấu hình</span>
      	</a>
      </li>
      <li class="treeview">
      	<a href="#">
      		<i class="glyphicon glyphicon-shopping-cart"></i> <span>Quản lý đơn hàng</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu">
      		<li><a href=""><i class="fa fa-circle-o"></i> Danh sách đơn hàng</a></li>
      		<li><a href=""><i class="fa fa-circle-o"></i> Danh sách tỉnh thành hỗ trợ</a></li>
      	</ul>
      </li>
      <li>
      	<a href="">
      		<i class="fa fa-dedent"></i> <span>Quản lý liên hệ</span>
      	</a>
      </li>
  </ul>
  </section>
</aside>