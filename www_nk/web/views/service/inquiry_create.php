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
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

    <link rel="stylesheet" href="/assets/css/furni-job.css">
    <link rel="stylesheet" href="/assets/css/furni-color.css">
    <link rel="stylesheet" href="/assets/css/furni-dark.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <style>
    .sky-form fieldset {
        background: #f4f2f2;
    }
    </style>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function recaptchaGrant() {
            var submitBtn = document.getElementById('submit-btn');
            submitBtn.removeAttribute('disabled');
        };
        function recaptchaDeny() {
            var submitBtn = document.getElementById('submit-btn');
            submitBtn.setAttribute('disabled');
            submitBtn.innerHTML = '스팸방지 확인을 클릭하세요';
        };
    </script>
</head>

<body>

<div class="wrapper">
    <!--=== Header ===-->
    <div class="header-v3 header-sticky">
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">

                <!-- 브랜드로고와 모바일 네비게이션 -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="/web">
                        <img id="logo-header" src="/static/webimage/logo-top.png" alt="퍼니피플">
                    </a>
                </div>

                <!-- 네비게이션 -->
                <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                    <div class="container">
                        <ul class="nav navbar-nav">

                            <!-- Top Menu Item -->
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">가구시장 <small>| Furni Market</small></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/web/market/product/search/all/no">전체</a></li>
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
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">가구이야기 <small>| Furni Talk</small></a>
                                <ul class="dropdown-menu">
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

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>건의 및 제휴</h2>
            </div>
        </div>
    </div>
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">
        <div class="row margin-bottom-30">
            <div class="col-md-1">
            </div>
            <div class="col-md-6 mb-margin-bottom-30">
                <div class="headline"><h3> &nbsp; 건의 및 제휴 &nbsp; </h3></div>
                <div class="margin-bottom-40"></div>

                <?php if ($this->session->flashdata('inquiry_msg')) { ?>
                <div class="contex-bg margin-bottom-20">
                    <p class="bg-primary"><?php echo $this->session->flashdata('inquiry_msg'); ?></p>
                </div>
                <?php } ?>

                <form class="sky-form contact-style" method="post" action="/web/service/furni/inquiry">
                    <fieldset class="no-padding">
                        <label>이름 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-7 col-md-offset-0">
                                <div>
                                    <input type="text" name="uname" class="form-control" value="<?php echo set_value('uname'); ?>" maxlength="10">
                                    <?php echo form_error('uname', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <label>연락처 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-7 col-md-offset-0">
                                <div>
                                    <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" maxlength="40">
                                    <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <label>이메일 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-7 col-md-offset-0">
                                <div>
                                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" maxlength="30">
                                    <?php echo form_error('email', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <label>내용 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-11 col-md-offset-0">
                                <div>
                                    <textarea rows="8" name="proposal" class="form-control"><?php echo set_value('proposal'); ?></textarea>
                                    <?php echo form_error('proposal', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <p><button type="submit" class="btn-u" id="submit-btn" disabled="disabled" style="width: 100px;"> 보내기 </button></p>

                        <div class="margin-top-20">
                            <div class="g-recaptcha" data-callback="recaptchaGrant" data-expired-callback="recaptchaDeny" data-sitekey="6LfQxBYTAAAAADX8lYuo2G3kJNpskehG4E1pY-rQ"></div>
                        </div>
                    </fieldset>
                </form>
            </div><!--/col-md-9-->

            <div class="col-md-4">
                <!-- Google Map -->
                <div id="map" class="map map-box map-box-space1 margin-bottom-40">
                </div><!---/map-->
                <!-- End Google Map -->

                <!-- Contacts -->
                <div class="headline"><h2>Contacts</h2></div>
                <ul class="list-unstyled who margin-bottom-30">
                    <li><i class="fa fa-home"></i>서울시 강남구 대치동 896-13 4층</li>
                    <!--li><a href="#"><i class="fa fa-envelope"></i>info@example.com</a></li-->
                    <!--li><i class="fa fa-phone"></i>02-3463-5511</li-->
                    <li><i class="fa fa-globe"></i>http://www.furnipeople.com</li>
                </ul>
                <!-- End Contacts -->

                <!-- Business Hours -->
                <div class="headline"><h2>Business Hours</h2></div>
                <ul class="list-unstyled margin-bottom-30">
                    <li><strong>Everyday:</strong> 10am to 8pm</li>
                </ul>
                <!-- End Business Hours -->
            </div>
            <div class="col-md-1">
            </div>
        </div><!--/row-->

    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== Footer ===-->
    <div id="footer-v6" class="footer-v6">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline terms-menu">
                            <li><a href="/web/service/furni/people">회사소개</a></li>
                            <li><a href="/web/service/furni/servicepolicy">이용약관</a></li>
                            <li><a href="/web/service/furni/privatepolicy">개인정보 취급방침</a></li>
                            <li><a href="/web/service/furni/inquiry">건의 및 제휴</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 sm-margin-bottom-20"><img src="/static/webimage/logo-foot.png" class="margin-left-10"></div>
                    <div class="col-md-9">
                        <span class="margin-right-20">회사명 : 퍼니피플</span><span class="margin-right-20">개인정보관리책임자 : 박표인</span><br />
                        <span class="margin-right-20">서울시 강남구 대치동 896-13 4층</span><span class="margin-right-20">대표이사 : 박표인</span><span>사업자번호 : 818-02-00671</span><br />
                        <div class="col-md-8 text-center"><small> COPYRIGHT© 2015 FURNIPEOPLE.COM &nbsp; ALL RIGHTS RESERVED</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Footer ===-->
</div><!--/wrapper-->

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<!--script type="text/javascript" src="/assets/js/app.min.js"></script-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/assets/plugins/gmap/gmap.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    //App.init();

    map = new GMaps({
        div: '#map',
        scrollwheel: false,
        lat: 37.50302654925896,
        lng: 127.05778660282249
    });
    var marker = map.addMarker({
        lat: 37.50302654925896,
        lng: 127.05778660282249,
        title: '퍼니피플'
    });

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
