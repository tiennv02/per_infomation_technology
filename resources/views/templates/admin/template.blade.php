<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin STAR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{--============================ STYLESHEET ==============================--}}
            <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('css/font-awesome/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('css/ionicons/ionicons.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('css/admin/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('css/skins/_all-skins.min.css') !!}">
    <!--notifications_start-->
    <link rel="stylesheet" href="{!! asset('css/bootstrap/bootstrap-notify.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/notifications/alert_bangtidy.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/notifications/alert_blackgloss.css') !!}">
    <!--notifications_end-->
    <link rel="stylesheet" href="{!! asset('css/common.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/main.css') !!}">
    {{--============================ JAVASCRIPT ==============================--}}
            <!-- jQuery 2.2.3 -->
    <script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}" type="text/javascript"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{!! asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') !!}" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{!! asset('js/bootstrap/bootstrap.min.js') !!}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{!! asset('plugins/sparkline/jquery.sparkline.min.js') !!}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <!--notifications_start-->
    <script src="{!! asset('js/bootstrap/bootstrap-notify.js') !!}" type="text/javascript"></script>
    <!--notifications_end-->
    <script src="{!! asset('js/app/app.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/common.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/main.js') !!}" type="text/javascript"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="background-color: #ecf0f5;">
    <header class="main-header">
        <!-- Logo -->
        <a href="{!! url('/admin') !!}" class="logo">
            <span class="logo-mini"><b>Star</b></span>
            <span class="logo-lg"><b>Admin</b> STAR</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>--}}
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src={!! asset('img/user4-128x128.jpg') !!} class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-bell-o"></i>--}}
                        {{--<span class="label label-warning">10</span>--}}
                        {{--</a>--}}
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <li class="dropdown tasks-menu">
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-flag-o"></i>--}}
                        {{--<span class="label label-danger">9</span>--}}
                        {{--</a>--}}
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src={!! asset('img/user2-160x160.jpg') !!} alt="UserImage" class="user-image">
                            <span class="hidden-xs">Nguyễn Văn Tiến</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src={!! asset('img/user2-160x160.jpg') !!} class="img-circle" alt="User Image">

                                <p>
                                    Star Admin
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar" style="background-color: #ecf0f5;">
        <section class="sidebar" style="background-color: #222d32;border-bottom-right-radius: 15px">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{!! asset('img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Nguyễn Văn Tiến</p>
                    {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header" style="color:white; background: #222d32">Menu</li>
                <li>
                    <a href="{!! url('/admin') !!}">
                        <i class="fa fa-th"></i> <span>Widgets</span>
                    </a>
                </li>
                <li>
                    <a href="{!! url('/admin/moduls/contacts') !!}">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    </a>
                </li>
                <li><a href="{!! url('/admin/moduls/projectInfo') !!}"><i class="fa fa-book"></i>
                        <span>Documentation</span></a></li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        @yield('moduls')
    </div>
    </section>
</div>
<!--notifications_start-->
<div class='notifications bottom-right'></div>
<!--notifications_end-->
<!--loading panel_start-->
<div class='loadingPanel' style="display: none">
    <div class="loadingPanel-div">
        <img width="32" height="32"
             alt="Loading"
             src="{!! asset('img/ajax-loader.gif') !!}"/>
        Loading ..
    </div>
</div>
<!--loading panel_end-->
</body>
</html>
