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
    <link rel="stylesheet" href="/assets/css/furni-job.css">
    <link rel="stylesheet" href="/assets/css/furni-color.css">
    <link rel="stylesheet" href="/assets/css/furni-dark.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

</head>

<body>
  <?php
   include './views/common/header_menu.php';
  ?>
<div class="wrapper">

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
			                    <div class="col-md-5 no-space-left" style="display:inline-block;">
			                        <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>" maxlength="30" placeholder="실제 이메일로 로그인됩니다">

			                        <?php echo form_error('email', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
                          <div id="sendauth" class="btn-u btn-block btn-u-dark-blue" style="float:right; display:inline-block; width:100px; margin-right:155px;">인증번호 받기</div>
			                </div>
              <div id="emailauth" class="row" style="display:none;">
			                    <div class="col-md-3">
			                        <label class="control-label space-left-20">*이메일 인증번호</label>
			                    </div>
			                    <div class="col-md-5 no-space-left" style="display:inline-block;">
			                        <input type="text" name="authcode" id="authcode" class="form-control" value="" maxlength="6" placeholder="인증번호를 입력해주세요">

			                    </div>
                          <div id="checkauth" class="btn-u btn-block btn-u-dark-blue" style="float:right; display:inline-block; width:100px; margin-right:155px;">이메일 인증</div>
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
								<div class="col-md-4"><button id="gogo" class="btn-u btn-block btn-u-dark-blue" type="submit" disabled>가입하기</button></div>
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
    <?php
     include './views/common/foot.php';
    ?>
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
    var authcode = 0;
    var auhted = false;
    App.init();

    $("#sendauth").click(function(){
      $.ajax({    //create an ajax request to load_page.php
            type: "POST",
            url: "/web/user/signup/sendauthcode",
            data: { "email":$("#email").val() },
            dataType: "html",   //expect html to be returned
            success: function(response){
              if(response == 'notunique'){
                alert("이미 가입된 메일입니다.");
              }
              else{
                authcode = response;
                $("#emailauth").css("display","block");
              }
              // var myObj = $.parseJSON(response);
              //
              // var str = "<ol style='list-style:none;margin:0px;padding-left:0px;padding-top:4px;background:#FFF;width:118px'>";
              // if(userdbtable == "provider"){
              //   str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>퍼니포인트 : <b>"+myObj.usrpoint+"</b></li>";
              //   str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><button class='btn-u btn-u-xs' style='background:#FFFFFF; color:#4c4c4c; margin-left:0px; padding-left:0px; text-align: left;' type='button' data-toggle='modal' data-target='#chatt-modal'>쪽지발송</button></li>";
              //   str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/product/"+cid+"' class='uicon'>올린상품보기</a></li>";
              //   str += "<input type='hidden' name='chatt_target' value='"+cid+"-"+userdbtable+"-"+usernickname+"'>";
              //   str += "<li style='width:120px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/home/"+cid+"/close' target='_blank'class='uicon'>홈페이지가기</a></li>";
              //   str += "</ol>";
              //
              //   $("#submenusel").html(str);
              //   $("#submenusel").show();
              //   $("#submenusel").css({    'left' : left_pos ,    'top' : top_pos ,    'z-index' : 1001 , 'height':86 ,'visibility':'visible'});
              //             //alert(response);
              //
              // }
              // else if(userdbtable == "member"){
              //   str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>퍼니포인트 : <b>"+myObj.usrpoint+"</b></li>";
              //   str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><button class='btn-u btn-u-xs' style='background:#FFFFFF; color:#4c4c4c; margin-left:0px; padding-left:0px; text-align: left;' type='button' data-toggle='modal' data-target='#chatt-modal'>쪽지발송</button></li>";
              //   str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/goods/"+cid+"' class='uicon'>올린상품보기</a></li>";
              //   str += "<input type='hidden' name='chatt_target' value='"+cid+"-"+userdbtable+"-"+usernickname+"'>";
              //   str += "</ol>";
              //
              //   $("#submenusel").html(str);
              //   $("#submenusel").show();
              //   $("#submenusel").css({    'left' : left_pos,    'top' : top_pos , 'height':66,   'z-index' : 1001  ,'visibility':'visible'});
              // }
            }

         });
    });

    $("#checkauth").click(function(){
      if($("#authcode").val() == authcode){
        authed = true;
        alert("인증되었습니다.");
        document.getElementById("gogo").disabled = false;
      }
      else{
        alert("잘못된 인증번호 입니다.");
      }
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
