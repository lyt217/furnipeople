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

<?php function get_web_page($url) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    return $content;
} ?>

    <!--=== Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
      <?php
      include './views/common/leftmenu.php';
       ?>
         <div id="submenusel" style="position:relative; margin:0px; width:120px; height:87px; border:1px solid #888; z-index:1001; backgroundColor:#FFF; visibility:hidden;"></div>
      <div class="row" style="margin-top:-87px;">
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Furni Info &nbsp; </h3> &nbsp; 가구에 대한 다양한 정보나 팁을 나누는 공간입니다.</div>
                <div class="margin-bottom-20"></div>

				<div class="row margin-bottom-20">
					<div class="col-md-3 sm-margin-bottom-10 text-center">
						<a href="/web/talk/info/search/all/no" class="btn-u btn-u-lg rounded-3x btn-u-brown btn-talk" type="button">&nbsp;&nbsp; 전 체 &nbsp;&nbsp;</a>
					</div>
					<div class="col-md-9 no-space-left">
						<div style="line-height: 2.6;">
							<a href="/web/talk/info/search/free/no" class="<?php echo $talkind_btn['a']; ?>" type="button">&nbsp;&nbsp; 자유 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/chair/no" class="<?php echo $talkind_btn['b']; ?>" type="button">&nbsp;&nbsp; 의자 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/desk/no" class="<?php echo $talkind_btn['c']; ?>" type="button">&nbsp;&nbsp; 책상 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/sofa/no" class="<?php echo $talkind_btn['d']; ?>" type="button">&nbsp;&nbsp; 쇼파 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/bed/no" class="<?php echo $talkind_btn['e']; ?>" type="button">&nbsp;&nbsp; 침대 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/dresser/no" class="<?php echo $talkind_btn['f']; ?>" type="button">&nbsp;&nbsp; 화장대 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/dtable/no" class="<?php echo $talkind_btn['g']; ?>" type="button">&nbsp;&nbsp; 식탁 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/closet/no" class="<?php echo $talkind_btn['h']; ?>" type="button">&nbsp;&nbsp; 수납장 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/drawer/no" class="<?php echo $talkind_btn['i']; ?>" type="button">&nbsp;&nbsp; 서랍 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/interior/no" class="<?php echo $talkind_btn['j']; ?>" type="button">&nbsp;&nbsp; 인테리어 제품 &nbsp;&nbsp;</a> &nbsp;
							<a href="/web/talk/info/search/etc/no" class="<?php echo $talkind_btn['k']; ?>" type="button">&nbsp;&nbsp; 기타 가구들 &nbsp;&nbsp;</a>
						</div>
					</div>
				</div>

                <!-- Inline Search -->
				<div class="margin-bottom-25 text-right">
					<form class="form-inline" role="form" action="" method="post" accept-charset="utf-8">
						<div class="input-group">
							<?php if ($this->session->has_userdata('search_field')) {
						    	switch ($this->session->userdata('search_field')) {
                                    case 'title':
                                        $search_field[0] = TRUE;
                                        break;
									case 'writer':
										$search_field[1] = TRUE;
										break;
									case 'content':
										$search_field[2] = TRUE;
										break;
								}
							} ?>
							<select name="search_field" class="form-control">
								<option value="title" <?php echo set_select('search_field', 'title', @$search_field[0]); ?>>제목</option>
								<option value="writer" <?php echo set_select('search_field', 'writer', @$search_field[1]); ?>>작성자</option>
								<option value="content" <?php echo set_select('search_field', 'content', @$search_field[2]); ?>>내용</option>
							</select>
						</div>
						<div class="input-group">
							<input type="text" class="form-control" name="search_keword" value="<?php echo $this->session->userdata('search_keword'); ?>">
							<span class="input-group-btn"><button class="btn-u btn-u-dark" type="submit"><i class="fa fa-search"></i> 검색</button></span>
							<!--span class="input-group-btn"><button class="btn-u btn-u-default" type="button" onclick="javascript:window.location.href='/web/talk/info/search/all/no'"> 초기화</button></span-->
						</div>
					</form>
				</div>
                <!-- End Inline Search -->

                <!-- Furni Talk Table -->
                <table class="table table-hover hrefcolor-basic" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th class="hidden-sm">번호</th>
                            <th class="hidden-sm">분류</th>
                            <th>제목</th>
                            <th>글쓴이</th>
                            <th class="hidden-sm">날짜</th>
                            <th class="hidden-sm">조회수</th>
                            <th class="hidden-sm">추천수</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php if ($articleList) {
                    	foreach ($articleList as $article): ?>
                        <tr>
                            <td class="hidden-sm"><?php echo $numbering--; ?></td>
                            <td class="hidden-sm"><?php echo $article->kindpname; ?></td>
                            <td>
                            	<a href="/web/talk/info/article/<?php echo $article->id; ?>"><?php echo title_utfcut($article->title); ?></a>
                              <?php
                                $today = new DateTime();
                                $today->setTime(0,0,0);
// 2017-08-25 23:40:14
                                $articledate = DateTime::createFromFormat( "Y-m-d H:i:s", $article->regdate);
                                $articledate->setTime(0,0,0);

                                $diff = $today->diff($articledate);
                                $diffDays = (integer)$diff->format( "%R%a" );

                                if($diffDays > -3){
                                  echo '<img src="/assets/img/icons/mark_new1.gif" width="10" height="10">';
                                }?>
                                 <?php echo ($article->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $article->mentcount . ')' : ''; ?>
                            	<!--span class="badge badge-aqua rounded">New</span-->
							</td>
                            <td class="hidden-sm"><?php
                              $point = get_web_page("http://www.furnipeople.com/web/talk/author/userpoint/".$article->userdbtable."/".$article->user_id);

                              if($point <= 100){ ?>
                                  <img src="/assets/img/icons/bronze.png" style="width:20px; height:20px;">
                              <?php }
                              else if($point <= 1000){ ?>
                                  <img src="/assets/img/icons/silver.png" style="width:20px; height:20px;">
                              <?php }
                              else if($point <= 3000){ ?>
                                  <img src="/assets/img/icons/gold.png" style="width:20px; height:20px;">
                              <?php }
                              else if($point <= 10000){ ?>
                                  <img src="/assets/img/icons/platinum.png" style="width:20px; height:20px;">
                              <?php }
                              else if($point <= 30000){ ?>
                                  <img src="/assets/img/icons/diamond.png" style="width:20px; height:20px;">
                              <?php }
                              else if($point <= 50000){ ?>
                                  <img src="/assets/img/icons/master.png" style="width:20px; height:20px;">
                              <?php }
                              else{ ?>
                                  <img src="/assets/img/icons/challenger.png" style="width:20px; height:20px;">
                              <?php } ?><span onClick="javascript:submenu_show('<?php echo $article->user_id ?>','<?php echo $article->userdbtable ?>','<?php echo $article->writer ?>');" class="author" style="cursor:pointer" title="<?php echo $article->writer; ?>"><?php echo $article->writer; ?></td>


                            <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($article->regdate)); ?></td>
                            <td class="hidden-sm"><?php echo $article->readcount; ?></td>
                            <td class="hidden-sm"><?php echo $article->onechucnt; ?></td>
                        </tr>
						<?php endforeach; } ?>
                    </tbody>
                </table>
                <!-- End Furni Talk Table -->

                <div class="text-center">
                	<?php echo $pagination; ?>
				</div>
				<div class="text-right">
					<a class="btn-u btn-u-dark-blue" href="/web/talk/info/create"> &nbsp;&nbsp; 글작성 &nbsp;&nbsp; </a>
				</div>

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
<input id="receiver_idx" type="hidden"/>
<input id="receiver_kind" type="hidden"/>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    /** ───────────────────────────────────
     * 쪽지 보내기
     */

    $('#chatt-btn').bind('click', function () {
      console.log($('#receiver_idx').val());
        $('#chatt-message').chattsendReload({
            receiveridx: $('#receiver_idx').val(),
            receiverkind: $('#receiver_kind').val(),
            message: $('#chatt-message').val()
        });
    });
});

</script>
<script type="text/javascript">
var top_pos = 0;
var left_pos = 0;
$(document).bind('mousemove',function(e){
  var parentOffset = $("#container").offset();

  left_pos = e.pageX - parentOffset.left;
  top_pos = e.pageY - parentOffset.top;
});
$(document).bind("click", function (event) {
  var $target = $(event.target);
  var nodnm = $target.attr("class");

  if (nodnm != "author") {
    $("#submenusel").css({'visibility':'hidden'});
  }

  if(nodnm == "btn-u btn-u-xs"){
    var btnkind = $target.text();

    var node = $target.parent();
    node = node.next();
    node = node.next();

    var target_info = node.val().split('-');

    switch (btnkind)
    {
        case '쪽지발송':
            // console.log("send chat");
            $('#receiver_idx').val(target_info[0]);
            $('#receiver_kind').val(target_info[1]);

            $('#modal-title').text(target_info[2]+'에게 쪽지 보내기');

        break;
    }
  }



});
</script>
<script>
function submenu_show(cid, userdbtable, usernickname){

  $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "/web/talk/author/user/"+userdbtable+"/"+cid,
        dataType: "html",   //expect html to be returned
        success: function(response){
          var myObj = $.parseJSON(response);

          var str = "<ol style='list-style:none;margin:0px;padding-left:0px;padding-top:4px;background:#FFF;width:118px'>";
          if(userdbtable == "provider"){
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>회원등급 : <b>";
            if(myObj.usrpoint < 101){
              str+= "브론즈</b></li>";
            }
            else if(myObj.usrpoint < 1001){
              str+= "실버</b></li>";
            }
            else if(myObj.usrpoint < 3001){
              str+= "골드</b></li>";
            }
            else if(myObj.usrpoint < 10001){
              str+= "플래티넘</b></li>";
            }
            else if(myObj.usrpoint < 30001){
              str+= "다이아</b></li>";
            }
            else if(myObj.usrpoint < 50001){
              str+= "마스터</b></li>";
            }
            else{
              str+= "챌린져</b></li>";
            }
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>퍼니포인트 : <b>"+myObj.usrpoint+"</b></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><button class='btn-u btn-u-xs' style='background:#FFFFFF; color:#4c4c4c; margin-left:0px; padding-left:0px; text-align: left;' type='button' data-toggle='modal' data-target='#chatt-modal'>쪽지발송</button></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/product/"+cid+"' class='uicon'>올린상품보기</a></li>";
            str += "<input type='hidden' name='chatt_target' value='"+cid+"-"+userdbtable+"-"+usernickname+"'>";
            str += "<li style='width:120px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/home/"+cid+"/close' target='_blank'class='uicon'>홈페이지가기</a></li>";
            str += "</ol>";

            $("#submenusel").html(str);
            $("#submenusel").show();
            $("#submenusel").css({    'left' : left_pos ,    'top' : top_pos ,    'z-index' : 1001 , 'height':107 ,'visibility':'visible'});
                      //alert(response);

          }
          else if(userdbtable == "member"){
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>회원등급 : <b>";
            if(myObj.usrpoint < 101){
              str+= "브론즈</b></li>";
            }
            else if(myObj.usrpoint < 1001){
              str+= "실버</b></li>";
            }
            else if(myObj.usrpoint < 3001){
              str+= "골드</b></li>";
            }
            else if(myObj.usrpoint < 10001){
              str+= "플래티넘</b></li>";
            }
            else if(myObj.usrpoint < 30001){
              str+= "다이아</b></li>";
            }
            else if(myObj.usrpoint < 50001){
              str+= "마스터</b></li>";
            }
            else{
              str+= "챌린져</b></li>";
            }
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>퍼니포인트 : <b>"+myObj.usrpoint+"</b></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><button class='btn-u btn-u-xs' style='background:#FFFFFF; color:#4c4c4c; margin-left:0px; padding-left:0px; text-align: left;' type='button' data-toggle='modal' data-target='#chatt-modal'>쪽지발송</button></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/goods/"+cid+"' class='uicon'>올린상품보기</a></li>";
            str += "<input type='hidden' name='chatt_target' value='"+cid+"-"+userdbtable+"-"+usernickname+"'>";
            str += "</ol>";

            $("#submenusel").html(str);
            $("#submenusel").show();
            $("#submenusel").css({    'left' : left_pos,    'top' : top_pos , 'height':87,   'z-index' : 1001  ,'visibility':'visible'});
          }
        }

    });
  // alert(top_pos);
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
