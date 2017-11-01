<div class="col-md-2">

<div class="bg-light rounded">
<div class="headline"><h2 class="heading-sm" style="font-size: 16px;"> Notice &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/service/notice/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
<div class="hrefcolor-side" style="font-size: 12px;">
<?php if ($noticeTopx) {
foreach ($noticeTopx as $talk): ?>
<a href="/web/service/notice/article/<?php echo $talk->id; ?>/rtnlist"><?php echo title_utfcut2($talk->title); ?></a>
<hr style="margin: 3px 0;">
<?php endforeach; } ?>
</div>
</div>
<div class="margin-bottom-15"></div>

<div class="panel panel-sea rounded mobile-hide">
<div class="panel-heading" id="test"><h4 class="panel-title" style="font-size: 14px;">Furni Talk</h4></div>
      <ul class="list-group sidebar-nav-v1">
          <li class="list-group-item rounded-top">
              <a href="/web/talk/whole/search">&nbsp; 전체</a>
          </li>
          <li class="list-group-item rounded-top">
              <a href="/web/talk/best/search/all/no">&nbsp; Furni Talk Best</a>
          </li>
          <li class="list-group-item rounded-top">
              <a href="/web/talk/free/search/all/no">&nbsp; Furni Talk</a>
          </li>
          <li class="list-group-item">
              <a href="/web/talk/qna/search/all/no">&nbsp; Furni Q&amp;A</a>
          </li>
          <li class="list-group-item">
  <a href="/web/talk/review/search/all/no">&nbsp; Furni Review</a>
          </li>
          <li class="list-group-item">
              <a href="/web/talk/info/search/all/no">&nbsp; Furni Info</a>
          </li>
          <li class="list-group-item">
              <a href="/web/talk/photo/search/all/no">&nbsp; Furni Photos</a>
          </li>
          <li class="list-group-item rounded-bottom">
              <a href="/web/talk/advertise/search/all/no">&nbsp; Furni Ads</a>
          </li>
      </ul>
</div>

<div class="panel panel-red rounded mobile-hide">
<div class="panel-heading"><h4 class="panel-title" style="font-size: 14px;">Furni Market</h4></div>
      <ul class="list-group sidebar-nav-v1">
          <li class="list-group-item rounded-top">
              <a href="/web/market/product/search/all/no">&nbsp; 전체</a>
          </li>
          <?php if($kindcode){ ?>
            <?php foreach($kindcode as $code):?>
              <?php if($code->id != 1){ ?>
              <li class="list-group-item">
                  <a href="/web/market/product/search/<?php echo $code->sindex ?>/no">&nbsp; <i class="<?php echo $code->icon ?>"></i>&nbsp; <?php echo $code->name ?></a>
              </li>
              <?php } ?>

          <?php endforeach;
          } else {?>
            <li class="list-group-item">
                <a href="/web/market/product/search/chair/no">&nbsp; <i class="icon-education-150"></i>&nbsp; 의자</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/desk/no">&nbsp; <i class="icon-furniture-018"></i>&nbsp; 책상</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/sofa/no">&nbsp; <i class="icon-furniture-012"></i>&nbsp; 쇼파</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/bed/no">&nbsp; <i class="icon-furniture-020"></i>&nbsp; 침대</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/dresser/no">&nbsp; <i class="icon-furniture-092"></i>&nbsp; 화장대</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/dtable/no">&nbsp; <i class="icon-furniture-008"></i>&nbsp; 식탁</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/closet/no">&nbsp; <i class="icon-furniture-011"></i>&nbsp; 수납장</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/drawer/no">&nbsp; <i class="icon-furniture-031"></i>&nbsp; 서랍</a>
            </li>
            <li class="list-group-item">
                <a href="/web/market/product/search/interior/no">&nbsp; <i class="icon-furniture-068"></i>&nbsp; 인테리어 제품</a>
            </li>
            <li class="list-group-item rounded-bottom">
                <a href="/web/market/product/search/etc/no">&nbsp; <i class="icon-furniture-088"></i>&nbsp; 기타 가구들</a>
            </li>
          <?php }?>

      </ul>
</div>

<div class="panel panel-primary rounded mobile-hide">
<div class="panel-heading"><h4 class="panel-title" style="font-size: 14px;">Furni Friends</h4></div>
      <ul class="list-group sidebar-nav-v1">
          <li class="list-group-item rounded-top">
              <a href="/web/user/shopfind/search/a/no">&nbsp; 가구판매점</a>
          </li>
          <li class="list-group-item">
              <a href="/web/user/shopfind/search/b/no">&nbsp; 인테리어</a>
          </li>
          <li class="list-group-item rounded-bottom">
              <a href="/web/user/shopfind/search/d/no">&nbsp; 기타</a>
          </li>
      </ul>
</div>

</div>
