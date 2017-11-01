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
        <div class="row">

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3"><!-- 만일 필요하면 tag-box tag-box-v3 말고 bg-light 사용하면 숨겨진 박스가 없어져 박스끝으로 여백이 감 -->

                <!-- 업체유저 -->
                <div class="row">
                    <div class="col-md-6 sm-margin-bottom-10">
                        <div style="width: 380px; height: 216px; border: solid 1px #eee; display: table-cell; vertical-align: middle; text-align: center;">
                            <img src="/static/corplogo/<?php echo $providerOne->corplogo; ?>" style="max-width: 380px; max-height: 216px; display: block;">
                        </div>
                    </div>
                    <div class="col-md-6 news-v3">
                        <div class="news-v3-in-sm no-padding">
                            <div class="margin-bottom-5"></div>
                            <h2 class="no-margin-bottom text-bold color-dark-blue"><?php echo $providerOne->corpname; ?></h2>
                            <div class="margin-bottom-10"></div>
							<table style="line-height: 1.8;">
								<tr><td style="width: 80px;">업종</td><td><?php echo $providerOne->bizcategory; ?></td></tr>
								<tr><td>기업형태</td><td><?php echo $providerOne->corpkind; ?></td></tr>
								<tr><td>대표번호</td><td><?php echo $providerOne->corpphone; ?></td></tr>
								<tr><td>주소</td><td><?php echo $providerOne->addressjibun; ?></td></tr>
							</table>
                        </div>
                        <hr style="margin: 10px 0 12px;">
                        <div class="input-group">
                            <textarea name="message" id="chatt-message" class="form-control" rows="2" style="resize: none;" maxlength="300" placeholder="담당자에게 보낼 메시지를 작성하세요."></textarea>
                            <span class="input-group-btn"><button type="button" id="chatt-btn" class="btn-u btn-u-dark" style="height: 52px;">보내기</button></span>
                        </div>
                    </div>
                </div>
                <!-- End 업체유저 -->
                <hr style="margin: 10px 0 20px;">

                <!-- 상세 설명 -->
                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 업체소개</h5>
                	<div><?php echo nl2br($providerOne->introduce); ?></div>
                </div>
                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-television"></i> 포트폴리오</h5>

                    <!-- 포트폴리오 -->
                    <?php if ($pofolList) { ?>
                      <div class="blog_masonry_3col">
                          <div class="grid-boxes">


                              <?php foreach ($pofolList as $portfolio): ?>
                              <div class="grid-boxes-in"><!-- easy-block-v1 easy-block-v2 -->
                                  <a href="/web/market/portfolio/detail/<?php echo $portfolio['id'] ?>" title="상세보기" target="_self">
                                      <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                      <img class="img-responsive full-width" src="/static/portfolio/<?php echo $portfolio['devidefolder'] .'/thumb/'. $portfolio['thumunqname']; ?>">
                                  </a>
                                  <div class="grid-boxes-caption text-center">
                                      <h3><?php echo $portfolio['introduce']; ?> </h3>
                                      <p><?php echo $portfolio['startdate'] . ' ~ ' . $portfolio['finishdate']; ?></p>
                                  </div>
                              </div>
                              <?php endforeach; ?>

                          </div>
                      </div>
                    <!-- <div id="portfolio" class="slider-pro">
                        <div class="sp-slides">
                            <?php for ($i = 0; $i < count($pofolList); $i++) { ?>
                                  <div class="sp-slide">
                                      <img class="sp-image" src="/assets/plugins/bqworks_sliderpro/images/blank.gif"
                                          data-src="/static/portfolio/<?php echo $pofolList[$i]['devidefolder'] .'/'. $pofolList[$i]['imageunqname']; ?>">

                                      <p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-vertical="0" data-width="100%" data-show-transition="up" style="font-size: 16px;">
                                          <?php echo '제목 : ' . $pofolList[$i]['introduce']; ?>
                                          <span class="pull-right">작업기간 : <?php echo $pofolList[$i]['startdate'] . ' ~ ' . $pofolList[$i]['finishdate']; ?></span>
                                      </p>
                                  </div>
                            <?php } ?>
                        </div>
                        <div class="sp-thumbnails">
                            <?php for ($i = 0; $i < count($pofolList); $i++) { ?>
                              <?php if(is_array($pofolList[$i]['photolist'])){
                                for($j = 0 ; $j < count($pofolList[$i]['photolist']); $j++){ ?>
                                  <img class="sp-thumbnail" src="/static/portfolio/<?php echo $pofolList[$i]['photolist'][$j]['devidefolder'] .'/thumb/'. $pofolList[$i]['photolist'][$j]['thumunqname']; ?>">
                              <?php } } } ?>
                        </div>
                    </div>
                    <?php } else { ?> -->
                    <?php if ($this->session->userdata('group_mkind') == '기업회원' && $this->session->userdata('user_id') == $providerOne->id) { ?>
                    <div class="alert alert-danger fade in">
                        <h4>포트폴리오가 없네요!</h4>
                        <p>필요시 회원정보 &gt; 포트폴리오 등록페이지에서 업로드 하세요.
                        <span class="pull-right"><a class="btn-u btn-u-red" href="/web/user/shop/updateportfolio">포트폴리오 등록</a></span></p>
                    </div>
                    <?php } } ?>
                    <!-- End 포트폴리오 -->
                </div>
                <hr style="margin: 10px 0 12px;">
                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-television"></i> 등록상품 <?php echo ($productTopx) ? '<span class="pull-right"><a href="/web/user/shop/product/' . $providerOne->id . '"><i class="fa fa-plus-square-o"></i>상품전체보기</a></span>' : ''; ?></h5>

                    <!-- 등록 상품 -->
                    <?php if ($productTopx) { ?>
                    <div class="blog_masonry_3col">
                        <div class="grid-boxes">


                            <?php foreach ($productTopx as $product): ?>
                            <div class="grid-boxes-in"><!-- easy-block-v1 easy-block-v2 -->
                                <a href="/web/market/product/detail/<?php echo $product->id; ?>" title="상세보기">
                                    <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                    <img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                                </a>
                                <div class="grid-boxes-caption text-center">
                                    <h3><?php echo $product->prodtitle; ?> </h3>
                                    <p><?php echo $product->brand . ' / ' . $product->prodstate; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php } else { ?>
                    <?php if ($this->session->userdata('group_mkind') == '기업회원' && $this->session->userdata('user_id') == $providerOne->id) { ?>
                    <div class="alert alert-danger fade in">
                        <h4>등록된 상품이 없네요!</h4>
                        <p>필요시 내물건 판매하기 페이지에서 상품을 등록하세요.
                        <span class="pull-right"><a class="btn-u btn-u-red" href="/web/market/product/register">내물건 판매하기</a></span></p>
                    </div>
                    <?php } } ?>
                    <!-- End 등록 상품 -->

                </div>
                <!-- End 상세 설명 -->
                <hr>
                <div class="row">
					<div class="text-right">
                        <?php if ($return_sep == 'close') { ?>
                        <button type="button" class="btn-u btn-u-dark" onclick="javascript:window.close();">&nbsp; 닫기 &nbsp;</button>
                        <?php } ?>
					</div>
				</div>

            </div>
            <!-- End Content -->
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== Footer v6 ===-->
    <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="position:absolute; bottom:10px;"
    <?php
     include './views/common/foot.php';
    ?>
    <!--=== End Footer v6 ===-->
</div><!--/wrapper-->

<!-- 글로벌 필수 -->
<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 플러그인 가동 -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="/assets/plugins/masonry/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bqworks-sliderpro/jquery.sliderPro.min.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript" src="/assets/js/chatt.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    /** ───────────────────────────────────
     * 포트폴리오 슬라이드
     */
    $('#portfolio').sliderPro({
        width: 1024,    //고정 이미지 사이즈
        //width: '100%',    //높이는 %안됨
        height: 600,
        //aspectRatio: 2,    //2면 무난한 사이즈 적용됨
        fade: true,
        arrows: true,
        buttons: false,
        fullScreen: true,
        shuffle: false,    //랜덤 이미지 로드
        smallSize: 400,    //화면이 줄어 이미지가 이 사이즈에 도달하면 small로 지정한 이미지를 로딩함
        mediumSize: 1024,    //기본 웹브라우저 상태, 기본 이미지는 medium을 로딩하자.
        largeSize: 3000,    //확대버튼으로 이미지를 볼 때 large로 지정한 이미지를 로딩
        thumbnailArrows: true,
        imageScaleMode: 'contain',
        autoplay: false
    });

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

    /** ───────────────────────────────────
     * 쪽지 보내기
     */
    $('#chatt-btn').bind('click', function () {
        $('#chatt-message').chattsend({
            receiveridx: <?php echo $providerOne->id; ?>,
            receiverkind: 'provider',
            message: $('#chatt-message').val()
        });
    });

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
<link rel="stylesheet" href="/assets/plugins/bqworks-sliderpro/slider-pro.css">
<script type="text/javascript" src="/assets/plugins/bqworks-sliderpro/jquery.sliderPro.js"></script>
<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
