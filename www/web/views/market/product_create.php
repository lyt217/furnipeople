<?php
 include './views/common/header_menu.php';
 $name = '의자';
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
<form target="_blank" action=""
      method="post" id="payForm"
      name="payForm">
      <input type="hidden" id="amt"/>
    </form>
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>판매하려는 가구나 인테리어 제품을 등록하세요.</h2>
                <p>모든 항목을 입력해 주시고, 물품이미지도 1개이상 첨부해 주세요.</p>
            </div>
        </div>
    </div>
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
          <?php
           include './views/common/sidemenu_left.php';
          ?>
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3">
                <div class="headline"><h3> &nbsp; 내물건 판매하기 &nbsp; </h3><!-- &nbsp; 판매하려는 가구나 인테리어 제품을 등록하세요.--></div>
                <div class="margin-bottom-15"></div>

                <form class="sky-form" role="form" action="/web/market/product/register" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <fieldset>

                        <!--div class="row">
                            <label class="label col col-2">등록가능 횟수</label>
                            <section class="col col-3">
                                <label class="input state-success">
                                    <input type="text" name="egg_ticket" value="8 회" readonly>
                                </label>
                            </section>
                            <section class="col col-1">
                                <label>
                                    <button class="btn-u btn-u-sea rounded" type="button">충전하기</button>
                                </label>
                            </section>
                        </div-->
                        <section class="row">
                            <label class="label col col-2">상품명 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="prod_title" value="<?php echo set_value('prod_title'); ?>" maxlength="40"></label>
                                <?php echo form_error('prod_title', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">상세설명 :</label>
                            <section class="col col-9">
                                <label class="textarea">
                                    <textarea name="explain" class="form-control" rows="3"><?php echo set_value('explain'); ?></textarea>
                                    <?php echo form_error('explain', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </label>
                            </section>
                        </section>
                        <div class="row">
                            <label class="label col col-2">브랜드 :</label>
                            <section class="col col-3">
                                <select name="brand" class="form-control">
                                    <option value="시디즈" <?php echo set_select('brand', '시디즈', TRUE); ?>>시디즈</option>
                                    <option value="퍼시스" <?php echo set_select('brand', '퍼시스'); ?>>퍼시스</option>
                                    <option value="이케아" <?php echo set_select('brand', '이케아'); ?>>이케아</option>
                                    <option value="일룸" <?php echo set_select('brand', '일룸'); ?>>일룸</option>
                                    <option value="템퍼" <?php echo set_select('brand', '템퍼'); ?>>템퍼</option>
                                    <option value="에이스침대" <?php echo set_select('brand', '에이스침대'); ?>>에이스침대</option>
                                    <option value="시몬스침대" <?php echo set_select('brand', '시몬스침대'); ?>>시몬스침대</option>
                                    <option value="까사미아" <?php echo set_select('brand', '까사미아'); ?>>까사미아</option>
                                    <option value="듀오백" <?php echo set_select('brand', '듀오백'); ?>>듀오백</option>
                                    <option value="한샘" <?php echo set_select('brand', '한샘'); ?>>한샘</option>
                                    <option value="현대리바트" <?php echo set_select('brand', '현대리바트'); ?>>현대리바트</option>
                                    <option value="Hermanmiller" <?php echo set_select('brand', 'Hermanmiller'); ?>>Hermanmiller</option>
                                    <option value="Knoll" <?php echo set_select('brand', 'Knoll'); ?>>Knoll</option>
                                    <option value="Humanscale" <?php echo set_select('brand', 'Humanscale'); ?>>Humanscale</option>
                                </select>
                            </section>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="brand_etc" maxlength="18" value="<?php echo set_value('brand_etc'); ?>" placeholder="브랜드 직접입력시"></label>
                                <!--div class="note">노트</div-->
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">가구종류 :</label>
                            <section class="col col-3">
                                <select name="kind_code" class="form-control" onchange="printthis(this.options[this.selectedIndex].text);" id="kind">
                                    <option value="b" <?php echo set_select('kind_code', 'b', @$kind_select['b']); ?>>의자</option>
                                    <option value="c" <?php echo set_select('kind_code', 'c', @$kind_select['c']); ?>>책상</option>
                                    <option value="d" <?php echo set_select('kind_code', 'd', @$kind_select['d']); ?>>쇼파</option>
                                    <option value="e" <?php echo set_select('kind_code', 'e', @$kind_select['e']); ?>>침대</option>
                                    <option value="f" <?php echo set_select('kind_code', 'f', @$kind_select['f']); ?>>화장대</option>
                                    <option value="g" <?php echo set_select('kind_code', 'g', @$kind_select['g']); ?>>식탁</option>
                                    <option value="h" <?php echo set_select('kind_code', 'h', @$kind_select['h']); ?>>수납장</option>
                                    <option value="i" <?php echo set_select('kind_code', 'i', @$kind_select['i']); ?>>서랍</option>
                                    <option value="j" <?php echo set_select('kind_code', 'j', @$kind_select['j']); ?>>인테리어 제품</option>
                                    <option value="k" <?php echo set_select('kind_code', 'k', @$kind_select['k']); ?>>기타 가구류</option>

                                </select>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">가구상태 :</label>
                            <section class="col col-3">
                                <select name="prod_state" class="form-control">
                                    <option value="새제품" <?php echo set_select('prod_state', '새제품', TRUE); ?>>새제품</option>
                                    <option value="매우양호" <?php echo set_select('prod_state', '매우양호'); ?>>매우양호</option>
                                    <option value="양호/사용감있음" <?php echo set_select('prod_state', '양호/사용감있음'); ?>>양호/사용감있음</option>
                                    <option value="중요한결함있음" <?php echo set_select('prod_state', '중요한결함있음'); ?>>중요한결함있음</option>
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">구입일자 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="buy_date" class="date-mask" value="<?php echo set_value('buy_date'); ?>" maxlength="7" placeholder="2017-01 형식"></label>
                                <?php echo form_error('buy_date', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">구입가격 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="buy_price" class="num-mask" value="<?php echo set_value('buy_price'); ?>" maxlength="8"></label>
                                <?php echo form_error('buy_price', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">판매희망가격 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="sell_price" class="num-mask" value="<?php echo set_value('sell_price'); ?>" maxlength="8"></label>
                                <?php echo form_error('sell_price', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">가격협상 :</label>
                            <section class="col col-3">
                                <select name="negotiation" class="form-control">
                                    <option value="가능" <?php echo set_select('negotiation', '가능', TRUE); ?>>가능</option>
                                    <option value="불가능" <?php echo set_select('negotiation', '불가능'); ?>>불가능</option>
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">배송비부담 :</label>
                            <section class="col col-3">
                                <select name="delivery" class="form-control">
                                    <option value="판매자" <?php echo set_select('delivery', '판매자', TRUE); ?>>판매자</option>
                                    <option value="구매자" <?php echo set_select('delivery', '구매자'); ?>>구매자</option>
                                </select>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">연락처 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="phone" value="<?php echo set_value('phone'); ?>" maxlength="14" placeholder="999-9999-9999 형식"></label>
                                <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </div>
                        <section class="row">
                            <label class="label col col-2">주소 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="address" value="<?php echo set_value('address'); ?>" maxlength="30" placeholder="동까지만 입력하세요"></label>
                                <?php echo form_error('address', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>

                        <section class="row">
                            <label class="label col col-2">링크 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="linkurl" value="<?php echo set_value('linkurl'); ?>" maxlength="120" placeholder="제품 상세페이지의 URL을 입력하세요"></label>
                                <?php echo form_error('linkurl', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">사이즈 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="size" value="<?php echo set_value('size'); ?>" maxlength="120" placeholder="사이즈 정보를 입력하세요"></label>
                                <?php echo form_error('size', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">옵션 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="optioninfo" value="<?php echo set_value('optioninfo'); ?>" maxlength="120" placeholder="제품의 옵션을 입력하세요"></label>
                                <?php echo form_error('optioninfo', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <div class="bg-light">
                            <h5 class="margin-bottom-15"><i class="fa fa-television"></i> 물품 이미지 등록</h5>
                            <div>
                            <label class="input input-file col-10 margin-bottom-15" style="display: inline-block;">
                                <div class="button input input-file"><input type="file" id="prod_photo_1" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(1);">대표이미지첨부</div><input id="prod_photo_t1" name="prod_photo_t1" type="text" readonly>
                                <?php echo form_error('prod_photo_t1', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </label>
                            <div class="button2 input input-file" style="display: inline-block;" id="del_button_1">삭제</div>
                          </div>
                          <div>
                          <label class="input input-file col-10 margin-bottom-15" style="display: inline-block;">
                                <div class="button input input-file"><input type="file" id="prod_photo_2" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(2);">추가이미지첨부</div><input  id="prod_photo_t2" name="prod_photo_t2" type="text" readonly>
                            </label>
                            <div class="button2 input input-file" style="display: inline-block ;"id="del_button_2">삭제</div>
                          </div>
                          <div>
                          <label class="input input-file col-10 margin-bottom-15" style="display: inline-block;">
                                <div class="button input input-file"><input type="file" id="prod_photo_3" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(3);">추가이미지첨부</div><input id="prod_photo_t3" name="prod_photo_t3"  type="text" readonly>
                            </label>
                            <div class="button2 input input-file" style="display: inline-block ;"id="del_button_3">삭제</div>
                          </div>
                            <div>
                            <label class="input input-file col-10 margin-bottom-15" style="display: inline-block;">
                                  <div class="button input input-file"><input type="file" id="prod_photo_4" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(4);">추가이미지첨부</div><input id="prod_photo_t4" name="prod_photo_t4" type="text" readonly>
                            </label>
                            <div class="button2 input input-file" style="display: inline-block ;"id="del_button_4">삭제</div>
                          </div>
                            <div>
                            <label class="input input-file col-10 margin-bottom-15" style="display: inline-block;">
                                <div class="button input input-file"><input type="file" id="prod_photo_5" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(5);">추가이미지첨부</div><input id="prod_photo_t5" name="prod_photo_t5" type="text" readonly>
                            </label>
                            <div class="button2 input input-file" style="display: inline-block ;"id="del_button_5">삭제</div>
                          </div>
                            <div>
                            <label class="input input-file col-10" style="display: inline-block;">
                                <div class="button input input-file"><input type="file" id="prod_photo_6" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value; changed(6);">추가이미지첨부</div><input id="prod_photo_t6" name="prod_photo_t6" type="text" readonly>
                            </label>
                            <div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div>
                          </div>
                        </div>
                        <!--section>
                            <label class="checkbox"><input type="checkbox" name="copy"><i></i>Send a copy to my e-mail address</label>
                        </section-->
                        <div class="bg-light">
                          <h5 class="margin-bottom-15"><i class="fa fa-television"></i> 프리미엄 광고 등록</h5>
                          <div>
                          <h7>전체상품 프리미엄 광고</h7><br>
                          </div>


                              <div id="alloneweek" style="font-size:16px; width:33%; height:120px; border:1px solid #467199; border-radius:10px; padding-left:10px; display:inline-block; background:#FDFDFD; text-align:center; padding-top:20px">
                                1주 등록<br>등록 가능<br>시작일시 : <?php echo date("Y.m.d"); ?>
                              </div>
                              <div id="alltwoweek" style="font-size:16px; width:33%; height:120px; border:1px solid #467199; border-radius:10px; padding-left:10px; display:inline-block; background:#FDFDFD; text-align:center; padding-top:20px">
                                2주 등록<br>등록 가능<br>시작일시 : <?php echo date("Y.m.d"); ?></div>
                              <div id="allfourweek" style="font-size:16px; width:33%; height:120px; border:1px solid #467199; border-radius:10px; padding-left:10px; display:inline-block; background:#FDFDFD; text-align:center; padding-top:20px">
                                4주 등록<br>등록 가능<br>시작일시 : <?php echo date("Y.m.d"); ?></div>
                              <br><br>
                          <div id="subtitle">
                          <h7>의자 프리미엄 광고</h7><br>
                          </div>

                              <div id="suboneweek" style="font-size:16px; width:33%; height:120px; border:1px solid #467199; border-radius:10px; padding-left:10px; display:inline-block; background:#FDFDFD; text-align:center; padding-top:20px">
                                1주 등록<br>등록 불가(예약등록 가능)<br>시작일시 : <?php echo date("Y.m.d"); ?></div>
                              <div id="subtwoweek" style="font-size:16px; width:33%; height:120px; border:1px solid #467199; border-radius:10px; padding-left:10px; display:inline-block; background:#FDFDFD; text-align:center; padding-top:20px">
                                2주 등록<br>등록 불가(예약등록 가능)<br>시작일시 : <?php echo date("Y.m.d"); ?></div>
                              <div id="subfourweek" style="font-size:16px; width:33%; height:120px; border:1px solid #467199; border-radius:10px; padding-left:10px; display:inline-block; background:#FDFDFD; text-align:center; padding-top:20px">
                                4주 등록<br>등록 불가(예약등록 가능)<br>시작일시 : <?php echo date("Y.m.d"); ?></div>
                        </div>
                    </fieldset>
                    <footer class="text-center">
                        <button type="submit" id="ladda-submit" class="btn-u btn-u-orange ladda-button" data-style="contract-overlay" style="z-index: 9999; width: 150px;"> 등록하기 </button>
                    </footer>
                </form>

            </div>
            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->

                        <?php include('./views/common/sidemenu_right.php'); ?>
            <!-- End Right Sidebar Menu -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
<script type="text/javascript" src="/assets/plugins/ladda-buttons/js/spin.min.js"></script>
<script type="text/javascript" src="/assets/plugins/ladda-buttons/js/ladda.min.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.date.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.numeric.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/jquery.inputmask.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    Ladda.bind( '#ladda-submit', { timeout: 20000 } );

    //$('.date-mask').inputmask("y-m-d");
    $('.num-mask').inputmask('integer', { rightAlign: false });

    $("#del_button_1").click(function() {
        $("#del_button_1").css("visibility", "hidden");
        $("#prod_photo_1").val('');
        $("#prod_photo_t1").val('');
    });

    $("#del_button_2").click(function() {
          $("#del_button_2").css("visibility", "hidden");
          $("#prod_photo_2").val('');
          $("#prod_photo_t2").val('');
    });

    $("#del_button_3").click(function() {
          $("#del_button_3").css("visibility", "hidden");
          $("#prod_photo_3").val('');
          $("#prod_photo_t3").val('');
    });

    $("#del_button_4").click(function() {
          $("#del_button_4").css("visibility", "hidden");
          $("#prod_photo_4").val('');
          $("#prod_photo_t4").val('');
    });

    $("#del_button_5").click(function() {
          $("#del_button_5").css("visibility", "hidden");
          $("#prod_photo_5").val('');
          $("#prod_photo_t5").val('');
    });

    $("#del_button_6").click(function() {
          $("#del_button_6").css("visibility", "hidden");
          $("#prod_photo_6").val('');
          $("#prod_photo_t6").val('');
    });

    $("#alloneweek").click(function(e) {


      if ($('#alloneweek').css('background-color') == "rgb(70, 113, 153)") {
        $("#alloneweek").css("border", "1px solid #467199");
        $("#alloneweek").css("background", "#FDFDFD");
        $("#alloneweek").css("color", "#000");
      }
      else{

        $("#amt").val(5000);
        $("#payForm").attr('action', 'paywithseq/1/전체');
        document.getElementById("payForm").submit();

        $("#alloneweek").css("border", "2px solid #7eb9e5");
        $("#alloneweek").css("background", "#467199");
        $("#alloneweek").css("color", "#FFF");
      }

      $("#alltwoweek").css("border", "1px solid #467199");
      $("#alltwoweek").css("background", "#FDFDFD");
      $("#alltwoweek").css("color", "#000");


      $("#allfourweek").css("border", "1px solid #467199");
      $("#allfourweek").css("background", "#FDFDFD");
      $("#allfourweek").css("color", "#000");

    });

    $("#alltwoweek").click(function() {
      if ($('#alltwoweek').css('background-color') == "rgb(70, 113, 153)") {
        $("#alltwoweek").css("border", "1px solid #467199");
        $("#alltwoweek").css("background", "#FDFDFD");
        $("#alltwoweek").css("color", "#000");
      }
      else{
        $("#alltwoweek").css("border", "2px solid #7eb9e5");
        $("#alltwoweek").css("background", "#467199");
        $("#alltwoweek").css("color", "#FFF");


        $("#amt").val(5000);
        $("#payForm").attr('action', 'paywithseq/2/전체');
        document.getElementById("payForm").submit();
      }
      $("#alloneweek").css("border", "1px solid #467199");
      $("#alloneweek").css("background", "#FDFDFD");
      $("#alloneweek").css("color", "#000");


      $("#allfourweek").css("border", "1px solid #467199");
      $("#allfourweek").css("background", "#FDFDFD");
      $("#allfourweek").css("color", "#000");

    });

    $("#allfourweek").click(function() {
      if ($('#allfourweek').css('background-color') == "rgb(70, 113, 153)") {
        $("#allfourweek").css("border", "1px solid #467199");
        $("#allfourweek").css("background", "#FDFDFD");
        $("#allfourweek").css("color", "#000");
      }
      else{
        $("#allfourweek").css("border", "2px solid #7eb9e5");
        $("#allfourweek").css("background", "#467199");
        $("#allfourweek").css("color", "#FFF");



          $("#amt").val(5000);
          $("#payForm").attr('action', 'paywithseq/4/전체');
          document.getElementById("payForm").submit();
      }

      $("#alltwoweek").css("border", "1px solid #467199");
      $("#alltwoweek").css("background", "#FDFDFD");
      $("#alltwoweek").css("color", "#000");


      $("#alloneweek").css("border", "1px solid #467199");
      $("#alloneweek").css("background", "#FDFDFD");
      $("#alloneweek").css("color", "#000");

    });

    $("#suboneweek").click(function() {
      if ($('#suboneweek').css('background-color') == "rgb(70, 113, 153)") {
        $("#suboneweek").css("border", "1px solid #467199");
        $("#suboneweek").css("background", "#FDFDFD");
        $("#suboneweek").css("color", "#000");
      }
      else{
        $("#suboneweek").css("border", "2px solid #7eb9e5");
        $("#suboneweek").css("background", "#467199");
        $("#suboneweek").css("color", "#FFF");



          $("#amt").val(5000);
          $("#payForm").attr('action', 'paywithseq/1/'+$("#kind").val());
          document.getElementById("payForm").submit();
      }
      $("#subtwoweek").css("border", "1px solid #467199");
      $("#subtwoweek").css("background", "#FDFDFD");
      $("#subtwoweek").css("color", "#000");


      $("#subfourweek").css("border", "1px solid #467199");
      $("#subfourweek").css("background", "#FDFDFD");
      $("#subfourweek").css("color", "#000");
    });

    $("#subtwoweek").click(function() {
      if ($('#subtwoweek').css('background-color') == "rgb(70, 113, 153)") {
        $("#subtwoweek").css("border", "1px solid #467199");
        $("#subtwoweek").css("background", "#FDFDFD");
        $("#subtwoweek").css("color", "#000");
      }
      else{
        $("#subtwoweek").css("border", "2px solid #7eb9e5");
        $("#subtwoweek").css("background", "#467199");
        $("#subtwoweek").css("color", "#FFF");



          $("#amt").val(5000);
          $("#payForm").attr('action', 'paywithseq/2');
          document.getElementById("payForm").submit();
      }
      $("#suboneweek").css("border", "1px solid #467199");
      $("#suboneweek").css("background", "#FDFDFD");
      $("#suboneweek").css("color", "#000");


      $("#subfourweek").css("border", "1px solid #467199");
      $("#subfourweek").css("background", "#FDFDFD");
      $("#subfourweek").css("color", "#000");
    });

    $("#subfourweek").click(function() {
      if ($('#subfourweek').css('background-color') == "rgb(70, 113, 153)") {
        $("#subfourweek").css("border", "1px solid #467199");
        $("#subfourweek").css("background", "#FDFDFD");
        $("#subfourweek").css("color", "#000");
      }
      else{
        $("#subfourweek").css("border", "2px solid #7eb9e5");
        $("#subfourweek").css("background", "#467199");
        $("#subfourweek").css("color", "#FFF");



          $("#amt").val(5000);
          $("#payForm").attr('action', 'paywithseq/4');
          document.getElementById("payForm").submit();
      }

      $("#subtwoweek").css("border", "1px solid #467199");
      $("#subtwoweek").css("background", "#FDFDFD");
      $("#subtwoweek").css("color", "#000");


      $("#suboneweek").css("border", "1px solid #467199");
      $("#suboneweek").css("background", "#FDFDFD");
      $("#suboneweek").css("color", "#000");
    });

});
function printthis(name){
  var html = "<h7>";
  html += name;
  html += " 프리미엄 광고";
  html += "</h7>";

  $("#subtitle").html(html);
}
function changed(order){
  if(order == 1){
    $("#del_button_1").css("visibility", "visible");
  }
  else if(order == 2){
    $("#del_button_2").css("visibility", "visible");
  }
  else if(order == 3){
    $("#del_button_3").css("visibility", "visible");
  }
  else if(order == 4){
    $("#del_button_4").css("visibility", "visible");
  }
  else if(order == 5){
    $("#del_button_5").css("visibility", "visible");
  }
  else if(order == 6){
    $("#del_button_6").css("visibility", "visible");
  }
};
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
