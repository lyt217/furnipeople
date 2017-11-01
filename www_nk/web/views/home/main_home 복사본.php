<!DOCTYPE html>
<!--[if IE 8]> <html lang="ko" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="ko" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="ko"> <!--<![endif]-->
<head>
    <title>퍼니피플</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="가구 및 중고가구 거래, 가구정보, 그리고 사람들의 가구 커뮤니티">
    <meta name="keywords" content="가구,수입가구,중고가구,가구거래,가구리뷰,의자,책상,쇼파,침대,화장대,식탁,수납장,서랍,인테리어">
    <meta name="author" content="furnipeople">
    <meta name="naver-site-verification" content="884d13ec39588eb42298ace49903dd05a2b6551f" />
    <meta name="google-site-verification" content="TtRglQx-zYirwvEefoWGUtm6-RxFd4Wg2QB67D0lA7A" />

    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/furni-header.css">
    <link rel="stylesheet" href="/assets/css/furni-footer.css">

    <link rel="stylesheet" href="/assets/plugins/animate.css">
	<link rel="stylesheet" href="/assets/plugins/line-icons-pro/allpro-icons.css">
    <!--link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css"-->
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets/css/furni-job.css">
    <link rel="stylesheet" href="/assets/css/furni-color.css">
    <link rel="stylesheet" href="/assets/css/furni-dark.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/masonry.css">
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

    <!--=== Job이미지와 통검색 ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <form class="form-inline" action="/web/market/productfind/search/all/srh" method="post" accept-charset="utf-8">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 no-padding">
                            <div class="input-group">
                                <!--span class="input-group-addon"><i class="fa fa-tag"></i></span-->
                                <input type="text" name="find_word" placeholder="가구검색어" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_region" class="form-control">
                                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp; 지역 &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="서울">서울시</option>
                                    <option value="경기">경기도</option>
                                    <option value="부산">부산시</option>
                                    <option value="대구">대구시</option>
                                    <option value="인천">인천시</option>
                                    <option value="세종">세종시</option>
                                    <option value="대전">대전시</option>
                                    <option value="광주">광주시</option>
                                    <option value="울산">울산시</option>
                                    <option value="경북">경북</option>
                                    <option value="경남">경남</option>
                                    <option value="강원">강원</option>
                                    <option value="충북">충북</option>
                                    <option value="충남">충남</option>
                                    <option value="전북">전북</option>
                                    <option value="전남">전남</option>
                                    <option value="제주">제주도</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_gagu" class="form-control">
                                    <option value="">&nbsp;&nbsp; 가구별 &nbsp;&nbsp;</option>
                                    <option value="의자">의자</option>
                                    <option value="책상">책상</option>
                                    <option value="쇼파">쇼파</option>
                                    <option value="침대">침대</option>
                                    <option value="화장대">화장대</option>
                                    <option value="식탁">식탁</option>
                                    <option value="수납장">수납장</option>
                                    <option value="서랍">서랍</option>
                                    <option value="인테리어 제품">인테리어 제품</option>
                                    <option value="기타 가구들">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_brand" class="form-control">
                                    <option value="">&nbsp;&nbsp; 브랜드 &nbsp;&nbsp;</option>
                                    <option value="시디즈">시디즈</option>
                                    <option value="퍼시스">퍼시스</option>
                                    <option value="이케아">이케아</option>
                                    <option value="일룸">일룸</option>
                                    <option value="템퍼">템퍼</option>
                                    <option value="에이스침대">에이스침대</option>
                                    <option value="시몬스침대">시몬스침대</option>
                                    <option value="까사미아">까사미아</option>
                                    <option value="듀오백">듀오백</option>
                                    <option value="한샘">한샘</option>
                                    <option value="현대리바트">현대리바트</option>
                                    <option value="Hermanmiller">Hermanmiller</option>
                                    <option value="Knoll">Knoll</option>
                                    <option value="Humanscale">Humanscale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_price" class="form-control">
                                    <option value="">&nbsp;&nbsp; 가격 &nbsp;&nbsp;</option>
                                    <option value="a">0~10만원</option>
                                    <option value="b">10~20만원</option>
                                    <option value="c">20~30만원</option>
                                    <option value="d">30~40만원</option>
                                    <option value="e">40~50만원</option>
                                    <option value="f">50만원이상</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn-u btn-block btn-u-red">가구검색</button>
                    </div>
                    </form>
                </div>
                <div class="margin-bottom-5"></div>
                <div class="row">
                    <form class="form-inline" action="/web/user/shopfind/search/all/srh" method="post" accept-charset="utf-8">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 no-padding">
                            <div class="input-group">
                                <!--span class="input-group-addon"><i class="fa fa-tag"></i></span-->
                                <input type="text" name="find_word" placeholder="업체검색어" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_region" class="form-control">
                                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp; 지역 &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="서울">서울시</option>
                                    <option value="경기">경기도</option>
                                    <option value="부산">부산시</option>
                                    <option value="대구">대구시</option>
                                    <option value="인천">인천시</option>
                                    <option value="세종">세종시</option>
                                    <option value="대전">대전시</option>
                                    <option value="광주">광주시</option>
                                    <option value="울산">울산시</option>
                                    <option value="경북">경북</option>
                                    <option value="경남">경남</option>
                                    <option value="강원">강원</option>
                                    <option value="충북">충북</option>
                                    <option value="충남">충남</option>
                                    <option value="전북">전북</option>
                                    <option value="전남">전남</option>
                                    <option value="제주">제주도</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_gagu" class="form-control">
                                    <option value="">&nbsp;&nbsp; 가구별 &nbsp;&nbsp;</option>
                                    <option value="의자">의자</option>
                                    <option value="책상">책상</option>
                                    <option value="쇼파">쇼파</option>
                                    <option value="침대">침대</option>
                                    <option value="화장대">화장대</option>
                                    <option value="식탁">식탁</option>
                                    <option value="수납장">수납장</option>
                                    <option value="서랍">서랍</option>
                                    <option value="인테리어 제품">인테리어 제품</option>
                                    <option value="기타 가구들">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_brand" class="form-control">
                                    <option value="">&nbsp;&nbsp; 브랜드 &nbsp;&nbsp;</option>
                                    <option value="시디즈">시디즈</option>
                                    <option value="퍼시스">퍼시스</option>
                                    <option value="이케아">이케아</option>
                                    <option value="일룸">일룸</option>
                                    <option value="템퍼">템퍼</option>
                                    <option value="에이스침대">에이스침대</option>
                                    <option value="시몬스침대">시몬스침대</option>
                                    <option value="까사미아">까사미아</option>
                                    <option value="듀오백">듀오백</option>
                                    <option value="한샘">한샘</option>
                                    <option value="현대리바트">현대리바트</option>
                                    <option value="Hermanmiller">Hermanmiller</option>
                                    <option value="Knoll">Knoll</option>
                                    <option value="Humanscale">Humanscale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_bizkind" class="form-control">
                                    <option value="">&nbsp;&nbsp; 업종별 &nbsp;&nbsp;</option>
                                    <option value="가구판매점">가구판매점</option>
                                    <option value="인테리어">인테리어</option>
                                    <option value="기타">기타</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn-u btn-block btn-u-red">업체검색</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--=== End Job이미지와 통검색 ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
            <!-- Begin Left Sidebar Menu Box (Type 1) -->
            <div class="col-md-2">

				<div class="bg-light rounded">
					<div class="headline"><h2 class="heading-sm" style="font-size: 16px;"> Notice &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/service/notice/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
					<div class="hrefcolor-side" style="font-size: 12px;">
						<?php if ($noticeTopx) {
						foreach ($noticeTopx as $talk): ?>
						<a href="/web/service/notice/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a>
						<hr style="margin: 3px 0;">
						<?php endforeach; } ?>
					</div>
				</div>
				<div class="margin-bottom-15"></div>

				<div class="panel panel-sea rounded mobile-hide">
					<div class="panel-heading"><h4 class="panel-title" style="font-size: 14px;">Furni Talk</h4></div>
	                <ul class="list-group sidebar-nav-v1">
	                    <li class="list-group-item rounded-top">
	                        <a href="/web/talk/best/search/all/no">&nbsp; Furni Talk Best</a>
	                    </li>
	                    <li class="list-group-item rounded-top">
	                        <a href="/web/talk/free/search/all/no">&nbsp; Furni Talk</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/talk/qna/search/all/no">&nbsp; Furni Q&amp;A</a>
	                    </li>
	                    <li class="list-group-item">
							<a href="/web/talk/review/search/all/no">&nbsp; Furni Review</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/talk/info/search/all/no">&nbsp; Furni Info</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/talk/photo/search/all/no">&nbsp; Furni Photos</a>
	                    </li>
	                    <li class="list-group-item rounded-bottom">
	                        <a href="/web/talk/advertise/search/all/no">&nbsp; Furni Ads</a>
	                    </li>
	                </ul>
				</div>

				<div class="panel panel-red rounded mobile-hide">
					<div class="panel-heading"><h4 class="panel-title" style="font-size: 14px;">Furni Market</h4></div>
	                <ul class="list-group sidebar-nav-v1">
	                    <li class="list-group-item rounded-top">
	                        <a href="/web/market/product/search/all/no">&nbsp; 전체</a>
	                    </li>
	                    <li class="list-group-item">
							<a href="/web/market/product/search/chair/no">&nbsp; <i class="icon-education-150"></i>&nbsp; 의자</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/desk/no">&nbsp; <i class="icon-furniture-018"></i>&nbsp; 책상</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/sofa/no">&nbsp; <i class="icon-furniture-012"></i>&nbsp; 쇼파</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/bed/no">&nbsp; <i class="icon-furniture-020"></i>&nbsp; 침대</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/dresser/no">&nbsp; <i class="icon-furniture-092"></i>&nbsp; 화장대</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/dtable/no">&nbsp; <i class="icon-furniture-008"></i>&nbsp; 식탁</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/closet/no">&nbsp; <i class="icon-furniture-011"></i>&nbsp; 수납장</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/drawer/no">&nbsp; <i class="icon-furniture-031"></i>&nbsp; 서랍</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/market/product/search/interior/no">&nbsp; <i class="icon-furniture-068"></i>&nbsp; 인테리어 제품</a>
	                    </li>
	                    <li class="list-group-item rounded-bottom">
	                        <a href="/web/market/product/search/etc/no">&nbsp; <i class="icon-furniture-088"></i>&nbsp; 기타 가구들</a>
	                    </li>
	                </ul>
				</div>

				<div class="panel panel-primary rounded mobile-hide">
					<div class="panel-heading"><h4 class="panel-title" style="font-size: 14px;">Furni Friends</h4></div>
	                <ul class="list-group sidebar-nav-v1">
	                    <li class="list-group-item rounded-top">
	                        <a href="/web/user/shopfind/search/a/no">&nbsp; 가구판매점</a>
	                    </li>
	                    <li class="list-group-item">
	                        <a href="/web/user/shopfind/search/b/no">&nbsp; 인테리어</a>
	                    </li>
	                    <li class="list-group-item rounded-bottom">
	                        <a href="/web/user/shopfind/search/d/no">&nbsp; 기타</a>
	                    </li>
	                </ul>
				</div>

            </div>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 bg-light hrefcolor-basic">

                <div class="row margin-bottom-15">
                    <div class="col-md-4 sm-margin-bottom-20">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Furni Talk Best &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/best/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
						<p>
                            <?php if ($talkbestTopx) {
                            foreach ($talkbestTopx as $talk): ?>
                            <a href="/web/talk/<?php echo substr($talk->taklboard_name, 4) . '/article/' . $talk->talkboard_id; ?>"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                            <?php endforeach; } ?>
						</p>
                    </div>
                    <div class="col-md-4 sm-margin-bottom-20">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Furni Talk &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/free/search/all/no" title="전체보기"><i class="fa  fa-plus"></i></a></div>
						<p>
                            <?php if ($talkfreeTopx) {
                            foreach ($talkfreeTopx as $talk): ?>
							<a href="/web/talk/free/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
							<?php endforeach; } ?>
						</p>
                    </div>
                    <div class="col-md-4">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Furni Q&amp;A &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/qna/search/all/no" title="전체보기"><i class="fa  fa-plus"></i></a></div>
						<p>
                            <?php if ($talkqnaTopx) {
                            foreach ($talkqnaTopx as $talk): ?>
                            <a href="/web/talk/qna/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                            <?php endforeach; } ?>
						</p>
                    </div>
				</div><!--/row-->

                <div class="row margin-bottom-15">
                    <div class="col-md-4 sm-margin-bottom-20">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Furni Review &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/review/search/all/no" title="전체보기"><i class="fa  fa-plus"></i></a></div>
						<p>
                            <?php if ($talkreviewTopx) {
                            foreach ($talkreviewTopx as $talk): ?>
                            <a href="/web/talk/review/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                            <?php endforeach; } ?>
						</p>
                    </div>
                    <div class="col-md-4 sm-margin-bottom-20">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Furni Info &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/info/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
						<p>
                            <?php if ($talkinfoTopx) {
                            foreach ($talkinfoTopx as $talk): ?>
                            <a href="/web/talk/info/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                            <?php endforeach; } ?>
						</p>
                    </div>
                    <div class="col-md-4">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Furni Photos &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/photo/search/all/no" title="전체보기"><i class="fa  fa-plus"></i></a></div>
						<p>
                            <?php if ($talkphotoTopx) {
                            foreach ($talkphotoTopx as $talk): ?>
                            <a href="/web/talk/photo/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                            <?php endforeach; } ?>
						</p>
                    </div>
				</div><!--/row-->

                <div class="row margin-bottom-15">
                    <div class="col-md-4 sm-margin-bottom-20">
                        <div class="headline"><h2 class="heading-sm"> &nbsp; Furni Ads &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/advertise/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
                        <p>
                            <?php if ($talkadverTopx) {
                            foreach ($talkadverTopx as $talk): ?>
                            <a href="/web/talk/advertise/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                            <?php endforeach; } ?>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <img src="/static/webimage/main-event-default.jpg" class="img-responsive" alt="런칭 이벤트">
                    </div>
                </div><!--/row-->

                <div class="row margin-bottom-15">
                    <div class="col-md-12">
                        <div class="headline"><h2 class="heading-sm"> &nbsp; Furni Market &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/market/product/search/all/no" title="마켓전체보기"><i class="fa  fa-plus"></i></a></div>
                        <!-- 등록 상품 -->
                        <div class="blog_masonry_3col">
                            <div class="grid-boxes">

                                <?php if ($productTopx) {
                                foreach ($productTopx as $product): ?>
                                <div class="grid-boxes-in">
                                    <a href="/web/market/product/detail/<?php echo $product->id; ?>/rtnlist" title="상세보기">
                                        <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                        <img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                                    </a>
                                    <div class="grid-boxes-caption text-center">
                                        <h3><?php echo $product->prodtitle; ?></h3>
                                        <p><?php echo number_format($product->sellprice) . '원 / ' . $product->prodstate; ?></p>
                                    </div>
                                </div>
                                <?php endforeach; } ?>

                            </div>
                        </div>
                        <!-- End 등록 상품 -->
                    </div>
                </div><!--/row-->

            </div>
            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">

				<ul class="list-unstyled blog-photos">
					<li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
					<li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
				</ul>

				<div class="panel panel-dark-blue rounded mobile-hide">
					<div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">베스트 게시글</h5></div>
					<div class="panel-body hrefcolor-side" style="line-height: 1.2;">
            <?php if ($talkbestTopx) {
            foreach ($talkbestTopx as $talk): ?>
            <a href="/web/talk/<?php echo substr($talk->taklboard_name, 4) . '/article/' . $talk->talkboard_id; ?>"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
            <?php endforeach; } ?>
					</div>
				</div>

				<div class="panel panel-dark-blue rounded mobile-hide">
					<div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">최근 본 글</h5></div>
					<div class="panel-body hrefcolor-side" style="line-height: 1.2;">
                        <?php if ($this->input->cookie('recent_talks')) {
                            $recent_talks = unserialize($this->input->cookie('recent_talks'));
                            for ($i = 0; $i < count($recent_talks); $i++) { ?>
                                <a href="<?php echo $recent_talks[$i]['link']; ?>"><?php echo $recent_talks[$i]['title']; ?></a>
                                <hr style="margin: 4px 0;">
                        <?php } } ?>
					</div>
				</div>

				<div class="panel panel-dark-blue rounded mobile-hide">
					<div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">최근 본 가구</h5></div>
					<div class="panel-body hrefcolor-side" style="line-height: 1.2;">
                        <?php if ($this->input->cookie('recent_goods')) {
                            $recent_goods = unserialize($this->input->cookie('recent_goods'));
                            for ($i = 0; $i < count($recent_goods); $i++) { ?>
                                <a href="<?php echo $recent_goods[$i]['link']; ?>"><strong><?php echo $recent_goods[$i]['title']; ?></strong><br>
                                <?php echo $recent_goods[$i]['brand'] . ' | ' . $recent_goods[$i]['price']; ?>원</a>
                                <hr style="margin: 4px 0;">
                        <?php } } ?>
					</div>
				</div>

                <div class="panel panel-dark-blue rounded mobile-hide">
                    <div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">최근 본 업체</h5></div>
                    <div class="panel-body hrefcolor-side" style="line-height: 1.2;">
                        <?php if ($this->input->cookie('recent_shop')) {
                            $recent_shop = unserialize($this->input->cookie('recent_shop'));
                            for ($i = 0; $i < count($recent_shop); $i++) { ?>
                                <a href="<?php echo $recent_shop[$i]['link']; ?>"><strong><?php echo $recent_shop[$i]['title']; ?></strong><br>
                                <?php echo $recent_shop[$i]['info']; ?></a>
                                <hr style="margin: 4px 0;">
                        <?php } } ?>
                    </div>
                </div>

            </div>
            <!-- End Right Sidebar Menu -->

        </div>
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
<script type="text/javascript" src="/assets/plugins/masonry/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
	App.init();

    //───────────────────────────────────
    var $container = $('.grid-boxes');
    var gutter = 20;
    var min_width = 200;
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector: '.grid-boxes-in',
            gutterWidth: gutter,
            isAnimated: true,
            columnWidth: function( containerWidth ) {
                var box_width = (((containerWidth - 2*gutter)/3) | 0);
                if (box_width < min_width) {
                    box_width = (((containerWidth - gutter)/2) | 0);
                }
                if (box_width < min_width) {
                    box_width = containerWidth;
                }
                $('.grid-boxes-in').width(box_width);
                return box_width;
              }
        });
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
