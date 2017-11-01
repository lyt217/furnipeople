(function($){
    /**
     * 신규 루뜨 댓글 작성
     * @param {MapObject} options - 작성자명, 비번외
     */    
    $.fn.rootment = function (options) {

        //멤버필드 선언
        var $target = $(this);    //<div id="mentcreate-msg"> 엘리먼트     결과가 반영될 엘리먼트 가져올것, 지금은 메시지 
        var option = { talkidx: 0, writer: '', passwd: '', email: '', comment: '', menturi: '', usertype: '' };    //옵션맵 기본값 설정        
        $.extend(option, options);    //옵션맵을 재정의 오버라이딩 extend(기본값, 오버라이딩할값)
		
		if (option.usertype == 'member')
            memberMentSubmit();
        else
            guestMentSubmit();    //내부에서만 이 메서드 실행 가능        
        
        //▽ 회원 ajax 전송 ─────────────────────────────────── 
        //★ 재사용시 url 만 수정하면 사용할 수 있게 할 것
        function memberMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/create/talkreview',
                dataType: 'json',
                data: { 
                		talk_idx: option.talkidx,
                		comment: option.comment
                	}, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        memberResult(data);    //console.log(data.state);                                                                        
                	},
	            error: function (jqXHR, textStatus, errorThrown) {	                	
	                	console.log(textStatus);
	                	console.log(errorThrown);
	            	}                	                
            });        	        	       	
        }
        
        //▽ 게스트 ajax 전송 ───────────────────────────────────
        function guestMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/gecreate/talkreview',
                dataType: 'json',
                data: { 
                        talk_idx: option.talkidx,
                        writer: option.writer,
                        passwd: option.passwd,
                        email: option.email,
                        comment: option.comment
                    }, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        guestResult(data);    //console.log(data.state);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }        
        
        function memberResult(data) {
            if (data.state == 'fail') {            
                var msg_box = '<div class="alert alert-warning fade in alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        '<strong>댓글내용</strong>을 입력하세요.' +
                                    '</div>';
                $target.html(msg_box);
            } else if (data.state == 'ok') {                
                $('#root-comment').text('');
                $('#new-mentform').hide('fast');                
                commentReload(option.menturi);
            }                                       
        }
         
        function guestResult(data) {
            if (data.state == 'fail') {            
                var msg_box = '<div class="alert alert-warning fade in alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        '<strong>작성자명, 비밀번호, 이메일, 댓글내용</strong>은 필수 입력항목입니다.' +
                                    '</div>';
                $target.html(msg_box);
            } else if (data.state == 'ok') {                
                $('#root-comment').text('');
                $('#new-mentform').hide('fast');
                commentReload(option.menturi);
            }                                       
        }
    };		

    /**
     * 답글/수정/삭제 처리
     */
    $.fn.mentproc = function (options) {

        //멤버필드 선언
        var $target = $(this);    //결과 메시지를 표시할 엘리먼트 
        var option = { talkidx: 0, mentidx: 0, submitkind: '', writer: '', passwd: '', email: '', comment: '', menturi: '', usertype: '' };    //옵션맵 기본값 설정        
        $.extend(option, options);    //옵션맵을 재정의 오버라이딩 extend(기본값, 오버라이딩할값)
        
        if (option.usertype == 'member')
            memberMentSubmit();
        else
            guestMentSubmit();    //내부에서만 이 메서드 실행 가능
                                    
        //▽ 회원 ajax 전송 ─────────────────────────────────── 
        //★ 재사용시 url 만 수정하면 사용할 수 있게 할 것
        function memberMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/mentproc/talkreview',
                dataType: 'json',
                data: { 
                        talk_idx: option.talkidx,
                        ment_idx: option.mentidx,
                        submit_kind: option.submitkind,
                        comment: option.comment
                    }, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        memberResult(data);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }
        
        //▽ 게스트 ajax 전송 ───────────────────────────────────
        function guestMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/gementproc/talkreview',
                dataType: 'json',
                data: { 
                        talk_idx: option.talkidx,
                        ment_idx: option.mentidx,
                        submit_kind: option.submitkind,                        
                        writer: option.writer,
                        passwd: option.passwd,
                        email: option.email,
                        comment: option.comment                        
                    }, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        guestResult(data);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }        
        
        function memberResult(data) {                        
            if (data.result['state'] == 'fail') {            
                var msg_box = data.result['valimsg'];
                $target.html(msg_box);                
            } else if (data.result['state'] == 'ok') {                           
                commentReload(option.menturi);    //원하는 페이징 번호로 보내기 위함
            }                                       
        }
         
        function guestResult(data) {
            if (data.result['state'] == 'fail') {            
                var msg_box = data.result['valimsg'];
                $target.html(msg_box);
            } else if (data.result['state'] == 'ok') {
                commentReload(option.menturi);
            }                                       
        }
    };   

}(jQuery));