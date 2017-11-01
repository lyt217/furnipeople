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


<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
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
                <div class="headline"><h3> &nbsp; 내물건 정보수정 &nbsp; </h3></div>
                <div class="margin-bottom-15"></div>

                <form class="sky-form" role="form" action="/web/market/product/update/<?php echo $productOne->id; ?>" method="post" accept-charset="utf-8">
                    <fieldset>

                        <section class="row">
                            <label class="label col col-2">상품명 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="prod_title" value="<?php echo set_value('prod_title', @$productOne->prodtitle); ?>" maxlength="40"></label>
                                <?php echo form_error('prod_title', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">상세설명 :</label>
                            <section class="col col-9">
                                <label class="textarea">
                                    <textarea name="explain" class="form-control" rows="3"><?php echo set_value('explain', @$productOne->explain); ?></textarea>
                                    <?php echo form_error('explain', '<div class="alert alert-warning fade in">', '</div>'); ?>
                                </label>
                            </section>
                        </section>
                        <div class="row">
                            <label class="label col col-2">브랜드 :</label>
                            <section class="col col-3">
                                <select name="brand" class="form-control">
                                    <option value="시디즈" <?php echo set_select('brand', '시디즈', @$brand_select['시디즈']); ?>>시디즈</option>
                                    <option value="퍼시스" <?php echo set_select('brand', '퍼시스', @$brand_select['퍼시스']); ?>>퍼시스</option>
                                    <option value="이케아" <?php echo set_select('brand', '이케아', @$brand_select['이케아']); ?>>이케아</option>
                                    <option value="일룸" <?php echo set_select('brand', '일룸', @$brand_select['일룸']); ?>>일룸</option>
                                    <option value="템퍼" <?php echo set_select('brand', '템퍼', @$brand_select['템퍼']); ?>>템퍼</option>
                                    <option value="에이스침대" <?php echo set_select('brand', '에이스침대', @$brand_select['에이스침대']); ?>>에이스침대</option>
                                    <option value="시몬스침대" <?php echo set_select('brand', '시몬스침대', @$brand_select['시몬스침대']); ?>>시몬스침대</option>
                                    <option value="까사미아" <?php echo set_select('brand', '까사미아', @$brand_select['까사미아']); ?>>까사미아</option>
                                    <option value="듀오백" <?php echo set_select('brand', '듀오백', @$brand_select['듀오백']); ?>>듀오백</option>
                                    <option value="한샘" <?php echo set_select('brand', '한샘', @$brand_select['한샘']); ?>>한샘</option>
                                    <option value="현대리바트" <?php echo set_select('brand', '현대리바트', @$brand_select['현대리바트']); ?>>현대리바트</option>
                                    <option value="Hermanmiller" <?php echo set_select('brand', 'Hermanmiller', @$brand_select['Hermanmiller']); ?>>Hermanmiller</option>
                                    <option value="Knoll" <?php echo set_select('brand', 'Knoll', @$brand_select['Knoll']); ?>>Knoll</option>
                                    <option value="Humanscale" <?php echo set_select('brand', 'Humanscale', @$brand_select['Humanscale']); ?>>Humanscale</option>
                                    <?php if (@$brand_select['기타']) { ?><option value="기타" <?php echo set_select('brand', '기타', @$brand_select['기타']); ?>>직접입력</option><?php } ?>
                                </select>
                            </section>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="brand_etc" maxlength="18" value="<?php echo set_value('brand_etc', @$brand_etcname); ?>" placeholder="브랜드 직접입력"></label>
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
                                    <option value="새제품" <?php echo set_select('prod_state', '새제품', @$pstate_select['새제품']); ?>>새제품</option>
                                    <option value="매우양호" <?php echo set_select('prod_state', '매우양호', @$pstate_select['매우양호']); ?>>매우양호</option>
                                    <option value="양호/사용감있음" <?php echo set_select('prod_state', '양호/사용감있음', @$pstate_select['양호/사용감있음']); ?>>양호/사용감있음</option>
                                    <option value="중요한결함있음" <?php echo set_select('prod_state', '중요한결함있음', @$pstate_select['중요한결함있음']); ?>>중요한결함있음</option>
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">구입일자 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="buy_date" class="date-mask" value="<?php echo set_value('buy_date', @$productOne->buydate); ?>" maxlength="10"></label>
                                <?php echo form_error('buy_date', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">구입가격 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="buy_price" class="num-mask" value="<?php echo set_value('buy_price', @$productOne->buyprice); ?>" maxlength="8"></label>
                                <?php echo form_error('buy_price', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">판매희망가격 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="sell_price" class="num-mask" value="<?php echo set_value('sell_price', @$productOne->sellprice); ?>" maxlength="8"></label>
                                <?php echo form_error('sell_price', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">가격협상 :</label>
                            <section class="col col-3">
                                <select name="negotiation" class="form-control">
                                    <option value="가능" <?php echo set_select('negotiation', '가능', @$negoyn_select['가능']); ?>>가능</option>
                                    <option value="불가능" <?php echo set_select('negotiation', '불가능', @$negoyn_select['불가능']); ?>>불가능</option>
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <label class="label col col-2">배송비부담 :</label>
                            <section class="col col-3">
                                <select name="delivery" class="form-control">
                                    <option value="판매자" <?php echo set_select('delivery', '판매자', @$delivery_select['판매자']); ?>>판매자</option>
                                    <option value="구매자" <?php echo set_select('delivery', '구매자', @$delivery_select['구매자']); ?>>구매자</option>
                                </select>
                            </section>
                            <label class="label col col-1"></label>
                            <label class="label col col-2">연락처 :</label>
                            <section class="col col-3">
                                <label class="input"><input type="text" name="phone" value="<?php echo set_value('phone', @$productOne->phone); ?>" maxlength="14" placeholder="999-9999-9999 형식"></label>
                                <?php echo form_error('phone', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </div>
                        <section class="row">
                            <label class="label col col-2">주소 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="address" value="<?php echo set_value('address', @$productOne->address); ?>" maxlength="30" placeholder="동까지만 입력하세요"></label>
                                <?php echo form_error('address', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>

                        <section class="row">
                            <label class="label col col-2">링크 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="linkurl" value="<?php echo set_value('linkurl', @$productOne->linkurl); ?>" maxlength="120" placeholder="제품 상세페이지의 URL을 입력하세요"></label>
                                <?php echo form_error('linkurl', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">사이즈 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="size" value="<?php echo set_value('size', @$productOne->size); ?>" maxlength="120" placeholder="사이즈 정보를 입력하세요"></label>
                                <?php echo form_error('size', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                        <section class="row">
                            <label class="label col col-2">옵션 :</label>
                            <section class="col col-7">
                                <label class="input"><input type="text" name="optioninfo" value="<?php echo set_value('optioninfo', @$productOne->optioninfo); ?>" maxlength="120" placeholder="제품의 옵션을 입력하세요"></label>
                                <?php echo form_error('optioninfo', '<div class="alert alert-warning fade in">', '</div>'); ?>
                            </section>
                        </section>
                    </fieldset>
                    <footer class="text-center">
                        <button type="submit" class="btn-u btn-u-orange" style="width: 150px;"> 정보수정 </button>
                    </footer>
                    <input type="hidden" name="myproduct_post" value="<?php echo $productOne->id; ?>">
                </form>
                <div class="margin-bottom-15"></div>

                <div class="headline"><h3> &nbsp; 물품 이미지 &nbsp; </h3> &nbsp; * 이미지를 순서대로 등록하세요.</div>
                <div class="margin-bottom-15"></div>

                <!-- 물품 이미지 ajax 업로드 -->
				<div class="photo-upload row">
					<img id="photomody-1" src="/static/marketphoto/<?php echo @$productPhoto[0]['devidefolder'] .'/thumb/'. @$productPhoto[0]['thumunqname']; ?>">
					<h3>대표 이미지 (필수)</h3>
					<div class="overflow-h sky-form">
						<p class="hex"><?php echo @$msg_nophoto; ?></p>
						<div class="row">
							<div class="col-md-8">
								<label class="input input-file"><div class="button input input-file"><input type="file" name="prod_photo" class="xhr-field" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
							</div>
							<div class="col-md-4"><button type="button" id="uploadbtn-1" class="xhr-upload btn-u btn-u-orange"> &nbsp; 업로드 &nbsp; </button><div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div></div>

						</div>
					</div>
				</div>
				<div class="photo-upload row">
          <?php if(count($productPhoto) > 1){ ?>
          <img id="photomody-2" src="/static/marketphoto/<?php echo @$productPhoto[1]['devidefolder'] .'/thumb/'. @$productPhoto[1]['thumunqname']; ?>">
					<?php } ?>
          <h3>추가 이미지 1</h3>
					<div class="overflow-h sky-form">
						<p class="hex"></p>
						<div class="row">
							<div class="col-md-8">
								<label class="input input-file"><div class="button input input-file"><input type="file" name="prod_photo" class="xhr-field" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
							</div>
							<div class="col-md-4"><button type="button" id="uploadbtn-2" class="xhr-upload btn-u btn-u-orange"> &nbsp; 업로드 &nbsp; </button>
              <div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div></div>
						</div>
					</div>
				</div>
				<div class="photo-upload row">
          <?php if(count($productPhoto) > 2){ ?>
          <img id="photomody-3" src="/static/marketphoto/<?php echo @$productPhoto[2]['devidefolder'] .'/thumb/'. @$productPhoto[2]['thumunqname']; ?>">
					<?php } ?>
          <h3>추가 이미지 2</h3>
					<div class="overflow-h sky-form">
						<p class="hex"></p>
						<div class="row">
							<div class="col-md-8">
								<label class="input input-file"><div class="button input input-file"><input type="file" name="prod_photo" class="xhr-field" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
							</div>
							<div class="col-md-4"><button type="button" id="uploadbtn-3" class="xhr-upload btn-u btn-u-orange"> &nbsp; 업로드 &nbsp; </button>
              <div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div></div>
						</div>
					</div>
				</div>
				<div class="photo-upload row">
          <?php if(count($productPhoto) > 3){ ?>
          <img id="photomody-4" src="/static/marketphoto/<?php echo @$productPhoto[3]['devidefolder'] .'/thumb/'. @$productPhoto[3]['thumunqname']; ?>">
					<?php } ?>
          <h3>추가 이미지 3</h3>
					<div class="overflow-h sky-form">
						<p class="hex"></p>
						<div class="row">
							<div class="col-md-8">
								<label class="input input-file"><div class="button input input-file"><input type="file" name="prod_photo" class="xhr-field" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
							</div>
							<div class="col-md-4"><button type="button" id="uploadbtn-4" class="xhr-upload btn-u btn-u-orange"> &nbsp; 업로드 &nbsp; </button>
              <div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div></div>
						</div>
					</div>
				</div>
				<div class="photo-upload row">
          <?php if(count($productPhoto) > 4){ ?>
          <img id="photomody-5" src="/static/marketphoto/<?php echo @$productPhoto[4]['devidefolder'] .'/thumb/'. @$productPhoto[4]['thumunqname']; ?>">
					<?php } ?>
          <h3>추가 이미지 4</h3>
					<div class="overflow-h sky-form">
						<p class="hex"></p>
						<div class="row">
							<div class="col-md-8">
								<label class="input input-file"><div class="button input input-file"><input type="file" name="prod_photo" class="xhr-field" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
							</div>
							<div class="col-md-4"><button type="button" id="uploadbtn-5" class="xhr-upload btn-u btn-u-orange"> &nbsp; 업로드 &nbsp; </button>
              <div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div></div>
						</div>
					</div>
				</div>
				<div class="photo-upload row">
          <?php if(count($productPhoto) > 5){ ?>
					<img id="photomody-6" src="/static/marketphoto/<?php echo @$productPhoto[5]['devidefolder'] .'/thumb/'. @$productPhoto[5]['thumunqname']; ?>">
					<?php } ?>
          <h3>추가 이미지 5</h3>
					<div class="overflow-h sky-form">
						<p class="hex"></p>
						<div class="row">
							<div class="col-md-8">
								<label class="input input-file"><div class="button input input-file"><input type="file" name="prod_photo" class="xhr-field" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">이미지첨부</div><input type="text" readonly></label>
							</div>
							<div class="col-md-4"><button type="button" id="uploadbtn-6" class="xhr-upload btn-u btn-u-orange"> &nbsp; 업로드 &nbsp; </button>
              <div class="button2 input input-file" style="display: inline-block ;"id="del_button_6">삭제</div></div>
						</div>
					</div>
				</div>
                <!-- End 물품 이미지 ajax 업로드 -->

                <hr>
				<div class="text-right">
					<button type="button" class="btn-u btn-u-dark" onclick="<?php echo $return_jscript; ?>">&nbsp;목록으로&nbsp;</button>
				</div>

            </div>
            <!-- End Content -->

            <!-- Begin Right Sidebar Menu -->

                        <?php include('./views/common/sidemenu_right.php'); ?>
            <!-- End Right Sidebar Menu -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.date.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/inputmask.numeric.extensions.js"></script>
<script type="text/javascript" src="/assets/plugins/inputmask/jquery.inputmask.js"></script>
<script type="text/javascript" src="/assets/js/app.min.js"></script>
<script type="text/javascript" src="/assets/js/md5-min.js"></script>

<script type="text/javascript">
$(document).ready(function ()
{
	App.init();

    $('.date-mask').inputmask("y-m-d");
    $('.num-mask').inputmask('integer', { rightAlign: false });

    /** ───────────────────────────────────
     * 이미지 업로드
     */
	function xhr_send(file, seq) {
		if (file) {
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4) {
					$('#photomody-'+seq).attr('src', xhr.responseText);    //풀패스 받아와라.
					$('.xhr-field').val('');    //파일폼 내용 클리어 (크롬은 안먹힘)
				}
			};
			xhr.open("POST", "/web/market/product/ajax_upload_prodimage/"+seq+"/"+<?php echo $productOne->id; ?>);
			xhr.setRequestHeader("Cache-Control", "no-cache");
			xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
			xhr.setRequestHeader("X-File-Name", hex_md5(file.name)+'.jpg');    //크롬한글문제땜시
			xhr.send(file);
		}
	}

	//파일이 잘 선태되었는지 디버그용
	function xhr_parse(file) {
		if (file) {
			console.log('File selected : ' + file.name + '(' + file.type + ', ' + file.size + ')');
			//console.log( hex_md5(file.name) );
        } else {
			console.log('No file selected!');
        }
	}

	var xhr = new XMLHttpRequest();
	if (xhr && window.File && window.FileList) {
		var xhr_file = null;

	    $('.xhr-field').bind('change', function () {
	        //console.log('이벤트 발생 체크');
			xhr_file = this.files[0];
			xhr_parse(xhr_file);
	    });

        //파일 업로드 버튼으로 업로딩
        $('.xhr-upload').bind('click', function (e) {
        	//console.log(e);
        	//console.log( $(this).attr('id') );
        	var seq = $(this).attr('id').split('-');
        	xhr_send(xhr_file, seq[1]);
	    });
	}

});
</script>
<!--[if lt IE 9]>
    <script src="/assets/plugins/respond.js"></script>
    <script src="/assets/plugins/html5shiv.js"></script>
    <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
