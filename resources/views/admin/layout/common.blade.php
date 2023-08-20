<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>College Management System</title>
    <link rel="shortcut icon" href="{{url('/')}}/admin/images/favicon.png" />
    <link rel="stylesheet" href="{{url('/')}}/admin/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{url('/')}}/admin/vendors/css/vendor.bundle.base.css">
    @stack('link')
    <link rel="stylesheet" href="{{url('/')}}/admin/css/vertical-layout-light/style.css">
    @stack('custom-css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.theme-setting')
            @include('admin.layout.right-sidebar')
            @include('admin.layout.left-sidebar')
            @yield('main')
        </div>
    </div>
    <script src="{{url('/')}}/admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{url('/')}}/admin/js/off-canvas.js"></script>
    <script src="{{url('/')}}/admin/js/hoverable-collapse.js"></script>
    <script src="{{url('/')}}/admin/js/template.js"></script>
    <script src="{{url('/')}}/admin/js/settings.js"></script>
    <script src="{{url('/')}}/admin/js/todolist.js"></script>
    @stack('custom-js')
</body>

</html>
