<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>VietStar</title>
    <link rel="shortcut icon" href="img/admin/admin.png">

    <!-- Bootstrap Core, social CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/agency.css" type="text/css">
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/social-buttons.css" type="text/css">
    <!--notifications_start-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap-notify.css" type="text/css">
    <link rel="stylesheet" href="css/notifications/alert_bangtidy.css" type="text/css">
    <link rel="stylesheet" href="css/notifications/alert_blackgloss.css" type="text/css">
    <!--notifications_end-->
    <!-- Custom Fonts Start-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- Custom Fonts End-->
    <!--custom css-->
    <link rel="stylesheet" href="css/common.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <!-- jQuery -->
    <script src="js/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="js/jquery/scrollreveal.min.js"></script>
    <script src="js/jquery/jquery.easing.min.js"></script>
    <script src="js/jquery/jquery.fittext.js"></script>
    <!--notifications_start-->
    <script src="js/bootstrap/bootstrap-notify.js"></script>
    <!--notifications_end-->
    <!-- Custom Theme JavaScript -->
    <script src="js/jquery/creative.js"></script>
    <script src="js/main.js"></script>
    <script src="js/common.js"></script>
</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top menu-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll font-size-16"
               href="#page-top"><span class="glyphicon glyphicon-send"></span><span>&nbsp;&nbsp;VIETSTAR</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#home">Trang chủ</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Dịch vụ</a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio">Sản phẩm</a>
                </li>
                <li>
                    <a class="page-scroll" href="#partner">Đối tác</a>
                </li>
                {{--<li>--}}
                {{--<a class="page-scroll" href="#about">Thông tin</a>--}}
                {{--</li>--}}
                <li>
                    <a class="page-scroll" href="#team">Team</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Liên hệ</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h2><span>Chào mừng đến với VietStar</span></h2>
            <hr>
            <p>Chúng Tôi luôn lắng nghe Bạn nói!</p>
            <a href="#home" class="btn btn-primary btn-xl page-scroll">Xem thêm</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Chúng Tôi cung cấp những gì Bạn cần</h2>
                <hr class="light">
                <p class="text-faded">Chúng Tôi luôn tâm niệm lấy uy tín, sự tín nghiệm của Khách hàng là điều quan
                    trọng nhất trong định hướng phát triển của mình.
                    Với sự làm việc không ngừng nghỉ, nhằm cung cấp những sản phẩm chất lượng, giá cả hợp lý, đem lại sự
                    trải nghiệm và hài lòng nhất cho Khách hàng</p>
                <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Hãy bắt đầu!</a>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Dịch vụ</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>

                    <h3>Phát triển Website</h3>

                    <p class="text-muted">Xây dựng giải pháp, phát triển hệ thống Website đa dạng, trên nhiều nền tảng
                        công nghệ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>

                    <h3>Phát triển Application</h3>

                    <p class="text-muted">Phát triển các ứng dụng mobile nhanh chóng và luôn đem lại sự trải nghiệm thú
                        vị và tiện ích cho Khách hàng</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>

                    <h3>Tư vấn Khách hàng</h3>

                    <p class="text-muted">Tư vấn định hướng phát triển, giải pháp, cung cấp dịch vụ tối ưu chi phí và
                        thời gian cho Khách hàng</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-heart text-primary sr-icons"></i>

                    <h3>Dịch vụ chăm sóc Khách hàng sau bán hàng</h3>

                    <p class="text-muted">You have to make your websites with love these days!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Sản phẩm</h2>

                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            </div>
        </div>
        <div class="row">
            @foreach($lstProjectInfo as $iProjectInfo)
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal{{$iProjectInfo->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/{{$iProjectInfo->image}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$iProjectInfo->name}}</h4>
                        <p class="text-muted">{{$iProjectInfo->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="no-padding" id="partner">
    <div class="container-fluid">
        <div class="row no-gutter popup-gallery">
            <aside class="clients">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Đối tác</h2>
                            {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <img src="img/logos/nut.png" class="img-responsive img-centered img-team-area-120p"
                                 alt="">
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <img src="img/logos/taxigroup.png"
                                 class="img-responsive img-centered img-team-area-120p" alt="">
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <img src="img/logos/logo-hnhotel.png"
                                 class="img-responsive img-centered img-team-area-120p" alt="">
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <img src="img/logos/logo-namcuong.png"
                                 class="img-responsive img-centered img-team-area-120p" alt="">
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <img src="img/logos/kenh14.PNG" class="img-responsive img-centered img-team-area-120p"
                                 alt="">
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <img src="img/logos/phunutoday.png" style="height: 60px"
                                 class="img-responsive img-centered img-team-area-120p" alt="">
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Team</h2>

                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/team/1.jpg" class="img-responsive img-circle img-team-area" alt="">
                    <h4>Nguyễn Khánh</h4>

                    <p class="text-muted">Lead Designer</p>
                    <ul class="list-inline social-buttons">
                        {{--<li><a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--</li>--}}
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        {{--<li><a href="#"><i class="fa fa-linkedin"></i></a>--}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/team/2.jpg" class="img-responsive img-circle img-team-area" alt="">
                    <h4>Nguyễn Văn Tiến</h4>

                    <p class="text-muted">Lead Marketer</p>
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/team/3.jpg" class="img-responsive img-circle img-team-area" alt="">
                    <h4>Lê Hoài</h4>

                    <p class="text-muted">Lead Developer</p>
                    <ul class="list-inline social-buttons">
                        {{--<li><a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--</li>--}}
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        {{--<li><a href="#"><i class="fa fa-linkedin"></i></a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">Cảm giác được hỗ trợ, chia sẻ và lắng nghe, mang tới giải pháp mới cho khách
                    hàng,
                    và sự hài lòng của khách hàng khi sử dụng sản phẩm của
                    VietStar chính là nguồn động viên vô giá dành cho chúng Tôi.

                    <br>Chúng Tôi luôn cố gắng từng giây, từng phút để phục vụ Khách hàng.</p>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Liên hệ</h2>

                <h3 class="section-subheading text-muted">Chúng Tôi sẽ sớm liên lạc với Bạn ngay khi nhận được thông
                    báo!.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="contact-area-left color-white">
                    <p>Hãy liên hệ với Chúng Tôi để nhận được sự hỗ trợ, giải pháp và tư vấn sản phẩm</p>
                    <address class="single-address">

                        <p>Email: tiennv02@gmail.com</p>

                        <p>Phone: (84) 8689 02705</p>
                    </address>
                </div>
            </div>
            <div class="col-lg-8">
                <form name="sentMessage" id="contactForm" novalidate="">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <input name="name" type="text" class="form-control" placeholder="Họ và Tên *"
                                       required="">

                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <input name="email" type="email" class="form-control" placeholder="Email *"
                                       required="" >

                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <input name="phone" type="tel" class="form-control" placeholder="Số điện thoại *"
                                       required="">

                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <textarea name="content" class="form-control" placeholder="Nội dung *" required=""
                                          cols="80" rows="5"></textarea>

                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <a class="btn btn-default" name="btnSendContact">Gửi thông tin</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright © Tien Nguyen - 2014</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><a href="#home" class="text-decoration-none"><p><span class="glyphicon glyphicon-home"></span>
                                Về đầu trang</p></a>
                    </li>
                    <li><a href="#contact" class="text-decoration-none"><p><span
                                        class="glyphicon glyphicon-envelope"></span> Liên hệ</p></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Portfolio Modals -->
<!-- Use the modals below to showcase details about your portfolio projects! -->
@foreach($lstProjectInfo as $iProjectInfo)
        <!-- Portfolio Modal -->
<div class="portfolio-modal modal fade" id="portfolioModal{{$iProjectInfo->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h2>{{$iProjectInfo->name}}</h2>
                        <p class="item-intro text-muted">{{$iProjectInfo->description}}</p>
                        <img class="img-responsive img-centered" src="img/portfolio/{{$iProjectInfo->image_large}}"
                             alt="{{$iProjectInfo->name}}">
                        {!! $iProjectInfo->content!!}
                        <br/>
                        <br/>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>
                            Close Project
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--notifications_start-->
<div class='notifications bottom-right'></div>
<!--notifications_end-->
<!--loading panel_start-->
<div class='loadingPanel' style="display: none">
    <div class="loadingPanel-div">
        <img width="32" height="32"
             alt="Loading"
             src="img/ajax-loader.gif"/>
        Loading ..
    </div>
</div>
<!--loading panel_end-->
</body>

</html>
