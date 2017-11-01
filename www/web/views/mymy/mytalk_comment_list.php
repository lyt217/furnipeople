<?php include('./views/common/header_menu.php'); ?>
    <!--=== End Header ===-->

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>내가 작성한 코멘트입니다.</h2>
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

                <div class="headline"><h3> &nbsp; 내가 쓴 글 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>

                <!-- Tab -->
                <div class="tab-v1">
                    <ul class="nav nav-justified nav-tabs">
                        <li><a href="/web/user/mytalk/index">작성한 토크</a></li>
                        <li class="active"><a href="#ment" data-toggle="tab">작성한 코멘트</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in" id="talk">
                        <!-- 작성한 토크 탭 -->
                        <!-- End 작성한 토크 탭 -->
                        </div>

                        <!-- 작성한 코멘트 탭 -->
                        <div class="tab-pane fade in active" id="ment">
                            <div class="margin-bottom-10"></div>

                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> <?php echo $talkname; ?></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>댓글</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($mymentList) {
                                    foreach ($mymentList as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/<?php echo $talklink; ?>/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; } ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo $pagination; ?>
                            </div>

                        </div>
                        <!-- End 작성한 코멘트 탭 -->

                    </div>
                </div>
                <!-- End Tab -->

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
