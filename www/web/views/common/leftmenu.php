
<?php
  // 네이버 로그인 접근토큰 요청 예제
  $client_id = "qP7D5nhcl6w5mqFs58YG";
  $redirectURI = urlencode("http://furnipeople.com/web/user/nLogin");
  $state = "RAMDOM_STATE";
  $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;
?>


<link rel="stylesheet" href="/assets/css/custom.css">

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="border: 1px solid #b0b0b2; max-width:220px !important; padding-left:0px !important; padding-right: 0px !important;">
  <form class="form_login" action="/web/user/membership/index" method="post" >
    <?php if ($this->session->has_userdata('user_id')) { ?>
      <div style="padding-left: 40px;">
          <ul class="list-inline badge-lists badge-icons">
              <li>
                  <?php echo $this->session->userdata('user_nickname'); ?>님 &nbsp; <a href="/web/market/chattpaper/mychatt"><i class="fa fa-envelope color-dark"></i></a><span class="badge badge-yellow rounded-x"><?php echo $this->session->userdata('msgalert_box'); ?></span>
              </li>
          </ul>
      </div>

      <ul id="collapse-mypage">
          <?php if ($this->session->userdata('group_table') == 'provider') { ?>
          <li><a href="/web/user/shop/home/<?php echo $this->session->userdata('user_id'); ?>">내 가게 보기</a></li>
          <li> | </li>
          <li><a href="/web/user/shop/updateportfolio">포트폴리오 관리</a></li>
          <li> | </li>
          <li><a href="/web/user/signup/updateprovider">회원정보 수정</a></li>
          <li> | </li>
          <?php } else { ?>
          <li><a href="/web/user/signup/updatemember">회원정보 수정</a></li>
          <li> | </li>
          <?php } ?>

          <li><a href="/web/user/membership/logout">로그아웃</a></li>
      </ul>

    <?php } else { ?>

      <fieldset>
        <input type="hidden" name="originalHref" id="originalHref" value=""/>
         <label class="checkbox-inline color-light-grey" style="margin-left:-15px;">
           <input type="radio" name="member_type" value="1" <?php echo set_radio('member_type', '1', TRUE); ?>> 개인회원
         </label>
         <label class="checkbox-inline color-light-grey">
           <input type="radio" name="member_type" value="2" <?php echo set_radio('member_type', '2'); ?>> 기업회원
         </label>
         <div style="width:100%; height:50px; margin-top:5px;">
           <div style="width:100%; padding-right:71px;">
             <input type="text" placeholder="아이디" id="ID4" name="email" title="아이디입력" style="padding-left:4px; min-width:100%;"/>
           </div>
           <div style="width:100%; padding-right:71px;">
             <input type="password" name="pass_word"  id="03" title="비밀번호" placeholder="비밀번호" style="padding-left:4px; min-width:100%;"/>
             <input type="password" id="Passwd5" name="Passwd" title="비밀번호입력" style="display:none;" onkeydown="Enter_Check();" />
           </div>
           <input type="submit" name="login_button" style="margin-top: -50px; position:absolute; right: 10px; width:71px !important; height:50px !important;" id="04" title="로그인" value="로그인" onclick="" />
         </div>
         <input type="checkbox" name="loginKEEP" id="save_keep" value="Y" /><label for="save_keep"><span class="log_in_text">  로그인 상태 유지</span></label>
         </fieldset>
       <ul style="width:100%;">
        <li><a href="/web/user/findid">아이디</a>/<a href="/web/user/membership/findpassword">비밀번호찾기</a></li>
          <li style="padding-left:10px; marin-left:10px !important; margin-right:10px !important;" class="line">|</li>
        <li><a href="/web/user/signup/createmember">회원가입</a></li>
        <li style="padding-left:10px !important; margin-top:7px;" class="ico_naver"><a href="<?php echo $apiURL ?>"><img src="http://image.bobaedream.co.kr/renew/images/bobae_renew/btn_naver.gif" alt="네이버" /></a></li>
       </ul>

      <!-- </div> -->



    <?php } ?>
    <!--
    <script language="javascript">

    if (chkLogin == "yes") {
            document.write("<div class=\"login_area04\" id=\"smLoginZone\"></div>");
    } else {
            document.write("<div class=\"login_inbox_new\">");
            document.write("<fieldset>");
            document.write("<legend>로그인</legend>");
            document.write("<form name=\"form_login\" method=\"post\" action=\"https://security.bobaedream.co.kr/member/MemLoginCtrl.php\" onsubmit=\"return login_chk();\">");
            document.write("<ul>");
            document.write("<li>");
            document.write("<input type=\"text\" name=\"ID\" class=\"id\" title=\"아이디입력\" />");
            document.write("</li>");
            document.write("<li class=\"bottom\">");
            document.write("<input type=\"password\" name=\"Passwd\" class=\"pw\" title=\"비밀번호입력\" />");
            document.write("</li>");
            document.write("</ul>");
            document.write("</fieldset>");
            document.write("<button type=\"submit\" title=\"로그인\"><span>로그인</span></button>");
            document.write("<div class=\"optionarea\">");
            document.write("<div class=\"checkarea\">");
            document.write("<input type=\"checkbox\" name=\"loginKEEP\" id=\"loginKEEP\" value=\"Y\" title=\"로그인 유지\">");
            document.write("<label for=\"loginKEEP\">로그인 유지</label>");
            document.write("</div>");
            document.write("<div class=\"bgbararea\"></div>");
            document.write("<div class=\"textarea\"> <a href=\"https://security.bobaedream.co.kr/member/join/register_choice_renew.php\">회원가입</a> </div>");
            document.write("<div class=\"bgbararea\"></div>");
            document.write("<div class=\"textarea\"> <a href=\"https://security.bobaedream.co.kr/member/join/sfindID_new.php\">ID</a> / <a href=\"https://security.bobaedream.co.kr/member/join/sfindPASS_new.php\">비번찾기</a></div>");
            document.write("<div class=\"ico_naver\">");
            document.write("<a href=\"javascript:void(window.open('https://security.bobaedream.co.kr/member/nid.php', 'nid_login', 'width=500,height=517, top=24,left=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no'));\"><img src=\"http://image.bobaedream.co.kr/renew/images/bobae_renew/btn_naver.gif\" alt=\"네이버\"></a>");
            document.write("</div>");
            document.write("</div>");
            document.write("</form>");
            document.write("</div>");
    }
    </script> -->
  </form>


  <div class="col-lg-12 col-md-12 hidden-sm hidden-xs lists1" style="margin-bottom:20px; margin-top:10px;">
      <h6><img src="http://image.bobaedream.co.kr/renew/images/title/title_community_left_01.gif" alt="게시판" /></h6>
      <div class="list_left" style="width:50%; display:inline-block;">
          <ul>
            <li><a href="/web/talk/best/search/all/no">베스트글</a></li>
            <li><a href="/web/talk/free/search/all/no">자유게시판</a></li>
            <li><a href="/web/talk/qna/search/all/no">가구 관련 Q&A</a></li>
            <li><a href="/web/talk/review/search/all/no">가구 리뷰</a></li>
          </ul>
      </div>
      <div class="list"  style="width:45%; display:inline-block;">
        <ul>
            <li><a href="/web/talk/info/search/all/no">가구 정보</a></li>
            <li><a href="/web/talk/photo/search/all/no">가구 사진</a></li>
            <li class="end"><a href="/web/talk/advertise/search/all/no">광고</a></li>
          </ul>
      </div>
  </div>

  <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:1px; padding-left:20px; padding-right:20px; background-color:#b0b0b2;"></div>

  <div class="col-lg-12 col-md-12 hidden-sm hidden-xs lists1" style="margin-bottom:20px; margin-top:10px;">
      <h6><img src="http://image.bobaedream.co.kr/renew/images/title/title_community_left_02.gif" alt="자료실" /></h6>
      <div class="list_left" style="width:50%; display:inline-block;">
          <ul>
            <li><a href="/web/market/product/search/chair/no">의자</a></li>
            <li><a href="/web/market/product/search/desk/no">책상</a></li>
            <li><a href="/web/market/product/search/sofa/no">쇼파</a></li>
            <li><a href="/web/market/product/search/bed/no">침대</a></li>
            <li><a href="/web/market/product/search/dresser/no">화장대</a></li>
          </ul>
      </div>
      <div class="list" style="width:45%; display:inline-block;">
        <ul>
            <li><a href="/web/market/product/search/table/no">식탁</a></li>
            <li><a href="/web/market/product/search/closet/no">수납장</a></li>
            <li><a href="/web/market/product/search/drawer/no">서랍</a></li>
            <li><a href="/web/market/product/search/interior/no">인테리어 제품</a></li>
            <li class="end"><a href="/web/market/product/search/etc/no">기타 가구들</a></li>
          </ul>
      </div>
  </div>

<div class="col-lg-12 col-md-12  hidden-sm hidden-xs" style="height:1px; padding-left:20px; padding-right:20px; background-color:#b0b0b2;"></div>

  <div class="col-lg-12 col-md-12 hidden-sm hidden-xs lists1" style="height:100% auto; margin-bottom:20px; margin-top:10px;">
      <h6><img src="http://image.bobaedream.co.kr/renew/images/title/title_community_left_03.gif" alt="기타" /></h6>
      <div class="list_left" style="width:50%; display:inline-block;">
          <ul>
            <li><a href="/web/user/shopfind/search/a/no">가구판매점</a></li>
            <li class="end"><a href="/web/user/shopfind/search/b/no">인테리어업체</a></li>
          </ul>
      </div>
      <div class="list" style="width:45%; display:inline-block;">
          <ul class="list">
            <li><a href="/web/user/shopfind/search/c/no">기타</a></li>
          </ul>
      </div>
  </div>

</div>
<div class="hidden-lg hidden-md col-sm-12 col-xs-12" style="height:30px;"></div>
<script type="text/javascript">
window.onload = function() {
  var inputed = document.getElementById("originalHref");
  inputed.value = location.href;
}
</script>
