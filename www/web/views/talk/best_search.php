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
           <div id="submenusel" style="position:relative; margin:0px; width:120px; height:66px; border:1px solid #888; z-index:1001; backgroundColor:#FFF; visibility:hidden;"></div>

        <div class="row">
            <!-- Begin Left Sidebar Menu Box -->

            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3 form-page">
                <div class="headline"><h3> &nbsp; Furni Talk Best &nbsp; </h3> &nbsp; 퍼니토크 베스트 글모음입니다.</div>
                <div class="margin-bottom-25"></div>

                <!-- Furni Talk Table -->
                <table class="table table-hover hrefcolor-basic" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th class="hidden-sm">번호</th>
                            <th class="hidden-sm">게시판</th>
                            <th>제목</th>
                            <th class="hidden-sm">글쓴이</th>
                            <th class="hidden-sm">날짜</th>
                            <th class="hidden-sm">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php if ($articleList) {
                    	foreach ($articleList as $article): ?>
                        <tr>
                            <td class="hidden-sm"><?php echo $numbering--; ?></td>
                            <td class="hidden-sm"><?php echo df_board_title($article->taklboard_name); ?></td>
                            <td>
                            	<a href="/web/talk/best/article/<?php echo $article->id.'/'.$article->taklboard_name.'/'.$article->talkboard_id; ?>"><?php echo title_utfcut($article->title); ?></a> <?php echo ($article->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $article->mentcount . ')' : ''; ?>
							</td>
                            <td class="hidden-sm"><?php echo $article->writer; ?></td>

                            <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($article->regdate)); ?></td>
                            <td class="hidden-sm"><?php echo $article->readcount; ?></td>
                        </tr>
						<?php endforeach; } ?>
                    </tbody>
                </table>
                <!-- End Furni Talk Table -->

                <div class="text-center">
                	<?php echo $pagination; ?>
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

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

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
  console.log(nodnm);
  if (nodnm != "author" && nodnm != "level") {
    $("#submenusel").css({'visibility':'hidden'});
  }
});
</script>
<script>
function submenu_show(cid,userdbtable){
  $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "/web/talk/author/user/"+userdbtable+"/"+cid,
        dataType: "html",   //expect html to be returned
        success: function(response){
          var myObj = $.parseJSON(response);

          var str = "<ol style='list-style:none;margin:0px;padding-left:0px;padding-top:4px;background:#FFF;width:118px'>";
          if(userdbtable == "provider"){
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>퍼니포인트 : <b>"+myObj.usrpoint+"</b></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/board/bulletin/mycommunity.php?cid="+cid+"' target='_blank'>쪽지보내기</a></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/product/"+cid+"' class='uicon'>올린상품보기</a></li>";
            str += "<li style='width:120px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/home/"+cid+"/close' target='_blank'class='uicon'>홈페이지가기</a></li>";
            str += "</ol>";

            $("#submenusel").html(str);
            $("#submenusel").show();
            $("#submenusel").css({    'left' : left_pos ,    'top' : top_pos ,    'z-index' : 1001 , 'height':86 ,'visibility':'visible'});
                      //alert(response);

          }
          else if(userdbtable == "member"){
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'>퍼니포인트 : <b>"+myObj.usrpoint+"</b></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/board/bulletin/mycommunity.php?cid="+cid+"' target='_blank'>쪽지보내기</a></li>";
            str += "<li style='width:120px;height:20px;text-align:left;padding-left:10px;color:4c4c4c;'><a href='/web/user/shop/goods/"+cid+"' class='uicon'>올린상품보기</a></li>";
            str += "</ol>";

            $("#submenusel").html(str);
            $("#submenusel").show();
            $("#submenusel").css({    'left' : left_pos,    'top' : top_pos , 'height':66,   'z-index' : 1001  ,'visibility':'visible'});
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
