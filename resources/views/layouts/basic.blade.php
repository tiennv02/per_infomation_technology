<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>forstar Admin</title>

    {{--============================ STYLESHEET ==============================--}}
            <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('css/font-awesome/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('css/ionicons/ionicons.min.css') !!}">

    <!-- Select2 -->
    {{--<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2.min.css') }}">--}}

    <!-- Bootstrap Color Picker -->
    {{--<link rel="stylesheet" href="{{ asset('assets/js/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">--}}

    {{--<link rel="stylesheet" href="{{ asset('assets/js/plugins/datepicker/bootstrap-datepicker.css') }}">--}}

    <!-- jvectormap -->
{{--    <link rel="stylesheet" href="{{ asset('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">--}}
    <!-- Theme style -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('css/admin/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('css/skins/skin-blue.css') !!}">

    <!-- bootstrap tables CSS -->
    {{--<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.css') }}">--}}

    {{--<link rel="stylesheet" href="{{ elixir('assets/css/app.css') }}">--}}


</head>

<body class="hold-transition login-page">

  <!-- Content -->
  @yield('content')



</body>

</html>
