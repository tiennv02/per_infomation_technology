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
        <div class="row">
            <div class="">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">{{ trans('front/register.title') }}</h2>
                    <hr>
                    {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form']) !!}

                    <div class="row padding-2p-0p">
                        {{ Form::label(trans('front/register.pseudo')) }}
                        {{ Form::text('name', null , array('class' => 'form-control')) }}
                        {!! $errors->first('name', '<span class="alert-warning"><i class="fa fa-times"></i> :message</span>') !!}
                    </div>
                    <div class="row padding-2p-0p">
                        {{ Form::label(trans('front/register.email')) }}
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                        {!! $errors->first('email', '<span class="alert-warning"><i class="fa fa-times"></i> :message</span>') !!}
                    </div>
                    <div class="row padding-2p-0p">
                        {{ Form::label(trans('front/register.password')) }}
                        {{ Form::password('password',  array('class' => 'form-control')) }}
                        {!! $errors->first('password', '<span class="alert-warning"><i class="fa fa-times"></i> :message</span>') !!}
                    </div>
                    <div class="row padding-2p-0p">
                        {{ Form::label(trans('front/register.confirm-password')) }}
                        {{ Form::password('password_confirmation',  array('class' => 'form-control')) }}
                        {!! $errors->first('password_confirmation', '<span class="alert-warning"><i class="fa fa-times"></i> :message</span>') !!}
                    </div>

                    <div class="row padding-2p-0p">
                        <div class="col-xs-5"></div>
                        {!! Form::submit(trans('front/form.send'), ['col-lg-12']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
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
