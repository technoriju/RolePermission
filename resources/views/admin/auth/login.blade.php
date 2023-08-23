<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{url('/')}}/admin/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="{{url('/')}}/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('/')}}/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('/')}}/admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{url('/')}}/admin/images/logo-dark.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              @if(session('success') !== null)
                 <div class="alert alert-success">{{session('success')}}</div>
              @endif
              @if(session('error') !== null)
                 <div class="alert alert-danger">{{session('error')}}</div>
              @endif
              @if($errors->any())
                <div class="alert alert-danger">{{$errors->first()}}</div>
              @endif
              <form class="pt-3" action="{{route('manage.loginForm')}}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{route('manage.register')}}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{url('/')}}/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('/')}}/admin/js/off-canvas.js"></script>
  <script src="{{url('/')}}/admin/js/hoverable-collapse.js"></script>
  <script src="{{url('/')}}/admin/js/template.js"></script>
  <script src="{{url('/')}}/admin/js/settings.js"></script>
  <script src="{{url('/')}}/admin/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
