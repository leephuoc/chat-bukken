var reportMode = false;
var timeOut = 500;
$(function()
{
	reportMode = $('#reportHeader').size() > 0;

	var $pageContent = $('#page-content-wrapper');
	if ($pageContent.size() > 0 && $pageContent.hasClass('use-navbar-fixed-top')) {
		var $navbar = $pageContent.find('.navbar:first');
		if ($navbar.size() > 0) {
			$(window).resize(function () {
				$pageContent.css('padding-top', ($navbar.height() + 16) + 'px');
			}).trigger('resize');
		}
	}

	$("#container").on('click', '.popupInfoCorporate', function()
	{
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

	$("#container").on('click', '.popupInfoUser', function()
	{
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

	if(reportMode)
	{
		var message = '通報時点の保持したデータを表示しているためシステムは動作しておりません。\n※PDFや写真のファイルがある場合は見ることはできます。';
		$("a, input").on(tapEventName, {hash:php.text.random(), f:function(e)
		{
			var $self = $(e.currentTarget);

			if($self.prop('href') == '' || !/\/data\//.test($self.prop('href')))
			{
				alert(message);

				return false;
			}

		}}, checkClick);

		$("input").submit(function()
		{
			alert(message);

			return false;
		});

		return;
	}

	$(".btnSubmit").on('click', function()
	{
		var $btnSubmit = $(this);

		$btnSubmit.attr('disabled', true);

		var $form = $btnSubmit.closest('form');
		$form.append('<input type="hidden" name="' + $btnSubmit.data('name') + '" value="' + $btnSubmit.data('value') + '" />');

		var action = $btnSubmit.data('action');

		if (action)
		{
			$form.attr('action', action);
		}

		$form.submit();
		return false;
	});

	var downedKey = null;
	$("form input").keydown(function(e)
	{
		downedKey = e.keyCode;
	});

	$("form input").keyup(function(e)
	{
		if (downedKey == 13 && e.keyCode == 13)
		{
			var $target = $(e.currentTarget);
			if($target.attr('type') != 'submit' && $target.attr('type') != 'button')
			{
				$(".btnSubmit[data-default='true']").click();
				return false;
			}
		}

		return true;
	});

	$(document).on('change', '.changeAndSubmit', function(){
		var $self = $(this);
		var $form = $self.closest('form');
		$form.submit();
		return false;
	});

	var $pref_id = $("#pref_id");
	var $area_id = $("#area_id,.area_id");

	if($pref_id.size() && $area_id.size())
	{
		$(document).on('change, change.googlemaps','#pref_id' ,function(e, item)
		{
			var $self = $(this);
			$.ajax({
				type : 'POST',
				url : '/ajax/area',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : {
					"pref_id" : $(this).val()
				},
				success : function(json)
				{
					if(json && json.hasOwnProperty('areas'))
					{

						$("#area_id").parent().removeClass('no-data');

						$area_id = $("#area_id,.area_id");
						$area_id.empty();
						var html = '';

						if(!$area_id.data('not-empty'))
						{
							html = '<option value="" selected>指定なし</option>';
						}

						for(var key in json.areas)
						{
							var area = json.areas[key];
							html += '<option value="' + area.id + '">' + area.name + '</option>';
						}

						$area_id.html(html);

						if(e.namespace == 'googlemaps')
						{
							if(item != undefined)
							{
								if(item.hasOwnProperty('selected_val'))
								{
									$area_id.selectpicker('val', item.selected_val);
								}

								if(item.hasOwnProperty('selected_text'))
								{
									var val = [];
									for(var key in item.selected_text)
									{
										var $option = $area_id.find("option:contains('" + item.selected_text[key] + "')");
										val.push($option.val());
									}

									$area_id.selectpicker('val', val);
								}
							}
						}

						$area_id.selectpicker('refresh');
					}
				}
			});
		});

		var area_name = $area_id.find('option:selected').text();

		if(/(?:^指定|^選択|^$)/.test(area_name) && $area_id.find('option').size() <= 1)
		{
			var pref_name = $pref_id.find('option:selected').text();

			if(/(?:都|道|府|県)$/.test(pref_name))
			{
				$pref_id.trigger('change');
			}
		}
	}

	$(document).on(tapEventName, ".btnFavoriteOn, .btnFavoriteOff", {hash:php.text.random(), f:function(e)
	{
		var $self = $(e.currentTarget);

		if($self.data('corporate-id') && $self.data('user-id'))
		{
			favorite($self.data('corporate-id'), $self.data('user-id'), $self.hasClass('btnFavoriteOn') ? '1' : '0', function(result)
			{
				$self.hide();

				if($self.hasClass('btnFavoriteOn'))
				{
					$(".btnFavoriteOff").show();
				}
				else
				{
					$(".btnFavoriteOn").show();
				}
			});
		}
	}}, checkClick);

	function favorite(corporate_id, user_id, flg, resultFunc)
	{
		$.ajax({
			type : 'POST',
			url : '/ajax/favorite',
			headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
			dataType : 'json',
			data : {
				'corporate_id':corporate_id,
				'user_id':user_id,
				'flg': flg
			},
			success : function(json)
			{
				if(json && json.hasOwnProperty('result') && json.result)
				{
					resultFunc(true);

					BootstrapDialog.show({
						cssClass: 'dialog-header-none',
						title: 'お知らせ',
						message: '<span class="dialog-icon dialog-icon-ok mB20">&nbsp;</span>お気に入り' + (flg === '1' ? 'として登録しました。' : 'を外しました。'),
						buttons: [{
							label: 'はい',
							cssClass: 'btn-primary w120px',
							action: function(dialog){
								dialog.close();
							}
						}]
					});
				}
				else
				{
					resultFunc(false);

					BootstrapDialog.show({
						cssClass: 'dialog-header-none',
						title: 'お知らせ',
						message: '<span class="dialog-icon dialog-icon-error mB20">&nbsp;</span>エラーが発生したため処理を中断しました。<br />画面を更新してからもう一度行ってください。',
						buttons: [{
							label: 'はい',
							cssClass: 'btn-primary w120px',
							action: function(dialog){
								dialog.close();
							}
						}]
					});
				}
			}
		});
	}

	$(".btnReport").on(tapEventName, {hash:php.text.random(), f:function(e)
	{
		var $self = $(e.currentTarget);
		$self.tooltip('hide');
		var source = document.getElementsByTagName("html")[0].innerHTML;

		BootstrapDialog.show({
			cssClass: 'dialog-header-none',
			title: 'お知らせ',
			message: '<h2>このページを通報</h2><p class="f12px">物件会議の円滑な運営にご協力いただきありがとうございます。<br />公序良俗に反する、著作権を侵害する、個人情報漏えいなど<br />通報の理由を記入して頂きますようお願いします。<br />報告内容を精査して然るべき対処をさせていただきます。</p><textarea class="col-xs-12 mT5 mB20 form-control" placeholder="物件情報の「●●●●」に「◯◯◯◯」といった公序良俗に反する内容が含まれていました。" style="height: 120px;"></textarea>',
			closable: false,
			onshow: function(dialog) {

			},
			buttons: [{
				label: '上記の理由で報告する',
				cssClass: 'btn-primary w150px',
				action: function(dialog){

					var $textarea =  $('textarea', dialog.getModalBody());

					if($textarea.val() !== '')
					{
						dialog.enableButtons(false);

						$.ajax({
							type : 'POST',
							url : '/ajax/report',
							headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
							dataType : 'json',
							data : {
								url: window.location.href,
								text: $textarea.val(),
								source: source
							},
							success : function(json)
							{
								if(json && json.hasOwnProperty('result') && json.result)
								{
									dialog.close();

									BootstrapDialog.show({
										cssClass: 'dialog-header-none',
										title: 'お知らせ',
										message: '<span class="dialog-icon dialog-icon-ok">&nbsp;</span><h2>通報完了</h2>ご協力ありがとうございました。<br />報告内容を精査して然るべき対処をさせていただきます。',
										buttons: [{
											label: 'はい',
											cssClass: 'btn-primary w120px',
											action: function(dialog){
												dialog.close();
											}
										}]
									});
								}
								else
								{
									BootstrapDialog.show({
										cssClass: 'dialog-header-none',
										title: 'お知らせ',
										message: '<span class="dialog-icon dialog-icon-error">&nbsp;</span><h2>通報エラー</h2>問題が発生したため通報できませんでした。<br />お手数ですがもう一度操作を行ってください。<br />それでも改善しない場合はお問い合わせください。',
										buttons: [{
											label: 'はい',
											cssClass: 'btn-primary w120px',
											action: function(dialog){
												location.reload(true);
											}
										}]
									});
								}
							}
						});
					}
					else
					{
						$textarea.data('title', '通報の理由を記入してください。');
						$textarea.tooltip('show');
					}
				}
			},{
				label: 'キャンセル',
				cssClass: 'btn-default w120px',
				action: function(dialog){
					dialog.close();
				}
			}]
		});
	}}, checkClick);

	$('.box').on('click', function() {
		var href= $(this).attr('data-href');

		window.location.href = href;
	});

    $('.chatbox-buyer').delegate('.company-logo', 'click', function(e) {
        let id_corporate = $(this).attr('data-id_corporate');
        e.stopPropagation();
        show_modal_info_coroprate(id_corporate);
    });

    $('.company-logo').on('click', function(e) {
        let id_corporate = $(this).attr('data-id_corporate');
        e.stopPropagation();
        show_modal_info_coroprate(id_corporate);
    });

    function show_modal_info_coroprate(id_corporate)
	{

        console.log(id_corporate);

        $.ajax({
            type: 'POST',
            url: '/ajax/get-info-corporate',
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            dataType: 'json',
            data: {'id_corporate': id_corporate},
            success: function (corporate) {
                let logo_corporate = '<img src="' + corporate.logo_url + '" alt="" class="img-circle"  style="width: 90px!important;"/>';
                let full_name_corporate = corporate.full_name;
                let license = corporate.license;
                let full_addr = corporate.full_addr;
                let comment = corporate.comment;
                let area_name = corporate.area_name;
                let type_corporate = corporate.type_corporate;
                let link_detail_corporate = '/search/'+ type_corporate +'/'+ id_corporate +'/dentaku?tab=detail';
                let link_list_post = '/search/'+ type_corporate +'/'+ id_corporate +'/dentaku?tab=list-post';
                let corporate_type_id = corporate.corporate_type_id;
                let corporate_type_re = 1;
                let corporate_type_constr = 2;
                let html = '';
                let label_license = '';

                $("#exampleModal .logo-corporate").html(logo_corporate);
                $("#exampleModal .full-name-corporate").html(full_name_corporate);
                $("#exampleModal .full-addr").html(full_addr);
                $("#exampleModal .license").html(license);
                $("#exampleModal .comment").html(comment);
                $("#exampleModal .area-name").html(area_name);
                $("#exampleModal .x-btn-redirect-detail").attr('data-href', link_detail_corporate);
                $("#exampleModal .x-btn-redirect-search").attr('data-href', link_list_post);

                corporate_type_id = parseInt(corporate_type_id);
                corporate_type_re = parseInt(corporate_type_re);
                corporate_type_constr = parseInt(corporate_type_constr);

                if(corporate_type_id === corporate_type_re || corporate_type_id === corporate_type_constr) {

                    if (corporate_type_id === corporate_type_re) {
                        label_license = '宅地建物取引業<br />免許番号';
                    }

                    if (corporate_type_id === corporate_type_constr) {
                        label_license = '建物業許可番号';
                    }

                    html += '<div class="form-group">';
                    html += '<label for="license" class="control-label col-sm-3 w100-when-531-down">';
                    html += label_license;
                    html += '</label>';
                    html += '<div class="col-sm-9">';
                    html += '<p class="form-control-static license">'+ license +'</p>';
                    html += '</div>';
                    html += '</div>';
                }

                $('.group-license').html(html);

            }
        });

        $('#exampleModal').modal();
    }

    $('.x-btn-redirect-detail').on('click', function() {
        let href = $(this).data('href');
        window.location.href = href;
    });

    $('.x-btn-redirect-search').on('click', function() {
        let href = $(this).data('href');
        window.location.href = href;
    });
});

$('#headerCorporateLogo').on("click", function() {
	window.location.href = '/history-chat';

	// $('.userMenu').slideToggle();
	// var $this = $(this);
	//
	// if ($this.hasClass('active')){
    //     $('#headerCorporateLogo').parents('.header-aside').find('div.userMenu').slideUp();
	// 	$('#headerCorporateLogo').removeClass('active');
	// }
	// else{
    //     $('#headerCorporateLogo').parents('.header-aside').find('div.userMenu').slideDown();
	// 	$('#headerCorporateLogo').removeClass('active');
	//
	// 	$('div.userMenu').slideDown();
	// 	$this.addClass('active');
	// }
});
$(document).on('click', function(e) {
    // ２．クリックされた場所の判定
    // console.log($(e.target).closest('#headerCorporateLogo').length );
    // console.log($(e.target).closest('.userMenu').length);
    // console.log(!$(e.target).closest('#headerCorporateLogo').length && !$(e.target).closest('.userMenu').length);

    // if(!$(e.target).closest('#headerCorporateLogo').length && !$(e.target).closest('.userMenu').length){
    //     $('.userMenu').fadeOut();
	//
    // }

});






