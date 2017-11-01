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

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
  <?php
  include './views/common/leftmenu.php';
   ?>

            <div class="col-md-8 bg-light hrefcolor-basic">

              <div class="row margin-bottom-15">
                  <div class="col-md-12">
                      <div class="headline"><h2 class="heading-sm"> &nbsp; 가구 검색 결과 &nbsp;</h2><a class="osmore-btn next-v2 pull-right" onclick="goproduct()" title="마켓전체보기"><i class="fa  fa-plus"></i></a></div>
                      <!-- 제품 목록 MS -->
            			    <div class="blog_masonry_3col">
            			        <div class="grid-boxes">

                                	<?php if ($searchProduct) {
                                	   foreach ($searchProduct as $product): ?>
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
                  </div>
              </div><!--/row-->

                <div class="row margin-bottom-15">
                    <div class="col-md-12 sm-margin-bottom-20">
						<div class="headline"><h2 class="heading-sm"> &nbsp; Talk 검색결과 &nbsp;</h2><a class="osmore-btn next-v2 pull-right"  onclick="gotalk()" title="전체보기"><i class="fa  fa-plus"></i></a></div>
						<p>
                            <?php if ($searchTalk) {
                            foreach ($searchTalk as $talk):
                              if($talk->board == 'f'){ ?>
                                <div><div style="width:auto; display:inline-block;"><a href="/web/talk/free/article/<?php echo $talk->id; ?>/rtnlist"><b>[Furni Talk]</b>&nbsp;&nbsp; <?php echo $talk->title; ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?> </div><div style="float:right;  display:inline-block; width:auto;">작성자 : <b><?php echo $talk->writer; ?></b></div></div>
                              <?php } else if($talk->board == 'a'){ ?>
                                <div><div style="width:auto; display:inline-block;"><a href="/web/talk/advertise/article/<?php echo $talk->id; ?>/rtnlist"><b>[Furni Ads]</b>&nbsp;&nbsp; <?php echo $talk->title; ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?></div><div style="float:right; display:inline-block; width:auto;">작성자 : <b><?php echo $talk->writer; ?></b></div></div>
                              <?php } else if($talk->board == 'i'){ ?>
                                <div><div style="width:auto; display:inline-block;"><a href="/web/talk/info/article/<?php echo $talk->id; ?>/rtnlist"><b>[Furni Info]</b>&nbsp;&nbsp; <?php echo $talk->title; ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?></div><div style="float:right; display:inline-block; width:auto;">작성자 : <b><?php echo $talk->writer; ?></b></div></div>
                              <?php } else if($talk->board == 'p'){ ?>
                                <div><div style="width:auto; display:inline-block;"><a href="/web/talk/photo/article/<?php echo $talk->id; ?>/rtnlist"><b>[Furni Photo]</b>&nbsp;&nbsp; <?php echo $talk->title; ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?></div><div style="float:right; display:inline-block; width:auto;">작성자 : <b><?php echo $talk->writer; ?></b></div></div>
                              <?php } else if($talk->board == 'q'){ ?>
                                <div><div style="width:auto; display:inline-block;"><a href="/web/talk/qna/article/<?php echo $talk->id; ?>/rtnlist"><b>[Furni Qna]</b>&nbsp;&nbsp; <?php echo $talk->title; ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?></div><div style="float:right; display:inline-block; width:auto;">작성자 : <b><?php echo $talk->writer; ?></b></div></div>
                              <?php } else if($talk->board == 'r'){ ?>
                                <div><div style="width:auto; display:inline-block;"><a href="/web/talk/review/article/<?php echo $talk->id; ?>/rtnlist"><b>[Furni Review]</b>&nbsp;&nbsp; <?php echo $talk->title; ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?></div><div style="float:right; display:inline-block; width:auto;">작성자 : <b><?php echo $talk->writer; ?></b></div></div>
                              <?php } ?>
                            <?php endforeach; } ?>
						</p>
                    </div>

				              </div><!--/row-->

                <div class="row margin-bottom-15">
                    <div class="col-md-12 sm-margin-bottom-20">
                        <div class="headline"><h2 class="heading-sm"> &nbsp; 업체 검색결과 &nbsp;</h2><a class="osmore-btn next-v2 pull-right"  onclick="goshop()" title="전체보기"><i class="fa fa-plus"></i></a></div>
                        <p>
                            <?php if ($searchShop) {
                            foreach ($searchShop as $shop): ?>
                            <div style="width:100%; height:120px;">
                                <a href="/web/user/shop/home/<?php echo $shop->id; ?>" style="display:inline-block;">
                                    <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                    <img class="img-responsive" style="width:140px; height:105px;" src="/static/corplogo/<?php echo $shop->corplogo; ?>">
                                </a>
                                <div style="width:60% auto; height:120px; display:inline-block; vertical-align:top; padding-top:25px; padding-left:30px">
                                    <h4><?php echo $shop->corpname; ?></h4><?php echo $shop->nickname . '/' . $shop->addressjibun; ?>
                                </div>
                            </div>

                            <?php endforeach; } ?>
                        </p>
                    </div>
                </div><!--/row-->
            </div>
            <!-- End Content -->
        </div>

    <!--=== End Content Part ===-->
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    <!--=== Footer ===-->
    <?php
     include './views/common/foot.php';
    ?>
  </div>
    <!--=== End Footer ===-->
    <div>
    <form method="post" action="/web/talk/whole/search/all/srh" id="talksearch">
        <input type="hidden" name="search_field" value="title"></input>
        <input type="hidden" class="form-control" name="search_keword" value="" id="talkkeyword"></input>
    </form>
    <form method="post" action="/web/user/shopfind/search/all/srh" id="shopsearch">
        <input type="hidden" name="srh_bizkind" value=""></input>
        <input type="hidden" name="srh_gagu" value=""></input>
        <input type="hidden" name="srh_brand" value=""></input>
        <input type="hidden" name="srh_region" value=""></input>
        <input type="hidden" class="form-control" name="find_word" value="" id="shopkeyword"></input>
    </form>
  </div>
</div><!--/wrapper-->

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/plugins/masonry/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
	App.init();

    //───────────────────────────────────
    var $container = $('.grid-boxes');
    var gutter = 20;
    var min_width = 200;
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector: '.grid-boxes-in',
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
function goproduct(){
  $("#productkeyword").val('<?php echo $kword; ?>');

  $("#productsearch").submit();
}
function gotalk(){
  $("#talkkeyword").val('<?php echo $kword; ?>');

  $("#talksearch").submit();
}
function goshop(){
  $("#shopkeyword").val('<?php echo $kword; ?>');

  $("#shopsearch").submit();
}
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
