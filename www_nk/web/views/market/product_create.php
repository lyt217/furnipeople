<?php
 include './views/common/header_menu_market.php';
?>


    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>판매하려는 가구나 인테리어 제품을 등록하세요.</h2>
                <p>모든 항목을 입력해 주시고, 물품이미지도 1개이상 첨부해 주세요.</p>
            </div>
        </div>
    </div>
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">

        <div class="row">
          <?php
           include './views/common/sidemenu_left.php';
          ?>
            <!-- Begin Content -->
            <div class="col-md-8 tag-box tag-box-v3">
                <div class="headline"><h3> &nbsp; 내물건 판매하기 &nbsp; </h3><!-- &nbsp; 판매하려는 가구나 인테리어 제품을 등록하세요.--></div>
                <div class="margin-bottom-15"></div>

                <form class="sky-form" role="form" action="/web/market/product/register" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <fieldset>

                        <!--div class="row">
                            <label class="label col col-2">등록가능 횟수</label>
                            <section class="col col-3">
                                <label class="input state-success">
                                    <input type="text" name="egg_ticket" value="8 회" readonly>
                                </label>
                            </section>
                            <section class="col col-1">
                                <label>
                                    <button class="btn-u btn-u-sea rounded" type="button">충전하기</button>
                                </label>
                            </section>
                        </div-->
                        <section class="row">
                            <label class="label col col-2">상품명 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="prod_title" value="<?php echo set_value('prod_title'); ?>" maxlength="40"></label>
                                <?php echo form_error('prod_title', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">상세설명 :</label>
                            <section class="col col-9">
                                <label class="textarea">
                                    <textarea name="explain" class="form-control" rows="3"><?php echo set_value('explain'); ?></textarea>
                                    <?php echo form_error('explain', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </label>
                            </section>
                        </section>
                        <div class="row">
                            <label class="label col col-2">브랜드 :</label>
                            <section class="col col-3">
                                <select name="brand" class="form-control">
                                    <option value="시디즈" <?php echo set_select('brand', '시디즈', TRUE); ?>>시디즈</option>
                                    <option value="퍼시스" <?php echo set_select('brand', '퍼시스'); ?>>퍼시스</option>
                                    <option value="이케아" <?php echo set_select('brand', '이케아'); ?>>이케아</option>
                                    <option value="일룸" <?php echo set_select('brand', '일룸'); ?>>일룸</option>
                                    <option value="템퍼" <?php echo set_select('brand', '템퍼'); ?>>템퍼</option>
                                    <option value="에이스침대" <?php echo set_select('brand', '에이스침대'); ?>>에이스침대</option>
                                    <option value="시몬스침대" <?php echo set_select('brand', '시몬스침대'); ?>>시몬스침대</option>
                                    <option value="까사미아" <?php echo set_select('brand', '까사미아'); ?>>까사미아</option>
                                    <option value="듀오백" <?php echo set_select('brand', '듀오백'); ?>>듀오백</option>
                                    <option value="한샘" <?php echo set_select('brand', '한샘'); ?>>한샘</option>
                                    <option value="현대리바트" <?php echo set_select('brand', '현대리바트'); ?>>현대리바트</option>
                                    <option value="Hermanmiller" <?php echo set_select('brand', 'Hermanmiller'); ?>>Hermanmiller</option>
                                    <option value="Knoll" <?php echo set_select('brand', 'Knoll'); ?>>Knoll</option>
                                    <option value="Humanscale" <?php echo set_select('brand', 'Humanscale'); ?>>Humanscale</option>
                                </select>
                            </section>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="brand_etc" maxlength="18" value="<?php echo set_value('brand_etc'); ?>" placeholder="브랜드 직접입력시"></label>
                                <!--div class="note">노트</div-->
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">가구종류 :</label>
                            <section class="col col-3">
                                <select name="kind_code" class="form-control">
                                    <option value="b" <?php echo set_select('kind_code', 'b', @$kind_select['b']); ?>>의자</option>
                                    <option value="c" <?php echo set_select('kind_code', 'c', @$kind_select['c']); ?>>책상</option>
                                    <option value="d" <?php echo set_select('kind_code', 'd', @$kind_select['d']); ?>>쇼파</option>
                                    <option value="e" <?php echo set_select('kind_code', 'e', @$kind_select['e']); ?>>침대</option>
                                    <option value="f" <?php echo set_select('kind_code', 'f', @$kind_select['f']); ?>>화장대</option>
                                    <option value="g" <?php echo set_select('kind_code', 'g', @$kind_select['g']); ?>>식탁</option>
                                    <option value="h" <?php echo set_select('kind_code', 'h', @$kind_select['h']); ?>>수납장</option>
                                    <option value="i" <?php echo set_select('kind_code', 'i', @$kind_select['i']); ?>>서랍</option>
                                    <option value="j" <?php echo set_select('kind_code', 'j', @$kind_select['j']); ?>>인테리어 제품</option>
                                    <option value="k" <?php echo set_select('kind_code', 'k', @$kind_select['k']); ?>>기타 가구류</option>

                                </select>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">가구상태 :</label>
                            <section class="col col-3">
                                <select name="prod_state" class="form-control">
                                    <option value="새제품" <?php echo set_select('prod_state', '새제품', TRUE); ?>>새제품</option>
                                    <option value="매우양호" <?php echo set_select('prod_state', '매우양호'); ?>>매우양호</option>
                                    <option value="양호/사용감있음" <?php echo set_select('prod_state', '양호/사용감있음'); ?>>양호/사용감있음</option>
                                    <option value="중요한결함있음" <?php echo set_select('prod_state', '중요한결함있음'); ?>>중요한결함있음</option>
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">구입일자 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="buy_date" class="date-mask" value="<?php echo set_value('buy_date'); ?>" maxlength="10" placeholder="2016-02-07 형식"></label>
                                <?php echo form_error('buy_date', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">구입가격 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="buy_price" class="num-mask" value="<?php echo set_value('buy_price'); ?>" maxlength="8"></label>
                                <?php echo form_error('buy_price', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">판매희망가격 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="sell_price" class="num-mask" value="<?php echo set_value('sell_price'); ?>" maxlength="8"></label>
                                <?php echo form_error('sell_price', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">가격협상 :</label>
                            <section class="col col-3">
                                <select name="negotiation" class="form-control">
                                    <option value="가능" <?php echo set_select('negotiation', '가능', TRUE); ?>>가능</option>
                                    <option value="불가능" <?php echo set_select('negotiation', '불가능'); ?>>불가능</option>
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">배송비부담 :</label>
                            <section class="col col-3">
                                <select name="delivery" class="form-control">
                                    <option value="판매자" <?php echo set_select('delivery', '판매자', TRUE); ?>>판매자</option>
                                    <option value="구매자" <?php echo set_select('delivery', '구매자'); ?>>구매자</option>
                                </select>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">연락처 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="phone" value="<?php echo set_value('phone'); ?>" maxlength="14" placeholder="999-9999-9999 형식"></label>
                                <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </div>
                        <section class="row">
                            <label class="label col col-2">주소 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="address" value="<?php echo set_value('address'); ?>" maxlength="30" placeholder="동까지만 입력하세요"></label>
                                <?php echo form_error('address', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>

                        <div class="bg-light">
                            <h5 class="margin-bottom-15"><i class="fa fa-television"></i> 물품 이미지 등록</h5>
                            <label class="input input-file col-11 margin-bottom-15">
                                <div class="button input input-file"><input type="file" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">대표이미지첨부</div><input type="text" readonly>
                            </label>
                            <label class="input input-file col-11 margin-bottom-15">
                                <div class="button input input-file"><input type="file" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">추가이미지첨부</div><input type="text" readonly>
                            </label>
                            <label class="input input-file col-11 margin-bottom-15">
                                <div class="button input input-file"><input type="file" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">추가이미지첨부</div><input type="text" readonly>
                            </label>
                            <label class="input input-file col-11 margin-bottom-15">
                                <div class="button input input-file"><input type="file" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">추가이미지첨부</div><input type="text" readonly>
                            </label>
                            <label class="input input-file col-11 margin-bottom-15">
                                <div class="button input input-file"><input type="file" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">추가이미지첨부</div><input type="text" readonly>
                            </label>
                            <label class="input input-file col-11">
                                <div class="button input input-file"><input type="file" name="prod_photo[]" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">추가이미지첨부</div><input type="text" readonly>
                            </label>
                        </div>
                        <!--section>
                            <label class="checkbox"><input type="checkbox" name="copy"><i></i>Send a copy to my e-mail address</label>
                        </section-->
                    </fieldset>
                    <footer class="text-center">
                        <button type="submit" id="ladda-submit" class="btn-u btn-u-orange ladda-button" data-style="contract-overlay" style="z-index: 9999; width: 150px;"> 등록하기 </button>
                    </footer>
                </form>

            </div>
            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->
            <div class="col-md-2">
                <ul class="list-unstyled blog-photos">
                    <li><a href="/web/market/chattpaper/mychatt"><img src="/static/webimage/btn-mymini1.png" alt="마이쪽지" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/myticket/index"><img src="/static/webimage/btn-mymini2.png" alt="마이에그" class="hover-effect"></a></li>
                    <li><a href="/web/wallet/mypoint/index"><img src="/static/webimage/btn-mymini3.png" alt="마이포인트" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/favoritelist"><img src="/static/webimage/btn-mymini4.png" alt="관심가구" class="hover-effect"></a></li>
                    <li><a href="/web/market/myproduct/index"><img src="/static/webimage/btn-mymini5.png" alt="내등록물건" class="hover-effect"></a></li>
                    <li><a href="/web/user/mytalk/index"><img src="/static/webimage/btn-mymini6.png" alt="내가쓴글" class="hover-effect"></a></li>
                </ul>

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
                                <?php echo $recent_goods[$i]['brand'] . ' | ' . $recent_goods[$i]['price']; ?></a>
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

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== Footer ===-->
    <div id="footer-v6" class="footer-v6">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline terms-menu">
                            <li><a href="/web/service/furni/people">회사소개</a></li>
                            <li><a href="/web/service/furni/servicepolicy">이용약관</a></li>
                            <li><a href="/web/service/furni/privatepolicy">개인정보 취급방침</a></li>
                            <li><a href="/web/service/furni/inquiry">건의 및 제휴</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 sm-margin-bottom-20"><img src="/static/webimage/logo-foot.png" class="margin-left-10"></div>
                    <div class="col-md-9">
                        <span class="margin-right-20">회사명 : 퍼니피플</span><span class="margin-right-20">개인정보관리책임자 : 박표인</span><br />
                        <span class="margin-right-20">서울시 강남구 대치동 896-13 4층</span><span class="margin-right-20">대표이사 : 박표인</span><span>사업자번호 : 818-02-00671</span><br />
                        <div class="col-md-8 text-center"><small> COPYRIGHT© 2015 FURNIPEOPLE.COM &nbsp; ALL RIGHTS RESERVED</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Footer ===-->
</div><!--/wrapper-->

<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/back-to-top.min.js"></script>
<script type="text/javascript" src="/assets/plugins/smoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/plugins/ladda-buttons/js/spin.min.js"></script>
<script type="text/javascript" src="/assets/plugins/ladda-buttons/js/ladda.min.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.date.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.numeric.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/jquery.inputmask.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    App.init();

    Ladda.bind( '#ladda-submit', { timeout: 20000 } );

    //$('.date-mask').inputmask("y-m-d");
    $('.num-mask').inputmask('integer', { rightAlign: false });

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
