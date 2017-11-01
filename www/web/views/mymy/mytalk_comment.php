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

                            <?php if ($mentfreeTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Talk &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/free/no">전체보기</a></span></h2>
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
                                    <?php foreach ($mentfreeTopx as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/free/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($mentqnaTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Q&amp;A &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/qna/no">전체보기</a></span></h2>
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
                                    <?php foreach ($mentqnaTopx as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/qna/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($mentreviewTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Review &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/review/no">전체보기</a></span></h2>
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
                                    <?php foreach ($mentreviewTopx as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/review/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($mentinfoTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Info &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/info/no">전체보기</a></span></h2>
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
                                    <?php foreach ($mentinfoTopx as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/info/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($mentphotoTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Photos &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/photo/no">전체보기</a></span></h2>
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
                                    <?php foreach ($mentphotoTopx as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/photo/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($mentadverTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Ads &nbsp;/&nbsp; <span><a href="/web/user/mytalk/mentlist/advertise/no">전체보기</a></span></h2>
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
                                    <?php foreach ($mentadverTopx as $ment): ?>
                                    <tr>
                                        <td><?php echo title_utfcut($ment->content); ?></td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($ment->regdate)); ?></td>
                                        <td class="text-right"><a href="/web/talk/advertise/article/<?php echo $ment->talkboard_id; ?>" target="_blank">원문보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

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
