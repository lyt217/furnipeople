(function($){
    /**
     * 상대에게 쪽지 발송
     */    
    $.fn.chattsend = function (options) {

        var $target = $(this); 
        var option = { pagekind: '', productidx: 0, receiveridx: 0, receiverkind: '', message: '' };        
        $.extend(option, options);
        chattSubmit();

        function chattSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/market/chattpaper/send',
                dataType: 'json',
                data: { 
                        page_kind: option.pagekind,
                        product_idx: option.productidx,
                        receiver_idx: option.receiveridx,
                        receiver_kind: option.receiverkind,
                        message: option.message                        
                    }, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        submitResult(data);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }
              
        function submitResult(data) {                        
            if (data.state == 'ok') {
                alert(data.msg);
                $target.val('');
            } else if (data.state == 'fail') {                           
                alert(data.msg);                
            }                                       
        }
    };
    
   /**
     * 마이챗에서서의 쪽지 발송
     */    
    $.fn.chattsendReload = function (options) {

        var $target = $(this); 
        var option = { pagekind: '', productidx: 0, receiveridx: 0, receiverkind: '', message: '' };        
        $.extend(option, options);
        chattSubmit();

        function chattSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/market/chattpaper/send/jisup',
                dataType: 'json',
                data: { 
                        page_kind: option.pagekind,
                        product_idx: option.productidx,
                        receiver_idx: option.receiveridx,
                        receiver_kind: option.receiverkind,
                        message: option.message                        
                    }, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        submitResult(data);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }
              
        function submitResult(data) {                        
            if (data.state == 'ok') {
                alert(data.msg);
                $target.val('');
                window.location.reload(true);
            } else if (data.state == 'fail') {                           
                alert(data.msg);                
            }                                       
        }
    };
    
    /**
     * 관심 가구로 등록
     */    
    $.fn.favoriteAdd = function (options) {


        var $target = $(this); 
        var option = { productidx: 0, prodowneridx: 0, prodownerkind: '' };        
        $.extend(option, options);
        favoriteSubmit();

        function favoriteSubmit() {            
            $.ajax({ 
                type: 'POST', 
                url: '/web/market/myproduct/favoriteadd',
                dataType: 'json',
                data: {                         
                        product_idx: option.productidx,
                        prod_owneridx: option.prodowneridx,
                        prod_ownerkind: option.prodownerkind             
                    }, 
                success: function(data) { 
                        //(data, textStatus, jqXHR)
                        submitResult(data);                                                                        
                    },
                error: function (jqXHR, textStatus, errorThrown) {                      
                        console.log(textStatus);
                        console.log(errorThrown);
                    }                                   
            });                             
        }
              
        function submitResult(data) {                        
            if (data.state == 'ok') {
                alert(data.msg);
                $target.children(':last').text(data.zzimcnt);
            } else if (data.state == 'fail') {                           
                alert(data.msg);                
            }                                       
        }
    };              

}(jQuery));