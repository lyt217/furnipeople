<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--[if !IE]><!--> <html lang="ko"> <!--<![endif]-->
<html>
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>퍼니피플 관리자</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

<!-- Custom styles -->
<style type="text/css">
.signin-content {
  max-width: 360px;
  margin: 0 auto 20px;
}
</style>

<link href="/assets/manage/css/lib/bootstrap.css" rel="stylesheet">
<link href="/assets/manage/css/lib/bootstrap-responsive.css" rel="stylesheet">
<link href="/assets/manage/css/boo-extension.css" rel="stylesheet">
<link href="/assets/manage/css/boo.css" rel="stylesheet">
<link href="/assets/manage/css/style.css" rel="stylesheet">
<link href="/assets/manage/css/boo-coloring.css" rel="stylesheet">
<link href="/assets/manage/css/boo-utility.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="/assets/manage/plugins/selectivizr/selectivizr-min.js"></script>
    <script src="/assets/manage/plugins/flot/excanvas.min.js"></script>
<![endif]-->
</head>

<body class="signin signin-vertical">
<div class="page-container">
    <div id="header-container">
        <div id="header">
            <div class="navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container"> </div>
                </div>
            </div>
            <!-- // navbar -->
            
            <div class="header-drawer" style="height:3px"> </div>
            <!-- // breadcrumbs --> 
        </div>
        <!-- // drawer --> 
    </div>
    <!-- // header-container -->
    
    <div id="main-container">
        <div id="main-content" class="main-content container">
            <div class="signin-content">
                <h1 class="welcome text-center" style="line-height: 0.6;"><small>Furni people</small></h1>
                <div class="well well-nice form-dark">
                    <div class="tab-content overflow">
                        <div class="tab-pane fade in active" id="login">                            
                            <form class="form-tied margin-00" method="post" action="" name="login_form">
                                <fieldset>                                    
                                    <?php echo form_error('email', '<legend class="two">', '</legend>'); ?>
                                    <?php echo form_error('pass_word', '<legend class="two">', '</legend>'); ?>
                                    <?php echo ($this->session->flashdata('deny_msg')) ? '<legend class="two">' . $this->session->flashdata('deny_msg') . '</legend>' : ''; ?>
                                    <ul>
                                        <li>                                            
                                            <input type="text" name="email" class="input-block-level" value="<?php echo set_value('email'); ?>" maxlength="30" placeholder="Email">  
                                        </li>
                                        <li>
                                            <input type="password" name="pass_word" class="input-block-level" maxlength="12" placeholder="Password">
                                        </li>
                                    </ul>
                                    <button type="submit" class="btn btn-envato btn-block btn-large">로그인</button>
                                </fieldset>
                            </form>
                            <!-- // form --> 
                            
                        </div>
                        <!-- // Tab Login -->
                        
                    </div>
                </div>
                <!-- // Well-Nice --> 
            </div>
            <!-- // sign-content --> 
            
        </div>
        <!-- // main-content --> 
        
    </div>
    <!-- // main-container  --> 
    
</div>
<!-- // page-container --> 
 

</body>
</html>
