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

    <!--=== Job이미지와 제품검색 ===-->
    <div class="job-img margin-bottom-30" style="min-height:79px;">
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

            </div>
        </div>
    </div>
    <!--=== End Job이미지와 제품검색 ===-->

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
                    <li class="list-group-item list-toggle rounded">
                        <a data-toggle="collapse" data-parent="#sidebar-talk" href="#collapse-talk" class="sidebar-furni rounded">Furni Talk</a>
                        <ul id="collapse-talk" class="collapse">
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
                    <li class="list-group-item list-toggle rounded active">
                        <a data-toggle="collapse" data-parent="#sidebar-market" href="#collapse-market" class="sidebar-furni rounded">Furni Market</a>
                        <ul id="collapse-market" class="collapse in">
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
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; <?php echo $nickn_title; ?> &nbsp; </h3></div>
                <div class="margin-bottom-20"></div>

				<div class="row margin-bottom-20">
					<div class="col-md-3 sm-margin-bottom-10 text-center">
						<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/all/no" class="btn-u btn-u-lg rounded-3x btn-u-brown btn-talk" type="button">&nbsp;&nbsp; 전 체 &nbsp;&nbsp;</a>
					</div>
					<div class="col-md-9 no-space-left">
						<div style="line-height: 2.6;">
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/chair/no" class="<?php echo $talkind_btn['b']; ?>" type="button">&nbsp;&nbsp; 의자 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/desk/no" class="<?php echo $talkind_btn['c']; ?>" type="button">&nbsp;&nbsp; 책상 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/sofa/no" class="<?php echo $talkind_btn['d']; ?>" type="button">&nbsp;&nbsp; 쇼파 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/bed/no" class="<?php echo $talkind_btn['e']; ?>" type="button">&nbsp;&nbsp; 침대 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/dresser/no" class="<?php echo $talkind_btn['f']; ?>" type="button">&nbsp;&nbsp; 화장대 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/dtable/no" class="<?php echo $talkind_btn['g']; ?>" type="button">&nbsp;&nbsp; 식탁 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/closet/no" class="<?php echo $talkind_btn['h']; ?>" type="button">&nbsp;&nbsp; 수납장 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/drawer/no" class="<?php echo $talkind_btn['i']; ?>" type="button">&nbsp;&nbsp; 서랍 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/interior/no" class="<?php echo $talkind_btn['j']; ?>" type="button">&nbsp;&nbsp; 인테리어 제품 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/user/shop/product/<?php echo $this->uri->segment(4); ?>/etc/no" class="<?php echo $talkind_btn['k']; ?>" type="button">&nbsp;&nbsp; 기타 가구들 &nbsp;&nbsp;</a>
						</div>
					</div>
				</div>

                <!-- Inline Search 정렬이 들어올 예정 -->

				<hr style="margin: 20px 0 20px;">
				<!--hr class="margin-bottom-20"-->

			    <!-- 제품 목록 MS -->
			    <div class="blog_masonry_3col">
			        <div class="grid-boxes">

                    	<?php if ($productList) {
                    	foreach ($productList as $product): ?>
			            <div class="grid-boxes-in"><!-- easy-block-v1 easy-block-v2 -->
			                <a href="/web/market/product/detail/<?php echo $product->id; ?>" title="상세보기">
			                	<!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
			                	<img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
							</a>
			                <div class="grid-boxes-caption text-center">
			                    <h3><?php echo $product->kindpname; ?> &nbsp;<?php echo number_format($product->sellprice); ?>원</h3>
			                    <p><?php echo $product->brand . ' / ' . $product->prodstate; ?></p>
			                </div>
			            </div>
						<?php endforeach; } ?>

			        </div>
			    </div>
			    <!-- End 제품 목록 MS -->


                <div class="text-center">
                	<?php echo $pagination; ?>
				</div>
				<!--div class="text-right">
					<a class="btn-u btn-u-dark-blue" href="/web/market/product/register"> &nbsp;&nbsp; 내 물건 등록 &nbsp;&nbsp; </a>
				</div-->

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

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript" src="/assets/plugins/masonry/jquery.masonry.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    /** ───────────────────────────────────
     * 제품 목록
     */
    var $container = $('.grid-boxes');
    var gutter = 20;    //객체 좌우 사이의 간격 (위아래 간격은 masonry.css의 .blog_masonry_3col .grid-boxes-in 항목)
    var min_width = 200;
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector : '.grid-boxes-in',
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
