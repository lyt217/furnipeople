<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--[if !IE]><!--> <html lang="ko"> <!--<![endif]-->
<html>
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>퍼니피플 관리자</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="/assets/manage/css/lib/bootstrap.css" rel="stylesheet">
<link href="/assets/manage/css/lib/bootstrap-responsive.css" rel="stylesheet">
<link href="/assets/manage/css/boo-extension.css" rel="stylesheet">
<link href="/assets/manage/css/boo.css" rel="stylesheet">
<link href="/assets/manage/css/style.css" rel="stylesheet">
<link href="/assets/manage/css/boo-coloring.css" rel="stylesheet">
<link href="/assets/manage/css/boo-utility.css" rel="stylesheet">
<link href="/assets/manage/plugins/pl-form/validationengine/validationEngine.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="/assets/manage/plugins/selectivizr/selectivizr-min.js"></script>
    <script src="/assets/manage/plugins/flot/excanvas.min.js"></script>
<![endif]-->
</head>

<body class="sidebar-left ">
<div class="page-container">
    <div id="header-container">
        <div id="header">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                    </div>
                </div>
            </div>
            <!-- // navbar -->

            <div class="header-drawer">
                <div class="mobile-nav text-center visible-phone"> <a href="javascript:void(0);" class="mobile-btn" data-toggle="collapse" data-target=".sidebar"><i class="aweso-icon-chevron-down"></i> Navi Menu</a> </div>
                <!-- // Resposive navigation -->
                <div class="breadcrumbs-nav hidden-phone">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fontello-icon-home f12"></i> Dashboard</a></li>
                    </ul>
                </div>
                <!-- // breadcrumbs -->
            </div>
            <!-- // drawer -->
        </div>
    </div>
    <!-- // header-container -->

    <div id="main-container">
        <div id="main-sidebar" class="sidebar sidebar-inverse">
            <div class="sidebar-item">
                <div class="media profile">
                    <div class="media-body">
                        <h5 class="media-heading"><?php echo $this->session->userdata('user_nickname'); ?> <small><?php echo $this->session->userdata('user_titlename'); ?></small></h5>
                        <p class="data"><?php echo $this->session->userdata('user_email'); ?></p>
                    </div>
                </div>
            </div>
            <!-- // sidebar item - profile -->

            <ul id="mainSideMenu" class="nav nav-list nav-side">

                <li class="accordion-group">
                    <div class="accordion-heading"><a href="#memberMenu" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"><span class="item-icon aweso-icon-list-alt"></span><i class="chevron fontello-icon-right-open-3"></i> 회 원</a></div>
                    <ul class="accordion-content nav nav-list collapse" id="memberMenu">
                        <li><a href="/web/manage/mmember/search"><i class="fontello-icon-right-dir"></i>개인 회원</a></li>
                        <li><a href="javascript:void(0);"><i class="fontello-icon-right-dir"></i>기업 회원</a></li>
                        <li><a href="#"><i class="fontello-icon-right-dir"></i>탈퇴 회원</a></li>
                    </ul>
                </li>
                <li class="accordion-group">
                    <div class="accordion-heading active"><a href="#goodsMenu" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"><span class="item-icon aweso-icon-list-alt"></span><i class="chevron fontello-icon-right-open-3"></i> 상 품</a></div>
                    <ul class="accordion-content nav nav-list collapse in" id="goodsMenu">
                        <li class="active"><a href="javascript:void(0);"><i class="fontello-icon-right-dir"></i>등록 상품</a></li>
                        <li><a href="javascript:void(0);"><i class="fontello-icon-right-dir"></i>카테고리 관리</a></li>
                        <li><a href="javascript:void(0);"><i class="fontello-icon-right-dir"></i>지역 관리</a></li>
                        <li><a href="#"><i class="fontello-icon-right-dir"></i>삭제 상품</a></li>
                    </ul>
                </li>
                <li class="accordion-group">
                    <div class="accordion-heading"><a href="#talkMenu" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"><span class="item-icon aweso-icon-list-alt"></span><i class="chevron fontello-icon-right-open-3"></i> 토 크</a></div>
                    <ul class="accordion-content nav nav-list collapse" id="talkMenu">
                        <li><a href="/web/manage/ttalk/talkcommon/talkfree"><i class="fontello-icon-right-dir"></i>Furni Talk</a></li>
                        <li><a href="/web/manage/ttalk/talkcommon/talkreview"><i class="fontello-icon-right-dir"></i>Furni Review</a></li>
                        <li><a href="/web/manage/ttalk/talkcommon/talkinfo"><i class="fontello-icon-right-dir"></i>Furni Info</a></li>
                        <li><a href="/web/manage/ttalk/talkcommon/talkphoto"><i class="fontello-icon-right-dir"></i>Furni Photos</a></li>
                        <li><a href="/web/manage/ttalk/talkcommon/talkadvertise"><i class="fontello-icon-right-dir"></i>Furni Ads</a></li>
                        <li><a href="/web/manage/ttalk/talkqna"><i class="fontello-icon-right-dir"></i>Furni Q&amp;A</a></li>
                        <li><a href="/web/manage/ttalk/besttalk"><i class="fontello-icon-right-dir"></i>Furni Talk Best</a></li>
                    </ul>
                </li>
                <li class="accordion-group">
                    <div class="accordion-heading"><a href="#ticketMenu" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"><span class="item-icon aweso-icon-list-alt"></span><i class="chevron fontello-icon-right-open-3"></i> 에그 &amp; 포인트</a></div>
                    <ul class="accordion-content nav nav-list collapse" id="ticketMenu">
                        <li><a href="#"><i class="fontello-icon-right-dir"></i>에그 전환</a></li>
                        <li><a href="#"><i class="fontello-icon-right-dir"></i>에그 구매</a></li>
                        <li><a href="/web/manage/mmember/point"><i class="fontello-icon-right-dir"></i>포인트</a></li>
                    </ul>
                </li>
                <li class="accordion-group">
                    <div class="accordion-heading"><a href="#remainMenu" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"><span class="item-icon aweso-icon-list-alt"></span><i class="chevron fontello-icon-right-open-3"></i> 기 타</a></div>
                    <ul class="accordion-content nav nav-list collapse" id="remainMenu">
                        <li><a href="/web/manage/sservice/search"><i class="fontello-icon-right-dir"></i>제휴 문의</a></li>
                        <li><a href="#"><i class="fontello-icon-right-dir"></i>운영자</a></li>
                    </ul>
                </li>

            </ul>
            <!-- // sidebar menu -->

        </div>
        <!-- // sidebar -->

<!-- Start getContent() ─────────────────────────────────── -->
<div id="main-content" class="main-content container-fluid">
    <div id="page-content" class="page-content">

        <div class="clearfix margin-top30"></div>

        <div class="row-fluid">
            <!-- grider 1 /-->
            <div class="span12 grider">

                <div class="widget widget-simple">
                    <div class="widget-header">
                        <h4><i class="fontello-icon-user opaci75"></i> 등록 상품 <small>(총<?php echo $total_rows; ?>개)</small></h4>
                        <form class="form-inline text-center hidden-phone" action="<?php echo $action_url; ?>" method="post">
                        <?php if ($this->session->has_userdata('admin_find')) {
                            $find_arr = $this->session->userdata('admin_find');

                            if ($find_arr['srh_field'] != '')
                                $srh_field[$find_arr['srh_field']] = TRUE;
                        } ?>
                            <a href="/web/manage/pproduct/search/id-desc/<?php echo $srh_mode; ?>" class="btn btn-small btn-navi">등록순</a>
                            <a href="/web/manage/pproduct/search/readcount-desc/<?php echo $srh_mode; ?>" class="btn btn-small btn-navi">열람순</a>
                            <a href="/web/manage/pproduct/search/chattcnt-desc/<?php echo $srh_mode; ?>" class="btn btn-small btn-navi">쪽지교환순</a>
                            <a href="/web/manage/pproduct/search/interestcnt-desc/<?php echo $srh_mode; ?>" class="btn btn-small btn-navi">관심등록순</a><span class="padding-side5"></span>
                            <select name="srh_field" class="selecttwo">
                                <option value="prodtitle" <?php echo set_select('srh_field', 'prodtitle', @$srh_field['prodtitle']); ?>>타이틀</option>
                                <option value="phone" <?php echo set_select('srh_field', 'phone', @$srh_field['phone']); ?>>연락처</option>
                            </select>
                            <input name="find_word" class="span2" type="text" value="<?php echo @$find_arr['find_word']; ?>">
                            <span class="input-append"><button class="btn" type="submit">검색</button><button class="btn" type="button" onclick="window.location.href='/web/manage/pproduct/search';">리셋</button></span>
                        </form>
                    </div>
                    <div class="widget-content">
                        <div class="widget-body">

                        <div class="row-fluid">
                            <div class="table-wrapper">
                                <table class="table boo-table table-condensed table-content table-striped table-hover">
                                    <!--colgroup>
                                        <col><col class="col15"><col class="col15"><col class="col10"><col class="col10"><col class="col15">
                                    </colgroup-->
                                    <thead>
                                        <tr>
                                            <th scope="col">타이틀<br>분류</th>
                                            <th scope="col">브랜드<br>상태</th>
                                            <th scope="col">구입가<br>판매희망가</th>
                                            <th scope="col">구매일<br>가격협상</th>
                                            <th scope="col">연락처<br>주소</th>
                                            <th scope="col">배송비부담<br>쪽지건수</th>
                                            <th scope="col">열람수<br>관심등록수</th>
                                            <th scope="col">등록일<br>수정일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($prodList) {
                                    foreach ($prodList as $prod): ?>
                                        <tr>
                                            <td><?php echo $prod->prodtitle; ?><br>[<?php echo $prod->kindpname; ?>]</td>
                                            <td><?php echo $prod->brand; ?><br><?php echo $prod->prodstate; ?></td>
                                            <td><?php echo number_format($prod->buyprice); ?> 원<br><?php echo number_format($prod->sellprice); ?> 원</td>
                                            <td><?php echo $prod->buydate; ?><br><?php echo $prod->negoyn; ?></td>
                                            <td><?php echo $prod->phone; ?><br><?php echo $prod->address; ?></td>
                                            <td><?php echo $prod->delivery; ?><br><?php echo $prod->chattcnt; ?></td>
                                            <td><?php echo $prod->readcount; ?><br><?php echo $prod->interestcnt; ?></td>
                                            <td><?php echo date('y.m.d ag:i', strtotime($prod->regdate)); ?><br><?php echo ($prod->updeldate) ? date('y.m.d ag:i', strtotime($prod->updeldate)) : ''; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <i class="fontello-icon-plus"></i>
                                            </td>
                                            <td colspan="4">
                                                <a onclick="javascript:window.open('/web/market/product/detail/<?php echo $prod->id; ?>/rtnlist');" class="btn btn-mini btn-yellow">상품보기</a>
                                                <?php if ($prod->userdbtable == 'member') { ?>
                                                <a onclick="javascript:window.open('/web/manage/mmember/user/<?php echo $prod->user_id; ?>');" class="btn btn-mini btn-yellow">일반회원</a>
                                                <?php } else if ($prod->userdbtable == 'provider') { ?>
                                                <a onclick="javascript:window.open('/web/manage/pprovider/user/<?php echo $prod->user_id; ?>');" class="btn btn-mini btn-yellow">기업회원</a>
                                                <?php } ?>&nbsp;
                                                <?php if($prod->soldout == '재고있음'){ ?>
                                                  <a onclick="javascript:setSoldout(<?php echo $prod->id; ?>, true);" class="btn btn-mini btn-orange">매진처리</a>
                                                  <?php } else{ ?>
                                                  <a onclick="javascript:setSoldout(<?php echo $prod->id; ?>, false);" class="btn btn-mini btn-orange">재고있음</a>
                                                  <?php } ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; } ?>
                                    </tbody>
                                </table>

                                <div class="widget-footer">
                                    <div class="pagination pagination-btn text-center margin-top10">
                                        <?php echo $pagination; ?>
                                        <ul class="hidden-phone">
                                            <li><a href="/web/manage/pproduct/search" class="btn margin-left10">리셋</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--/ grider 1 -->
        </div>

        <div class="clearfix margin-top30"></div>
    </div>
</div>
<!--// main & page content -->
<!-- End getContent() ─────────────────────────────────── -->

    </div>
    <!-- // main-container  -->

    <footer id="footer-fix">
        <!--div id="footer-sidebar" class="footer-sidebar">
            <div class="navbar">
                <div class="btn-toolbar"> <a class="btn btn-glyph btn-link" href="javascript:void(0);"><i class="fontello-icon-up-open-1"></i></a> </div>
            </div>
        </div-->
        <!-- // footer sidebar -->

        <div id="footer-content" class="footer-content">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <ul class="nav pull-left">
                        <li class="divider-vertical"></li>
                        <li><a id="btnLogout" class="btn-glyph fontello-icon-logout-1 tip" onclick="javascript:logout();" title="로그아웃"></a></li>
                        <li class="divider-vertical"></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li><a id="btnScrollup" class="scrollup btn-glyph fontello-icon-up-open-1" href="javascript:void(0);"><span class="hidden-phone">Scroll</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- // footer content -->

    </footer>
    <!-- // footer-fix  -->

</div>
<!-- // page-container  -->

<!-- Le javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/manage/js/lib/jquery.js"></script>
<script src="/assets/manage/js/lib/jquery-ui.js"></script>
<script src="/assets/manage/js/lib/jquery.cookie.js"></script>
<script src="/assets/manage/js/lib/jquery.date.min.js"></script>
<script src="/assets/manage/js/lib/jquery.mousewheel.js"></script>
<script src="/assets/manage/js/lib/jquery.load-image.min.js"></script>
<script src="/assets/manage/js/lib/bootstrap/bootstrap.js"></script>

<!-- Plugins Bootstrap -->
<script src="/assets/manage/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
<script src="/assets/manage/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
<script src="/assets/manage/plugins/bootstrap-fuelux/all-fuelux.min.js"></script>
<script src="/assets/manage/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/manage/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.kr.js"></script>
<script src="/assets/manage/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="/assets/manage/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="/assets/manage/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="/assets/manage/plugins/bootstrap-daterangepicker/js/bootstrap-daterangepicker.js"></script>
<script src="/assets/manage/plugins/bootstrap-toggle-button/js/bootstrap-toggle-button.js"></script>
<script src="/assets/manage/plugins/bootstrap-fileupload/js/bootstrap-fileupload.js"></script>
<script src="/assets/manage/plugins/bootstrap-rowlink/js/bootstrap-rowlink.js"></script>
<script src="/assets/manage/plugins/bootstrap-progressbar/js/bootstrap-progressbar.js"></script>
<script src="/assets/manage/plugins/bootstrap-select/bootstrap-select.js"></script>
<script src="/assets/manage/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="/assets/manage/plugins/bootstrap-bootbox/bootbox.min.js"></script>
<script src="/assets/manage/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
<script src="/assets/manage/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
<script src="/assets/manage/plugins/bootstrap-wizard/js/bootstrap-wizard.min.js"></script>
<script src="/assets/manage/plugins/bootstrap-wizard-2/js/bwizard-only.min.js"></script>
<script src="/assets/manage/plugins/bootstrap-image-gallery/js/bootstrap-image-gallery.min.js"></script>

<!-- Plugins Custom - Only example -->
<!--script src="/assets/manage/plugins/pl-extension/google-code-prettify/prettify.js"></script-->

<!-- Plugins Custom - System -->
<script src="/assets/manage/plugins/pl-system/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/manage/plugins/pl-system/xbreadcrumbs/xbreadcrumbs.js"></script>

<!-- Plugins Custom - System info -->
<script src="/assets/manage/plugins/pl-system-info/qtip2/dist/jquery.qtip.min.js"></script>
<script src="/assets/manage/plugins/pl-system-info/gritter/js/jquery.gritter.min.js"></script>
<script src="/assets/manage/plugins/pl-system-info/notyfy/jquery.notyfy.js"></script>

<!-- Plugins Custom - Content -->
<script src="/assets/manage/plugins/pl-content/list/js/list.min.js"></script>
<script src="/assets/manage/plugins/pl-content/list/plugins/list.paging.min.js"></script>
<script src="/assets/manage/plugins/pl-content/jpages/js/jPages.js"></script>

<!-- Plugins Custom - Component -->
<script src="/assets/manage/plugins/pl-component/fullcalendar/fullcalendar.min.js"></script>
<script src="/assets/manage/plugins/pl-component/rangeslider/jqallrangesliders.min.js"></script>

<!-- Plugins Custom - Form -->
<script src="/assets/manage/plugins/pl-form/uniform/jquery.uniform.min.js"></script>
<script src="/assets/manage/plugins/pl-form/select2/select2.min.js"></script>
<script src="/assets/manage/plugins/pl-form/counter/jquery.counter.js"></script>
<script src="/assets/manage/plugins/pl-form/elastic/jquery.elastic.js"></script>
<script src="/assets/manage/plugins/pl-form/inputmask/jquery.inputmask.js"></script>
<script src="/assets/manage/plugins/pl-form/inputmask/jquery.inputmask.extensions.js"></script>
<script src="/assets/manage/plugins/pl-form/duallistbox/jquery.duallistbox.min.js"></script>

<!-- Plugins Custom - Gallery -->
<script src="/assets/manage/plugins/pl-gallery/nailthumb/jquery.nailthumb.1.1.min.js"></script>
<script src="/assets/manage/plugins/pl-gallery/nailthumb/showLoading/js/jquery.showLoading.min.js"></script>
<script src="/assets/manage/plugins/pl-gallery/wookmark/jquery.imagesloaded.js"></script>
<script src="/assets/manage/plugins/pl-gallery/wookmark/jquery.wookmark.min.js"></script>

<!-- Plugins Tables -->
<script src="/assets/manage/plugins/pl-table/datatables/media/js/jquery.dataTables.js"></script>
<script src="/assets/manage/plugins/pl-table/datatables/plugin/jquery.dataTables.plugins.js"></script>
<script src="/assets/manage/plugins/pl-table/datatables/plugin/jquery.dataTables.columnFilter.js"></script>

<!-- Plugins data visualization -->
<script src="/assets/manage/plugins/pl-visualization/sparkline/jquery.sparkline.min.js"></script>
<script src="/assets/manage/plugins/pl-visualization/easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/assets/manage/plugins/pl-visualization/percentageloader/percentageloader.min.js"></script>
<script src="/assets/manage/plugins/pl-visualization/knob/knob.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.categories.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.grow.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.orderBars.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.pie.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.resize.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.selection.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.stack.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.stackpercent.js"></script>
<script src="/assets/manage/plugins/pl-visualization/flot/jquery.flot.time.js"></script>

<!-- main js -->
<script src="/assets/manage/js/core.js"></script>
<script src="/assets/manage/js/application.js"></script>

<!-- Plugins Validation 3가지 중 선택하여 사용 -->
<!--script src="/assets/manage/plugins/pl-form/validate/js/jquery.validate.min.js"></script-->
<!--script src="/assets/manage/plugins/pl-form/parsley/parsley.kr.js"></script-->
<!--script src="/assets/manage/plugins/pl-form/validationengine/jquery.validationEngine.js"></script-->
<!--script src="/assets/manage/plugins/pl-form/validationengine/jquery.validationEngine.kr.js"></script-->

<!-- Only This Demo Page -->
<!--script src="/assets/manage/js/demo/demo-form.js"></script--><!-- jquery.validate.js 용임 -->
<!--script src="/assets/manage/js/demo/demo-wisyhtml5.js"></script-->

<script>
$(document).ready(function ()
{
    //밸리데이션엔진 가동
    //$('#writeForm').validationEngine();
    //var valiUserid = $('#writeForm').validationEngine('validate');    //밸리데이션 통과하면 false반환됨
    //if (!valiUserid) {}

    /******************************************************************************************
     * CRUD 플래시 메시지
     */
    //var noticeMessage = $('.noticeMessage').text();
    /*
    var noticeMessage = 'dd';
    if (noticeMessage.length > 0) {
        $.gritter.add({
            title: 'Message!',
            text: noticeMessage,
            time: 3000
        });
        //return false;    이거 살리면 다른 스크립트가 죽는다.
    }
    */

});
function setSoldout(product_idx, soldout) {
  if(soldout){
    console.log(product_idx);
    if (confirm('정말 매진처리하시겠습니까?')) {
        $.ajax({
            url: '/web/manage/pproduct/soldout/' + product_idx,
            type: 'delete',
            dataType: 'text',
            success: function (data) {
                alert(data);
                if (data == 'success')
                    window.location.reload(true);


            }
        });
    }
  }
  else{
    if (confirm('정말 재고가 있습니까?')) {
        $.ajax({
            url: '/web/manage/pproduct/stockin/' + product_idx,
            type: 'delete',
            dataType: 'text',
            success: function (data) {
                //alert(data);
                if (data == 'success')
                    window.location.reload(true);
            }
        });
    }
  }
}
function logout() {
    if (confirm('로그아웃 하시겠습니까?')) {
        window.location.href='/web/manage/auth/logout';
    }
}
</script>
</body>
</html>
