<?php
 include './views/common/header_menu_market.php';
?>


    <!--=== Job이미지와 제품검색 ===-->
    <div class="job-img margin-bottom-30">
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
          <?php
           include './views/common/sidemenu_left.php';
          ?>
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3"><!-- 만일 필요하면 tag-box tag-box-v3 말고 bg-light 사용하면 숨겨진 박스가 없어져 박스끝으로 여백이 감 -->

                <!-- 제품사진부 -->
                <div class="row">
                    <div class="col-md-6 sm-margin-bottom-20">
                        <a href="/static/marketphoto/<?php echo $productPhoto[0]['devidefolder'] .'/'. $productPhoto[0]['imageunqname']; ?>" rel="prod" class="fancybox" title="제품 이미지 1">
                            <img class="img-responsive img-bordered" src="/static/marketphoto/<?php echo $productPhoto[0]['devidefolder'] .'/thumb/'. $productPhoto[0]['thumunqname']; ?>">
                        </a>
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
						<a class="btn-u btn-u-default" href="/web/market/product/register">물건 추가</a>
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

            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">
                <ul class="list-unstyled blog-photos">
                    <li><a href="/web/market/chattpaper/mychatt"><img src="/static/webimage/btn-mymini1.png" alt="마이쪽지" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/myticket/index"><img src="/static/webimage/btn-mymini2.png" alt="마이에그" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
                    <li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
                </ul>

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
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
