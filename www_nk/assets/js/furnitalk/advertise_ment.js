(function($){
  
    $.fn.rootment = function (options) {
        
        var $target = $(this); 
        var option = { talkidx: 0, writer: '', passwd: '', email: '', comment: '', menturi: '', usertype: '' };        
        $.extend(option, options);
		
		if (option.usertype == 'member')
            memberMentSubmit();
        else
            guestMentSubmit();        
        
        function memberMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/create/talkadvertise',
                dataType: 'json',
                data: { 
                		talk_idx: option.talkidx,
                		comment: option.comment
                	}, 
                success: function(data) { 
                        memberResult(data);                                                                        
                	},
	            error: function (jqXHR, textStatus, errorThrown) {	                	
	                	console.log(textStatus);
	                	console.log(errorThrown);
	            	}                	                
            });        	        	       	
        }
        
        function guestMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/gecreate/talkadvertise',
                dataType: 'json',
                data: { 
                        talk_idx: option.talkidx,
                        writer: option.writer,
                        passwd: option.passwd,
                        email: option.email,
                        comment: option.comment
                    }, 
                success: function(data) { 
                        guestResult(data);                                                                        
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


    $.fn.mentproc = function (options) {

        var $target = $(this); 
        var option = { talkidx: 0, mentidx: 0, submitkind: '', writer: '', passwd: '', email: '', comment: '', menturi: '', usertype: '' };        
        $.extend(option, options);
        
        if (option.usertype == 'member')
            memberMentSubmit();
        else
            guestMentSubmit();
                                    
        function memberMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/mentproc/talkadvertise',
                dataType: 'json',
                data: { 
                        talk_idx: option.talkidx,
                        ment_idx: option.mentidx,
                        submit_kind: option.submitkind,
                        comment: option.comment
                    }, 
                success: function(data) { 
                        memberResult(data);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }
        
        function guestMentSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/talk/comment/gementproc/talkadvertise',
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
                commentReload(option.menturi);
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