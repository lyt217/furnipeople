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
<link rel="stylesheet" href="/assets/plugins/fancybox/source/jquery.fancybox.css">

    <!--=== Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
      <?php
      include './views/common/leftmenu.php';
       ?>
        <div class="row">
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3"><!-- 만일 필요하면 tag-box tag-box-v3 말고 bg-light 사용하면 숨겨진 박스가 없어져 박스끝으로 여백이 감 -->

                <!-- 제품사진부 -->
                <div class="row">
                    <div class="col-md-6 sm-margin-bottom-20" style="position:relative;">
                        <a href="/static/marketphoto/<?php echo $productPhoto[0]['devidefolder'] .'/'. $productPhoto[0]['imageunqname']; ?>" rel="prod" class="fancybox" title="제품 이미지 1">
                            <img class="img-responsive img-bordered" src="/static/marketphoto/<?php echo $productPhoto[0]['devidefolder'] .'/thumb/'. $productPhoto[0]['thumunqname']; ?>">
                        </a>
                        <?php if($productOne->soldout == '매진'){ ?>
                         <img src = "/assets/img/icons/soldout.png" style="position:absolute; left:16px; top:0px; widht:108px; height:108px;">
                        <?php } ?>
                        <!-- Photostream -->
                        <ul class="list-inline blog-photostream">
                            <?php for ($i = 1; $i < count($productPhoto); $i++) { ?>
                            <li>
                                <a href="/static/marketphoto/<?php echo $productPhoto[$i]['devidefolder'] .'/'. $productPhoto[$i]['imageunqname']; ?>" rel="prod" class="fancybox img-hover" title="제품 이미지 <?php echo $productPhoto[$i]['seq']; ?>">
                                    <img class="img-responsive" src="/static/marketphoto/<?php echo $productPhoto[$i]['devidefolder'] .'/thumb/'. $productPhoto[$i]['thumunqname']; ?>">
                                </a>

                            </li>
                            <?php } ?>
                        </ul>
                        <!-- End Photostream -->
                    </div>
                    <div class="col-md-6 news-v3">
                        <div class="news-v3-in-sm no-padding">
                            <!--ul class="list-inline posted-info"><li>등록일</li></ul-->
                            <div class="margin-bottom-5"></div>
                            <h2 class="no-margin-bottom text-bold"><?php echo $productOne->prodtitle; ?></h2>
                            <div class="margin-bottom-5"></div>
                            <h2 class="margin-bottom-10 text-bold color-red"><?php echo number_format($productOne->sellprice); ?>원</h2>

							<table style="line-height: 1.8;">
								<tr><td style="width: 80px;">닉네임</td><td><?php echo $productOne->nickname; ?></td></tr>
								<tr><td>가구상태</td><td><?php echo $productOne->prodstate; ?></td></tr>
								<tr><td>등록일</td><td><?php echo date('Y-m-d', strtotime($productOne->regdate)); ?></td></tr>
								<tr><td>주소</td><td><?php echo $productOne->address; ?></td></tr>
								<tr><td>연락처</td><td><?php echo $productOne->phone; ?></td></tr>
							</table>

                            <ul class="post-shares">
                                <li><a href="javascript:void(0);" id="chattcnt-btn" title="쪽지대화 건수"><i class="rounded-x icon-speech"></i><span><?php echo $productOne->chattcnt; ?></span></a></li>
                                <li><a href="javascript:void(0);" id="favorite-btn" title="관심가구로 등록"><i class="rounded-x icon-heart"></i><span><?php echo $productOne->interestcnt; ?></span></a></li>
                            </ul>
                        </div>
                        <hr style="margin: 10px 0 12px;">
                        <div class="input-group">
                            <textarea name="message" id="chatt-message" class="form-control" rows="2" style="resize: none;" maxlength="300" placeholder="판매자에게 보낼 메시지를 작성하세요."></textarea>
                            <span class="input-group-btn"><button type="button" id="chatt-btn" class="btn-u btn-u-dark" style="height: 52px;">보내기</button></span>
                        </div>
                        <p id="chatt-result"></p>
                    </div>
                </div>
                <!-- End 제품사진부 -->
                <hr style="margin: 10px 0 20px;">

                <!-- 상세 설명 -->
                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 상세설명</h5>
                	<div><?php echo nl2br($productOne->explain); ?></div>
                </div>

                <?php if($productOne->linkurl){ ?>
                <!-- 제품 링크 -->
                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 링크열기</h5>
                	<div><a href='<?php echo $productOne->linkurl ?>' target='_blank'><?php echo $productOne->linkurl ?></a></div>
                </div>
                <?php } ?>

                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 가구정보</h5>
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td style="width: 20%" class="bg-color-brown text-center">브랜드</td>
								<td style="width: 30%"><?php echo $productOne->brand; ?></td>
								<td style="width: 20%" class="bg-color-brown text-center">가구종류</td>
								<td style="width: 30%"><?php echo $productOne->kindpname; ?></td>
							</tr>
							<tr>
								<td class="bg-color-brown text-center">구매일자</td>
								<td><?php echo $productOne->buydate; ?></td>
								<td class="bg-color-brown text-center">구입가격</td>
								<td><?php echo number_format($productOne->buyprice); ?>원</td>
							</tr>
							<tr>
								<td class="bg-color-brown text-center">가구상태</td>
								<td colspan="3"><?php echo $productOne->prodstate; ?></td>
							</tr>
							<tr>
								<td class="bg-color-brown text-center">사이즈정보</td>
								<td colspan="3"><?php echo $productOne->size; ?></td>
							</tr>
							<tr>
								<td class="bg-color-brown text-center">옵션정보</td>
								<td colspan="3"><?php echo $productOne->optioninfo; ?></td>
							</tr>
						</tbody>
					</table>
                </div>
                <div class="margin-bottom-25">
                	<h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 구매정보</h5>
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td style="width: 20%" class="bg-color-brown text-center">판매희망가격</td>
								<td style="width: 30%"><?php echo number_format($productOne->sellprice); ?>원</td>
								<td style="width: 20%" class="bg-color-brown text-center">가격협상여부</td>
								<td style="width: 30%"><?php echo $productOne->negoyn; ?></td>
							</tr>
							<tr>
								<td class="bg-color-brown text-center">연락처</td>
								<td><?php echo $productOne->phone; ?></td>
								<td class="bg-color-brown text-center">배송비부담</td>
								<td><?php echo $productOne->delivery; ?></td>
							</tr>
							<tr>
								<td class="bg-color-brown text-center">주소</td>
								<td colspan="3"><?php echo $productOne->address; ?></td>
							</tr>
						</tbody>
					</table>
                </div>
                <!-- End 상세 설명 -->

                <!-- 관련상품 몇개 전시 -->
                <hr>
                <?php if ($productTopx) { ?>
                <div class="margin-bottom-20 mobile-hide">
                    <h5 class="margin-bottom-15 text-bold"><i class="fa fa-television"></i> 같은 종류의 상품들<span class="pull-right"><a href="/web/market/product/search/<?php echo df_talk_uri($productOne->kindcode); ?>/no"><i class="fa fa-plus-square-o"></i>상품 더보기</a></span></h5>
                    <div class="blog_masonry_3col">
                        <div class="grid-boxes">
                            <?php foreach ($productTopx as $product): ?>
                            <div class="grid-boxes-in"><!-- easy-block-v1 easy-block-v2 -->
                                <a href="/web/market/product/detail/<?php echo $product->id; ?>" title="상세보기">
                                    <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                    <img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                                </a>
                                <div class="grid-boxes-caption text-center">
                                    <h3><?php echo $product->prodtitle; ?></h3>
                                    <p><?php echo number_format($product->sellprice) . '원 / ' . $product->prodstate; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php if ($product2Topx) { ?>
                <div class="margin-bottom-10 mobile-hide">
                    <?php if ($productOne->userdbtable == 'provider') { ?>
                    <h5 class="margin-bottom-15 text-bold"><i class="fa fa-television"></i> 판매자의 다른 상품들<span class="pull-right"><a href="/web/user/shop/product/<?php echo $productOne->user_id; ?>/all/no"><i class="fa fa-plus-square-o"></i>상품 더보기</a></span></h5>
                    <?php } else { ?>
                    <h5 class="margin-bottom-15 text-bold"><i class="fa fa-television"></i> 판매자의 다른 상품들<span class="pull-right"><a href="/web/user/shop/goods/<?php echo $productOne->user_id; ?>/all/no"><i class="fa fa-plus-square-o"></i>상품 더보기</a></span></h5>
                    <?php } ?>
                    <div class="blog_masonry_3col">
                        <div class="grid-boxes">
                            <?php foreach ($product2Topx as $product2): ?>
                            <div class="grid-boxes-in"><!-- easy-block-v1 easy-block-v2 -->
                                <a href="/web/market/product/detail/<?php echo $product2->id; ?>" title="상세보기">
                                    <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                    <img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product2->mainimage; ?>">
                                </a>
                                <div class="grid-boxes-caption text-center">
                                    <h3><?php echo $product2->prodtitle; ?></h3>
                                    <p><?php echo number_format($product2->sellprice) . '원 / ' . $product2->prodstate; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- End 관련상품 몇개 전시 -->

                <hr style="margin: 0 0 10px;">
                <div class="row">
					<div class="col-md-6">
                        <?php if ($productOne->user_id == $this->session->userdata('user_id') && $productOne->userdbtable == $this->session->userdata('group_table')) { ?>
						<a class="btn-u btn-u-default" href="/web/market/product/update/<?php echo $productOne->id; ?>">정보 수정</a> &nbsp;
						<a class="btn-u btn-u-default" href="/web/market/product/delete/<?php echo $productOne->id; ?>">물건 삭제</a> &nbsp;
						<a class="btn-u btn-u-default" href="/web/market/product/register">물건 추가</a> &nbsp;
            <?php if($productOne->soldout == '재고있음'){ ?>
              <a class="btn-u btn-u-default" onclick="javascript:setSoldout(<?php echo $productOne->id; ?>, true)";>제품 품절</a> &nbsp;
              <?php } else{ ?>
                <a class="btn-u btn-u-default" onclick="javascript:setSoldout(<?php echo $productOne->id; ?>, false)";>재고 있음</a> &nbsp;

                <?php } ?>

						<?php } ?>
					</div>
					<div class="col-md-6 text-right">
                        <?php if ($this->uri->segment(5) == 'close') { ?>
                        <button type="button" class="btn-u btn-u-dark" onclick="javascript:window.close();">&nbsp; 닫기 &nbsp;</button>
                        <?php } else { ?>
                        <button type="button" class="btn-u btn-u-dark" onclick="<?php echo $return_jscript; ?>">&nbsp;목록으로&nbsp;</button>
                        <?php } ?>
					</div>
				</div>
            </div>
            <!-- End Content -->
        </div>
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
<script type="text/javascript" src="/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/assets/plugins/masonry/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/assets/js/chatt.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    //───────────────────────────────────
    $('#chatt-btn').bind('click', function () {
        $('#chatt-message').chattsend({
            pagekind: 'product',
            productidx: <?php echo $productOne->id; ?>,
            receiveridx: <?php echo $productOne->user_id; ?>,
            receiverkind: '<?php echo $productOne->userdbtable; ?>',
            message: $('#chatt-message').val()
        });

    });

    //───────────────────────────────────
    $('#favorite-btn').bind('click', function () {
        $('#favorite-btn').favoriteAdd({
            productidx: <?php echo $productOne->id; ?>,
            prodowneridx: <?php echo $productOne->user_id; ?>,
            prodownerkind: '<?php echo $productOne->userdbtable; ?>'
        });
    });

    //───────────────────────────────────
    $('#chattcnt-btn').bind('click', function () {
        alert('주고받은 쪽지대화 건수입니다.');
    });

    //───────────────────────────────────
    jQuery(".fancybox").fancybox({
        groupAttr: 'data-rel',
        prevEffect: 'fade',
        nextEffect: 'fade',
        openEffect  : 'elastic',
        closeEffect  : 'fade',
        closeBtn: true,
        helpers: {
            title: {
                type: 'float'
                }
            }
        });

    //───────────────────────────────────
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

function setSoldout(product_idx, soldout) {
  if(soldout){
    if (confirm('정말 매진처리하시겠습니까?')) {
        $.ajax({
            url: '/web/market/product/soldout/' + product_idx,
            type: 'delete',
            dataType: 'text',
            success: function (data) {
                if (data == 'success')
                    window.location.reload(true);


            }
        });
    }
  }
  else{
    if (confirm('정말 재고가 있습니까?')) {
        $.ajax({
            url: '/web/market/product/stockin/' + product_idx,
            type: 'delete',
            dataType: 'text',
            success: function (data) {
                //alert(data);
                if (data == 'success')
                    window.location.reload(true);
            }
        });
    }
  }
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
