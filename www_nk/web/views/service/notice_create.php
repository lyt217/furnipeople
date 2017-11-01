<?php
 include './views/common/header_menu.php';
?>


    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>공지사항 작성</h2>
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
                <div class="headline"><h3> &nbsp; Notice &nbsp; </h3></div>
                <div class="margin-bottom-20"></div>

				<form class="form-horizontal" id="talk-form" role="form" action="/web/service/notice/<?php echo $submit_action; ?>" method="post" accept-charset="utf-8">
					<div class="row">
						<div class="col-md-11">
							<input type="text" name="talk_title" class="form-control" value="<?php echo set_value('talk_title', @$articleOne->title); ?>" maxlength="100" placeholder="제목">
							<?php echo form_error('talk_title', '<div class="alert alert-warning fade in">', '</div>'); ?>
						</div>
					</div>

                	<!--div id="summernote"></div-->
                	<textarea name="talk_content" class="summernote" id="summernote"><?php echo set_value('talk_content', @$articleOne->content); ?></textarea>

                    <?php if (@$articleOne->mentcount == 0) { ?>
                    <div class="radio">
                        <label><input type="radio" name="ment_yn" value="Y" <?php echo set_checkbox('ment_yn', 'Y', @$mentyn_radio['Y']); ?>> 댓글 허용</label> &nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="ment_yn" value="N" <?php echo set_checkbox('ment_yn', 'N', @$mentyn_radio['N']); ?>> 댓글 미허용</label>
                    </div>
                    <?php } ?>

					<div class="text-center">
					    <?php if ($delete_btn) { ?><button type="button" class="btn-u btn-u-dark pull-right" id="delete-btn"> &nbsp;&nbsp;&nbsp; 삭 제 &nbsp;&nbsp;&nbsp; </button> &nbsp;&nbsp;<?php } ?>
						<button type="button" class="btn-u btn-u-default" onclick="<?php echo $return_jscript; ?>">돌아가기</button> &nbsp;&nbsp;
						<button type="submit" class="btn-u btn-u-dark-blue"> &nbsp;&nbsp;&nbsp; 등 록 &nbsp;&nbsp;&nbsp; </button>
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

<!-- 글로벌 필수 -->
<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 플러그인 가동 -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>

<!-- Page Level의 JS & 플러그인 커스터마이징 -->
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript" src="/assets/plugins/smnote/smnote-member.js"></script>
<script type="text/javascript" src="/assets/plugins/smnote/smnote-kr.min.js"></script>
<script type="text/javascript" src="/assets/plugins/filestyle/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="/assets/js/md5-min.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    /** ───────────────────────────────────
     * 에디터
     */
    $('#summernote').summernote({
        height: 400,                 //에디터 높이
        lang: 'ko-KR',               //default: 'en-US'
    });

    //에디터의 사진첨부 스타일링
    $(":file").filestyle({buttonText: '파일 찾기'});


    /** ───────────────────────────────────
     * 에디터 사진첨부
     */
	function xhr_send(f, e) {
		if (f) {
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4) {
					//document.getElementById(e).innerHTML = xhr.responseText;
					$('.note-image-url').val('/static/talkphoto/' + xhr.responseText);
					$('.note-image-btn').trigger('click');
				}
			};
			xhr.open("POST", "/web/service/notice/ajax_upload_photo");
			xhr.setRequestHeader("Cache-Control", "no-cache");
			xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
			xhr.setRequestHeader("X-File-Name", hex_md5(f.name)+'.jpg');
			xhr.send(f);
			$('#xhr_field').val('');    //크롬은 안먹힘
		}
	}

	function xhr_parse(f, e) {
		if (f) {
          //document.getElementById(e).innerHTML = "File selected : " + f.name + "(" + f.type + ", " + f.size + ")";    //Byte
          console.log("File selected : " + f.name + "(" + f.type + ", " + f.size + ")");
        } else {
          //document.getElementById(e).innerHTML = "No file selected!";
          console.log("No file selected!");
        }
	}

	var xhr = new XMLHttpRequest();
	if (xhr && window.File && window.FileList) {
        //파일폼에 파일이 선택되면 파일정보 획득 (디버그용)
		var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
			xhr_file = this.files[0];
			xhr_parse(xhr_file, "xhr_status");
		};

        //파일 업로드 버튼으로 업로딩
        document.getElementById("xhr_upload").onclick = function (e) {
			e.preventDefault();
			xhr_send(xhr_file, "xhr_result");
		};
	}

    <?php if ($delete_btn === TRUE) { ?>
    //글삭제 서브밑
    $('#delete-btn').bind('click', function () {
        $('#talk-form').attr('action', '/web/service/notice/<?php echo $submit_action; ?>/delete').submit();
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
