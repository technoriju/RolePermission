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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if($errors->any())
           toastr.option = { "closeButton" : true, "progressBar" : true }
           toastr.error("{{$errors->first()}}");
        @endif
        @if(Session::has('success'))
           toastr.option = { "closeButton" : true, "progressBar" : true, "opacity" : 1 }
           toastr.success("{{session('success')}}");
        @endif
        @if(Session::has('error'))
           toastr.option = { "closeButton" : true, "progressBar" : true }
           toastr.error("{{session('error')}}");
        @endif
        @if(Session::has('warning'))
           toastr.option = { "closeButton" : true, "progressBar" : true }
           toastr.warning("{{session('warning')}}");
        @endif
        $('#toast-container').addClass('nopacity');
 </script>
    @stack('custom-js')
</body>

</html>
