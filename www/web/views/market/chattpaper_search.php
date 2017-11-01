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

                        <?php include('./views/common/sidemenu_right.php'); ?>
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
