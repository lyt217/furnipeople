<<?php
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
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">

    <!--=== Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
      <?php
      include './views/common/leftmenu.php';
       ?>
           <div class="row">
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Furni Q&amp;A &nbsp; </h3> 가구에 대해서 궁금한게 있나요? 이곳에서 마음껏 물어보시고, 회원님들중 아시는 분은 지식과 정보를 나누어 주세요.</div>
                <div class="margin-bottom-20"></div>

                <!-- 아티클 -->
                <div class="talk-titlebar">
                    <span><?php echo $articleOne->kindpname; ?> &nbsp;&nbsp;&nbsp; </span> <span class="margin-left-10"> <?php echo $articleOne->title; ?></span>
                    <span class="pull-right"><?php echo date('Y.m.d A g:i', strtotime($articleOne->regdate)); ?></span>
                </div>
                <div class="talk-titlebar">
                    <span><?php echo $articleOne->writer; ?></span>
                    <span class="pull-right"> &nbsp;|&nbsp;조회수 <?php echo $articleOne->readcount; ?></span>
                    <span class="pull-right">추천수 <?php echo $articleOne->onechucnt; ?></span>
                </div>
                <div class="talk-contents">
                	<?php echo $articleOne->question; ?>
                    <div class="text-right margin-top-20">
                        <a onclick="javascript:recommChu(<?php echo $articleOne->id; ?>);" title="추천시 클릭" style="cursor: pointer;"><i class="icon-custom icon-sm rounded-x icon-bg-dark-blue fa fa-thumbs-o-up"></i> <span id="recomm-cnt">추천수 <?php echo $articleOne->onechucnt; ?></span></a>
                    </div>
                </div>

                <?php if ($articleOne->answertitle) { ?>
                <!-- 답변 -->
                <div class="talk-titlebar">
                    <span class="text-highlights text-highlights-purple">답변</span> &nbsp;&nbsp;&nbsp; <?php echo $articleOne->answertitle; ?>
                </div>
                <div class="talk-contents">
                    <?php echo $articleOne->answer; ?>
                </div>
                <?php } ?>

                <div class="row margin-top-20">
					<div class="col-md-6">
						<a class="btn-u btn-u-default" href="/web/talk/qna/update/<?php echo $articleOne->id; ?>">수정/삭제</a>
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn-u btn-u-dark" onclick="<?php echo $return_jscript; ?>">목록으로</button> &nbsp;
						<?php if ($articleOne->mentyn == 'Y') { ?><button type="submit" class="btn-u btn-u-dark-blue" id="newment-btn"> &nbsp; 댓글쓰기 &nbsp; </button><?php } ?>
					</div>
				</div>
				<!-- End 아티클 -->

                <?php if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹') { ?>
                <div style="margin-top: 6px;">
                    <a onclick="javascript:window.open('/web/manage/ttalk/articleqna/<?php echo $articleOne->id; ?>');" class="btn-u btn-u-yellow"> &nbsp; 관리자 &nbsp; </a> &nbsp;
                    <!--a class="btn-u btn-u-yellow" href="/web/talk/qna/answer/<?php echo $articleOne->id; ?>">답글 작성/수정</a-->
                </div>
                <?php } ?>

				<div class="margin-bottom-30" id="ment-scroll"></div>

				<!-- 댓글 작성폼 -->
                <div id="new-mentform" style="display: none;">
                    <textarea id="root-comment" class="form-control margin-bottom-10" rows="3" maxlength="1000"></textarea>
                    <div class="row sm-margin-bottom-10">
                    	<?php if ( ! $this->session->has_userdata('user_id')) { ?>
                        <div class="col-md-3">
    						<input type="text" id="root-writer" class="form-control input-sm" value="" maxlength="13" placeholder="작성자명">
    					</div>
    					<div class="col-md-3">
    						<input type="password" id="root-passwd" class="form-control input-sm" value="" maxlength="12" placeholder="비밀번호 (4~12자)">
    					</div>
    					<div class="col-md-4">
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
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
<script type="text/javascript" src="/assets/js/furnitalk/qna_ment2.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    //───────────────────────────────────
    <?php if ($articleOne->mentcount > 0) { ?>
    var calluri = '/web/talk/comment/search/talkqna/asc';
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

    //───────────────────────────────────
    $('#comment-list').delegate('.iconclick', 'click', function () {
        var formnode = $(this).parent();
        formnode = formnode.parent();
        formnode = formnode.parent().next();
        formnode.toggle('fast');

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
                    current_uri = '/web/talk/comment/search/talkqna/asc';

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

    $('#newment-btn').bind('click', function () {
        $('#new-mentform').toggle('fast');
    });

    //───────────────────────────────────
    $('#rootment-submit').bind('click', function (e) {
        var last_page = (<?php echo $articleOne->mentcount; ?>+1) / 20;
        last_page = Math.ceil(last_page);
        var current_uri = '/web/talk/comment/search/talkqna/asc/'+last_page;

        <?php if ($this->session->has_userdata('user_id')) { ?>
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

//───────────────────────────────────
var commentReload = function (roaduri) {
    if (roaduri != '#')
        var calluri = roaduri;
    else
        return;

    var param_post = {
            total_rows: 'none',
            talkidx: <?php echo $articleOne->id; ?>
        };

    $('<div>').load(calluri, param_post, function (response, status, xhr) {
        if (status == 'error') {
            $('#mentcreate-msg').html('Comments System Error2: ' + xhr.status + ' / ' + xhr.statusText);    //Debug Use
        } else {
            $('#comment-list').html(response);
        }
    });
};

//───────────────────────────────────
function recommChu(idx) {
        $.ajax({
            url: '/web/talk/qna/recomm/' + idx,
            type: 'update',
            dataType: 'json',
            success: function (data) {
                if (data.state == 'ok') {
                    alert(data.msg);
                    $('#recomm-cnt').text('추천수 ' + data.recomcnt);
                } else if (data.state == 'fail') {
                    alert(data.msg);
                }
            }
        });
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
