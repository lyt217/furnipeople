<?php
 include './views/common/header_menu_talk.php';
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


                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-market">
                    <!-- Furni Market -->
                    <li class="list-group-item list-toggle rounded">
                        <a data-toggle="collapse" data-parent="#sidebar-market" href="#collapse-market" class="sidebar-furni rounded">Furni Market</a>
                        <ul id="collapse-market" class="collapse">
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

                <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-talk">
                    <!-- Furni Talk -->
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
                    <!-- End Furni Talk -->
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
                <div class="headline"><h3> &nbsp; Furni Q&amp;A &nbsp; </h3> 가구에 대해서 궁금한게 있나요? 이곳에서 마음껏 물어보시고, 회원님들중 아시는 분은 지식과 정보를 나누어 주세요.</div>
                <div class="margin-bottom-20"></div>

				<form class="form-horizontal" id="talk-form" role="form" action="/web/talk/qna/<?php echo $submit_action; ?>" method="post" accept-charset="utf-8">
					<div class="row">
						<div class="col-md-3">
							<select name="kind_code" class="form-control">
								<option value="a" <?php echo set_select('kind_code', 'a', @$kind_select['a']); ?>>자유</option>
								<option value="b" <?php echo set_select('kind_code', 'b', @$kind_select['b']); ?>>의자</option>
								<option value="c" <?php echo set_select('kind_code', 'c', @$kind_select['c']); ?>>책상</option>
								<option value="d" <?php echo set_select('kind_code', 'd', @$kind_select['d']); ?>>쇼파</option>
								<option value="e" <?php echo set_select('kind_code', 'e', @$kind_select['e']); ?>>침대</option>
								<option value="f" <?php echo set_select('kind_code', 'f', @$kind_select['f']); ?>>화장대</option>
								<option value="g" <?php echo set_select('kind_code', 'g', @$kind_select['g']); ?>>식탁</option>
								<option value="h" <?php echo set_select('kind_code', 'h', @$kind_select['h']); ?>>수납장</option>
								<option value="i" <?php echo set_select('kind_code', 'i', @$kind_select['i']); ?>>서랍</option>
								<option value="j" <?php echo set_select('kind_code', 'j', @$kind_select['j']); ?>>인테리어 제품</option>
								<option value="k" <?php echo set_select('kind_code', 'k', @$kind_select['k']); ?>>기타 가구들</option>
							</select>
						</div>
						<div class="col-md-9 no-space-left">
							<input type="text" name="talk_title" class="form-control" value="<?php echo set_value('talk_title', @$articleOne->title); ?>" maxlength="100" placeholder="제목">
							<?php echo form_error('talk_title', '<div class="alert alert-warning fade in">', '</div>'); ?>
						</div>
					</div>

                	<textarea name="talk_content" class="summernote" id="summernote"><?php echo set_value('talk_content', @$articleOne->question); ?></textarea>

                    <?php if (@$articleOne->mentcount == 0) { ?>
                    <div class="radio">
                        <label><input type="radio" name="ment_yn" value="Y" <?php echo set_checkbox('ment_yn', 'Y', @$mentyn_radio['Y']); ?>> 댓글 허용</label> &nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="ment_yn" value="N" <?php echo set_checkbox('ment_yn', 'N', @$mentyn_radio['N']); ?>> 댓글 미허용</label>
                    </div>
                    <?php } ?>

					<?php if ( ! $this->session->has_userdata('user_id')) { ?>
					<div class="row margin-top-20">
						<div class="col-md-3">
							<input type="text" name="guest_writer" class="form-control" value="<?php echo set_value('guest_writer', @$articleOne->writer); ?>" maxlength="13" placeholder="작성자명">
						</div>
						<div class="col-md-3 no-space-left">
							<input type="password" name="guest_passwd" class="form-control" value="" maxlength="12" placeholder="비밀번호 (4~12자)">
						</div>
						<div class="col-md-4 no-space-left">
							<input type="text" name="guest_email" class="form-control" value="<?php echo set_value('guest_email'); ?>" maxlength="28" placeholder="이메일주소">
						</div>
					</div>
					<div class="margin-bottom-20">
						<div class="g-recaptcha" data-callback="recaptchaGrant" data-expired-callback="recaptchaDeny" data-sitekey="6LfQxBYTAAAAADX8lYuo2G3kJNpskehG4E1pY-rQ"></div>
					</div>
					<?php echo form_error('guest_writer', '<div class="alert alert-warning fade in">', '</div>'); ?>
					<?php echo form_error('guest_passwd', '<div class="alert alert-warning fade in">', '</div>'); ?>
					<?php echo form_error('guest_email', '<div class="alert alert-warning fade in">', '</div>'); ?>

					<?php if ($this->session->flashdata('deny_msg')) { ?>
					<div class="contex-bg margin-bottom-20">
						<p class="bg-primary"><?php echo $this->session->flashdata('deny_msg'); ?></p>
					</div>
					<?php } ?>

					<div class="text-center">
						<?php if ($delete_btn) { ?><button type="button" class="btn-u btn-u-dark pull-right" id="delete-btn" disabled="disabled"> &nbsp;&nbsp;&nbsp; 삭 제 &nbsp;&nbsp;&nbsp; </button> &nbsp;&nbsp;<?php } ?>
						<button type="button" class="btn-u btn-u-default" onclick="<?php echo $return_jscript; ?>">돌아가기</button> &nbsp;&nbsp;
						<button type="submit" class="btn-u btn-u-dark-blue" id="submit-btn" disabled="disabled"> &nbsp;&nbsp;&nbsp; 등 록 &nbsp;&nbsp;&nbsp; </button>
					</div>
					<?php } else { ?>
					<div class="text-center">
					    <?php if ($delete_btn) { ?><button type="button" class="btn-u btn-u-dark pull-right" id="delete-btn"> &nbsp;&nbsp;&nbsp; 삭 제 &nbsp;&nbsp;&nbsp; </button> &nbsp;&nbsp;<?php } ?>
						<button type="button" class="btn-u btn-u-default" onclick="<?php echo $return_jscript; ?>">돌아가기</button> &nbsp;&nbsp;
						<button type="submit" class="btn-u btn-u-dark-blue"> &nbsp;&nbsp;&nbsp; 등 록 &nbsp;&nbsp;&nbsp; </button>
					</div>
					<?php } ?>
				</form>

				<div id="xhr_status"></div>
				<div id="xhr_result"></div>
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

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>

<?php if ($this->session->has_userdata('user_id')) { ?>
<script type="text/javascript" src="/assets/plugins/smnote/smnote-member.js"></script>
<?php } else { ?>
<script type="text/javascript" src="/assets/plugins/smnote/smnote-guest.js"></script>
<?php } ?>

<script type="text/javascript" src="/assets/plugins/smnote/smnote-kr.min.js"></script>
<script type="text/javascript" src="/assets/plugins/filestyle/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="/assets/js/md5-min.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    $('#summernote').summernote({
        height: 400,
        lang: 'ko-KR',
    });

    $(":file").filestyle({buttonText: '파일 찾기'});

    <?php if ($this->session->has_userdata('user_id')) { ?>
    //───────────────────────────────────
	function xhr_send(f, e) {
		if (f) {
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4) {
					$('.note-image-url').val('/static/talkphoto/' + xhr.responseText);
					$('.note-image-btn').trigger('click');
				}
			};
			xhr.open("POST", "/web/talk/qna/ajax_upload_photo");
			xhr.setRequestHeader("Cache-Control", "no-cache");
			xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
			xhr.setRequestHeader("X-File-Name", hex_md5(f.name)+'.jpg');
			xhr.send(f);
			$('#xhr_field').val('');
		}
	}

	function xhr_parse(f, e) {
		if (f) {
          console.log("File selected : " + f.name + "(" + f.type + ", " + f.size + ")");
        } else {
          console.log("No file selected!");
        }
	}

	var xhr = new XMLHttpRequest();
	if (xhr && window.File && window.FileList) {
		var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
			xhr_file = this.files[0];
			xhr_parse(xhr_file, "xhr_status");
		};

        document.getElementById("xhr_upload").onclick = function (e) {
			e.preventDefault();
			xhr_send(xhr_file, "xhr_result");
		};
	}
    <?php } ?>

    <?php if ($delete_btn === TRUE) { ?>
    $('#delete-btn').bind('click', function () {
        $('#talk-form').attr('action', '/web/talk/qna/<?php echo $submit_action; ?>/delete').submit();
    });
    <?php } ?>

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
