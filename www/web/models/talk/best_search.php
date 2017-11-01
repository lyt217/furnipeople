<?php
 include './views/common/header_menu_talk.php';
?>
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
    <div id="container" class="container content no-top-space" style="position:relative;">
        <div id="submenusel" style="position:relative; margin:0px; width:120px; height:66px; border:1px solid #888; z-index:1001; backgroundColor:#FFF; visibility:hidden;"></div>

        <div class="row">
            <!-- Begin Left Sidebar Menu Box -->

                        <?php include('./views/common/sidemenu_left.php'); ?>
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
