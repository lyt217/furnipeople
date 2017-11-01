<?php
 include './views/common/header_menu.php';
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
            <?php include('./views/common/sidemenu_left.php'); ?>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Notice &nbsp; </h3></div>
                <div class="margin-bottom-20"></div>

                <!-- Inline Search -->
				<div class="margin-bottom-25 text-right">
					<form class="form-inline" role="form" action="" method="post" accept-charset="utf-8">
						<div class="input-group">
							<?php if ($this->session->has_userdata('search_field')) {
						    	switch ($this->session->userdata('search_field')) {
                                    case 'title':
                                        $search_field[0] = TRUE;
                                        break;
									case 'content':
										$search_field[1] = TRUE;
										break;
								}
							} ?>
							<select name="search_field" class="form-control">
                                <option value="title" <?php echo set_select('search_field', 'title', @$search_field[0]); ?>>제목</option>
                                <option value="content" <?php echo set_select('search_field', 'content', @$search_field[1]); ?>>내용</option>
							</select>
						</div>
						<div class="input-group">
							<input type="text" class="form-control" name="search_keword" value="<?php echo $this->session->userdata('search_keword'); ?>">
							<span class="input-group-btn"><button class="btn-u btn-u-dark" type="submit"><i class="fa fa-search"></i> 검색</button></span>
							<span class="input-group-btn"><button class="btn-u btn-u-default" type="button" onclick="javascript:window.location.href='/web/service/notice/search/all/no'"> 초기화</button></span>
						</div>
					</form>
				</div>
                <!-- End Inline Search -->

                <!-- Furni Talk Table -->
                <table class="table table-hover hrefcolor-basic">
                    <thead>
                        <tr>
                            <th class="hidden-sm">번호</th>
                            <th>제목</th>
                            <th>공지일</th>
                            <th class="hidden-sm">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php if ($articleList) {
                    	foreach ($articleList as $article): ?>
                        <tr>
                            <td class="hidden-sm"><?php echo $numbering--; ?></td>
                            <td>
                            	<a href="/web/service/notice/article/<?php echo $article->id; ?>"><?php echo title_utfcut($article->title); ?></a>
                            	<!--span class="badge badge-aqua rounded">New</span-->
							</td>
                            <td><?php echo date('Y.m.d', strtotime($article->regdate)); ?></td>
                            <td class="hidden-sm"><?php echo $article->readcount; ?></td>
                        </tr>
						<?php endforeach; } ?>
                    </tbody>
                </table>
                <!-- End Furni Talk Table -->

                <div class="text-center">
                	<?php echo $pagination; ?>
				</div>
				<?php if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹') { ?>
				<div class="text-right">
					<a class="btn-u btn-u-yellow" href="/web/service/notice/create"> &nbsp;&nbsp; 공지작성 &nbsp;&nbsp; </a>
				</div>
				<?php } ?>

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

<!-- 글로벌 필수 -->
<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 플러그인 가동 -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/app.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

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
