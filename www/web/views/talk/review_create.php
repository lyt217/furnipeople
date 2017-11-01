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
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">

    <!--=== Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
      <?php
      include './views/common/leftmenu.php';
       ?>
           <div class="row">
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Furni Review &nbsp; </h3> &nbsp; 가구 구매 후기를 자유롭게 나누는 공간입니다.</div>
                <div class="margin-bottom-20"></div>

				<form class="form-horizontal" id="talk-form" role="form" action="/web/talk/review/<?php echo $submit_action; ?>" method="post" accept-charset="utf-8">
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

                	<!--div id="summernote"></div-->
                  <textarea style="width:100%; height:500px;" name="talk_content" id="talk_content" rows="10" cols="100"><?php echo set_value('talk_content', @$articleOne->content); ?></textarea>

      		<!-- <div style="float:left; width:100%; border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding:10px; margin-bottom:10px; "> -->
        		<div style="float:left; margin-right:30px; font-weight:bold; margin-top:6px; vertical-align:middle;">평가하기</div>
          			<div class="radio">
    							<label><input type="radio" name="star" value="1" id="staronly1" <?php echo set_checkbox('star', '1', @$star_radio['1']); ?>> <img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"></input></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							<label><input type="radio" name="star" value="2" id="staronly2" <?php echo set_checkbox('star', '2', @$star_radio['2']); ?>> <img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"></input></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							<label><input type="radio" name="star" value="3" id="staronly3" <?php echo set_checkbox('star', '3', @$star_radio['3']); ?>> <img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"></input></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							<label><input type="radio" name="star" value="4" id="staronly4" <?php echo set_checkbox('star', '4', @$star_radio['4']); ?>> <img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"></input></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    							<label><input type="radio" name="star" value="5" id="staronly5" <?php echo set_checkbox('star', '5', @$star_radio['5']); ?>> <img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"><img src="/assets/img/icons/star_on.png" style="margin-bottom:3px;"></input></label>


                </div>
          <!-- </div> -->
          <input type="hidden" id="staronly_vote" value=""></input>

          <hr>
          <div class="radio">
						<label><input type="radio" name="ment_yn" value="Y" <?php echo set_checkbox('ment_yn', 'Y', @$mentyn_radio['Y']); ?>> 댓글 허용</label>	&nbsp;&nbsp;&nbsp;
						<label><input type="radio" name="ment_yn" value="N" <?php echo set_checkbox('ment_yn', 'N', @$mentyn_radio['N']); ?>> 댓글 미허용</label>
					</div>
					<!-- 비로그인 시에만 나타남 -->
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
						<button type="button" id="submit-btn" class="btn-u btn-u-dark-blue" disabled="disabled"> &nbsp;&nbsp;&nbsp; 등 록 &nbsp;&nbsp;&nbsp; </button>
					</div>
					<?php } else { ?>
					<div class="text-center">
					    <?php if ($delete_btn) { ?><button type="button" class="btn-u btn-u-dark pull-right" id="delete-btn"> &nbsp;&nbsp;&nbsp; 삭 제 &nbsp;&nbsp;&nbsp; </button> &nbsp;&nbsp;<?php } ?>
						<button type="button" class="btn-u btn-u-default" onclick="<?php echo $return_jscript; ?>">돌아가기</button> &nbsp;&nbsp;
						<button type="button" id="submit-btn" class="btn-u btn-u-dark-blue"> &nbsp;&nbsp;&nbsp; 등 록 &nbsp;&nbsp;&nbsp; </button>
					</div>
					<?php } ?>
				</form>

				<div id="xhr_status"></div>
				<div id="xhr_result"></div>
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

<script type="text/javascript" src="/assets/plugins/se2/js/HuskyEZCreator.js" charset="utf-8"></script>
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
var oEditors = [];
  nhn.husky.EZCreator.createInIFrame({
      oAppRef: oEditors,
      elPlaceHolder: "talk_content",
      sSkinURI: "/assets/plugins/se2/SmartEditor2Skin.html",
      htParams : {
        // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
        bUseToolbar : true,
        // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
        bUseVerticalResizer : true,
        // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
        bUseModeChanger : true,	fOnBeforeUnload : function(){ }
      },
      fCreator: "createSEditor2"
  });

</script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    /** ───────────────────────────────────
     * 에디터
     */
  //   $('#summernote').summernote({
  //       height: 140,                 //에디터 높이
  //       lang: 'ko-KR',               //default: 'en-US'
  //   });
  //
  //   //에디터의 사진첨부 스타일링
  //   $(":file").filestyle({buttonText: '파일 찾기'});
  //
	// <?php if ($this->session->has_userdata('user_id')) { ?>
  //   /** ───────────────────────────────────
  //    * 에디터 사진첨부
  //    */
	// function xhr_send(f, e) {
	// 	if (f) {
	// 		xhr.onreadystatechange = function () {
	// 			if (xhr.readyState == 4) {
	// 				//document.getElementById(e).innerHTML = xhr.responseText;
	// 				$('.note-image-url').val('/static/talkphoto/' + xhr.responseText);
	// 				$('.note-image-btn').trigger('click');
	// 			}
	// 		};
	// 		xhr.open("POST", "/web/talk/review/ajax_upload_photo");
	// 		xhr.setRequestHeader("Cache-Control", "no-cache");
	// 		xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	// 		xhr.setRequestHeader("X-File-Name", hex_md5(f.name)+'.jpg');
	// 		xhr.send(f);
	// 		$('#xhr_field').val('');    //크롬은 안먹힘
	// 	}
	// }
  //
	// function xhr_parse(f, e) {
	// 	if (f) {
  //         //document.getElementById(e).innerHTML = "File selected : " + f.name + "(" + f.type + ", " + f.size + ")";    //Byte
  //         console.log("File selected : " + f.name + "(" + f.type + ", " + f.size + ")");
  //       } else {
  //         //document.getElementById(e).innerHTML = "No file selected!";
  //         console.log("No file selected!");
  //       }
	// }
  //
	// var xhr = new XMLHttpRequest();
	// if (xhr && window.File && window.FileList) {
  //       //파일폼에 파일이 선택되면 파일정보 획득 (디버그용)
	// 	var xhr_file = null;
  //       document.getElementById("xhr_field").onchange = function () {
	// 		xhr_file = this.files[0];
	// 		xhr_parse(xhr_file, "xhr_status");
	// 	};
  //
  //       //파일 업로드 버튼으로 업로딩
  //       document.getElementById("xhr_upload").onclick = function (e) {
	// 		e.preventDefault();
	// 		xhr_send(xhr_file, "xhr_result");
	// 	};
	// }
	// <?php } ?>

    <?php if ($delete_btn === TRUE) { ?>
    //글삭제 서브밑
    $('#delete-btn').bind('click', function () {
        $('#talk-form').attr('action', '/web/talk/review/<?php echo $submit_action; ?>/delete').submit();
    });

    <?php } ?>

    $("#submit-btn").bind('click', function(){
      if($("#staronly1").attr("checked") ||$("#staronly2").attr("checked") ||$("#staronly3").attr("checked") ||$("#staronly4").attr("checked") ||$("#staronly5").attr("checked")){

        // 에디터의 내용이 textarea에 적용된다.
        oEditors.getById["talk_content"].exec("UPDATE_CONTENTS_FIELD", []);


        // 에디터의 내용에 대한 값 검증은 이곳에서
        // document.getElementById("ir1").value를 이용해서 처리한다.

        try {
            $("#talk-form").submit();
        } catch(e) {}
      }
      else{
        alert("별점을 선택하세요");
      }
    });
});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
