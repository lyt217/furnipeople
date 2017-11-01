<!DOCTYPE html>
<html lang="ko" style="min-height: 100% !important; margin: auto; display: table;">
<head>
    <title>퍼니피플</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/newstyle.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/style.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/furni-header.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/furni-footer.css"> -->

    <!-- <link rel="stylesheet" href="/assets/plugins/animate.css"> -->
    <!-- <link rel="stylesheet" href="/assets/plugins/line-icons-pro/allpro-icons.css"> -->
    <!-- <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css"> -->

    <!-- <link rel="stylesheet" href="/assets/css/furni-job.css">
    <link rel="stylesheet" href="/assets/css/furni-color.css">
    <link rel="stylesheet" href="/assets/css/furni-dark.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/custom.css"> -->
</head>

    <body style="height: 100% !important; max-width:1080px; display: table-cell;">
<!--=== Header ===-->
<div class="header-v3 header-sticky">
    <!-- Navbar -->

    <div class="navbar navbar-default mega-menu col-lg-11" role="navigation">
        <div style="margin-left:0px; margin-right:0px;">

            <!-- 브랜드로고와 모바일 네비게이션 -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="/web" style="padding-top:0px; padding-bottom:0px; padding-left:0px; padding-right:0px; margin:15px 10px 0px;">
                    <img id="logo-header" src="/static/webimage/logotop.png" alt="퍼니피플" style=" width="auto" height="100%"">
                </a>
            </div>

            <!-- 네비게이션 -->
            <div id="navbar" class="collapse navbar-collapse mega-menu navbar-responsive-collapse ">
                <div>
                    <ul class="nav navbar-nav">

                      <li  style="padding-top:15px;">
                        <a class="nav-item nav-link " href="/web/market/product/search/all/no" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Bootstrap');">중고마켓</a>
                      </li>
                      <li  style="padding-top:15px;" >
                        <a class="nav-item nav-link active" href="#" onclick="alert('배송신청 기능은 곧 업데이트 될 예정입니다');">배송신청</a>
                      </li>
                      <li  style="padding-top:15px;">
                        <a class="nav-item nav-link " href="#" onclick="alert('폐기신청 기능은 곧 업데이트 될 예정입니다');">폐기신청</a>
                      </li>
                      <li style="padding-top:15px;">
                        <a class="nav-item nav-link" href="/web/talk/whole/search">게시판</a>
                      </li>

                      <li style="padding-top:15px;">
                        <form class="search_layer" class="position:absolute; right:0px !important;" action="/web/home/unitysearch" method="post" accept-charset="utf-8" >
                          <input class="keyword col-lg-10 col-md-10 col-sm-10 col-xs-10" type="text" id="keyword" name="keyword" placeholder="">
                          <input type="image" src="/static/webimage/search_btn3.png" alt="검색">
                        </form>
                      </li>

                    </ul>

                </div><!--/end container-->
                <div class="col-lg-3"></div>
            </div
            <div class="col-lg-1"></div><!--/navbar-collapse-->
        </div>
    </div>
    <!-- End Navbar -->
</div>
<div class="col-lg-1">  </div>
<!--=== End Header ===-->


    <!--=== End Header ===-->
