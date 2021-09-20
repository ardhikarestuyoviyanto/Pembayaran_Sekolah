<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Users</title>

  <link href="{{asset('assets/img/user.png')}}" rel="icon">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login </b>Users</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="Login" method="post">
        {{csrf_field()}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <select name="role" id="" class="form-control" required>
              <option value="">- Pilih Role -</option>
              <option value="admin">- Administrator -</option>
              <option value="siswa">- Siswa -</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
              <i class="fas fa-user-tag"></i>
              </div>
            </div>
          </div>
            <div class="row">
                <div class="col-8">
                    
                </div>
                <div class="col-4">
                    {{-- <button type="submit" class="btn btn-primary btn-block submit">Sign In</button> --}}
                    <a href="{{url('admin/dashboard')}}" type="button" class="btn btn-primary btn-block submit">Sign In</a>
                </div>
            </div>
      </form>

    </div>
  </div>
</div>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>

</body>
</html>
