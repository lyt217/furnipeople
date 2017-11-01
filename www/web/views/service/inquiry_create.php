<?php include('./views/common/header_menu.php'); ?>


    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function recaptchaGrant() {
            var submitBtn = document.getElementById('submit-btn');
            submitBtn.removeAttribute('disabled');
        };
        function recaptchaDeny() {
            var submitBtn = document.getElementById('submit-btn');
            submitBtn.setAttribute('disabled');
            submitBtn.innerHTML = '스팸방지 확인을 클릭하세요';
        };
    </script>
    <!--=== End Header ===-->

    <!--=== Job이미지와 Parallax ===-->
    <div class="bg-image-v1 parallaxBg margin-bottom-30">
        <div class="container">
            <div class="headline-center headline-light">
                <h2>건의 및 제휴</h2>
            </div>
        </div>
    </div>
    <!--=== End Job이미지와 Parallax ===-->

    <!--=== Content Part ===-->
    <div class="container content no-top-space">
        <div class="row margin-bottom-30">
            <div class="col-md-1">
            </div>
            <div class="col-md-6 mb-margin-bottom-30">
                <div class="headline"><h3> &nbsp; 건의 및 제휴 &nbsp; </h3></div>
                <div class="margin-bottom-40"></div>

                <?php if ($this->session->flashdata('inquiry_msg')) { ?>
                <div class="contex-bg margin-bottom-20">
                    <p class="bg-primary"><?php echo $this->session->flashdata('inquiry_msg'); ?></p>
                </div>
                <?php } ?>

                <form class="sky-form contact-style" method="post" action="/web/service/furni/inquiry">
                    <fieldset class="no-padding">
                        <label>이름 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-7 col-md-offset-0">
                                <div>
                                    <input type="text" name="uname" class="form-control" value="<?php echo set_value('uname'); ?>" maxlength="10">
                                    <?php echo form_error('uname', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <label>연락처 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-7 col-md-offset-0">
                                <div>
                                    <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" maxlength="40">
                                    <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <label>이메일 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-7 col-md-offset-0">
                                <div>
                                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" maxlength="30">
                                    <?php echo form_error('email', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <label>내용 <span class="color-red">*</span></label>
                        <div class="row sky-space-20">
                            <div class="col-md-11 col-md-offset-0">
                                <div>
                                    <textarea rows="8" name="proposal" class="form-control"><?php echo set_value('proposal'); ?></textarea>
                                    <?php echo form_error('proposal', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <p><button type="submit" class="btn-u" id="submit-btn" disabled="disabled" style="width: 100px;"> 보내기 </button></p>

                        <div class="margin-top-20">
                            <div class="g-recaptcha" data-callback="recaptchaGrant" data-expired-callback="recaptchaDeny" data-sitekey="6LfQxBYTAAAAADX8lYuo2G3kJNpskehG4E1pY-rQ"></div>
                        </div>
                    </fieldset>
                </form>
            </div><!--/col-md-9-->

            <div class="col-md-4">
                <!-- Google Map -->
                <div id="map" class="map map-box map-box-space1 margin-bottom-40">
                </div><!---/map-->
                <!-- End Google Map -->

                <!-- Contacts -->
                <div class="headline"><h2>Contacts</h2></div>
                <ul class="list-unstyled who margin-bottom-30">
                    <li><i class="fa fa-home"></i>서울시 강남구 대치동 896-13 4층</li>
                    <!--li><a href="#"><i class="fa fa-envelope"></i>info@example.com</a></li-->
                    <!--li><i class="fa fa-phone"></i>02-3463-5511</li-->
                    <li><i class="fa fa-globe"></i>http://www.furnipeople.com</li>
                </ul>
                <!-- End Contacts -->

                <!-- Business Hours -->
                <div class="headline"><h2>Business Hours</h2></div>
                <ul class="list-unstyled margin-bottom-30">
                    <li><strong>Everyday:</strong> 10am to 8pm</li>
                </ul>
                <!-- End Business Hours -->
            </div>
            <div class="col-md-1">
            </div>
        </div><!--/row-->

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
<!--script type="text/javascript" src="/assets/js/app.min.js"></script-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/assets/plugins/gmap/gmap.js"></script>
<script type="text/javascript">
$(document).ready(function ()
{
    //App.init();

    map = new GMaps({
        div: '#map',
        scrollwheel: false,
        lat: 37.50302654925896,
        lng: 127.05778660282249
    });
    var marker = map.addMarker({
        lat: 37.50302654925896,
        lng: 127.05778660282249,
        title: '퍼니피플'
    });

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script type="text/javascript" src="/assets/analytics/google-analytics.js"></script>
</body>
</html>
