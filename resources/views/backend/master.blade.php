<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang quản trị admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('public/backend/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/dist/css/skins/skin-blue.min.css') }}">
    <script src="{{ asset('public/backend/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('backend.layout.header')
    @include('backend.layout.main_sidebar')

    <div class="content-wrapper">
        @yield('content-header')
        @yield('content')
    </div>

    @include('backend.layout.footer')
    @include('backend.layout.control_sidebar')
    <div class="control-sidebar-bg"></div>
</div>

<script src="{{ asset('public/backend/bootstrap/js/bootbox.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/backend/dist/js/app.min.js') }}"></script>
<script src="{{ asset('public/backend/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/fastclick/fastclick.js') }}/"></script>
<script>
    bootbox.alert({
        title:"Thông báo",
        message: "{{ session('thongbao') }}",
        size: 'small',
        buttons: {
            ok: {
                label: 'OK',
                className: 'btn-success'
            }
        },
        backdrop: true
    });
</script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
