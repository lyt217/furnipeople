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
                <h2>내가 작성한 코멘트입니다.</h2>                
            </div>
        </div>
    </div>    
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
            <!-- Begin Left Sidebar Menu Box -->
            <div class="col-md-2 mobile-hide">
                
                <div class="bg-light rounded">                        
                    <div class="headline"><h2 class="heading-sm" style="font-size: 16px;"> Notice &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/service/notice/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>                                                  
                    <div class="hrefcolor-side" style="font-size: 12px;">
                        <?php if ($this->session->has_userdata('notice_html')) {
                            $notice = $this->session->userdata('notice_html');
                            for ($i = 0; $i < count($notice); $i++) {
                                echo $notice[$i]['href'];
                                echo $notice[$i]['divide'];
                            }                        
                        } ?>                        
                    </div>
                </div>
                <div class="margin-bottom-15"></div>
                
                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-talk">
                    <!-- Furni Talk -->
                    <li class="list-group-item list-toggle rounded active">
                        <a data-toggle="collapse" data-parent="#sidebar-talk" href="#collapse-talk" class="sidebar-furni rounded">Furni Talk</a>                        
                        <ul id="collapse-talk" class="collapse in">
                            <li><a href="/web/talk/best/search/all/no">Furni Talk Best</a></li>
                            <li><a href="/web/talk/free/search/all/no">Furni Talk</a></li>
                            <li><a href="/web/talk/qna/search/all/no">Furni Q&amp;A</a></li>
                            <li><a href="/web/talk/review/search/all/no">Furni Review</a></li>
                            <li><a href="/web/talk/info/search/all/no">Furni Info</a></li>
                            <li><a href="/web/talk/photo/search/all/no">Furni Photos</a></li>
                            <li><a href="/web/talk/advertise/search/all/no">Furni Ads</a></li>
                        </ul>
                    </li>
                    <!-- End Furni Talk -->
                </ul>
                
                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-market">
                    <!-- Furni Market -->
                    <li class="list-group-item list-toggle rounded">
                        <a data-toggle="collapse" data-parent="#sidebar-market" href="#collapse-market" class="sidebar-furni rounded">Furni Market</a>
                        <ul id="collapse-market" class="collapse">
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
                    <!-- End Furni Market -->
                </ul>
                
                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-friend">
                    <!-- Furni Friends -->
                    <li class="list-group-item list-toggle rounded">
                        <a data-toggle="collapse" data-parent="#sidebar-friend" href="#collapse-friend" class="sidebar-furni rounded">Furni Friends</a>
                        <ul id="collapse-friend" class="collapse">
                            <li><a href="/web/user/shopfind/search/a/no">가구판매점</a></li>
                            <li><a href="/web/user/shopfind/search/b/no">인테리어</a></li>                            
                            <li><a href="/web/user/shopfind/search/d/no">기타</a></li>
                        </ul>
                    </li>
                    <!-- End Furni Friends -->
                </ul>                                                             
            </div>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3">                
                
                <div class="headline"><h3> &nbsp; 내가 쓴 글 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>
                
                <!-- Tab -->
                <div class="tab-v1">
                    <ul class="nav nav-justified nav-tabs">
                        <li><a href="/web/user/mytalk/index">작성한 토크</a></li>
                        <li class="active"><a href="#ment" data-toggle="tab">작성한 코멘트</a></li>
                    </ul>                      
                                                            
                    <div class="tab-content">                        
                        <div class="tab-pane fade in" id="talk">
                        <!-- 작성한 토크 탭 -->                                                                                 
                        <!-- End 작성한 토크 탭 -->
                        </div>
                        
                        <!-- 작성한 코멘트 탭 -->                        
                        <div class="tab-pane fade in active" id="ment">
                            <div class="margin-bottom-10"></div>

                            <?php if ($mentfreeTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Talk &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/free/no">전체보기</a></span></h2>                                
                            </div>                                                                                
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mentfreeTopx as $ment): ?>
                                    <tr>                                                      
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>                                        
                                        <td class="text-right"><a href="/web/talk/free/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>                                                                                                                                                                         

                            <?php if ($mentqnaTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Q&amp;A &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/qna/no">전체보기</a></span></h2>                                
                            </div>                                                                                
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mentqnaTopx as $ment): ?>
                                    <tr>                                                      
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>                                        
                                        <td class="text-right"><a href="/web/talk/qna/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>                                                                                                                                                                         

                            <?php if ($mentreviewTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Review &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/review/no">전체보기</a></span></h2>                                
                            </div>                                                                                
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mentreviewTopx as $ment): ?>
                                    <tr>                                                      
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>                                        
                                        <td class="text-right"><a href="/web/talk/review/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>                                                                                                                                                                         

                            <?php if ($mentinfoTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Info &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/info/no">전체보기</a></span></h2>                                
                            </div>                                                                                
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mentinfoTopx as $ment): ?>
                                    <tr>                                                      
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>                                        
                                        <td class="text-right"><a href="/web/talk/info/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>                                                                                                                                                                         

                            <?php if ($mentphotoTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Photos &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/photo/no">전체보기</a></span></h2>                                
                            </div>                                                                                
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mentphotoTopx as $ment): ?>
                                    <tr>                                                      
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>                                        
                                        <td class="text-right"><a href="/web/talk/photo/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>                                                                                                                                                                         

                            <?php if ($mentadverTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Ads &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/advertise/no">전체보기</a></span></h2>                                
                            </div>                                                                                
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mentadverTopx as $ment): ?>
                                    <tr>                                                      
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>                                        
                                        <td class="text-right"><a href="/web/talk/advertise/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>                                                                                                                                                                         
                        
                        </div>                      
                        <!-- End 작성한 코멘트 탭 -->
                        
                    </div>                    
                </div>
                <!-- End Tab -->                 
                                    
            </div>
            <!-- End Content -->
            
            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">                                
                <ul class="list-unstyled blog-photos">
                    <li><a href="/web/market/chattpaper/mychatt"><img src="/static/webimage/btn-mymini1.png" alt="마이쪽지" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/myticket/index"><img src="/static/webimage/btn-mymini2.png" alt="마이에그" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
                    <li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
                </ul>            
                
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
                                <?php echo $recent_goods[$i]['brand'] . ' | ' . $recent_goods[$i]['price']; ?></a>
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
<script type="text/javascript" src="/assets/js/app.min.js"></script>
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

</body>
</html>