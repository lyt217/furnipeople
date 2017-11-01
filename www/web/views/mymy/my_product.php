<?php include('./views/common/header_menu.php'); ?>
    <!--=== End Header ===-->

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30 mobile-hide">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>내 등록 물건 관리</h2>
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
                <div class="headline"><h3> &nbsp; 내 등록 물건 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>

                <?php if ($productList) {
                foreach ($productList as $product): ?>
                <div class="photo-upload row" style="position:relative;">
                    <img src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                    <?php if($product->soldout == '매진'){ ?>
                     <img src = "/assets/img/icons/soldout.png" style="position:absolute; left:18px; top:8px; width:72px; height:72px; border:0px;">
                    <?php } ?>
                    <h3><strong>[<?php echo $product->kindpname; ?>] <a href="/web/market/product/detail/<?php echo $product->id; ?>">&nbsp;<?php echo $product->prodtitle; ?></a></strong></h3>
                    <div class="overflow-h">
                        <p class="hex">
                            판매가격 : <?php echo number_format($product->sellprice) . '원,&nbsp; 등록일 : ' . date('Y-m-d A g:i', strtotime($product->regdate)); ?><br>
                            브랜드 : <?php echo $product->brand . ',&nbsp; 가구상태 : ' . $product->prodstate; ?><br>
                            열람수 : <?php echo $product->readcount . ',&nbsp; 관심가구등록수 : ' . $product->interestcnt . ',&nbsp; 쪽지대화지수 : ' . $product->chattcnt; ?>
                        </p>
                        <p class="text-right"><a href="/web/market/product/detail/<?php echo $product->id; ?>/rtnlist" target="_blank"><i class="fa fa-clone"></i> 새창으로 열기</a></p>
                    </div>
                </div>
                <hr style="margin: 0 0;">
                <?php endforeach; } ?>

                <div class="text-center">
                    <?php echo $pagination; ?>
                </div>
                <div class="text-right">
                    <a class="btn-u btn-u-dark-blue" href="/web/market/product/register"> &nbsp;&nbsp; 내 물건 등록 &nbsp;&nbsp; </a>
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
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
