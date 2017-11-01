<?php include('./views/common/header_menu.php'); ?>

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>내가 작성한 토크글입니다.</h2>
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
                        <li class="active"><a href="#talk" data-toggle="tab">작성한 토크</a></li>
                        <li><a href="/web/user/mytalk/ment">작성한 코멘트</a></li><!-- data-toggle="tab" 제거 -->
                    </ul>

                    <div class="tab-content">
                        <!-- 작성한 토크 탭 -->
                        <div class="tab-pane fade in active" id="talk">
                        	<div class="margin-bottom-10"></div>

                            <?php if ($talkfreeTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Talk &nbsp;/&nbsp; <span><a href="/web/user/mytalk/talklist/free/no">전체보기</a></span></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>제목</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th class="hidden-sm">조회수</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($talkfreeTopx as $talk): ?>
                                    <tr>
                                        <td>
                                            <?php echo title_utfcut($talk->title); ?> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?>
                                        </td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($talk->regdate)); ?></td>
                                        <td class="hidden-sm"><?php echo $talk->readcount; ?></td>
                                        <td class="text-right"><a href="/web/talk/free/article/<?php echo $talk->id; ?>" target="_blank">내글보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($talkqnaTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Q&amp;A &nbsp;/&nbsp; <span><a href="/web/user/mytalk/talklist/qna/no">전체보기</a></span></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>제목</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th class="hidden-sm">조회수</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($talkqnaTopx as $talk): ?>
                                    <tr>
                                        <td>
                                            <?php echo title_utfcut($talk->title); ?> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?>
                                        </td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($talk->regdate)); ?></td>
                                        <td class="hidden-sm"><?php echo $talk->readcount; ?></td>
                                        <td class="text-right"><a href="/web/talk/qna/article/<?php echo $talk->id; ?>" target="_blank">내글보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($talkreviewTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Review &nbsp;/&nbsp; <span><a href="/web/user/mytalk/talklist/review/no">전체보기</a></span></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>제목</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th class="hidden-sm">조회수</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($talkreviewTopx as $talk): ?>
                                    <tr>
                                        <td>
                                            <?php echo title_utfcut($talk->title); ?> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?>
                                        </td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($talk->regdate)); ?></td>
                                        <td class="hidden-sm"><?php echo $talk->readcount; ?></td>
                                        <td class="text-right"><a href="/web/talk/review/article/<?php echo $talk->id; ?>" target="_blank">내글보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($talkinfoTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Info &nbsp;/&nbsp; <span><a href="/web/user/mytalk/talklist/info/no">전체보기</a></span></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>제목</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th class="hidden-sm">조회수</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($talkinfoTopx as $talk): ?>
                                    <tr>
                                        <td>
                                            <?php echo title_utfcut($talk->title); ?> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?>
                                        </td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($talk->regdate)); ?></td>
                                        <td class="hidden-sm"><?php echo $talk->readcount; ?></td>
                                        <td class="text-right"><a href="/web/talk/info/article/<?php echo $talk->id; ?>" target="_blank">내글보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($talkphotoTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Photos &nbsp;/&nbsp; <span><a href="/web/user/mytalk/talklist/photo/no">전체보기</a></span></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>제목</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th class="hidden-sm">조회수</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($talkphotoTopx as $talk): ?>
                                    <tr>
                                        <td>
                                            <?php echo title_utfcut($talk->title); ?> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?>
                                        </td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($talk->regdate)); ?></td>
                                        <td class="hidden-sm"><?php echo $talk->readcount; ?></td>
                                        <td class="text-right"><a href="/web/talk/photo/article/<?php echo $talk->id; ?>" target="_blank">내글보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                            <?php if ($talkadverTopx) { ?>
                            <div class="heading heading-v4">
                                <h2><i class="fa fa-pencil-square-o"></i> Furni Ads &nbsp;/&nbsp; <span><a href="/web/user/mytalk/talklist/advertise/no">전체보기</a></span></h2>
                            </div>
                            <table class="table table-hover hrefcolor-basic">
                                <thead>
                                    <tr>
                                        <th>제목</th>
                                        <th class="hidden-sm">날짜</th>
                                        <th class="hidden-sm">조회수</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($talkadverTopx as $talk): ?>
                                    <tr>
                                        <td>
                                            <?php echo title_utfcut($talk->title); ?> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?>
                                        </td>
                                        <td class="hidden-sm"><?php echo date('Y.m.d', strtotime($talk->regdate)); ?></td>
                                        <td class="hidden-sm"><?php echo $talk->readcount; ?></td>
                                        <td class="text-right"><a href="/web/talk/advertise/article/<?php echo $talk->id; ?>" target="_blank">내글보기</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php } ?>

                        </div>
                        <!-- End 작성한 토크 탭 -->

                        <div class="tab-pane fade in" id="ment">
                        <!-- 작성한 코멘트 탭 -->
                        <!-- End 작성한 코멘트 탭 -->
                        </div>
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
