<?php
 include './views/common/header_menu_talk.php';
?>


    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30 mobile-hide">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>퍼니피플 답변</h2>
            </div>
        </div>
    </div>
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
            <!-- Begin Left Sidebar Menu Box -->
            <div class="col-md-2 mobile-hide">

            </div>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Furni Q&amp;A &nbsp; </h3> 퍼니피플 답변</div>
                <div class="margin-bottom-20"></div>

				<form class="form-horizontal" id="talk-form" role="form" action="/web/talk/qna/<?php echo $submit_action; ?>" method="post" accept-charset="utf-8">
					<div class="row">
						<div class="col-md-9">
							<input type="text" name="talk_title" class="form-control" value="<?php echo set_value('talk_title', @$articleOne->answertitle); ?>" maxlength="100" placeholder="제목">
							<?php echo form_error('talk_title', '<div class="alert alert-warning fade in">', '</div>'); ?>
						</div>
					</div>

                	<!--div id="summernote"></div-->
                	<textarea name="talk_content" class="summernote" id="summernote"><?php echo set_value('talk_content', @$articleOne->answer); ?></textarea>

					<div class="text-center">
					    <?php if (@$articleOne->answertitle) { ?><button type="button" onclick="javascript:adminDelete(<?php echo @$articleOne->id; ?>);" class="btn-u btn-u-dark pull-right">답변삭제</button> &nbsp;&nbsp;<?php } ?>
						<button type="button" class="btn-u btn-u-default" onclick="<?php echo $return_jscript; ?>">돌아가기</button> &nbsp;&nbsp;
						<button type="submit" class="btn-u btn-u-dark-blue">답변등록</button>
					</div>
				</form>

				<div id="xhr_status"></div>
				<div id="xhr_result"></div>
            </div>

            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">

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
                            <!--li class="silver">Copyright © 2014 - All Rights Reserved</li-->
                            <li><a href="javascript:void(0);">회사소개</a></li>
                            <li><a href="javascript:void(0);">이용약관</a></li>
                            <li><a href="javascript:void(0);">개인정보 취급방침</a></li>
                            <li><a href="javascript:void(0);">건의 및 제휴</a></li>
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
<script type="text/javascript" src="/assets/plugins/smnote/smnote-member.js"></script>
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

});

function adminDelete(talk_idx) {
    if (confirm('답변을 삭제하시겠습니까?')) {
        $.ajax({
            url: '/web/talk/qna/answerdelete/' + talk_idx,
            type: 'delete',
            dataType: 'text',
            success: function (data) {
                if (data == 'success')
                    window.location.href='/web/talk/qna/article/' + talk_idx + '/rtnlist';
            }
        });
    }
}
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
