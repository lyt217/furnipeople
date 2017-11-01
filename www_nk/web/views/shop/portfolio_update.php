<?php
 include './views/common/header_menu_friend.php';
?>

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
	                        		<label class="label col col-2">사진 :</label>
									<div class="col col-8">
										<label class="input input-file"><div class="button input input-file"><input type="file" name="portfol_photo" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
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
            <div class="col-md-2">
                <ul class="list-unstyled blog-photos">
                    <!-- <li><a href="/web/market/chattpaper/mychatt"><img src="/static/webimage/btn-mymini1.png" alt="마이쪽지" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/myticket/index"><img src="/static/webimage/btn-mymini2.png" alt="마이에그" class="hover-effect"></a></li> -->
                    <li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
                    <li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
                </ul>

                <div class="panel panel-dark-blue rounded mobile-hide">
                    <div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">베스트 게시글</h5></div>
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

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
