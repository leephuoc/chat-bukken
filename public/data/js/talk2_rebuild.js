var talk2 = {
	$: {
		container:$('#container'),
		headerArea:$("td.talkTd thead .userInfoBox"),
		text:$("#talk_item_text"),
		messageToolbarLeftBox:$("#talkFile").parent(),
		talkRoomList:$("td.talkListTd > .talkListScrollArea > table"),
		file:$("#talkFile"),
		btnSend:$(".btn-message-send"),
		scrollArea:$(".scrollArea ul")
	},
	options: {},
	reset: function() {
		talk2.options = {};
		talk2.$.headerArea.html('');
		talk2.$.scrollArea.html('');
		talk2.$.text.off('keydown');
		talk2.$.text.prop('disabled', true);
		talk2.$.file.fileinput('disable');
		talk2.$.btnSend.off('click');
		talk2.$.btnSend.prop('disabled', true);
		talk2.$.scrollArea.off('scroll');
	},
	init:function(options) {
		talk2.reset();

		$.ajax({
			type : 'POST',
			url : '/messages/load',
			headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
			dataType : 'json',
			data : options,
			success : function(json)
			{
				talk2.badge_update(json);

				if(json && json.hasOwnProperty('result') && json.result)
				{
					if(json.hasOwnProperty('htmlHeader'))
					{
						talk2.$.headerArea.html(json.htmlHeader);
					}

					if(json.hasOwnProperty('htmlTalkItems'))
					{
						talk2.$.scrollArea.html(json.htmlTalkItems);
						talk2.scrollToBottom();
					}

					talk2.$.text.on('keydown', talk2.before_send);
					talk2.$.text.prop('disabled', false);
					talk2.$.btnSend.on('click', talk2.send);
					talk2.$.btnSend.prop('disabled', false);
					talk2.$.file.fileinput('enable');
					talk2.$.scrollArea.on('scroll', talk2.load_old_talk_items);

					var $tr = $('#talk-' + options.talkHash);

					if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
					{
						$tr.before(json.htmlTalkRoom);
						$tr.remove();
					}
				}

				delete json['talkItems'];
				talk2.options = json;
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
		talk2.$.scrollArea.scrollTop(talk2.$.scrollArea[0].scrollHeight);
	},
	before_send:function(e)
	{
		if (e.keyCode == 13)
		{
			if(e.shiftKey)
			{
				talk2.send();
				return false;
			}
			else
			{
				return true;
			}
		}
	},
	send: function() {

		if(!php.empty(talk2.$.text.val()))
		{
			$.ajax({
				type : 'POST',
				url : '/messages/send',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : php.array_merge(talk2.options.input, {
					"id": talk2.options.talkRoom.id,
					"text" : talk2.$.text.val()
				}),
				success : talk2.sended
			});

			talk2.$.text.val('');
		}
		else
		{

		}
	},
	sended:function(json) {
		if(json && json.hasOwnProperty('result') && json.result)
		{
			talk2.$.scrollArea.append(json.htmlTalkItem);
			talk2.scrollToBottom();

			var $tr = $('#talk-' + talk2.options.talkHash);

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
		return talk2.$.scrollArea.find('li:first').data('talk-item-id');
	},
	get_last_talk_id:function() {
		return talk2.$.scrollArea.find('li:last').data('talk-item-id');
	},
	load_old_talk_items:function() {
		var scrollTop = talk2.$.scrollArea.scrollTop();

		if(scrollTop <= 0)
		{
			talk2.$.scrollArea.off('scroll');
			var scrollHeight = talk2.$.scrollArea[0].scrollHeight

			$.ajax({
				type : 'POST',
				url : '/messages/get-talk-item',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : php.array_merge(talk2.options.input, {
					"id": talk2.options.talkRoom.id,
					"talk_item_id" : talk2.get_first_talk_id(),
					"sign" : "<"
				}),
				success : function(json)
				{
					if(json.hasOwnProperty('htmlTalkItems'))
					{
						talk2.$.scrollArea.prepend(json.htmlTalkItems);
						talk2.$.scrollArea.scrollTop(talk2.$.scrollArea[0].scrollHeight + scrollTop - scrollHeight);
					}

					talk2.$.scrollArea.on('scroll', talk2.load_old_talk_items);

//					var $tr = talk2.$.talkRoomList.find('tr.tr-message-human[data-id="' + talk2.options.talkRoom.id + '"], tr.tr-message[data-id="' + talk2.options.talkRoom.id + '"]');
					var $tr = $('#talk-' + talk2.options.talkHash);

					if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
					{
						if(talk2.options.talkRoomTypeId == 1)
						{
							talk2.$.talkRoomList.prepend(json.htmlTalkRoom);
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

//		console.log(type, data);

		//トーク出来る画面でない
		if(!talk2.$.text || talk2.$.text.size() <= 0)
		{
			//バッジの更新
			$.ajax({
				type : 'POST',
				url : '/' + (type !== 'message' ? type : 'messages') + '/get-badge',
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				dataType : 'json',
				data : {
				},
				success : function(json)
				{
					talk2.badge_update(json);
				}
			});
		}
		else if(type == 'dentaku' || type == 'message')
		{
			talk2.get_last_talk_id();

			//トーク利用中
			if(talk2.options.talkRoom && talk2.options.talkRoom.id == data.message.data.talk_room_id)
			{
				$.ajax({
					type : 'POST',
					url : '/messages/get-talk-item',
					headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
					dataType : 'json',
					data : php.array_merge(talk2.options.input, {
						"id": talk2.options.talkRoom.id,
						"talk_item_id" : talk2.get_last_talk_id(),
						"sign" : ">"
					}),
					success : function(json)
					{
						talk2.badge_update(json);

						if(json.hasOwnProperty('htmlTalkItems'))
						{
							talk2.$.scrollArea.append(json.htmlTalkItems);
							talk2.scrollToBottom();
						}

						var $tr = $('#talk-' + talk2.options.talkHash);

						if($tr.size() > 0 && json.hasOwnProperty('htmlTalkRoom'))
						{
							if(data.message.data.talk_room_type_id == 1)
							{
								talk2.$.talkRoomList.prepend(json.htmlTalkRoom);
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
							talk2.badge_update(json);

							if(json.hasOwnProperty('htmlTalkRoom'))
							{
								if(data.message.data.talk_room_type_id == 1)
								{
									talk2.$.talkRoomList.prepend(json.htmlTalkRoom);
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
							talk2.badge_update(json);
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
					talk2.badge_update(json);
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
		talk2.$.scrollArea.append('<li class="talk_item right"><div class="text">' + php.e(php.nl2br(talkItem.text)) + '<span class="read"></span><span class="time">' + php.date('H:i', php.strtotime(talkItem.text)) + '</span></div></li>');
	},
	connect: function(user_id) {
		var socket = io.connect('https://bukkenkaigi.com:3000/');
    	socket.on('connect', function() {
			socket.emit('SendSession', user_id);
			socket.on('message', talk2.reload);
		});
	}
};

$(function(){
	if(talk2.$.file && talk2.$.file.size() > 0)
	{
		talk2.$.file.fileinput({
			language:'ja',
			showPreview: false,
			showUpload: false,
			showRemove: false,
			showCaption: false,
			showCancel: false,
			allowedFileExtensions: ['pdf', 'jpg', 'png', 'gif', 'docx', 'doc'],
			browseLabel: '',
			browseIcon: '<i class="glyphicon glyphicon-paperclip f20px"></i><span style="padding-bottom: 20px"></span>',
			browseClass: 'btn-message-file',
			maxFileSize: 1024 * 30,
			uploadAsync: true,
			uploadUrl: '/messages/send'
		}).on("filebatchselected", function(event, files) {
			talk2.$.messageToolbarLeftBox.tooltip('hide')
			talk2.$.file.fileinput("upload");
		}).on("filebatchpreupload", function(event, data, jqXHR) {
			data.form.append('id', talk2.options.talkRoom.id);
			return data;
		}).on("filebatchuploadsuccess", function(event, data, previewId, index) {
			talk2.sended(data.response);
		});
	}
});
