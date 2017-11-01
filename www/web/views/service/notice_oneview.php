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
                                    <option value="설치/배송">설치/배송</option>
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

                <!-- 아티클 -->
                <div class="talk-titlebar">
                    <span class="pull-left"> <?php echo $articleOne->title; ?></span>
                    <span class="pull-right"><?php echo date('Y.m.d A g:i', strtotime($articleOne->regdate)); ?></span>
                </div>
                <div class="talk-titlebar">
                    <span class="pull-right">조회수 <?php echo $articleOne->readcount; ?></span>
                </div>
                <div class="talk-contents">
                	<?php echo $articleOne->content; ?>
                </div>

                <div class="row margin-top-20">
					<div class="col-md-6">
					    <?php if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹') { ?>
						<a class="btn-u btn-u-default" href="/web/service/notice/update/<?php echo $articleOne->id; ?>">수정/삭제</a>
						<?php } ?>
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn-u btn-u-dark" onclick="<?php echo $return_jscript; ?>">목록으로</button> &nbsp;
						<?php if ($articleOne->mentyn == 'Y') { ?><button type="submit" class="btn-u btn-u-dark-blue" id="newment-btn"> &nbsp; 댓글쓰기 &nbsp; </button><?php } ?>
					</div>
				</div>
				<!-- End 아티클 -->

				<div class="margin-bottom-30" id="ment-scroll"></div>

                <!-- 댓글 작성폼 -->
                <div id="new-mentform" style="display: none;">
                    <textarea id="root-comment" class="form-control margin-bottom-10" rows="3" maxlength="1000"></textarea>
                    <div class="row sm-margin-bottom-10">
                        <?php if ( ! $this->session->has_userdata('user_id')) { ?>
                        <div class="col-md-3">
                            <input type="text" id="root-writer" class="form-control input-sm" value="" maxlength="13" placeholder="작성자명">
                        </div>
                        <div class="col-md-3 no-space-left">
                            <input type="password" id="root-passwd" class="form-control input-sm" value="" maxlength="12" placeholder="비밀번호 (4~12자)">
                        </div>
                        <div class="col-md-4 no-space-left">
                            <input type="text" id="root-email" class="form-control input-sm" value="" maxlength="28" placeholder="이메일주소">
                        </div>
                        <?php } ?>
                        <div class="col-md-2">
                            <button type="button" id="rootment-submit" class="btn-u btn-u-sm btn-u-dark">댓글등록</button>
                        </div>
                    </div>
                    <div id="mentcreate-msg" class="margin-bottom-20"></div>
                    <!--div class="margin-bottom-20">
                        <div class="g-recaptcha" data-callback="recaptchaGrant" data-expired-callback="recaptchaDeny" data-sitekey="6LfQxBYTAAAAADX8lYuo2G3kJNpskehG4E1pY-rQ"></div>
                    </div-->
                </div>
                <!-- End 댓글 작성폼 -->

				<!-- Comments -->
				<div id="current-uri" style="display: none;"></div>
				<div class="profile">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>Comments <?php echo $articleOne->mentcount; ?>개</h2>
                            <!--a href="#"><i class="fa fa-cog pull-right"></i></a-->
                        </div>
                        <div class="panel-body" id="comment-list">

                        </div>
                    </div>
				</div>
                <!-- End Comments -->

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
<script type="text/javascript" src="/assets/plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.js"></script>

<!-- 플러그인 가동 -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/furnitalk/notice_ment.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

	/** ───────────────────────────────────
	 * 댓글 목록 기본 리스팅
	 */
	<?php if ($articleOne->mentcount > 0) { ?>
	var calluri = '/web/talk/comment/search/notice/asc';
    var param_post = {
            total_rows: <?php echo $articleOne->mentcount; ?>,
            talkidx: <?php echo $articleOne->id; ?>
		};

	$('<div>').load(calluri, param_post, function (response, status, xhr) {
		if (status == 'error') {
			$('#mentcreate-msg').html('Comments System Error: ' + xhr.status + ' / ' + xhr.statusText);
		} else {
			$('#comment-list').html(response);
		}
	});
	<?php } ?>

	<?php if ($articleOne->mentyn == 'N') { ?>
	$('.profile').hide();
	<?php } ?>

    /** ───────────────────────────────────
     * 댓글 목록에 있는 수정, 삭제, 답글 처리
     */
	$('#comment-list').delegate('.iconclick', 'click', function () {
		//폼 영역 노드 토글
		var formnode = $(this).parent();
		formnode = formnode.parent();
		formnode = formnode.parent().next();
		formnode.toggle('fast');

		//기존 코멘트 내용 사용
		var mentnode = $(this).parent();
		mentnode = mentnode.parent();
		var content = mentnode.prev().text();

		var caseproc = $(this).attr('id').split('-');
        switch (caseproc[0])
        {
            case 'ireply':
            	$('#subcomment-'+caseproc[1]).text('');
            	$('#replymit-'+caseproc[1]).text('답글등록');
            break;
            case 'imodify':
            	$('#subcomment-'+caseproc[1]).text(content);
				$('#replymit-'+caseproc[1]).text('댓글수정');
            break;
            case 'idelete':
            	$('#subcomment-'+caseproc[1]).text(content);
                $('#replymit-'+caseproc[1]).text('댓글삭제');
            break;
            case 'replymit':
				var current_uri = $('#current-uri').text();
				if (current_uri == '' || current_uri =='#')
					current_uri = '/web/talk/comment/search/notice/asc';

		    	<?php if ($this->session->has_userdata('user_id')) { ?>
		        $('#resultsubmsg-'+caseproc[1]).mentproc({
		            talkidx: <?php echo $articleOne->id; ?>,
		            mentidx: caseproc[1],
		            submitkind: $('#replymit-'+caseproc[1]).text(),
		            comment: $('#subcomment-'+caseproc[1]).val(),
		            menturi: current_uri,
		            usertype: 'member'
		        });
		        <?php } else { ?>
		        $('#resultsubmsg-'+caseproc[1]).mentproc({
		        	talkidx: <?php echo $articleOne->id; ?>,
		        	mentidx: caseproc[1],
		        	submitkind: $('#replymit-'+caseproc[1]).text(),
		            writer: $('#subwriter-'+caseproc[1]).val(),
		            passwd: $('#subpasswd-'+caseproc[1]).val(),
		            email: $('#subemail-'+caseproc[1]).val(),
		            comment: $('#subcomment-'+caseproc[1]).val(),
		            menturi: current_uri,
		        });
				<?php } ?>

            break;
        }
    	return false;
    });

	//루트 댓글 작성폼 토글
	$('#newment-btn').bind('click', function () {
		$('#new-mentform').toggle('fast');
    });

    /** ───────────────────────────────────
     * 작성한 루트 댓글 처리
     */
    $('#rootment-submit').bind('click', function (e) {
        var last_page = (<?php echo $articleOne->mentcount; ?>+1) / 20;
        last_page = Math.ceil(last_page);
        var current_uri = '/web/talk/comment/search/notice/asc/'+last_page;

    	<?php if ($this->session->has_userdata('user_id')) { ?>
		//회원용 루뜨 코멘트
        $('#mentcreate-msg').rootment({
            talkidx: <?php echo $articleOne->id; ?>,
            comment: $('#root-comment').val(),
            menturi: current_uri,
            usertype: 'member'
        });
        <?php } else { ?>
        $('#mentcreate-msg').rootment({
        	talkidx: <?php echo $articleOne->id; ?>,
            writer: $('#root-writer').val(),
            passwd: $('#root-passwd').val(),
            email: $('#root-email').val(),
            comment: $('#root-comment').val(),
            menturi: current_uri
        });
		<?php } ?>
    });

});


/** ───────────────────────────────────
 * 댓글 목록 호출형 리스팅
 */
var commentReload = function (roaduri) {
	if (roaduri != '#')
		var calluri = roaduri;
	else
		return;

	var param_post = {
            total_rows: 'none',
            talkidx: <?php echo $articleOne->id; ?>
		};

	//console.log( roaduri );
	$('<div>').load(calluri, param_post, function (response, status, xhr) {
		if (status == 'error') {
			$('#mentcreate-msg').html('Comments System Error2: ' + xhr.status + ' / ' + xhr.statusText);    //Debug Use
		} else {
			$('#comment-list').html(response);
		}
	});

};
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
