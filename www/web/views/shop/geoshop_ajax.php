<style type="text/css">
#map {
    height: 900px;
}

.map-space {
    padding: 0 42px 0 0;
}

.profile .comment {
    border-bottom: 1px solid #eee;
    padding: 15px 15px 5px;
}

.profile .comment img {
    float: left;
    width: 80px;
    height: 60px;
    margin-right: 20px;
    margin-left: 20px;
    display: block;

}

.profile .comment strong {
    /* display: block; */
    font-size: 15px;
    line-height: 15px;
    margin-bottom: 3px;
}

.profile .comment span {
    font-size: 12px;
    color: #555;
    margin-left: 6px;
    margin-bottom: 0;
}

.profile .comment p {
    font-size: 12px;
    margin-bottom: 0;
    line-height: 18px;
}

.profile .comment small {
    color: #888888;
    font-weight: 200;
}

.profile .comment-list li {
    color: #999;
    font-size: 12px;
    padding-right: 2px;
}

.profile .comment-list li a {
    color: #555;
}

.profile .comment-list li a:hover {
    color: #555;
    text-decoration: none;
}

.profile .comment-list li:hover i {
    color: #73cfad;
}
</style>

<div class="panel panel-profile">
    <div class="panel-body no-padding margin-bottom-10">
<?php if ($shopList) {
    foreach ($shopList as $shop): ?>

        <div class="comment">
          <p style="text-align:center;">
            <img src="/static/corplogo/<?php echo $shop->corplogo; ?>"></p>
            <div class="overflow-h">
                <strong><a onclick="javascript:window.open('/web/user/shop/home/<?php echo $shop->id; ?>/close');" style="cursor: pointer;"><?php echo $shop->corpname; ?></a></strong>
                <span><?php echo $shop->bizcategory . ' &nbsp;|&nbsp; 전화 : ' . $shop->corpphone . ' &nbsp;|&nbsp; 주소 : ' . $shop->addressjibun; ?></span>
                <small class="pull-right">
                    <button onclick="javascript:moveGmap(<?php echo $shop->latitude; ?>, <?php echo $shop->longitude; ?>);" class="btn-u btn-u-sm rounded btn-u-light-green mobile-hide" type="button">지도위치</button>
                    <button onclick="javascript:window.open('/web/user/shop/home/<?php echo $shop->id; ?>/close');" class="btn-u btn-u-sm rounded btn-u-light-green" type="button">
                    <i class="fa fa-picture-o"></i> 가게홈</button><span class="mobile-hide">&nbsp;&nbsp; [<?php echo $numbering--; ?>]</span>
                </small>
                <p><?php echo $shop->introduce; ?></p>
                <ul class="list-inline comment-list">
                    <li><i class="fa fa-tags"></i> <?php echo str_replace('/', ', ', $shop->hashtag); ?></li>
                </ul>
            </div>
        </div>

<?php endforeach;
} else { ?>
        <div class="comment">
            <br><p class="text-center">검색된 업체가 없습니다.</p><br><br>
        </div>
<?php } ?>
    </div>

    <div class="text-center">
        <?php echo $pagination; ?>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function ()
{
    $('.pagination a').bind('click', function() {
        var roaduri = $(this).attr('href');

        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
        goPagination(roaduri);
        return false;
    });
});

    //───────────────────────────────────
    var map;
    var myLatLng = { lat: <?php echo $my_latitude; ?>, lng: <?php echo $my_longitude; ?> };
    var markers = [];
    var moreshoplist = [<?php echo $moreshop_jsdata; ?>];

    function initGmap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            scrollwheel: false,
            zoom: 14
        });

        setGmarkers(map);
    }

    function changeGmap() {
        map.setCenter(myLatLng);
        setGmarkers(map);
    }

    function moveGmap(latitude, longitude) {
        var clickLatLng = { lat: latitude, lng: longitude };
        map.setCenter(clickLatLng);
    }

    function setGmarkers(map) {
        // console.log(shoplist);
        for (var i = 0; i < moreshoplist.length; i++) {

            var shop = moreshoplist[i];
            var marker = new google.maps.Marker({
                position: {lat: shop[1], lng: shop[2]},
                map: map,
                title: shop[0]
            });
            setGinfowindow(marker, shop[0]+' ['+shop[3]+']', shop[4]);

            markers.push(marker);

        }
    }

    function setGinfowindow(marker, viewdata, udv) {
        var div = document.createElement('div');
        div.innerHTML = viewdata;
        div.onclick = function() { iwClick(udv)};
        var infowindow = new google.maps.InfoWindow({
            content: div
        });

        marker.addListener('click', function() {
            infowindow.open(marker.get('map'), marker);
        });
    }
    function iwClick(shopid){
      window.open('http://www.furnipeople.com/web/user/shop/home/'+shopid+'/close');
    }
</script>
