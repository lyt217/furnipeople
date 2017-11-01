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
    <link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">

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
    <!-- <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>반갑습니다. 퍼니피플 회원님</h2>
                <p>퍼니피플에 로그인하여 새소식을 확인하세요.</p>
            </div>
        </div>
    </div> -->
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
                <div class="headline"><h3> &nbsp; 비밀번호 찾기 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>



                <?php if ($this->session->flashdata('deny_msg')) { ?>
                        <div class="row">
        					<div class="col-md-3"></div>
        					<div class="col-md-6">
        						<div class="form-group contex-bg margin-top-20" style="text-align: center;">
        							<p class="bg-primary"><?php echo $this->session->flashdata('deny_msg'); ?></p>
        						</div>
        					</div>
        		            <div class="col-md-3"></div>
        				</div>
        				<?php } ?>

                <!-- Login -->
                <div class="row">
				<form class="form-horizontal" role="form" action="/web/user/membership/findpassword" method="post" accept-charset="utf-8">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="form-group margin-top-20 margin-bottom-40" style="text-align: center;">
							<img src="/static/webimage/logo-top.png">
						</div>
						<div class="form-group">
              <label>이메일주소</label>
							<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" maxlength="30">
							<?php echo form_error('email', '<div class="alert alert-warning fade in">', '</div>'); ?>
              <label>가입시 입력한 전화번호</label>
							<input type="text" name="phonenumber" class="form-control" value="" maxlength="14" placeholder="999-9999-9999 형식">
							<?php echo form_error('phonenumber', '<div class="alert alert-warning fade in">', '</div>'); ?>
						</div>

						<div class="form-group margin-top-0" style="text-align: center;">
                    		<label class="checkbox-inline color-light-grey">
                        		<input type="radio" name="member_type" value="1" <?php echo set_radio('member_type', '1', TRUE); ?>> 개인회원
                    		</label>
                    		<label class="checkbox-inline color-light-grey">
                        		<input type="radio" name="member_type" value="2" <?php echo set_radio('member_type', '2'); ?>> 기업회원
                    		</label>
                    	</div>
						<!-- div class="checkbox form-group">
							<label>
								<input type="checkbox"> 저장
							</label>
						</div-->
						<div class="form-group">
							<button class="btn-u btn-block btn-u-dark-blue" type="submit">비밀번호 재설정</button>
						</div>
            <div class="topbar form-group">
              <ul class="loginbar">
                <li><a href="/web/user/findid">이메일 찾기</a></li>
                <li class="topbar-devider"></li>
                <li><a href="/web/user/membership/findpassword">비빌번호 찾기</a></li>
                                <li class="topbar-devider"></li>
                                <li><a href="/web/user/signup/createmember">회원가입</a></li>
              </ul>
            </div>
					</div>
		            <div class="col-md-4"></div>
				</form>
				</div>
                <!-- End Login -->

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

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    //App.init();

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
