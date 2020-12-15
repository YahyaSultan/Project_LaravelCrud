<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to Iqra University | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('Styles/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Styles/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('Styles/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Styles/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('Styles/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <a ><b>New Admin</b>Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

  <form action="{{route('user.register')}}" method="post" enctype="multipart/form-data">
    @csrf

    @if (session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif

      <div class="form-group has-feedback">
          <label> Fist Name :</label>
        <input type="Name" class="form-control" placeholder="Name" name="user_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('user_name'))
        <div class="text-danger">{{ $errors->first('user_name') }}</div>
    @endif
      </div>
      <div class="form-group has-feedback">
          <label > New password: </label>
        <input type="password" class="form-control" placeholder="Password" name="user_password" id="myInput">

        {{-- <input style="margin-top: 15px" type="checkbox" onclick="myFunctionVisible()">Show Password --}}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('user_password'))
        <div class="text-danger">{{ $errors->first('user_password') }}</div>
    @endif
      </div>
      <div class="form-group has-feedback">
        <label > Confirm Password </label>
      <input type="password" class="form-control" placeholder="Password" name="confirm_password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      @if ($errors->has('confirm_password'))
      <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
  @endif
    </div>
      <div class="form-group has-feedback">
        <label > Contact Number: </label>
      <input type="text" class="form-control" placeholder="Contact" name="phone_number">
      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      @if ($errors->has('phone_number'))
      <div class="text-danger">{{ $errors->first('phone_number') }}</div>
  @endif
    </div>
    <div class="form-group has-feedback">
        <label > Your Image: </label>
        <input type="file" name="user_image" class="form-control">
        <span class="glyphicon glyphicon-picture form-control-feedback"></span>

        @if ($errors->has('user_image'))
        <span class="text-danger">{{ $errors->first('user_image') }}</span>
        @endif

    </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            {{-- <label>
              <input type="checkbox"> Remember Me
            </label> --}}
          </div>
        </div>
        <!-- /.col -->
        <div class="text-center" style="padding: 10px">
          <button type="submit" class="btn btn-success ">Save</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      {{-- <p>- OR -</p> --}}
      {{-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a> --}}
    </div>
    <!-- /.social-auth-links -->

    {{-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });

    function myFunctionVisible() {
    var x = document.getElementById('myInput');
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>

<!-- jQuery 3 -->
<script src="{{asset('Styles/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('Styles/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('Styles/plugins/iCheck/icheck.min.js')}}"></script>

</body>


</html>


