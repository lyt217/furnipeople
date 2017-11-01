<?php
 include './views/common/header_menu.php';
?>
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/furni-header.css">
<link rel="stylesheet" href="/assets/css/furni-footer.css">

<link rel="stylesheet" href="/assets/plugins/animate.css">
<link rel="stylesheet" href="/assets/plugins/line-icons-pro/allpro-icons.css">
<link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="/assets/css/furni-job.css">
<link rel="stylesheet" href="/assets/css/furni-color.css">
<link rel="stylesheet" href="/assets/css/furni-dark.css">
<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>

<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>포트폴리오를 전시해 보세요.</h2>
                <p>내가게 페이지를 방문하는 분들이 포트폴리오를 보게 됩니다.</p>
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
            <div class="col-md-8 tag-box tag-box-v3">
                <div class="headline"><h3> &nbsp; 포트폴리오 관리 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>

                <!-- Tab -->
                <div class="tab-v1">
                    <ul class="nav nav-justified nav-tabs">
                        <li><a href="/web/user/signup/updateprovider">기업회원정보</a></li>
                        <li class="active"><a href="#portfolio" data-toggle="tab">포트폴리오</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in" id="company">
                        <!-- 기업회원정보수정 탭 -->
                        <!-- End 기업회원정보수정 탭 -->
                        </div>

                        <!-- 포트폴리오 탭 -->
                        <div class="tab-pane fade in active" id="portfolio">
							<div class="margin-bottom-10"></div>

	                    	<form class="sky-form bg-light form-page" action="/web/user/shop/updateportfolio" method="post" enctype="multipart/form-data" accept-charset="utf-8">
	                        	<section class="row">
									<label class="label col col-2">작업기간 : </label>
									<label class="input col col-3"><input type="text" name="start_date" class="date-mask" value="<?php echo set_value('start_date'); ?>" maxlength="10" placeholder="시작일"></label>
									<label class="input col col-3"><input type="text" name="finish_date" class="date-mask" value="<?php echo set_value('finish_date'); ?>" maxlength="10" placeholder="종료일"></label>
	                        	</section>
	                        	<?php echo form_error('start_date', '<div class="alert alert-warning fade in">', '</div>'); ?>
	                        	<?php echo form_error('finish_date', '<div class="alert alert-warning fade in">', '</div>'); ?>
	                        	<section class="row">
	                            	<label class="label col col-2">설명(제목) :</label>
	                                <label class="input col col-9">
	                                    <!--class="textarea -- textarea name="introduce" class="form-control margin-bottom-10" rows="3"></textarea-->
	                                    <input type="text" name="introduce" value="<?php echo set_value('introduce'); ?>" maxlength="100">
	                                </label>
	                        	</section>
	                        	<?php echo form_error('introduce', '<div class="alert alert-warning fade in">', '</div>'); ?>
	                        	<section class="row">
	                        		<label class="label col col-2" style="margin-bottom:0px;">사진 :</label>
            									<div class="col col-8">
            										<label class="input input-file"><div class="button input input-file"><input type="file" id="prod_photo_1" name="portfolio_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(1);">이미지첨부</div><input id="prod_photo_t1" name="prod_photo_t1" type="text" readonly></label>
                                <div class="button2 input input-file" style="display: inline-block ;"id="del_button_5">삭제</div>
                                <?php echo form_error('prod_photo_t1', '<div class="alert alert-warning fade in">', '</div>'); ?>
            									</div>
                              <div style="margin-left:145px;">
                              <label class="input input-file col-9 margin-bottom-15" style="display: inline-block;">
                                    <div class="button input input-file"><input type="file" id="prod_photo_2" name="portfolio_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(2);">추가이미지첨부</div><input  id="prod_photo_t2" name="prod_photo_t2" type="text" readonly>
                                </label>
                                <div class="button2 input input-file" style="display: inline-block ;"id="del_button_2">삭제</div>
                              </div>

                              <div style="margin-left:145px;">
                                <label class="input input-file col-9 margin-bottom-15" style="display: inline-block;">
                                    <div class="button input input-file"><input type="file" id="prod_photo_3" name="portfolio_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(3);">추가이미지첨부</div><input id="prod_photo_t3" name="prod_photo_t3"  type="text" readonly>
                                </label>
                                <div class="button2 input input-file" style="display: inline-block ;"id="del_button_3">삭제</div>
                              </div>

                              <div style="margin-left:145px;">
                                <label class="input input-file col-9 margin-bottom-15" style="display: inline-block;">
                                      <div class="button input input-file"><input type="file" id="prod_photo_4" name="portfolio_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(4);">추가이미지첨부</div><input id="prod_photo_t4" name="prod_photo_t4" type="text" readonly>
                                </label>
                                <div class="button2 input input-file" style="display: inline-block ;"id="del_button_4">삭제</div>
                              </div>

                              <div style="margin-left:145px;">
                                <label class="input input-file col-9 margin-bottom-15" style="display: inline-block;">
                                    <div class="button input input-file"><input type="file" id="prod_photo_5" name="portfolio_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(5);">추가이미지첨부</div><input id="prod_photo_t5" name="prod_photo_t5" type="text" readonly>
                                </label>
                                <div class="button2 input input-file" style="display: inline-block ;"id="del_button_5">삭제</div>
                              </div>

                            </section>
	                        	<?php if ($this->session->flashdata('error_msg')) { ?>
                                <div class="alert alert-warning fade in"><?php echo $this->session->flashdata('error_msg'); ?></div>
                                <?php } ?>
	                        	<div class="text-center">
	                        		<button type="submit" class="btn-u btn-u-orange"> &nbsp; 포트폴리오 추가 &nbsp; </button>
								</div>
	                        </form>

							<div class="margin-bottom-20"></div>
							<div class="heading heading-v4"><h2>포트폴리오 리스트</h2></div>
							<span class="text-border text-border-blue margin-left-10">※ 최신 작업 순으로 업체소개 페이지인 '내가게' → '포트폴리오' 란에 전시됩니다.</span>

							<!-- 루프 -->
                            <?php if ($portfolioList) {
                            for ($i = 0; $i < count($portfolioList); $i++) { ?>
							<div class="photo-upload row">
								<img src="/static/portfolio/<?php echo $portfolioList[$i]['devidefolder'] .'/thumb/'. $portfolioList[$i]['thumunqname']; ?>">
								<div class="position-top pull-right">
									<a href="/web/user/shop/deleteportfolio/<?php echo $portfolioList[$i]['id']; ?>" title="삭제"><i class="fa fa-times"></i></a>&nbsp;&nbsp;
								</div>
								<h3>&nbsp;</h3>
								<h3>작업기간 : &nbsp;<?php echo $portfolioList[$i]['startdate']; ?> ~ <?php echo $portfolioList[$i]['finishdate']; ?></h3>
								<div class="overflow-h">
									<p class="hex"><?php echo $portfolioList[$i]['introduce']; ?></p>
								</div>
							</div>
							<hr style="margin: 0 0;">
							<?php }
                            } ?>
							<!-- End 루프 -->

						</div>
						<!-- End 포트폴리오 탭 -->

                    </div>
                </div>
                <!-- End Tab -->

            </div>
            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->
                                    <?php include('./views/common/sidemenu_right.php'); ?>
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

<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.date.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/jquery.inputmask.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/app.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();
    $('.date-mask').inputmask("y-m-d");

    $("#del_button_1").click(function() {
        $("#del_button_1").css("visibility", "hidden");
        $("#prod_photo_1").val('');
        $("#prod_photo_t1").val('');
    });

    $("#del_button_2").click(function() {
          $("#del_button_2").css("visibility", "hidden");
          $("#prod_photo_2").val('');
          $("#prod_photo_t2").val('');
    });

    $("#del_button_3").click(function() {
          $("#del_button_3").css("visibility", "hidden");
          $("#prod_photo_3").val('');
          $("#prod_photo_t3").val('');
    });

    $("#del_button_4").click(function() {
          $("#del_button_4").css("visibility", "hidden");
          $("#prod_photo_4").val('');
          $("#prod_photo_t4").val('');
    });

    $("#del_button_5").click(function() {
          $("#del_button_5").css("visibility", "hidden");
          $("#prod_photo_5").val('');
          $("#prod_photo_t5").val('');
    });

    $("#del_button_6").click(function() {
          $("#del_button_6").css("visibility", "hidden");
          $("#prod_photo_6").val('');
          $("#prod_photo_t6").val('');
    });

});
function changed(order){
  if(order == 1){
    $("#del_button_1").css("visibility", "visible");
  }
  else if(order == 2){
    $("#del_button_2").css("visibility", "visible");
  }
  else if(order == 3){
    $("#del_button_3").css("visibility", "visible");
  }
  else if(order == 4){
    $("#del_button_4").css("visibility", "visible");
  }
  else if(order == 5){
    $("#del_button_5").css("visibility", "visible");
  }
  else if(order == 6){
    $("#del_button_6").css("visibility", "visible");
  }
};
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
