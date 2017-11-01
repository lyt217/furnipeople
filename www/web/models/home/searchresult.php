<?php
 include './views/common/header_menu.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <!--=== Job이미지와 통검색 ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <form class="form-inline" action="/web/market/productfind/search/all/srh" method="post" accept-charset="utf-8" id="productsearch">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 no-padding">
                            <div class="input-group">
                                <!--span class="input-group-addon"><i class="fa fa-tag"></i></span-->
                                <input type="text" name="find_word" placeholder="가구검색어" class="form-control" id="productkeyword">
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
                                    <?php if($kindcode){ ?>
                                      <option value="">&nbsp;&nbsp; 가구별 &nbsp;&nbsp;</option>
                                      <?php foreach($kindcode as $code):?>
                                        <option value="<?php echo $code->name?>"><?php echo $code->name?></option>

                                    <?php endforeach;
                                    } else {?>
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
                                    <?php }?>
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
                <div class="row">
                    <form class="form-inline" action="/web/user/shopfind/search/all/srh" method="post" accept-charset="utf-8">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 no-padding">
                            <div class="input-group">
                                <!--span class="input-group-addon"><i class="fa fa-tag"></i></span-->
                                <input type="text" name="find_word" placeholder="업체검색어" class="form-control">
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
                                  <?php if($kindcode){ ?>
                                    <option value="">&nbsp;&nbsp; 가구별 &nbsp;&nbsp;</option>
                                    <?php foreach($kindcode as $code):?>
                                      <option value="<?php echo $code->name?>"><?php echo $code->name?></option>

                                  <?php endforeach;
                                  } else {?>
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
                                  <?php }?>
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
                                <select name="srh_bizkind" class="form-control">
                                    <option value="">&nbsp;&nbsp; 업종별 &nbsp;&nbsp;</option>
                                    <option value="가구판매점">가구판매점</option>
                                    <option value="인테리어">인테리어</option>
                                    <option value="기타">기타</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn-u btn-block btn-u-red">업체검색</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--=== End Job이미지와 통검색 ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
            <!-- Begin Left Sidebar Menu Box (Type 1) -->
            <!-- End Left Sidebar Menu Box -->
                <?php include('./views/common/sidemenu_left.php'); ?>
            <!-- Begin Content -->
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

            <!-- Begin Right Sidebar Menu -->
            <?php include('./views/common/sidemenu_right.php'); ?>

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== Footer ===-->
    <?php
     include './views/common/foot.php';
    ?>
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
