<?php
 include './views/common/header_menu_friend.php';
?>

    <!--=== Job이미지와 통검색 ===-->
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
                        <a data-toggle="collapse" data-parent="#sidebar-talk" href="#collapse-talk" class="sidebar-furni rounded">Furni Talk</a>
                        <ul id="collapse-talk" class="collapse in">
                            <li><a href="/web/talk/best/search/all/no">Furni Talk Best</a></li>
                            <li><a href="/web/talk/free/search/all/no">Furni Talk</a></li>
                            <li><a href="/web/talk/qna/search/all/no">Furni Q&amp;A</a></li>
                            <li><a href="/web/talk/review/search/all/no">Furni Review</a></li>
                            <li><a href="/web/talk/info/search/all/no">Furni Info</a></li>
                            <li><a href="/web/talk/photo/search/all/no">Furni Photos</a></li>
                            <li><a href="/web/talk/advertise/search/all/no">Furni Ads</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-market">
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
                </ul>

                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-friend">
                    <li class="list-group-item list-toggle rounded active">
                        <a data-toggle="collapse" data-parent="#sidebar-friend" href="#collapse-friend" class="sidebar-furni rounded">Furni Friends</a>
                        <ul id="collapse-friend" class="collapse in">
                            <li><a href="/web/user/shopfind/search/a/no">가구판매점</a></li>
                            <li><a href="/web/user/shopfind/search/b/no">인테리어</a></li>
                            <li><a href="/web/user/shopfind/search/d/no">기타</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End Left Sidebar Menu Box -->

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
                    <div id="portfolio" class="slider-pro">
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
                            <img class="sp-thumbnail" src="/static/portfolio/<?php echo $pofolList[$i]['devidefolder'] .'/thumb/'. $pofolList[$i]['thumunqname']; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <?php } else { ?>
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
                                    <h3><?php echo $product->kindpname; ?> <?php echo number_format($product->sellprice); ?></h3>
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

    <!--=== Footer v6 ===-->
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

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
