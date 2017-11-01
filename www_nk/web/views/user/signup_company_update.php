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
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->  

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
                <h2>회원 정보를 확인하고 변경할 수 있습니다.</h2>
                <p>내가게의 포트폴리오를 게시/관리할 수 있습니다.</p>               
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
                    <li class="list-group-item list-toggle rounded active">
                        <a data-toggle="collapse" data-parent="#sidebar-talk" href="#collapse-talk" class="sidebar-furni rounded">My Infomation</a>                        
                        <ul id="collapse-talk" class="collapse in">                                                        
                            <li><a href="/web/user/shop/home/<?php echo $this->session->userdata('user_id'); ?>">내 가게 보기</a></li>
                            <li><a href="/web/user/shop/updateportfolio">포트폴리오 관리</a></li>
                            <li><a href="/web/user/signup/updateprovider">회원정보 수정</a></li>
                        </ul>
                    </li>
                </ul>                                                            
            </div>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                
                <?php if ($this->session->flashdata('comple_msg')) { ?>
                <div class="contex-bg margin-bottom-20">                            
                    <p class="bg-primary"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('comple_msg'); ?></p>
                </div>
                <?php } ?>                 
                
                <div class="headline"><h3> &nbsp; 기업회원정보 &nbsp; </h3> &nbsp; * 는 필수입력</div>
                <div class="margin-bottom-15"></div>
                
                <!-- Tab -->
                <div class="tab-v1">
                    <ul class="nav nav-justified nav-tabs">
                        <li class="active"><a href="#company" data-toggle="tab">기업회원정보</a></li>
                        <li><a href="/web/user/shop/updateportfolio">포트폴리오</a></li><!-- data-toggle="tab" 제거 -->
                    </ul>                    
                    
                    <div class="tab-content">
                        <!-- 기업회원정보수정 탭 -->                                                
                        <div class="tab-pane fade in active" id="company">
                        	<div class="margin-bottom-10"></div>                 								
								                
						<form class="form-horizontal" role="form" action="/web/user/signup/updateprovider" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*회사이름</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="corp_name" class="form-control" value="<?php echo set_value('corp_name', @$memberOne->corpname); ?>" maxlength="20">
			                        <?php echo form_error('corp_name', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
							</div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*닉네임</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="nick_name" class="form-control" value="<?php echo set_value('nick_name', @$memberOne->nickname); ?>" maxlength="15" placeholder="글 작성시 작성자로 사용됩니다">
			                        <?php echo form_error('nick_name', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                    			                    
			                </div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*이메일</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="email" class="form-control" value="<?php echo set_value('email', @$memberOne->emailid); ?>" maxlength="30" readonly>
			                        <?php echo form_error('email', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>			                    			                    
			                </div>
							<div class="row">			                    
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*연락처</label>
			                    </div>
			                    <div class="col-md-5 no-space-left"><!-- 아마 직접 입력 금지 할 듯 -->
			                        <input type="text" name="cert_mobile" class="form-control" value="<?php echo set_value('cert_mobile', @$memberOne->mobile); ?>" maxlength="14" placeholder="999-9999-9999 형식">
			                        <?php echo form_error('cert_mobile', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
			                    <!--div class="col-md-1 no-space-left">
			                    	<button class="btn btn-sm rounded btn-danger" type="button">휴대폰 본인인증</button>
								</div-->			                   				                    			                    
			                </div>
                            <div class="row">                               
                                <div class="col-md-3">
                                    <label class="control-label space-left-20">*주소</label>
                                </div>
                                <div class="col-md-6 form-inline no-space-left">
                                    <input type="text" name="zip_code" id="zip-code" class="form-control" value="<?php echo set_value('zip_code', @$memberOne->zipcode); ?>" readonly>
                                    &nbsp; <button id="addr-popup" class="btn btn-sm rounded btn-danger margin-bottom-10" type="button">주소검색</button>                                   
                                </div>                                                                                          
                            </div>                            
                            <div class="row">                               
                                <div class="col-md-3"></div>
                                <div class="col-md-6 no-space-left">
                                    <input type="text" name="address_jibun" id="address-jibun" class="form-control" value="<?php echo set_value('address_jibun', @$memberOne->addressjibun); ?>" readonly>
                                    <?php echo form_error('address_jibun', '<div class="alert alert-warning fade in">', '</div>'); ?>                                   
                                </div>                                                                                          
                            </div>                            
                            <div class="row">                               
                                <div class="col-md-3"></div>
                                <div class="col-md-6 no-space-left">
                                    <input type="text" name="address_road" id="address-road" class="form-control" value="<?php echo set_value('address_road', @$memberOne->addressroad); ?>" readonly>
                                    <?php echo form_error('address_road', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                    <p style="margin-bottom: 6px;">※ 주소검색시 번지까지 상세히 검색 후 선택하셔야 지도에 정확히 표시됩니다.</p>                                   
                                </div>                                                                                          
                            </div>
                            <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude', @$memberOne->latitude); ?>">
                            <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude', @$memberOne->longitude); ?>">
                            <div class="row">                               
                                <div class="col-md-3">
                                    <label class="control-label space-left-20">주소나머지 (필요시)</label>
                                </div>
                                <div class="col-md-6 no-space-left">
                                    <input type="text" name="address_detail" class="form-control" value="<?php echo set_value('address_detail', @$memberOne->addrdetail); ?>" maxlength="60">                                                                                                            
                                </div>                                                                                          
                            </div>
							
                    		<div class="heading heading-v4 margin-top-20">
                        		<h2>기업상세정보</h2>                        
                    		</div>						
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">사업자등록번호</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="corp_number" class="form-control" value="<?php echo set_value('corp_number', @$memberOne->corpnumber); ?>" maxlength="12">
			                    </div>
							</div>							
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*업종</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">			                        
				                    <select name="biz_category" class="form-control">
				                        <option value="가구판매점" <?php echo set_select('biz_category', '가구판매점', @$bizcategory_select['가구판매점']); ?>>가구판매점</option>				               
				                        <option value="인테리어" <?php echo set_select('biz_category', '인테리어', @$bizcategory_select['인테리어']); ?>>인테리어</option>				                        
				                        <option value="기타" <?php echo set_select('biz_category', '기타', @$bizcategory_select['기타']); ?>>기타</option>
				                    </select>			                        			                        
			                    </div>
							</div>							
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*기업형태</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">			                        
				                    <select name="corp_kind" class="form-control">
				                        <option value="법인사업자" <?php echo set_select('corp_kind', '법인사업자', @$corpkind_select['법인사업자']); ?>>법인사업자</option>
				                        <option value="개인사업자" <?php echo set_select('corp_kind', '개인사업자', @$corpkind_select['개인사업자']); ?>>개인사업자</option>				                        
				                    </select>			                        			                        
			                    </div>
							</div>
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">담당자명</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="pointer_man" class="form-control" value="<?php echo set_value('pointer_man', @$memberOne->pointer); ?>" maxlength="10">
			                    </div>
							</div>							
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">담당자연락처</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="pointer_phone" class="form-control" value="<?php echo set_value('pointer_phone', @$memberOne->pointerphone); ?>" maxlength="14" placeholder="999-9999-9999 형식">
			                    </div>
							</div>							
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*대표번호</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="corp_phone" class="form-control" value="<?php echo set_value('corp_phone', @$memberOne->corpphone); ?>" maxlength="14" placeholder="999-9999-9999 형식">
			                        <?php echo form_error('corp_phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
							</div>							
			                <div class="row margin-bottom-10">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*기업소개</label>
			                    </div>
			                    <div class="col-md-7 no-space-left">
			                        <textarea name="introduce" class="form-control" rows="3" maxlength="300"><?php echo set_value('introduce', @$memberOne->introduce); ?></textarea>
			                        <?php echo form_error('introduce', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
							</div>
                            <div class="row">                               
                                <div class="col-md-3">
                                    <label class="control-label space-left-20">현재로고</label>                                  
                                </div>
                                <div class="col-md-9">
                                    <img src="/static/corplogo/<?php echo @$memberOne->corplogo; ?>" style="width: 260px;">
                                </div>                                                                                             
                            </div>												
			                <div class="row">		                
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">로고, 대표이미지</label>
			                    </div>
			                    <div class="col-md-7 no-space-left sky-form">
			                        <label class="input input-file">
                                		<div class="button input input-file"><input type="file" name="corp_logo" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">로고 교체시 첨부</div><input type="text" readonly>
                            		</label>                            		
			                    </div>
							</div>
							                            
                            <div class="heading heading-v4 margin-top-20">
                                <h2>업체 검색 키워드</h2>                        
                            </div>                              
                            <div class="row" style="margin-left: 30px;">                                                       
                                <div class="col-md-2">
                                    <input type="text" name="hash_tag[]" style="width: 180px;" class="form-control" value="<?php echo set_value('hash_tag[]', @$hashtag[0]); ?>" maxlength="10">                                    
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="hash_tag[]" style="width: 180px;" class="form-control" value="<?php echo set_value('hash_tag[]', @$hashtag[1]); ?>" maxlength="10">                                    
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="hash_tag[]" style="width: 180px;" class="form-control" value="<?php echo set_value('hash_tag[]', @$hashtag[2]); ?>" maxlength="10">                                    
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="hash_tag[]" style="width: 180px;" class="form-control" value="<?php echo set_value('hash_tag[]', @$hashtag[3]); ?>" maxlength="10">                                    
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="hash_tag[]" style="width: 180px;" class="form-control" value="<?php echo set_value('hash_tag[]', @$hashtag[4]); ?>" maxlength="10">                                                                        
                                </div>
                            </div>
                            <div><p class="text-center">※ 기업을 가장 잘 알릴 수 있는 단어를 입력하세요. (예: 보루네오, 신혼가구 등)<br>키워드가 될 단어는 설명용 단어를 피하고, 의미가 함축된 단어를 사용하시면 효과적입니다.</p></div>                              
                            														
							<div class="margin-bottom-30"></div>
							<div class="row">
								<div class="col-md-4"></div>														                
								<div class="col-md-4"><button class="btn-u btn-block btn-u-dark-blue" type="submit">회원정보 저장</button></div>
							</div>							                    																										                
		                </form>
                        <div class="headline margin-top-20"><h3> &nbsp; 비밀번호 변경 &nbsp; </h3></div>
                        <div class="margin-bottom-30"></div>                        
                         
                        <form class="form-horizontal" role="form" action="/web/user/signup/updateprovider/passwd" method="post" accept-charset="utf-8">
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
                            <div class="margin-bottom-30"></div>
                            <div class="row">
                                <div class="col-md-4"></div>                                                                        
                                <div class="col-md-4"><button class="btn-u btn-block btn-u-dark-blue" type="submit">비밀번호 저장</button></div>
                            </div>                                                                                  
                        </form>                                                                              	                			                                                                   
                        </div>
                        <!-- End 기업회원정보수정 탭 -->
                        <div class="tab-pane fade in" id="portfolio">
                        <!-- 포트폴리오 탭 -->                                                                                 
                        <!-- End 포트폴리오 탭 -->
                        </div>                        
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

<!-- 글로벌 필수 -->
<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 플러그인 가동 -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=f8c212e81fe6a494472554cac5455f31&libraries=services"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();
    
    $('#addr-popup').bind('click', function () {
        daumPostcode();
    });
});

    /**
     * 다음 우편번호, 주소 검색 API (팝업형) 
     */
    function daumPostcode() {
        //var srhAddr = '서울 강남구 도곡동';    //폼에 내용으로 바로 검색할 경우
        
        //팝업 위치를 지정 (화면의 가운데 정렬은 아래 open에)
        var width = 500;    //팝업의 너비
        var height = 600;    //팝업의 높이
                
        new daum.Postcode({
            width: width,    //생성자에 크기 값을 명시적으로 지정해야 합니다.
            height: height,            
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분. data는 문자열이며 값이 없을 경우 공백
                
                var jibunAddr = data.jibunAddress;    //지번주소 (번지 이하 건물명, 법정명, 괄호참고등은 안넣음)                                
                var roadAddr = data.roadAddress;    //도로명주소 (마찬가지)
                $('#address-jibun').val(jibunAddr);
                $('#address-road').val(roadAddr);
                $('#zip-code').val(data.zonecode);    //5자리 새우편번호
                
                daumCoordinate(jibunAddr);    //위경도 셋팅
            }
        }).open({
            left: (window.screen.width / 2) - (width / 2),
            top: (window.screen.height / 2) - (height / 2),
            //q: srhAddr,    //특정 검색어를 넘겨 팝업 오픈
            popupName: 'postcodePopup' //팝업 이름을 설정(영문,한글,숫자 모두 가능, 영문 추천), 여러개의 팝업창이 뜨는 것을 방지하기 위해 팝업이름을 지정할것 (지정하지 않을시 기본값은 '_blank'로 설정되어 계속 새창으로 열림)
            //autoClose: false    //검색 결과 선택 후 자동으로 팝업이 닫히는 것을 방지하려면 false (기본값 true)
        });
    }
    
    /**
     * 해당 주소로 좌표 변환 API 
     */
    function daumCoordinate(myaddr) {
        var geocoder = new daum.maps.services.Geocoder();    //주소→좌표 변환 서비스 생성
        geocoder.addr2coord(myaddr, changeAddrCoord);
        
        function changeAddrCoord(status, result) {
            if (status === daum.maps.services.Status.OK) {
                //console.log('해당 주소에 대한 위도 latitude: ' + result.addr[0].lat);
                //console.log('해당 주소에 대한 경도 longitude: ' + result.addr[0].lng);
                $('#latitude').val(result.addr[0].lat);
                $('#longitude').val(result.addr[0].lng);
            }
        }
    }         
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>