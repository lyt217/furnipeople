						<?php if ($mentList) {
                    		foreach ($mentList as $ment): ?>
                        	<!-- 댓글 -->
                            <div class="media media-v2">
                                <?php if ($ment->grouplevel ==1 ) { ?>
                                <span class="pull-left"> &nbsp;&nbsp; <i class="fa fa-terminal"></i></span>
                                <?php } ?>                                 
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <?php echo ($ment->toyou) ? '@' . $ment->toyou . ' | ' : ''; ?>
                                        <strong><?php echo $ment->writer; ?></strong>
                                        <small><?php echo date('y.m.d a g:i', strtotime($ment->regdate)); ?></small>
                                    </h4>
                                    <p><?php echo nl2br($ment->content); ?></p>
                                    <ul class="list-inline pull-right">
                                        <li><a href="#" class="iconclick" id="ireply-<?php echo $ment->id; ?>" title="답글 작성"><i class="expand-list rounded-x fa fa-comment-o"></i></a></li>
                                        <?php if ($ment->user_id == 0) { ?>
                                        <li><a href="#" class="iconclick" id="imodify-<?php echo $ment->id; ?>" title="댓글 수정"><i class="expand-list rounded-x fa fa-pencil"></i></a></li>
                                        <li><a href="#" class="iconclick" id="idelete-<?php echo $ment->id; ?>" title="댓글 삭제"><i class="expand-list rounded-x fa fa-trash-o"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                    <h5 id="resultsubmsg-<?php echo $ment->id; ?>"></h5>
                                </div>
                                <div style="display: none;">
					                <textarea id="subcomment-<?php echo $ment->id; ?>" class="form-control margin-bottom-10" rows="3" maxlength="1000"></textarea>					
					                <div class="row sm-margin-bottom-10">					                			                
					                    <div class="col-md-3">
											<input type="text" id="subwriter-<?php echo $ment->id; ?>" class="form-control input-sm" value="" maxlength="13" placeholder="작성자명">							
										</div>
										<div class="col-md-3">
											<input type="password" id="subpasswd-<?php echo $ment->id; ?>" class="form-control input-sm" value="" maxlength="12" placeholder="비밀번호 (4~12자)">										                        
										</div>
										<div class="col-md-4">
											<input type="text" id="subemail-<?php echo $ment->id; ?>" class="form-control input-sm" value="" maxlength="28" placeholder="이메일주소">										                        
										</div>										
										<div class="col-md-2">
											<a href="#" class="iconclick btn-u btn-u-sm btn-u-dark" id="replymit-<?php echo $ment->id; ?>">답글등록</a>
										</div>							
					                </div>
                                </div>                                
                            </div>
                            <!-- End 댓글 -->
                        <?php endforeach; } ?>
                		
                		<!-- Comments Pegination -->
						<div class="text-center">
                			<?php echo $pagination; ?>
						</div>
                		<!-- End Comments Pegination -->
                            
<script type="text/javascript">
$(document).ready(function () 
{   
    $('.pagination a').bind('click', function() {
        //console.log( $(this).attr('href') );    // /web/talk/freement/search/talkfree/desc/2   전달, 현재 페이지는 #값 처리완료
        var roaduri = $(this).attr('href');
        $('#current-uri').text(roaduri);    //URI 정보를 심음
        commentReload(roaduri);
        //console.log( roaduri );
        
        var _position = $('#ment-scroll').offset();
        $('html, body').animate( { scrollTop: _position.top }, 300 );
        return false;
    });
}); 
</script>