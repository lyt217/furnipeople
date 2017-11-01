<?php
 include './views/common/header_menu_market.php';
?>


    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>마이 쪽지</h2>
                <p>회원들과 주고 받은 쪽지입니다.</p>
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
                <?php if ($partner_code != 'no') { ?>
                <div class="text-right margin-bottom-15">
                    <a class="btn-u btn-u-sm btn-u-dark" href="/web/market/chattpaper/mychatt"> &nbsp;&nbsp; 전체쪽지 &nbsp;&nbsp; </a>
                </div>
                <?php } else { ?>
                <div class="text-right margin-bottom-15" style="margin: 10px;">
                    <span class="text-border text-border-blue margin-left-10">※ 쪽지를 주고 받은 대상과의 대화만 볼 경우 '쪽지상대' 버튼을 이용하세요.</span>
                </div>
                <?php } ?>

                <div>
                    <ul class="timeline-v2">
                        <?php if ($chattList) {
                        foreach ($chattList as $chatt): ?>
                        <li>
                            <time datetime="" class="cbp_tmtime"><span><?php echo ($chatt->srhdate==date('Ymd')) ? '오늘' : date('Y년 m월 d일', strtotime($chatt->srhdate)); ?></span> <span><?php echo date('a g시 i분', strtotime($chatt->regdate)); ?></span></time>
                            <i class="cbp_tmicon rounded-x hidden-xs"></i>
                            <div class="cbp_tmlabel">

                                <?php if ($chatt->sendercode == $this->session->userdata('user_code')) { ?>
                                <h2>
                                    <strong>내가 <?php echo $chatt->receivernick . '에게 보낸쪽지'; ?></strong>
                                    <span class="pull-right">
                                        <button class="btn-u btn-u-xs btn-u-blue" type="button" data-toggle="modal" data-target="#chatt-modal">쪽지발송</button>&nbsp;
                                        <?php if ($partner_code == 'no') { ?><button class="btn-u btn-u-xs btn-u-dark-blue" type="button">쪽지상대</button><?php } ?>
                                    </span>
                                </h2>
                                <p><?php echo $chatt->message; ?><?php echo ($chatt->topic_id > 0) ? '<br><br><a href="/web/market/product/detail/'.$chatt->topic_id.'" target="_blank">(문의상품 보기)</a>' : ''; ?></p>
                                <input type="hidden" name="chatt_target" value="<?php echo $chatt->receiver_id.'-'.$chatt->receivertbl.'-'.$chatt->receivernick.'-'.$chatt->receivercode.'-'.$chatt->topic_id; ?>">
                                <?php } else { ?>

                                <h2>
                                    <strong><?php echo $chatt->sendernick . '으로부터 받은쪽지'; ?></strong>
                                    <span class="pull-right">
                                        <button class="btn-u btn-u-xs btn-u-blue" type="button" data-toggle="modal" data-target="#chatt-modal">쪽지발송</button>&nbsp;
                                        <?php if ($partner_code == 'no') { ?><button class="btn-u btn-u-xs btn-u-dark-blue" type="button">쪽지상대</button><?php } ?>
                                    </span>
                                </h2>
                                <p><?php echo $chatt->message; ?><?php echo ($chatt->topic_id > 0) ? '<br><br><a href="/web/market/product/detail/'.$chatt->topic_id.'" target="_blank">(문의상품 보기)</a>' : ''; ?></p>
                                <input type="hidden" name="chatt_target" value="<?php echo $chatt->sender_id.'-'.$chatt->sendertbl.'-'.$chatt->sendernick.'-'.$chatt->sendercode.'-'.$chatt->topic_id; ?>">
                                <?php } ?>

                            </div>
                        </li>
                         <?php endforeach; } ?>
                    </ul>
                </div>

                <!--hr style="margin: 10px 0 20px;"-->
                <div class="text-center">
                    <?php echo $pagination; ?>
                </div>

            </div>
            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">
                <ul class="list-unstyled blog-photos">
                    <li><a href="/web/market/chattpaper/mychatt"><img src="/static/webimage/btn-mymini1.png" alt="마이쪽지" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/myticket/index"><img src="/static/webimage/btn-mymini2.png" alt="마이에그" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
                    <li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
                </ul>

                <div class="panel panel-dark-blue rounded mobile-hide">
                    <div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">최근 본 글</h5></div>
                    <div class="panel-body hrefcolor-side" style="line-height: 1.2;">
                        <?php if ($this->input->cookie('recent_talks')) {
                            $recent_talks = unserialize($this->input->cookie('recent_talks'));
                            for ($i = 0; $i < count($recent_talks); $i++) { ?>
                                <a href="<?php echo $recent_talks[$i]['link']; ?>"><?php echo $recent_talks[$i]['title']; ?></a>
                                <hr style="margin: 4px 0;">
                        <?php } } ?>
                    </div>
                </div>

                <div class="panel panel-dark-blue rounded mobile-hide">
                    <div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">최근 본 가구</h5></div>
                    <div class="panel-body hrefcolor-side" style="line-height: 1.2;">
                        <?php if ($this->input->cookie('recent_goods')) {
                            $recent_goods = unserialize($this->input->cookie('recent_goods'));
                            for ($i = 0; $i < count($recent_goods); $i++) { ?>
                                <a href="<?php echo $recent_goods[$i]['link']; ?>"><strong><?php echo $recent_goods[$i]['title']; ?></strong><br>
                                <?php echo $recent_goods[$i]['brand'] . ' | ' . $recent_goods[$i]['price']; ?></a>
                                <hr style="margin: 4px 0;">
                        <?php } } ?>
                    </div>
                </div>

                <div class="panel panel-dark-blue rounded mobile-hide">
                    <div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">최근 본 업체</h5></div>
                    <div class="panel-body hrefcolor-side" style="line-height: 1.2;">
                        <?php if ($this->input->cookie('recent_shop')) {
                            $recent_shop = unserialize($this->input->cookie('recent_shop'));
                            for ($i = 0; $i < count($recent_shop); $i++) { ?>
                                <a href="<?php echo $recent_shop[$i]['link']; ?>"><strong><?php echo $recent_shop[$i]['title']; ?></strong><br>
                                <?php echo $recent_shop[$i]['info']; ?></a>
                                <hr style="margin: 4px 0;">
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <!-- End Right Sidebar Menu -->

        </div>

        <!-- 메시지 모달 -->
        <div class="modal fade" id="chatt-modal" tabindex="-1" role="dialog" aria-labelledby="chattModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="textarea">
                            <textarea name="message" id="chatt-message" class="form-control" rows="5" style="resize: none;" maxlength="300" placeholder="메시지를 작성하세요."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--button type="button" class="btn-u btn-u-default" data-dismiss="modal">닫기</button-->
                        <button type="button" id="chatt-btn" class="btn-u btn-u-primary">보내기</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End 메시지 모달 -->

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

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/js/chatt.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    /** ───────────────────────────────────
     * 쪽지 보내기
     */
    var param_post = {};

    $('.timeline-v2 button').bind('click', function () {

        var btnkind = $(this).text();
        var node = $(this).parent();
        node = node.parent();
        node = node.next();
        node = node.next();
        //console.log( node.val() );    //2-provider-닉네임-보낼대상코드-7
        var target_info = node.val().split('-');

        switch (btnkind)
        {
            case '쪽지발송':
                param_post = {
                    receiver_idx: target_info[0],
                    receiver_kind: target_info[1],
                    product_idx: target_info[4],
                };
                $('#modal-title').text(target_info[2]+'에게 쪽지 보내기')
            break;
            case '쪽지상대':
                window.location.href='/web/market/chattpaper/mychatt/'+target_info[3]+'/no';
            break;
            default :
                return false;
            break;
        }

    });

    $('#chatt-btn').bind('click', function () {
        $('#chatt-message').chattsendReload({
            productidx: param_post.product_idx,
            receiveridx: param_post.receiver_idx,
            receiverkind: param_post.receiver_kind,
            message: $('#chatt-message').val()
        });
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
