<?php
 include './views/common/header_menu.php';
?>

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100% !important;">
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="height:100% !important; border: 1px solid #b0b0b2; padding-left:0px !important; padding-right: 0px !important;">
		<form class="form_login">
      <?php if ($this->session->has_userdata('user_id')) { ?>
      <!-- Topbar-로그인된회원 -->
      <!-- <li>
          <div class="topbar">
              <ul class="loginbar">
                  <?php if ($this->session->userdata('group_mkind') == '기업회원') { ?>
                  <li><a href="/web/user/shop/home/<?php echo $this->session->userdata('user_id'); ?>">내가게</a></li>
                  <li class="topbar-devider"></li>
                  <li><a href="/web/user/signup/updateprovider">회원정보</a></li>
                  <?php } else { ?>
                  <li><a href="/web/user/signup/updatemember">회원정보</a></li>
                  <?php } ?>
                  <li class="topbar-devider"></li>
                  <li><a href="/web/user/membership/logout">로그아웃</a></li>
              </ul>
          </div>
          <div style="padding-left: 40px;">
              <ul class="list-inline badge-lists badge-icons">
                  <li>
                      <?php echo $this->session->userdata('user_nickname'); ?>님 &nbsp; <a href="/web/market/chattpaper/mychatt"><i class="fa fa-envelope color-dark"></i></a><span class="badge badge-yellow rounded-x"><?php echo $this->session->userdata('msgalert_box'); ?></span>
                  </li>
              </ul>
          </div>
      </li> -->
      <?php } else { ?>

  			<fieldset>
  				 <input type="checkbox" name="loginKEEP" id="save_keep" value="Y" /><label for="save_keep"><span class="log_in_text">로그인 상태 유지</span></label><br>
  				 <input type="text" value="아이디" id="ID4" name="ID" class="id" title="아이디입력"  />
  				 <input type="text" name="password" id="03" title="비밀번호" value="비밀번호" class="password_position" />
  				 <input type="password" id="Passwd5" name="Passwd" class="password_position" title="비밀번호입력" style="display:none;" onkeydown="Enter_Check();" />
  				 <input type="button" name="login_button" class="b04" id="04" title="로그인" value="로그인" onclick="return login_chk('b');" />
  			 </fieldset>
  			 <ul style="width:100%;">
  				<li><a href="https://security.bobaedream.co.kr/member/join/sfindID_new.php">아이디</a>/<a href="https://security.bobaedream.co.kr/member/join/sfindPASS_new.php">비밀번호찾기</a></li>
    				<li style="padding-left:10px; marin-left:10px !important; margin-right:10px !important;" class="line">|</li>
  				<li><a href="https://security.bobaedream.co.kr/member/join/register_choice_renew.php">회원가입</a></li>
  				<li style="padding-left:10px !important; margin-top:7px;" class="ico_naver"><a href="javascript:void(window.open('https://security.bobaedream.co.kr/member/nid.php', 'nid_login', 'width=500,height=517, top=24,left=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no'));"><img src="http://image.bobaedream.co.kr/renew/images/bobae_renew/btn_naver.gif" alt="네이버" /></a></li>
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


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lists1" style="">
        <h4><img src="http://image.bobaedream.co.kr/renew/images/title/title_community_left_01.gif" alt="게시판" /></h4>
        <div class="list_left" style="width:50%; display:inline-block;">
            <ul>
              <li><a href="/list?code=best">베스트글</a></li>
              <li><a href="/list?code=freeb">자유게시판</a></li>
              <li><a href="/list?code=battle">시승기/배틀/목격담</a></li>
              <li><a href="/list?code=famous">유명인의 차</a></li>
            </ul>
        </div>
        <div class="list"  style="width:45%; display:inline-block;">
          <ul>
              <li><a href="/list?code=nnews">자동차뉴스</a></li>
              <li><a href="/list?code=politic">시사이슈</a></li>
              <li><a href="/list?code=ad">성인게시판</a></li>
              <li class="end"><a href="/partner/partner_main.php">협력업체</a></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lists1">
        <h4><img src="http://image.bobaedream.co.kr/renew/images/title/title_community_left_02.gif" alt="자료실" /></h4>
        <div class="list_left" style="width:50%; display:inline-block;">
            <ul>
              <li><a href="/list?code=strange">유머게시판</a></li>
              <li><a href="/list?code=accident">교통사고/사건/블박</a></li>
              <li><a href="/list?code=national">국산차게시판</a></li>
              <li><a href="/list?code=import">수입차게시판</a></li>
              <li><a href="/list?code=hotcar">내차사진</a></li>
              <li><a href="/list?code=dica">직찍/특종발견</a></li>
              <li><a href="/list?code=special">자동차사진/동영상</a></li>
            </ul>
        </div>
        <div class="list" style="width:45%; display:inline-block;">
          <ul>
              <li><a href="/list?code=girl">레이싱모델</a></li>
              <li><a href="/list?code=music">자유사진/동영상</a></li>
              <li><a href="/list?code=army">군사/무기</a></li>
              <li><a href="/list?code=truck">트럭/버스/중기</a></li>
              <li><a href="/list?code=skybr">항공/해운/철도</a></li>
              <li><a href="/list?code=vi">올드카/추억거리</a></li>
              <li class="end"><a href="/list?code=wheel">장착시공사진</a></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lists1" style="height:100% auto;">
        <h4><img src="http://image.bobaedream.co.kr/renew/images/title/title_community_left_03.gif" alt="기타" /></h4>
        <div class="list_left" style="width:50%; display:inline-block;">
            <ul>
              <li><a href="/event/event_list.php?event_gubun=1">이벤트</a></li>
              <li><a href="/list.php?code=event_notice">공지사항</a></li>
              <li class="end"><a href="/partner/partner_main.php">업체검색</a></li>
            </ul>
        </div>
        <div class="list" style="width:45%; display:inline-block;">
            <ul class="list">
              <li><a href="/list?code=bb_talk">제안/건의</a></li>
              <li><a href="/list?code=bbstory">보배드림 이야기</a></li>
            </ul>
        </div>
    </div>

  </div>

  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="height:100% !important;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:50% !important">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="display:inline-block;">
        <div class="row margin-bottom-15">
            <div class="col-md-12">
                <div class="headline"><h2 class="heading-sm"> &nbsp; Furni Market &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/market/product/search/all/no" title="마켓전체보기"><i class="fa  fa-plus"></i></a></div>
                <!-- 등록 상품 -->
                <div class="blog_masonry_3col">
                    <div class="grid-boxes">

                        <?php if ($productTopx) {
                        foreach ($productTopx as $product): ?>
                        <div class="grid-boxes-in">
                            <a href="/web/market/product/detail/<?php echo $product->id; ?>/rtnlist" title="상세보기">
                                <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                                <img class="img-responsive full-width" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                            </a>
                            <div class="grid-boxes-caption text-center">
                                <h3><?php echo $product->prodtitle; ?></h3>
                                <p><?php echo number_format($product->sellprice) . '원 / ' . $product->prodstate; ?></p>
                            </div>
                        </div>
                        <?php endforeach; } ?>

                    </div>
                </div>
                <!-- End 등록 상품 -->
            </div>
        </div><!--/row-->
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="display:inline-block;">
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:50% !important">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display:inline-block;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display:inline-block;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display:inline-block;">
      </div>
    </div>

  </div>

</div>
</html>
