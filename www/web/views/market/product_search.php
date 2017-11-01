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

    <!--=== Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
          <?php
           include './views/common/leftmenu.php';
          ?>
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Furni Market &nbsp; </h3> &nbsp; 가구에 대해서 자유롭게 거래하는 공간입니다.</div>
                <div class="margin-bottom-20"></div>

        				<div class="row margin-bottom-20">
        					<div class="col-md-3 sm-margin-bottom-10 text-center">
        						<a href="/web/market/product/search/all/no" class="btn-u btn-u-lg rounded-3x btn-u-brown btn-talk" type="button">&nbsp;&nbsp; 전 체 &nbsp;&nbsp;</a>
        					</div>
        					<div class="col-md-9 no-space-left">
        						<div style="line-height: 2.6;">
        							<a href="/web/market/product/search/chair/no" class="<?php echo $talkind_btn['b']; ?>" type="button">&nbsp;&nbsp; 의자 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/desk/no" class="<?php echo $talkind_btn['c']; ?>" type="button">&nbsp;&nbsp; 책상 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/sofa/no" class="<?php echo $talkind_btn['d']; ?>" type="button">&nbsp;&nbsp; 쇼파 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/bed/no" class="<?php echo $talkind_btn['e']; ?>" type="button">&nbsp;&nbsp; 침대 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/dresser/no" class="<?php echo $talkind_btn['f']; ?>" type="button">&nbsp;&nbsp; 화장대 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/dtable/no" class="<?php echo $talkind_btn['g']; ?>" type="button">&nbsp;&nbsp; 식탁 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/closet/no" class="<?php echo $talkind_btn['h']; ?>" type="button">&nbsp;&nbsp; 수납장 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/drawer/no" class="<?php echo $talkind_btn['i']; ?>" type="button">&nbsp;&nbsp; 서랍 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/interior/no" class="<?php echo $talkind_btn['j']; ?>" type="button">&nbsp;&nbsp; 인테리어 제품 &nbsp;&nbsp;</a> &nbsp;
        							<a href="/web/market/product/search/etc/no" class="<?php echo $talkind_btn['k']; ?>" type="button">&nbsp;&nbsp; 기타 가구들 &nbsp;&nbsp;</a>
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
              			              <div class="grid-boxes-in" style="position:relative;"><!-- easy-block-v1 easy-block-v2 -->
              			                   <a href="/web/market/product/detail/<?php echo $product->id; ?>" title="상세보기">
              			                	<!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
              			                     <img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                                         <?php if($product->soldout == '매진'){ ?>
                                          <img src = "/assets/img/icons/soldout.png" style="position:absolute; left:0px; top:0px; widht:108px; height:108px;">
                                         <?php } ?>
              							           </a>
              			                   <div class="grid-boxes-caption text-center">
                                             <div style="height:80px;">
                                                   <h3><?php echo $product->prodtitle; ?></h3>
                                             </div>
                                            <p><?php echo number_format($product->sellprice) . '원 / ' . $product->prodstate; ?></p>
                                            <div style="height:20px;"></div>
              			                   </div>
              			            </div>
      						          <?php endforeach; } ?>

      			        </div>
      			    </div>
      			    <!-- End 제품 목록 MS -->


                <div class="text-center">
                	<?php echo $pagination; ?>
				        </div>
      				<!-- 페이지네이션 나오고 hr 여부 결정 -->
      				<div class="text-right">
      					<a class="btn-u btn-u-dark-blue" href="/web/market/product/register"> &nbsp;&nbsp; 내 물건 등록 &nbsp;&nbsp; </a>
      				</div>

            </div>
            <!-- End Content -->
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
    var gutter = 20;
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
