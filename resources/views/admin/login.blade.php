<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin forStar | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('css/font-awesome/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('css/ionicons/ionicons.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('css/admin/AdminLTE.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! asset('plugins/iCheck/square/blue.css') !!}">
    <!--Custom css-->
    <link rel="stylesheet" href="{!! asset('css/common.css" type="text/css') !!}">
    <link rel="stylesheet" href="{!! asset('css/main.css" type="text/css') !!}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b> forStar
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập vào phiên làm việc của Bạn</p>
        <!-- notifications start -->
        @include('utils.notifications')
                <!-- notifications end -->
        <form action="{!! url('/') !!}/auth/login" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                {!! $errors->first('email', '<span class="alert-warning"><i class="fa fa-times"></i> :message</span>') !!}
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                {!! $errors->first('password', '<span class="alert-warning"><i class="fa fa-times"></i> :message</span>') !!}
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="memory"> Ghi nhớ mật khẩu
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập
                bằng
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập
                bằng
                Google+</a>
        </div>
        <!-- /.social-auth-links -->

        {{ HTML::link('/auth/resetPassword', 'Tôi không nhớ mật khẩu?', array('class' => 'text-center'), true)}}
        <br>
        {{ HTML::link('/auth/register', 'Tạo tài khoản đăng nhập mới', array('class' => 'text-center'), true)}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

{{--============================ JAVASCRIPT ==============================--}}
        <!-- jQuery 2.2.3 -->
<script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}" type="text/javascript"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('js/bootstrap/bootstrap.min.js') !!}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{!! asset('plugins/iCheck/icheck.min.js') !!}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
