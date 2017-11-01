<!-- Begin Left Sidebar Menu Box -->
<div class="col-md-2 mobile-hide">

    <div class="bg-light rounded">
        <div class="headline"><h2 class="heading-sm" style="font-size: 16px;"> Notice &nbsp;</h2><a class="osmore-btn next-v2 pull-right" href="/web/service/notice/search/all/no" title="전체보기"><i class="fa fa-plus"></i></a></div>
        <div class="hrefcolor-side" style="font-size: 12px;">
            <?php if ($this->session->has_userdata('notice_html')) {
                $notice = $this->session->userdata('notice_html');
                for ($i = 0; $i < count($notice); $i++) {
                    echo $notice[$i]['href'];
                    echo $notice[$i]['divide'];
                }
            } ?>
        </div>
    </div>
    <div class="margin-bottom-15"></div>

    <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-talk">
        <!-- Furni Talk -->
        <li class="list-group-item list-toggle rounded">
            <a data-toggle="collapse" data-parent="#sidebar-talk" href="#collapse-talk" class="sidebar-furni rounded">Furni Talk</a>
            <ul id="collapse-talk" class="collapse">
                <li><a href="/web/talk/best/search/all/no">Furni Talk Best</a></li>
                <li><a href="/web/talk/free/search/all/no">Furni Talk</a></li>
                <li><a href="/web/talk/qna/search/all/no">Furni Q&amp;A</a></li>
                <li><a href="/web/talk/review/search/all/no">Furni Review</a></li>
                <li><a href="/web/talk/info/search/all/no">Furni Info</a></li>
                <li><a href="/web/talk/photo/search/all/no">Furni Photos</a></li>
                <li><a href="/web/talk/advertise/search/all/no">Furni Ads</a></li>
            </ul>
        </li>
        <!-- End Furni Talk -->
    </ul>

    <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-market">
        <!-- Furni Market -->
        <li class="list-group-item list-toggle rounded active">
            <a data-toggle="collapse" data-parent="#sidebar-market" href="#collapse-market" class="sidebar-furni rounded">Furni Market</a>
            <ul id="collapse-market" class="collapse in">
                <li><a href="/web/market/product/search/all/no">전체</a></li>
                <li><a href="/web/market/product/search/chair/no"><i class="icon-education-150"></i>&nbsp; 의자</a></li>
                <li><a href="/web/market/product/search/desk/no"><i class="icon-furniture-018"></i>&nbsp; 책상</a></li>
                <li><a href="/web/market/product/search/sofa/no"><i class="icon-furniture-012"></i>&nbsp; 쇼파</a></li>
                <li><a href="/web/market/product/search/bed/no"><i class="icon-furniture-020"></i>&nbsp; 침대</a></li>
                <li><a href="/web/market/product/search/dresser/no"><i class="icon-furniture-092"></i>&nbsp; 화장대</a></li>
                <li><a href="/web/market/product/search/dtable/no"><i class="icon-furniture-008"></i>&nbsp; 식탁</a></li>
                <li><a href="/web/market/product/search/closet/no"><i class="icon-furniture-011"></i>&nbsp; 수납장</a></li>
                <li><a href="/web/market/product/search/drawer/no"><i class="icon-furniture-031"></i>&nbsp; 서랍</a></li>
                <li><a href="/web/market/product/search/interior/no"><i class="icon-furniture-068"></i>&nbsp; 인테리어 제품</a></li>
                <li><a href="/web/market/product/search/etc/no"><i class="icon-furniture-088"></i>&nbsp; 기타 가구들</a></li>
            </ul>
        </li>
        <!-- End Furni Market -->
    </ul>

    <ul class="list-group sidebar-nav-v1 margin-bottom-15" id="sidebar-friend">
        <!-- Furni Friends -->
        <li class="list-group-item list-toggle rounded">
            <a data-toggle="collapse" data-parent="#sidebar-friend" href="#collapse-friend" class="sidebar-furni rounded">Furni Friends</a>
            <ul id="collapse-friend" class="collapse">
                <li><a href="/web/user/shopfind/search/a/no">가구판매점</a></li>
                <li><a href="/web/user/shopfind/search/b/no">인테리어</a></li>
                <li><a href="/web/user/shopfind/search/d/no">기타</a></li>
            </ul>
        </li>
        <!-- End Furni Friends -->
    </ul>
</div>
<!-- End Left Sidebar Menu Box -->
