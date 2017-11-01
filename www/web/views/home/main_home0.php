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

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 100% !important;">
  <?php
  include './views/common/leftmenu.php';
   ?>

  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="height:100% !important; padding:0px; padding:0px; padding:0px; padding:0px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:50% !important;  ">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:inline-block; padding:0px; padding:0px;">
        <?php if ($productTopx) {
        foreach ($productTopx as $product): ?>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display: block; padding-top: 25.25%; padding-left:3px; padding-right:3px; margin-bottom:45px;">
              <div style="position: absolute; top: 0; bottom: 0; right: 3; left: 3;  display: block; margin-left: auto; margin-right: auto; ">
                <a href="/web/market/product/detail/<?php echo $product->id; ?>/rtnlist" title="상세보기">
                    <!-- div class="easy-block-v1-badge rgba-purple">판매완료</div><div class="easy-bg-v2 rgba-purple">New</div -->
                    <img class="" style="max-height: 100%; max-width:100%;" src="/static/marketphoto/<?php echo $product->mainimage; ?>">
                </a>
                <div class="grid-boxes-caption text-center" style="padding:0px 5px; 0px;">
                    <h5>(팝니다) <?php echo $product->prodtitle; ?></h5>
                </div>
              </div>
          </div>
        <?php endforeach; } ?>
      </div>
      <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="display:inline-block;"> -->
<!--
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img src="/static/webimage/main-event-default.jpg" class="img-responsive" alt="런칭 이벤트">
        </div> -->


      <!-- </div> -->
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:50% !important; ">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display:inline-block;">
        <div class="headline"><h2 class="heading-sm"> &nbsp; Furni Talk &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/free/search/all/no" title="전체보기"><i class="fa  fa-plus"></i></a></div>
        <p style="font-size: 12px;">
                        <?php if ($talkfreeTopx) {
                        foreach ($talkfreeTopx as $talk): ?>
          <a href="/web/talk/free/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title, $talk->mentcount); ?></a>
          <?php
            $today = new DateTime();
            $today->setTime(0,0,0);
// 2017-08-25 23:40:14
            $articledate = DateTime::createFromFormat( "Y-m-d H:i:s", $talk->regdate);
            $articledate->setTime(0,0,0);

            $diff = $today->diff($articledate);
            $diffDays = (integer)$diff->format( "%R%a" );

            if($diffDays > -3){
              echo '<img src="/assets/img/icons/mark_new1.gif" width="10" height="10">';
            }?>
             <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
          <?php endforeach; } ?>
        </p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display:inline-block;">
        <div class="headline"><h2 class="heading-sm"> &nbsp; Furni Talk Review&nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/best/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
        <p style="font-size: 12px;">
                        <?php if ($talkreviewTopx) {
                        foreach ($talkreviewTopx as $talk): ?>
                        <a href="/web/talk/review/article/' . $talk->talkboard_id; ?>"><?php echo title_utfcut2($talk->title, $talk->mentcount); ?></a>
                        <?php
                          $today = new DateTime();
                          $today->setTime(0,0,0);
// 2017-08-25 23:40:14
                          $articledate = DateTime::createFromFormat( "Y-m-d H:i:s", $talk->regdate);
                          $articledate->setTime(0,0,0);

                          $diff = $today->diff($articledate);
                          $diffDays = (integer)$diff->format( "%R%a" );

                          if($diffDays > -3){
                            echo '<img src="/assets/img/icons/mark_new1.gif" width="10" height="10">';
                          }?>
                          <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                        <?php endforeach; } ?>
        </p>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display:inline-block;">
        <div class="headline"><h2 class="heading-sm"> &nbsp; Furni Q&amp;A &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/talk/qna/search/all/no" title="전체보기"><i class="fa  fa-plus"></i></a></div>
        <p style="font-size: 12px;">
                        <?php if ($talkqnaTopx) {
                        foreach ($talkqnaTopx as $talk): ?>
                        <a href="/web/talk/qna/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title, $talk->mentcount); ?></a>
                        <?php
                          $today = new DateTime();
                          $today->setTime(0,0,0);
// 2017-08-25 23:40:14
                          $articledate = DateTime::createFromFormat( "Y-m-d H:i:s", $talk->regdate);
                          $articledate->setTime(0,0,0);

                          $diff = $today->diff($articledate);
                          $diffDays = (integer)$diff->format( "%R%a" );

                          if($diffDays > -3){
                            echo '<img src="/assets/img/icons/mark_new1.gif" width="10" height="10">';
                          }?>
                          <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
                        <?php endforeach; } ?>
        </p>
      </div>
    </div>

  </div>

</div>


<!-- <div class="col-lg-12 col-md-12 hidden-sm hidden-xs " style="position:absolute; bottom:10px;"> -->
<!--=== Footer ===-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
 include './views/common/foot.php';
?>
<!--=== End Footer ===-->
</div><!--/wrapper-->
</html>
