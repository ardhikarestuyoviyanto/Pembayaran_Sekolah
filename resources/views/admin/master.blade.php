<!DOCTYPE html>
<html lang="en">
@include('partisi/head')
@include('partisi/js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('partisi/navbar')
@include('partisi/sidebar_admin')

@yield('content')

@include('partisi/footer')
</div>
</body>
</html>
