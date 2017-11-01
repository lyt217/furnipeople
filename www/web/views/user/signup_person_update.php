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
  <?php
   include './views/common/header_menu.php';
  ?>
<div class="wrapper">
   <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>회원정보를 확인하고 수정할 수 있습니다.</h2>
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

                <?php if ($this->session->flashdata('comple_msg')) { ?>
                <div class="contex-bg margin-bottom-20">
                    <p class="bg-primary"><i class="fa fa-check"></i> <?php echo $this->session->flashdata('comple_msg'); ?></p>
                </div>
                <?php } ?>

                <div class="headline"><h3> &nbsp; 개인회원정보 &nbsp; </h3> &nbsp; * 는 필수입력</div>
                <div class="margin-bottom-30"></div>

		                <form class="form-horizontal" role="form" action="/web/user/signup/updatemember" method="post" accept-charset="utf-8">
			                <div class="row">
			                    <div class="col-md-3">
			                        <label for="user-name" class="control-label space-left-20">*이름</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="user_name" class="form-control" id="user-name" value="<?php echo set_value('user_name', @$memberOne->usrname); ?>" maxlength="10" placeholder="실명을 입력하세요">
			                        <?php echo form_error('user_name', '<div class="alert alert-warning fade in">', '</div>'); ?>
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
			                        <label class="control-label space-left-20">연락처</label>
			                    </div>
			                    <div class="col-md-5 no-space-left">
			                        <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone', @$memberOne->phone); ?>" maxlength="14" placeholder="999-9999-9999 형식">
			                        <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
			                    </div>
			                </div>
							<div class="margin-bottom-30"></div>
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4"><button class="btn-u btn-block btn-u-dark-blue" type="submit">회원정보 저장</button></div>
							</div>
		                </form>

                <div class="headline margin-top-20"><h3> &nbsp; 비밀번호 변경 &nbsp; </h3></div>
                <div class="margin-bottom-30"></div>

		                <form class="form-horizontal" role="form" action="/web/user/signup/updatemember/passwd" method="post" accept-charset="utf-8">
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

                <div class="margin-bottom-30"></div>
                <div class="headline margin-top-20"><h3> &nbsp; 회원 탈퇴 안내 &nbsp; </h3></div>
                <div class="margin-bottom-30"></div>
                <div class="margin-bottom-30">
                    <p class="text-center">회원을 탈퇴할 경우 회원정보는 즉시 삭제됩니다.</p>
                    <p class="text-center">탈퇴 후에도 게시물은 그대로 남아 있으므로 삭제를 원하는 게시글이 있다면 반드시 탈퇴 전 삭제하시기 바랍니다.</p>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button onclick="javascript:signOut();" class="btn-u btn-block btn-u-default">회원 탈퇴</button></div>
                </div>

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
    App.init();
});

function signOut() {
    if (confirm('정말 탈퇴하시겠습니까?')) {
        window.location.href='/web/user/membership/signout';
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
