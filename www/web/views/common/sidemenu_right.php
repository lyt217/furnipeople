
  <!-- Begin Right Sidebar Menu -->
  <div class="col-md-2">

<ul class="list-unstyled blog-photos">
<li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
        <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
        <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
<li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
</ul>

<div class="panel panel-dark-blue rounded mobile-hide">
<div class="panel-heading"><h5 class="panel-title rounded-top" style="font-size: 13px;">베스트 게시글</h5></div>
<div class="panel-body hrefcolor-side" style="line-height: 1.2;">
<?php if ($talkbestTopx) {
foreach ($talkbestTopx as $talk): ?>
<a href="/web/talk/<?php echo substr($talk->taklboard_name, 4) . '/article/' . $talk->talkboard_id; ?>"><?php echo title_utfcut2($talk->title); ?></a> <?php echo ($talk->mentcount > 0) ? '&nbsp;&nbsp;<i class="fa fa-comments"></i> (' . $talk->mentcount . ')' : ''; ?><br>
<?php endforeach; } ?>
</div>
</div>

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
                    <?php echo $recent_goods[$i]['brand'] . ' | ' . $recent_goods[$i]['price']; ?>원</a>
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
