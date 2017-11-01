<!DOCTYPE html>
<!--[if IE 8]> <html lang="ko" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="ko" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="ko"> <!--<![endif]-->
<head>
    <title>퍼니피플</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/furni-header.css">
    <link rel="stylesheet" href="/assets/css/furni-footer.css">

    <link rel="stylesheet" href="/assets/plugins/animate.css">
    <link rel="stylesheet" href="/assets/plugins/line-icons-pro/allpro-icons.css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">


    <link rel="stylesheet" href="/assets/css/furni-job.css">
    <link rel="stylesheet" href="/assets/css/furni-color.css">
    <link rel="stylesheet" href="/assets/css/furni-dark.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>

<body>

<div class="wrapper">
    <!--=== Header ===-->
    <div class="header-v3 header-sticky">
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
              <!-- 통합검색창 -->
              <div style="width:100%; height:50px; padding-left:200px; margin-top:25px;">
                <form  action="/web/home/unitysearch" method="post" accept-charset="utf-8" id="unitysearch">
                <div class="col-sm-1 no-padding">
                  <div class="input-group">
                    <select  class="form-control" id="searchindex" name="searchindex">
                      <option value="unity">통합검색</option>
                      <option value="furni">가구검색</option>
                      <option value="talk">Talk 검색</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-7 no-padding" style="backgroud:#FF0000;">
                  <div class="input-group2">
                    <input type="text" placeholder="검색어를 입력해주세요" class="form-control" id="keyword" name="keyword"></input>
                  </div>
                </div>
                <div class="col-md-2">
                  <button id="searchgo" class="btn-u btn-block btn-u-red">검색</button></form>
                </div>
              </div>
              <!-- 브랜드로고와 모바일 네비게이션 -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="fa fa-bars"></span>
                  </button>
                  <a class="navbar-brand" href="/web" style="margin-top:-82px;">
                      <img id="logo-header" src="/static/webimage/logo-top.png" alt="퍼니피플">
                  </a>
              </div>


                <!-- 네비게이션 -->
                <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">


                    <div class="container">

                        <ul class="nav navbar-nav">
                            <li>
                              <a href="/web/market/product/register" style="font-size: 13px; color:#000000;"><div style="border:3px solid:#000; height:100%; ">내 물건 판매하기</div></a>
                            </li>
                            <!-- Top Menu Item -->
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">가구시장 <small>| Furni Market</small></a>
                                <ul class="dropdown-menu">
                                  <li><a href="/web/market/product/search/all/no">전체</a></li>
                                  <?php if($kindcode){ ?>
                                    <?php foreach($kindcode as $code):?>
                                      <?php if($code->id != 1){ ?>
                                      <li><a href="/web/market/product/search/<?php echo $code->sindex ?>/no">&nbsp; <i class="<?php echo $code->icon ?>"></i>&nbsp; <?php echo $code->name ?></a></li>
                                      <?php } ?>

                                  <?php endforeach;
                                  } else {?>

                                    <li><a href="/web/market/product/search/chair/no"><i class="icon-education-150"></i>&nbsp; 의자</a></li>
                                    <li><a href="/web/market/product/search/desk/no"><i class="icon-furniture-018"></i>&nbsp; 책상</a></li>
                                    <li><a href="/web/market/product/search/sofa/no"><i class="icon-furniture-012"></i>&nbsp; 쇼파</a></li>
                                    <li><a href="/web/market/product/search/bed/no"><i class="icon-furniture-020"></i>&nbsp; 침대</a></li>
                                    <li><a href="/web/market/product/search/dresser/no"><i class="icon-furniture-092"></i>&nbsp; 화장대</a></li>
                                    <li><a href="/web/market/product/search/dtable/no"><i class="icon-furniture-008"></i>&nbsp; 식탁</a></li>
                                    <li><a href="/web/market/product/search/closet/no"><i class="icon-furniture-011"></i>&nbsp; 수납장</a></li>
                                    <li><a href="/web/market/product/search/drawer/no"><i class="icon-furniture-031"></i>&nbsp; 서랍</a></li>
                                    <li><a href="/web/market/product/search/interior/no"><i class="icon-furniture-068"></i>&nbsp; 인테리어 제품</a></li>
                                    <li><a href="/web/market/product/search/etc/no"><i class="icon-furniture-088"></i>&nbsp; 기타 가구들</a></li>
                                  <?php }?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="/web/talk/all" class="dropdown-toggle">가구이야기 <small>| Furni Talk</small></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/web/talk/whole/search">전체</a></li>
                                    <li><a href="/web/talk/best/search/all/no">Furni Talk Best</a></li>
                                    <li><a href="/web/talk/free/search/all/no">Furni Talk</a></li>
                                    <li><a href="/web/talk/qna/search/all/no">Furni Q&amp;A</a></li>
                                    <li><a href="/web/talk/review/search/all/no">Furni Review</a></li>
                                    <li><a href="/web/talk/info/search/all/no">Furni Info</a></li>
                                    <li><a href="/web/talk/photo/search/all/no">Furni Photos</a></li>
                                    <li><a href="/web/talk/advertise/search/all/no">Furni Ads</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">가구업체 <small>| Furni Friends</small></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/web/user/shopfind/search/all">전체</a></li>
                                    <li><a href="/web/user/shopfind/search/a/no">가구판매점</a></li>
                                    <li><a href="/web/user/shopfind/search/b/no">인테리어</a></li>
                                    <li><a href="/web/user/shopfind/search/d/no">기타</a></li>
                                </ul>
                            </li>
                            <!-- End Top Menu Item -->
                            <?php if ($this->session->has_userdata('user_id')) { ?>
                            <!-- Topbar-로그인된회원 -->
                            <li>
                                <div class="topbar">
                                    <ul class="loginbar">
                                        <?php if ($this->session->userdata('group_mkind') == '기업회원') { ?>
                                        <li><a href="/web/user/shop/home/<?php echo $this->session->userdata('user_id'); ?>">내가게</a></li>
                                        <li class="topbar-devider"></li>
                                        <li><a href="/web/user/signup/updateprovider">회원정보</a></li>
                                        <?php } else { ?>
                                        <li><a href="/web/user/signup/updatemember">회원정보</a></li>
                                        <?php } ?>
                                        <li class="topbar-devider"></li>
                                        <li><a href="/web/user/membership/logout">로그아웃</a></li>
                                    </ul>
                                </div>
                                <div style="padding-left: 40px;">
                                    <ul class="list-inline badge-lists badge-icons">
                                        <li>
                                            <?php echo $this->session->userdata('user_nickname'); ?>님 &nbsp; <a href="/web/market/chattpaper/mychatt"><i class="fa fa-envelope color-dark"></i></a><span class="badge badge-yellow rounded-x"><?php echo $this->session->userdata('msgalert_box'); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php } else { ?>
                            <!-- Topbar-게스트 -->
                            <li>
                                <div class="topbar">
                                    <ul class="loginbar">
                                        <li><a href="/web/user/signup/createmember">회원가입</a></li>
                                        <li class="topbar-devider"></li>
                                        <li><a href="/web/user/membership">로그인</a></li>
                                    </ul>
                                </div>
                                <div style="padding-left: 40px;">
                                    <ul class="list-inline badge-lists badge-icons">
                                        <li>
                                            <i class="fa fa-envelope color-dark"></i><span class="badge badge-yellow rounded-x">0</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            <!-- End Topbar -->
                        </ul>

                    </div><!--/end container-->
                </div><!--/navbar-collapse-->
            </div>
        </div>
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->
