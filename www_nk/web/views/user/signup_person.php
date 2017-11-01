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
	<link rel="stylesheet" href="/assets/plugins/line-icons-pro/styles.css">
    <!--link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css"-->
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
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">가구시장 <small>| Furni Market</small></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/web/market/product/search/all/no">전체</a></li>
                                    <li><a href="/web/market/product/search/chair/no"><i class="icon-education-150"></i>&nbsp; 의자</a></li><!--span aria-hidden="true" class="icon-furniture-004"></span-->
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
                <h2>환영합니다. 지금 퍼니피플 회원에 가입하세요.</h2>
                <p>회원간 가구를 거래하고, 쪽지를 주고 받으실 수 있습니다.</p>               
            </div>
        </div>
    </div>    
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
            <!-- Begin Left Sidebar Menu Box -->
            <div class="col-md-2 mobile-hide">
                                                                          
            </div>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->            	               
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; 회원가입 &nbsp; </h3> &nbsp; * 는 필수입력</div>
                <div class="margin-bottom-15"></div>
                
                <!-- Tab -->
                <div class="tab-v1">
                    <ul class="nav nav-justified nav-tabs">
                        <li class="active"><a href="#person" data-toggle="tab">개인회원</a></li>
                        <li><a href="/web/user/signup/createprovider">기업회원</a></li><!-- data-toggle="tab" 제거 -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="person">
							<div class="margin-bottom-10"></div>

                        <!-- 개인 회원가입 탭 -->  <!-- form-horizontal 을 사용할때만 라벨에서 control-label 를 사용함 --> 
		                <form class="form-horizontal" role="form" action="/web/user/signup/createmember" method="post" accept-charset="utf-8">		                			              
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label for="user-name" class="control-label space-left-20">*이름</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="user_name" class="form-control" id="user-name" value="<?php echo set_value('user_name'); ?>" maxlength="10" placeholder="실명을 입력하세요">
			                        <?php echo form_error('user_name', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
							</div><!-- 12가 안되어도 row로 한행을 잡아놓은 상태임 -->
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*닉네임</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="nick_name" class="form-control" value="<?php echo set_value('nick_name'); ?>" maxlength="15" placeholder="글 작성시 작성자로 사용됩니다">			                        
			                        <?php echo form_error('nick_name', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                    			                    
			                </div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*이메일</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" maxlength="30" placeholder="실제 이메일로 로그인됩니다">			                        
			                        <?php echo form_error('email', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                    			                    
			                </div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*비밀번호</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="password" name="pass_word1" class="form-control" maxlength="12" placeholder="문자와 숫자를 조합한 6자이상">			                        
			                        <?php echo form_error('pass_word1', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                    			                    
			                </div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*비밀번호확인</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="password" name="pass_word2" class="form-control" maxlength="12" placeholder="비밀번호를 한번 더 입력하세요">			                        
			                        <?php echo form_error('pass_word2', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                    			                    
			                </div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">연락처</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" maxlength="14" placeholder="999-9999-9999 형식">
			                        <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                   				                    			                    
			                </div>
			                <?php //echo validation_errors('<div class="alert alert-warning fade in">', '</div>'); ?>
							<hr />
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-5 checkbox">
									<label><input type="checkbox" name="contract1" value="1" <?php echo set_checkbox('contract1', '1'); ?>>이용약관에 동의합니다. <button onclick="javascript:window.open('/web/service/furni/servicepolicy');" class="btn-u btn-u-xs btn-u-light-grey" type="button">전체보기</button></label>																		
								</div>						
								<div class="col-md-6 checkbox">
									<label><input type="checkbox" name="contract2" value="1" <?php echo set_checkbox('contract2', '1'); ?>>개인정보취급방침에 동의합니다. <button onclick="javascript:window.open('/web/service/furni/privatepolicy');" class="btn-u btn-u-xs btn-u-light-grey" type="button">전체보기</button></label>																		
								</div>								
							</div>
							<?php echo form_error('contract1', '<div class="alert alert-danger fade in margin-top-20">', '</div>'); ?>
							<?php echo form_error('contract2', '<div class="alert alert-danger fade in">', '</div>'); ?>
							<div class="margin-bottom-30"></div>
							<div class="row">
								<div class="col-md-4"></div>														                
								<div class="col-md-4"><button class="btn-u btn-block btn-u-dark-blue" type="submit">가입하기</button></div>
							</div>																	                
		                </form>		                		                	                             
						<!-- End 개인 회원가입 탭 -->
                        </div>
                                                
                        <div class="tab-pane fade in" id="company">
						<!-- 기업 회원가입 탭 -->
						<!-- End 기업 회원가입 탭 -->                                                                   
                        </div>
                        
                    </div>
                </div>
                <!-- End Tab -->                
                                    
            </div>
            <!-- End Content -->
            
            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">
                                            
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

<!-- 글로벌 필수 -->
<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 플러그인 가동 -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/app.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();
        
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