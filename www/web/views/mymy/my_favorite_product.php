<?php include('./views/common/header_menu.php'); ?>
    <!--=== End Header ===-->

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30 mobile-hide">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>나의 관심 가구 관리</h2>
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
                <div class="headline"><h3> &nbsp; 나의 관심 가구 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>

                <?php if ($zzimList) {
                foreach ($zzimList as $item): ?>
                <div class="photo-upload row">
                    <img src="/static/marketphoto/<?php echo $item->mainimage; ?>">
                    <div class="position-top pull-right">
                        <a onclick="javascript:zzimDelete(<?php echo $item->id; ?>);" title="삭제" style="cursor: pointer;"><i class="fa fa-times"></i></a>&nbsp;&nbsp;
                    </div>
                    <h3><strong>[<?php echo $item->kindpname; ?>] <a href="/web/market/myproduct/favoriteitem/<?php echo $item->id . '/' .$item->product_id; ?>">&nbsp;<?php echo $item->prodtitle; ?></a></strong></h3>
                    <div class="overflow-h">
                        <p class="hex">
                            판매자 : <?php echo $item->nickname . ',&nbsp; 판매가격 : ' . number_format($item->sellprice); ?>원<br>
                            브랜드 : <?php echo $item->brand . ',&nbsp; 가구상태 : ' . $item->prodstate; ?><br>
                            연락처 : <?php echo $item->phone . ',&nbsp; 주소 : ' . $item->address; ?><br>
                        </p>
                        <p class="text-right"><a href="/web/market/myproduct/favoriteitem/<?php echo $item->id . '/' .$item->product_id; ?>/rtnlist" target="_blank"><i class="fa fa-clone"></i> 새창으로 열기</a></p>
                    </div>
                </div>
                <hr style="margin: 0 0;">
                <?php endforeach; } ?>

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
