<?php
 include './views/common/header_menu_friend.php';
?>

    <!--=== Job이미지와 업체검색 ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <form class="form-inline" action="/web/user/shopfind/search/all/srh" method="post" accept-charset="utf-8">
                    <?php if ($this->session->has_userdata('find_shop_post')) {
                        $find_arr = $this->session->userdata('find_shop_post');

                        //지역선택
                        if ($find_arr['srh_region'] != '')
                            $srh_region[$find_arr['srh_region']] = TRUE;    //$srh_region['서울']

                        //가구종류선택
                        if ($find_arr['srh_gagu'] != '')
                            $srh_gagu[$find_arr['srh_gagu']] = TRUE;

                        //브랜드선택
                        if ($find_arr['srh_brand'] != '')
                            $srh_brand[$find_arr['srh_brand']] = TRUE;

                        //업종선택
                        if ($find_arr['srh_bizkind'] != '')
                            $srh_bizkind[$find_arr['srh_bizkind']] = TRUE;
                    } ?>
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 no-padding">
                            <div class="input-group">
                                <!--span class="input-group-addon"><i class="fa fa-tag"></i></span-->
                                <input type="text" name="find_word" placeholder="업체검색어" class="form-control" value="<?php echo $this->session->userdata('find_shop_post')['find_word']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_region" class="form-control">
                                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp; 지역 &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="서울" <?php echo set_select('srh_region', '서울', @$srh_region['서울']); ?>>서울시</option>
                                    <option value="경기" <?php echo set_select('srh_region', '경기', @$srh_region['경기']); ?>>경기도</option>
                                    <option value="부산" <?php echo set_select('srh_region', '부산', @$srh_region['부산']); ?>>부산시</option>
                                    <option value="대구" <?php echo set_select('srh_region', '대구', @$srh_region['대구']); ?>>대구시</option>
                                    <option value="인천" <?php echo set_select('srh_region', '인천', @$srh_region['인천']); ?>>인천시</option>
                                    <option value="세종" <?php echo set_select('srh_region', '세종', @$srh_region['세종']); ?>>세종시</option>
                                    <option value="대전" <?php echo set_select('srh_region', '대전', @$srh_region['대전']); ?>>대전시</option>
                                    <option value="광주" <?php echo set_select('srh_region', '광주', @$srh_region['광주']); ?>>광주시</option>
                                    <option value="울산" <?php echo set_select('srh_region', '울산', @$srh_region['울산']); ?>>울산시</option>
                                    <option value="경북" <?php echo set_select('srh_region', '경북', @$srh_region['경북']); ?>>경북</option>
                                    <option value="경남" <?php echo set_select('srh_region', '경남', @$srh_region['경남']); ?>>경남</option>
                                    <option value="강원" <?php echo set_select('srh_region', '강원', @$srh_region['강원']); ?>>강원</option>
                                    <option value="충북" <?php echo set_select('srh_region', '충북', @$srh_region['충북']); ?>>충북</option>
                                    <option value="충남" <?php echo set_select('srh_region', '충남', @$srh_region['충남']); ?>>충남</option>
                                    <option value="전북" <?php echo set_select('srh_region', '전북', @$srh_region['전북']); ?>>전북</option>
                                    <option value="전남" <?php echo set_select('srh_region', '전남', @$srh_region['전남']); ?>>전남</option>
                                    <option value="제주" <?php echo set_select('srh_region', '제주', @$srh_region['제주']); ?>>제주도</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_gagu" class="form-control">
                                    <option value="">&nbsp;&nbsp; 가구별 &nbsp;&nbsp;</option>
                                    <option value="의자" <?php echo set_select('srh_gagu', '의자', @$srh_gagu['의자']); ?>>의자</option>
                                    <option value="책상" <?php echo set_select('srh_gagu', '책상', @$srh_gagu['책상']); ?>>책상</option>
                                    <option value="쇼파" <?php echo set_select('srh_gagu', '쇼파', @$srh_gagu['쇼파']); ?>>쇼파</option>
                                    <option value="침대" <?php echo set_select('srh_gagu', '침대', @$srh_gagu['침대']); ?>>침대</option>
                                    <option value="화장대" <?php echo set_select('srh_gagu', '화장대', @$srh_gagu['화장대']); ?>>화장대</option>
                                    <option value="식탁" <?php echo set_select('srh_gagu', '식탁', @$srh_gagu['식탁']); ?>>식탁</option>
                                    <option value="수납장" <?php echo set_select('srh_gagu', '수납장', @$srh_gagu['수납장']); ?>>수납장</option>
                                    <option value="서랍" <?php echo set_select('srh_gagu', '서랍', @$srh_gagu['서랍']); ?>>서랍</option>
                                    <option value="인테리어 제품" <?php echo set_select('srh_gagu', '인테리어 제품', @$srh_gagu['인테리어 제품']); ?>>인테리어 제품</option>
                                    <option value="기타 가구들" <?php echo set_select('srh_gagu', '기타 가구들', @$srh_gagu['기타 가구들']); ?>>기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_brand" class="form-control">
                                    <option value="">&nbsp;&nbsp; 브랜드 &nbsp;&nbsp;</option>
                                    <option value="시디즈" <?php echo set_select('srh_brand', '시디즈', @$srh_brand['시디즈']); ?>>시디즈</option>
                                    <option value="퍼시스" <?php echo set_select('srh_brand', '퍼시스', @$srh_brand['퍼시스']); ?>>퍼시스</option>
                                    <option value="이케아" <?php echo set_select('srh_brand', '이케아', @$srh_brand['이케아']); ?>>이케아</option>
                                    <option value="일룸" <?php echo set_select('srh_brand', '일룸', @$srh_brand['일룸']); ?>>일룸</option>
                                    <option value="템퍼" <?php echo set_select('srh_brand', '템퍼', @$srh_brand['템퍼']); ?>>템퍼</option>
                                    <option value="에이스침대" <?php echo set_select('srh_brand', '에이스침대', @$srh_brand['에이스침대']); ?>>에이스침대</option>
                                    <option value="시몬스침대" <?php echo set_select('srh_brand', '시몬스침대', @$srh_brand['시몬스침대']); ?>>시몬스침대</option>
                                    <option value="까사미아" <?php echo set_select('srh_brand', '까사미아', @$srh_brand['까사미아']); ?>>까사미아</option>
                                    <option value="듀오백" <?php echo set_select('srh_brand', '듀오백', @$srh_brand['듀오백']); ?>>듀오백</option>
                                    <option value="한샘" <?php echo set_select('srh_brand', '한샘', @$srh_brand['한샘']); ?>>한샘</option>
                                    <option value="현대리바트" <?php echo set_select('srh_brand', '현대리바트', @$srh_brand['현대리바트']); ?>>현대리바트</option>
                                    <option value="Hermanmiller" <?php echo set_select('srh_brand', 'Hermanmiller', @$srh_brand['Hermanmiller']); ?>>Hermanmiller</option>
                                    <option value="Knoll" <?php echo set_select('srh_brand', 'Knoll', @$srh_brand['Knoll']); ?>>Knoll</option>
                                    <option value="Humanscale" <?php echo set_select('srh_brand', 'Humanscale', @$srh_brand['Humanscale']); ?>>Humanscale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 no-padding">
                            <div class="input-group">
                                <select name="srh_bizkind" class="form-control">
                                    <option value="">&nbsp;&nbsp; 업종별 &nbsp;&nbsp;</option>
                                    <option value="가구판매점" <?php echo set_select('srh_bizkind', '가구판매점', @$srh_bizkind['가구판매점']); ?>>가구판매점</option>
                                    <option value="인테리어" <?php echo set_select('srh_bizkind', '인테리어', @$srh_bizkind['인테리어']); ?>>인테리어</option>
                                    <option value="기타" <?php echo set_select('srh_bizkind', '기타', @$srh_bizkind['기타']); ?>>기타</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn-u btn-block btn-u-red">업체검색</button>
                    </div>
                    </form>
                </div>
                <div class="margin-bottom-5"></div>

            </div>
        </div>
    </div>
    <!--=== End Job이미지와 업체검색 ===-->

    <!--=== Content Part / Full Width ===-->
    <div class="container-fluid">
        <div class="row no-gutter">

            <!-- Shop Space -->
            <div class="col-md-6">
                <div id="shop-list" class="profile">

                </div>
            </div>
            <!-- End Shop Space -->

            <!-- Map Space -->
            <div class="col-md-6">
                <div class="map-space mobile-hide">
                    <div id="map" class="map"></div>
                </div>
            </div>
            <!-- End Map Space -->

        </div>

    </div>
    <!--=== End Content Part / Content Part ===-->

</div><!--/wrapper-->

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<!--script type="text/javascript" src="/assets/js/app.min.js"></script-->
<!--script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJqKyw5-d13uSctZqLOcNQTgrdGVbezeM"></script-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJqKyw5-d13uSctZqLOcNQTgrdGVbezeM"></script>

<script type="text/javascript">
$(document).ready(function ()
{
    //App.init();
});

    /** ───────────────────────────────────
     * 샵목록 기본 리스팅
     */
    var calluri = '/web/user/shopfind/searchajax/<?php echo $biz_kind.'/'.$srh_mode; ?>';

    $('<div>').load(calluri, function (response, status, xhr) {
        if (status == 'error') {
            $('#shop-list').html('Comments System Error: ' + xhr.status + ' / ' + xhr.statusText);    //Debug Use
        } else {
            $('#shop-list').html(response);
            initGmap();    //샵 리스팅 잘 되었으면 지도 로딩
        }
    });

    /** ───────────────────────────────────
     * 페이징 샵목록
     */
    var goPagination = function (roaduri) {
        if (roaduri != '#')
            var calluri = roaduri;
        else
            return;

        $('<div>').load(calluri, function (response, status, xhr) {
            if (status == 'error') {
                $('#shop-list').html('Comments System Error2: ' + xhr.status + ' / ' + xhr.statusText);    //Debug Use
            } else {
                $('#shop-list').html(response);
                changeGmap();
            }
        });
    };
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
