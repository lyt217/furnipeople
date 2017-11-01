<?php include('./views/common/header_menu.php'); ?>
    <!--=== End Header ===-->

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30 mobile-hide">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>마이 퍼니 포인트</h2>
            </div>
        </div>
    </div>
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
            <!-- Begin Left Sidebar Menu Box -->
            <?php include('./views/common/sidemenu_left.php'); ?>
            <!-- End Left Sidebar Menu Box -->

            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3">
                <div class="headline"><h3> &nbsp; 퍼니 포인트 &nbsp; </h3></div>
                <div class="margin-bottom-20"></div>

                <!-- 포인트 정책 -->
                <h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 퍼니 포인트 정책</h5>
                <div class="tag-box tag-box-v2">
                    <P>
                        1. 회원으로 가입하신 분들만 '퍼니포인트'를 획득할 수 있습니다.<br>
                        2. Furni-Talk, Furni-Q&amp;A 게시글 1개당 <span class="color-red">10포인트</span>를 지급합니다.<br>
                        3. Furni-Review, Furni-Info 게시글 1개당 <span class="color-red">100포인트</span>를 지급합니다.<br>
                        4. Furni-Photos 게시글 1개당 <span class="color-red">30포인트</span>를 지급합니다.<br>
                        5. '퍼니포인트'는 차후 '퍼니에그' 이용권 전환 등 다양한 서비스에 사용될 예정입니다.<br>
                        <!-- 5. 설명샘플) 1,000포인트 이상시 '퍼니에그' 이용권으로 전환할 수가 있습니다. -->
                    </P>
                </div>
                <!-- End 포인트 정책 -->

                <form>
                    <div class="margin-bottom-10">
                        <i class="fa fa-database"></i> &nbsp;나의 퍼니포인트 : &nbsp;<strong style="font-size: 14px;"><span class="color-red"><?php echo number_format($pointTotal); ?></span></strong> 포인트
                    </div>
                    <!--div class="form-inline">
                        <i class="fa fa-database"></i> &nbsp;퍼니애그로 전환 : &nbsp;
                        <input style="width: 100px; display: inline-block;" type="text" name="zip_code" id="zip-code" class="form-control" value=""> 포인트
                        &nbsp; <button id="addr-popup" class="btn btn-sm rounded btn-primary" type="button">전환하기</button>
                    </div-->
                </form>
                <hr>

                <!-- 포인트 이력 -->
                <h5 class="margin-bottom-15 text-bold"><i class="fa fa-sticky-note-o"></i> 퍼니 포인트 적립내역</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody style="font-size: 12px;">
                        <?php if ($pointList) {
                            foreach ($pointList as $item): ?>
                            <tr>
                                <td><?php echo $item->breakdown; ?></td>
                                <td style="width: 160px;" class="text-center"><?php echo date('Y-m-d A g:i', strtotime($item->regdate)); ?></td>
                            </tr>
                        <?php endforeach; } ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    <?php echo $pagination; ?>
                </div>
                <!-- End 포인트 이력 -->

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

function zzimDelete(zzimidx) {
    if (confirm('관심가구에서 삭제하시겠습니까?')) {
        $.ajax({
            url: '/web/market/myproduct/favoritedelete/' + zzimidx,
            type: 'delete',
            dataType: 'text',
            success: function (data) {
                //alert(data); //alert('성공');
                if (data == 'success')
                    window.location.reload(true);
            }
        });
    }
}
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
