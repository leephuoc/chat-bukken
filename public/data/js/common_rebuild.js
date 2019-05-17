$(document).ready(function(){
    $('.navigation ul li.current').prev().find('a').css({'border-right': '1px solid transparent'});
    //dropdown search
    $('.dropdown-search').click(function(e){
        e.preventDefault();
        if($('.panel-search').is(':visible')){
            $(this).removeClass('active');
            $('.panel-search').stop(true, true).slideUp(500);
        }
        else{
            $(this).addClass('active');
            $('.panel-search').stop(true, true).slideDown(500);
        }
    });
    $("#containerWrap").on('click', '.popupInfoCorporate', function() {
        var $self = $(this);

        if($self.data('id') && $self.data('type'))
        {
            BootstrapDialog.show({
                message: $('<div></div>').load('/popup/info-corporate/' + $self.data('id') + '/'),
                closable: true,
                onshow: function(dialog) {
                    dialog.getModalHeader().hide();
                },
                buttons: [
                    {
                        label: '閉じる',
                        cssClass: 'flat_button fb-light-gray w130px',
                        action: function(dialog){
                            dialog.close();
                        }
                    },{
                        label: '詳細へ',
                        cssClass: 'flat_button fb-green w130px',
                        action: function(dialog)
                        {
                            var url = '/search/' + $self.data('type') + '/' + $self.data('id') + '/dentaku/';

                            if($self.prop('target'))
                            {
                                dialog.close();
                                window.open(url, $self.prop('target'));
                            }
                            else
                            {
                                window.location.href = url;
                            }
                        }
                    },{
                        label: '投稿一覧',
                        cssClass: 'flat_button fb-green w130px',
                        action: function(dialog)
                        {
                            // var url = '/dentaku/transmits';
                            var url = '/dentaku/transmits?corporateId=' + $self.data('id') + '&userId=' + $self.data('userId');

                            if($self.prop('target'))
                            {
                                dialog.close();
                                window.open(url, $self.prop('target'));
                            }
                            else
                            {
                                window.location.href = url;
                            }
                        }
                    }
                ]
            });
        }

        return false;
    });

    $("#containerWrap").on('click', '.popupInfoUser', function() {
        var $self = $(this);

        if($self.data('id'))
        {
            BootstrapDialog.show({
                message: $('<div></div>').load('/popup/info-user/' + $self.data('id') + '/'),
                closable: true,
                onshow: function(dialog) {
                    dialog.getModalHeader().hide();
                },
                buttons: [{
                    label: '閉じる',
                    cssClass: 'flat_button fb-light-gray w240px',
                    action: function(dialog){
                        dialog.close();
                    }
                },{
                    label: 'メッセージ',
                    cssClass: 'flat_button fb-green w240px',
                    action: function(dialog)
                    {
                        var url = '/messages?user_id=' + $self.data('id');

                        if($self.prop('target'))
                        {
                            dialog.close();
                            window.open(url, $self.prop('target'));
                        }
                        else
                        {
                            window.location.href = url;
                        }
                    }
                }]
            });
        }

        return false;
    });
    // move status
    function moveStatus(){
    	$('.result-list .result-item').each(function(){
    		var status_list = $(this).find('.company-information .company-above .status-list');
    		var status_list_pos = $(this).find('.company-name .status-list');
    		var company_name = $(this).find('.company-name');
    		var company_above = $(this).find('.company-information .company-above');
    		if($(window).width() < 991.98){
    	  	company_name.append(status_list);
    		}
    		else{
    	  	company_above.append(status_list_pos);
    		}
    	});
    }
    moveStatus();
    // move search result
    function moveSearch(){
    	var search_result = $('.search-result');
    	var result_wrap = $('.result-wrap');
    	var search_sort = $('.panel-result .search-sort');
    	if($(window).width() < 991.98){
      	result_wrap.append(search_result);
    	}
    	else{
    		search_sort.prepend(search_result);
    	}
    }
    moveSearch();
    // Function resize mobile
    $('.dropBtnSettings').click(function(){
        if($('.dropdown-setting').is(':visible')){
            $('.dropdown-setting').stop(true, true).fadeOut(150);
        }
        else{
            $('.dropdown-setting').stop(true, true).fadeIn(350);
        }
        return false;
    });
    $('.menu-mb').click(function(){
        if($('.dropdown-setting').is(':hidden')){
            $(this).addClass('open');
            $('.dropdown-setting').stop(true, true).fadeIn(150);
        }
        else{
            $(this).removeClass('open');
            $('.dropdown-setting').stop(true, true).fadeOut(350);
        }
        return false;
    });
    function resizeNav(){
        if($(window).width()<390){
            if($('.dropdown-setting').is(':visible')){
                $('.menu-mb').addClass('open');
            }
        }
    }
    resizeNav();
    // Handle Height Element
    // move status
    function moveStatus(){
        $('.result-list .result-item').each(function(){
            var status_list = $(this).find('.company-information .company-above .status-list');
            var status_list_pos = $(this).find('.tag-append-sp .company-tags-item .status-list');
            var tag_append_sp = $(this).find('.tag-append-sp .company-tags-item');
            var company_above = $(this).find('.company-information .company-above');
            if($(window).width() < 991.98){
                tag_append_sp.append(status_list);
            }
            else{
                company_above.append(status_list_pos);
            }
        });
    }
    moveStatus();
    // move search result
    function moveSearch(){
        var search_result = $('.search-result');
        var result_wrap = $('.result-wrap');
        var search_sort = $('.panel-result .search-sort');
        if($(window).width() < 991.98){
            result_wrap.append(search_result);
        }
        else{
            search_sort.prepend(search_result);
        }
    }
    moveSearch();
    var chatboxFlg = $('body').hasClass('format-chatbox');
    // Function resize mobile
    var timer = false;
    $(window).resize(function(){
        if (timer !== false) {
            clearTimeout(timer);
        }
        timer = setTimeout(function() {
            moveStatus();
            moveSearch();
            resizeNav();
        }, 200);
     });
});