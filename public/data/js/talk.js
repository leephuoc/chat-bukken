var talk = {
	$: {
		wrapper:$('#wrapper'),
		talkRoomList:$(".tableType001"),
		headerArea:$(".message-header"),
		text:$("#talk_item_text"),
		messageToolbarLeftBox:$(".message-toolbar .leftBox"),
		file:$("#file"),
		btnFile:$(".btn-message-file"),
		btnSend:$(".btn-message-send"),
		scrollArea:$("#sidebar-right-wrapper .scroll-area ul")
	},
	options: {},
	reset: function() {
		
//		if(!talk.$.wrapper.hasClass('right-toggled'))
//		{
//			talk.$.wrapper.addClass('right-toggled');
//		}
		
		talk.options = {};
		talk.$.headerArea.html('');
		talk.$.scrollArea.html('');
		talk.$.text.off('keydown');
		talk.$.text.prop('disabled', true);
		talk.$.file.fileinput('disable');
		talk.$.btnSend.off('click');
		talk.$.btnSend.prop('disabled', true);
		talk.$.scrollArea.off('scroll');
	},
	init:function(options) {
//		console.log(options);
		if(!talk.$.wrapper.hasClass('right-toggled')
				&& talk.options
				&& talk.options.hasOwnProperty('talkHash')
				&& options.hasOwnProperty('talkHash')
				&& talk.options.talkHash == options.talkHash)
		{
			talk.reset();
			talk.$.wrapper.addClass('right-toggled');
			return;
		}
		
		talk.reset();
		
		$.ajax({
			type : 'POST',
			url : '/messages/load',
			headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
			dataType : 'json',
			data : options,
			success : function(json)
			{
				talk.badge_update(json);
				
				if(json && json.hasOwnProperty('result') && json.result)
				{
					if(json.hasOwnProperty('htmlHeader'))
					{
						talk.$.headerArea.html(json.htmlHeader);
					}
					
					if(json.hasOwnProperty('htmlTalkItems'))
					{
						talk.$.scrollArea.html(json.htmlTalkItems);
						talk.scrollToBottom();
					}
					
					talk.$.text.on('keydown', talk.before_send);
					talk.$.text.prop('disabled', false);
					talk.$.btnSend.on('click', talk.send);
					talk.$.btnSend.prop('disabled', false);
					talk.$.file.fileinput('enable');
					talk.$.scrollArea.on('scroll', talk.load_old_talk_items);
					$('#wrapper').removeClass('right-toggled');
					
					var $tr = $('#talk-' + options.talkHash);
					
					if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
					{
						$tr.before(json.htmlTalkRoom);
						$tr.remove();
					}
				}
				
				delete json['talkItems'];
				talk.options = json;
			}
		});
	},
	initTalkRoom: function(id) {
		this.init({
			"id":id
		});
	},
	initUser: function(user_id) {
		//パラメータの取得
		//相手の情報、トークの取得
		this.init({
			"talk_room_type_id":1,
			"user_id":user_id
		});
	},
	initDentaku: function(article_id) {
		this.init({
			"talk_room_type_id":2,
			"article_id":article_id
		});
	},
	scrollToBottom: function() {
		talk.$.scrollArea.scrollTop(talk.$.scrollArea[0].scrollHeight);
	},
	before_send:function(e)
	{
		if (e.keyCode == 13)
		{
			if(e.shiftKey)
			{
				return true;
			}
			else
			{
				talk.send();
				return false;
			}
		}
	},
	send: function() {

		if(!php.empty(talk.$.text.val()))
		{
			$.ajax({
				type : 'POST',
				url : '/messages/send',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : php.array_merge(talk.options.input, {
					"id": talk.options.talkRoom.id,
					"text" : talk.$.text.val()
				}),
				success : talk.sended
			});
			
			talk.$.text.val('');
		}
		else
		{

		}
	},
	sended:function(json) {
		if(json && json.hasOwnProperty('result') && json.result)
		{
			talk.$.scrollArea.append(json.htmlTalkItem);
			talk.scrollToBottom();
//			talk.$.text.val('');
			
//			var $tr = talk.$.talkRoomList.find('tr.tr-message-human[data-id="' + talk.options.talkRoom.id + '"], tr.tr-message[data-id="' + talk.options.talkRoom.id + '"]');
			var $tr = $('#talk-' + talk.options.talkHash);
					
			if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
			{
				$tr.after(json.htmlTalkRoom);
				
				if($tr.is(':visible'))
				{
					$tr.next().show();
				}
				else
				{
					$tr.next().hide();
				}

				$tr.remove();
			}
		}
	},
	
	get_first_talk_id:function() {
		return talk.$.scrollArea.find('li:first').data('talk-item-id');
	},
	get_last_talk_id:function() {
		return talk.$.scrollArea.find('li:last').data('talk-item-id');
	},
	load_old_talk_items:function() {
		var scrollTop = talk.$.scrollArea.scrollTop();
		
		if(scrollTop <= 0)
		{
			talk.$.scrollArea.off('scroll');
			var scrollHeight = talk.$.scrollArea[0].scrollHeight
			
			$.ajax({
				type : 'POST',
				url : '/messages/get-talk-item',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : php.array_merge(talk.options.input, {
					"id": talk.options.talkRoom.id,
					"talk_item_id" : talk.get_first_talk_id(),
					"sign" : "<"
				}),
				success : function(json)
				{
//					console.log('load_old_talk_items().success');
					
					if(json.hasOwnProperty('htmlTalkItems'))
					{
						talk.$.scrollArea.prepend(json.htmlTalkItems);
						talk.$.scrollArea.scrollTop(talk.$.scrollArea[0].scrollHeight + scrollTop - scrollHeight);
					}
					
					talk.$.scrollArea.on('scroll', talk.load_old_talk_items);
					
//					var $tr = talk.$.talkRoomList.find('tr.tr-message-human[data-id="' + talk.options.talkRoom.id + '"], tr.tr-message[data-id="' + talk.options.talkRoom.id + '"]');
					var $tr = $('#talk-' + talk.options.talkHash);
					
					if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
					{
						if(talk.options.talkRoomTypeId == 1)
						{
							talk.$.talkRoomList.prepend(json.htmlTalkRoom);
						}
						else
						{
							$tr.after(json.htmlTalkRoom);
							
							if($tr.is(':visible'))
							{
								$tr.next().show();
							}
							else
							{
								$tr.next().hide();
							}
						}
						
						$tr.remove();
					}
				}
			});
		}
	},
	reload:function(data) {
		
		var type = '';
		
		if(data.message && data.message.type)
		{
			type = data.message.type;
		}
		
//		console.log(type, data, talk.options);
		
		if(type == 'dentaku' || type == 'message')
		{
			talk.get_last_talk_id();
		
			//トーク出来る画面でない
			if(!talk.$.text || talk.$.text.size() <= 0)
			{
				//バッジの更新
				$.ajax({
					type : 'POST',
					url : '/messages/get-badge',
					headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
					dataType : 'json',
					data : {
					},
					success : function(json)
					{
						talk.badge_update(json);
					}
				});
			}
			//トーク利用中
			else if(talk.options.talkRoom && talk.options.talkRoom.id == data.message.data.talk_room_id)
			{
				$.ajax({
					type : 'POST',
					url : '/messages/get-talk-item',
					headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
					dataType : 'json',
					data : php.array_merge(talk.options.input, {
						"id": talk.options.talkRoom.id,
						"talk_item_id" : talk.get_last_talk_id(),
						"sign" : ">"
					}),
					success : function(json)
					{
						talk.badge_update(json);

						if(json.hasOwnProperty('htmlTalkItems'))
						{
							talk.$.scrollArea.append(json.htmlTalkItems);
							talk.scrollToBottom();
						}

						var $tr = $('#talk-' + talk.options.talkHash);

						if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
						{
							if(data.message.data.talk_room_type_id == 1)
							{
								talk.$.talkRoomList.prepend(json.htmlTalkRoom);
							}
							else
							{
								$tr.after(json.htmlTalkRoom);

								if($tr.is(':visible'))
								{
									$tr.next().show();
								}
								else
								{
									$tr.next().hide();
								}
							}

							$tr.remove();
						}
					}
				});
			}
			//トーク利用していない
			else
			{
				var ajaxData = {};
				var $tr;

				if(data.message && data.message.push && data.message.push.talkHash)
				{
					$tr = $('#talk-' + data.message.push.talkHash);

					if($tr.size() > 0)
					{
						ajaxData = $tr.data();
					}
				}

				if($tr.size() > 0)
				{
					$.ajax({
						type : 'POST',
						url : '/messages/get-talk-room',
						headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
						dataType : 'json',
						data : php.array_merge(ajaxData, {
							"id": data.message.data.talk_room_id
						}),
						success : function(json)
						{
							talk.badge_update(json);

							if(json.hasOwnProperty('htmlTalkRoom'))
							{
								if(data.message.data.talk_room_type_id == 1)
								{
									talk.$.talkRoomList.prepend(json.htmlTalkRoom);
								}
								else
								{
									$tr.after(json.htmlTalkRoom);

									if($tr.is(':visible'))
									{
										$tr.next().show();
									}
									else
									{
										$tr.next().hide();
									}
								}

								$tr.remove();
							}
						}
					});
				}
				else
				{
					$.ajax({
						type : 'POST',
						url : '/messages/get-badge',
						headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
						dataType : 'json',
						data : {
						},
						success : function(json)
						{
							talk.badge_update(json);
						}
					});
				}
			}
		}
		//情報を配信
		else if(type == 'push')
		{
			//バッジの更新
			$.ajax({
				type : 'POST',
				url : '/push/get-badge',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : {
				},
				success : function(json)
				{
					talk.badge_update(json);
				}
			});
		}
	},
	badge_update:function(json)
	{
		if(json && json.hasOwnProperty('badge'))
		{
			for(key in json.badge)
			{
				var $target = $("." + key);

				if($target.size())
				{
					$target.text(json.badge[key]);
					
					if(json.badge[key] == '' || json.badge[key] == '0')
					{
						$target.hide()
					}
					else
					{
						$target.show()
					}
				}
			}
		}
	},
	create_talk_item:function(talkItem) {
		talk.$.scrollArea.append('<li class="talk_item right"><div class="text">' + php.e(php.nl2br(talkItem.text)) + '<span class="read"></span><span class="time">' + php.date('H:i', php.strtotime(talkItem.text)) + '</span></div></li>');
	},
	connect: function(user_id) {
		var socket = io.connect('http://push.d-taku.net:3000/');
    	socket.on('connect', function() {
			socket.emit('SendSession', user_id);
			socket.on('message', talk.reload);
		});
	}
};
	
$(function(){
	if(talk.$.file && talk.$.file.size() > 0)
	{
		talk.$.file.fileinput({
			language:'ja',
			showPreview: false,
			showUpload: false,
			showRemove: false,
			showCaption: false,
			showCancel: false,
			allowedFileExtensions: ['pdf'],
			browseLabel: '',
			browseIcon: '<i class="glyphicon glyphicon-paperclip"></i>',
			browseClass: 'btn-message-file',
			maxFileSize: 1024 * 30,
			uploadAsync: true,
			uploadUrl: '/messages/send'
		}).on("filebatchselected", function(event, files) {
			talk.$.messageToolbarLeftBox.tooltip('hide')
			talk.$.file.fileinput("upload");
		}).on("filebatchpreupload", function(event, data, jqXHR) {
			data.form.append('id', talk.options.talkRoom.id);
			return data;
		}).on("filebatchuploadsuccess", function(event, data, previewId, index) {
			talk.sended(data.response);
		});
	}
});