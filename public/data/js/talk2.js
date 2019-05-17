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
    current_user_id: '',
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
				talk2.current_user_id = json.currentUserId;

				if(json && json.hasOwnProperty('result') && json.result && parseInt(json.receiver_is_delete) === 0)
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
				} else {
                    if(json.hasOwnProperty('htmlTalkItems'))
                    {
                        talk2.$.scrollArea.html(json.htmlTalkItems);
                        talk2.scrollToBottom();
                    }
                }

                let currentUrl = window.location.href;
				let articleId = currentUrl.split('dentaku/')[1].split('/detail')[0];

				// update chat box if miss any messages
                $.ajax({
                    type: 'GET',
                    url: '/messages/check-lacking-message',
					data: {
                        'articleId': articleId,
                        'totalTalkItems': $('.talk_item').not('.center').length,
                        'talkIdKey': options.talkIdKey,
                        'talkIdValue': options.talkIdValue
                    },
					success: function (data) {
						if (data.update === true) {
							// update chat box
                            talk2.$.scrollArea.empty().html(data.html);
						} else {
                            // don't update chat box
						}
                    },
					error: function (error) {
                        logError(error, 'update lacking messages');
                    }
				});

				delete json['talkItems'];
				talk2.options = json;
                updateNotification(talk2.options.talkRoom.id);
			},
            error: function (error) {
				logError(error, 'loading messages');
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
		setTimeout(function () {
			talk2.$.scrollArea.animate({ scrollTop: talk2.$.scrollArea.prop("scrollHeight")}, 500);
        }, 500);
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
				success : function (data) {
                    if (data.status === 404) {
                        localStorage.setItem('redirect_after_delete_article', 'true');
                        window.location.href = $('#url_prev').val();
                    } else {
                        // talk2.sended(data);
                    }
                },
                error: function (error) {
                    logError(error, 'sending messages');
				    if (error.status === 401) window.location.href = '/';
                }
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
				},
                error: function (error) {
                    logError(error, 'getting talk items');
                }
			});
		}
	},
	reload:function(data) {

	    // make ajax call to update notification and history chat when a message is sent
        $.ajax({
            type : 'GET',
            url : '/user-info',
            success : function(context)
            {
                // if the receiver of message is the current logged in user then update view,
                // the receiver can be either buyer or seller
                if (
                    (
                        parseInt(context.id) === parseInt(data.message.push.buy_user_id) ||
                        parseInt(context.id) === parseInt(data.message.push.sell_user_id)
                    ) &&
                    parseInt(context.id) === parseInt(data.message.push.receive_user_id)
                ) {
                    // if history chat is the current page then update list article and pagination's link
                    if (context.previousUrl.indexOf('history-chat') >= 0) {
                        updateHistoryChat(context.previousUrl);
                    }

                    let currentUrl = window.location.href;

                    // the following long block of code will update the unread message number (umn) at the top of the page,
                    // here we have 2 cases, if user sits at any page but the talk room then we update umn,
                    // otherwise we will have two more cases to be considered
                    if (currentUrl.indexOf('/detail?tk') !== -1) { // if user is in a talk room

                        // get tk param in query string, tk will indicate if the logged in user owns this article
                        let urlParams = new URLSearchParams(window.location.search);
                        let tk = urlParams.get('tk');

                        // if tk is 'talk_room_id' meaning the logged in user owns this article, we can extract
                        // the id of current talk room from tv param of query string. If tk is 'article_id' which
                        // means the logged in user doesn't own this article, the tv param in this case doesn't
                        // hold the id of talk room, therefore we have to make another ajax call to get it
                        if (tk === 'talk_room_id') {
                            let talkRoomId = urlParams.get('tv');

                            // after getting here we still cannot update umn right away
                            // let's call the id of room that the logged in user is current in A,
                            // and the id of room from which the sender sends message B
                            // if A and B is the same then we don't need to update umn
                            // since they are in the same room constantly reading their chat box
                            // otherwise we update it
                            if (parseInt(talkRoomId) !== parseInt(data.message.push.talk_room_id)) {
                                updateNotification();
                            }
                        } else if (tk === 'article_id') {
                            let tmp = currentUrl.split('dentaku/')[1];
                            let articleId = tmp.split('/detail')[0];

                            // make ajax call to get id of talk room
                            $.ajax({
                                type: 'GET',
                                url: '/messages/talk-room-info',
                                data: { articleId: articleId },
                                success: function (response) {
                                    if (parseInt(response.id) !== parseInt(data.message.push.talk_room_id)) {
                                        updateNotification();
                                    }
                                },
                                error: function (error) {
                                    // place holder for error handling
                                }
                            });
                        }

                    } else { // if user is not in talk room
                        // and is not in history chat page either
                        if (currentUrl.indexOf('history-chat') === -1) {
                            updateNotification();
                        }
                    }
                } else if ( // case where current user is sender and have another chat history tab opened
                    (
                        parseInt(context.id) === parseInt(data.message.push.buy_user_id) ||
                        parseInt(context.id) === parseInt(data.message.push.sell_user_id)
                    ) &&
                    parseInt(context.id) !== parseInt(data.message.push.receive_user_id)
                ) {
                    // only update history chat, don't update notification
                    let currentUrl = window.location.href;
                    if (currentUrl.indexOf('history-chat') !== -1) {
                        $.ajax({
                            type : 'GET',
                            url : currentUrl,
                            success : function(response)
                            {
                                $('#tab-1').html(response.first_tab);
                                $('#tab-2').html(response.second_tab);
                                $('#tab-3').html(response.third_tab);
                                $('#paginate-1').html(response.first_pagination);
                                $('#paginate-2').html(response.second_pagination);
                                $('#paginate-3').html(response.third_pagination);
                            },
                            error: function (error) {
                                // place holder for error handling
                            }
                        });
                    }
                }
            },
            error: function (error) {
                // place holder for error handling
                logError(error, 'getting user info in reload');
            }
        });

		var type = '';

		if(data.message && data.message.type)
		{
			type = data.message.type;
		}

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
				},
                error: function (error) {
                    logError(error, 'getting badge');
                }
			});
		}
		else if(type == 'dentaku' || type == 'message')
		{
			talk2.get_last_talk_id();

			//トーク利用中
			if(talk2.options.talkRoom && talk2.options.talkRoom.id == data.message.data.talk_room_id)
			{
                if (parseInt(talk2.current_user_id) === parseInt(data.message.push.receive_user_id)) {
                    talk2.$.scrollArea.append(data.message.receiver_message_view_component);
                    talk2.scrollToBottom();
                } else {
                    talk2.$.scrollArea.append(data.message.sender_message_view_component);
                    talk2.scrollToBottom();
                }

                readMessage(talk2.options.talkRoom.id);
            }
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
    updateNotify: function(readUser) {

	    // make ajax call to get the updated unread message number
        $.ajax({
            type : 'GET',
            url : '/user-info',
            success : function(data) {
            	let user_id_reading = parseInt(readUser.userId);
            	let user_id_login = parseInt(data.id);
            	let user_id_recieve = parseInt(readUser.userIdReceive);
            	let talk_room_id = parseInt(readUser.talkRoomId);

                // if user has read their message then update unread message number
                if (user_id_reading === user_id_login) {
                    // if user is in history chat page then update status icon of record
                    if (data.previousUrl.indexOf('history-chat') >= 0) {
                        updateHistoryChat(data.previousUrl);
                    } else {
                        if (parseInt(talk2.options.talkRoom.id) !== talk_room_id) {
                            updateNotification();
                        }
                    }
                }

                // update status in history chat when A read then B change status wait
                if (user_id_recieve === user_id_login) {
                    // if user is in history chat page then update status icon of record
                    if (data.previousUrl.indexOf('history-chat') >= 0) {
                        updateHistoryChat(data.previousUrl);
                    }
                }
            },
            error: function (error) {
                logError(error, 'getting user info in update notify');
            }
        });
    },
    articleDeleteListener: function(data) {
        let currentUrl = window.location.href;

        if (currentUrl.indexOf('/detail?tk') !== -1) { // if user is in chat room
            let tmp = currentUrl.split('dentaku/')[1];
            let articleId = tmp.split('/detail')[0];

            if (parseInt(data.id) === parseInt(articleId)) {
            	console.log($('#url_prev').val()); // TODO
                localStorage.setItem('redirect_after_delete_article', 'true');
                window.location.href = $('#url_prev').val();
            }
        } else if (currentUrl.indexOf('history-chat') >= 0) { // if user is in history chat page
            updateHistoryChat(currentUrl);
        } else {
        	let current_user_id = parseInt($('#current_user_id').val());
        	if (data.user_id_push !== current_user_id) {
                updateNotification();
            }
        }
    },
    userDeleteListener: function (data) {
        $.ajax({
            type: 'GET',
            url: '/user-info',
            success: function (context) {
                let currentUrl = window.location.href;

                // if current user get affected by deleting another user
                if (data.affectedUserId.indexOf(context.id) !== -1) {

                    // if current page is history chat
                    if (currentUrl.indexOf('history-chat') >= 0) {
                        updateHistoryChat(currentUrl);
                    } else { // if user not in history chat page
                        // update notification only
                        updateNotification();
                    }
                }

                // if current page is chat room
                if (currentUrl.indexOf('/detail?tk') !== -1) {
                    if (data.affectedUserId.indexOf(context.id) !== -1) {
                        $('#talk_item_text').prop('disabled', true);
                        $('#sendMessageBtn').prop('disabled', true);
                        $('#talkFile').prop('disabled', true);
                    }
                }
            },
            error: function (error) {
                // if user is not authenticated
                if (error.status === 401) {
                    $('#talk_item_text').prop('disabled', true);
                    $('#sendMessageBtn').prop('disabled', true);
                    $('#talkFile').prop('disabled', true);
                }

                logError(error, 'getting user info in delete user listener');
            }
        });
    },
	connect: function(user_id, pusherInfo) {

        var pusher = new Pusher(pusherInfo.key, {
            cluster: pusherInfo.cluster,
            encrypted: true
        });

        var channel = pusher.subscribe('chat');

        channel.bind('App\\Events\\SendMessage', function(data) {
            talk2.reload(data);
        });

        channel.bind('App\\Events\\ReadMessage', function (data) {
            talk2.updateNotify(data);
        });

        channel.bind('App\\Events\\DeleteArticle', function (data) {
            talk2.articleDeleteListener(data);
        });

        channel.bind('App\\Events\\DeleteUser', function (data) {
            talk2.userDeleteListener(data);
        });
	}
};

$(function(){
	if(talk2.$.file && talk2.$.file.size() > 0)
	{
		talk2.$.file.fileinput({
            elErrorContainer: '#errorFile',
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
            data.form.append('talkBlade', talk2.options.input.talkBlade);
            data.form.append('talkIdKey', talk2.options.input.talkIdKey);
            data.form.append('talkIdValue', talk2.options.input.talkIdKey);
            data.form.append('talkRoomTypeId', talk2.options.input.talkRoomTypeId);
            data.form.append('talkHash', talk2.options.input.talkHash);

			return data;
		}).on("filebatchuploadsuccess", function(event, data, previewId, index) {
			// talk2.sended(data.response);
		});
	}
});

/**
 * Update history chat
 *
 * @param url
 */
function updateHistoryChat(url) {
    $.ajax({
        type: 'GET',
        url: url,
        success: function (response) {
            $.ajax({
                type : 'GET',
                url : '/messages/update-notification',
                success : function(total)
                {
                    $('#tab-1').html(response.first_tab);
                    $('#tab-2').html(response.second_tab);
                    $('#tab-3').html(response.third_tab);
                    $('#paginate-1').html(response.first_pagination);
                    $('#paginate-2').html(response.second_pagination);
                    $('#paginate-3').html(response.third_pagination);

                    let notifyNumber = $('.badge_message');
                    if (notifyNumber.length !== 0 && parseInt(total) !== 0) {
                        notifyNumber.text(total);
                    } else if (notifyNumber.length !== 0 && parseInt(total) === 0) {
                        notifyNumber.remove();
                    } else if (notifyNumber.length === 0 && parseInt(total) !== 0) {
                        $('.wrap-tows').append('<span class="badge color-58CC59 badge_message">' + total + '</span>');
                    }
                },
                error: function (error) {
                    // place holder for error handling
                    logError(error, 'updating notification in update history chat');
                }
            });
        },
        error: function (error) {
            // place holder for error handling
            logError(error, 'getting history chat');
        }
    });
}

/**
 * Update notification section
 */
function updateNotification(talkRoomId) {
    $.ajax({
        type: 'GET',
        data: {talkRoomId: talkRoomId},
        url: '/messages/update-notification',
        success: function (total) {
            let notifyNumber = $('.badge_message');
            if (notifyNumber.length !== 0 && parseInt(total) !== 0) {
                notifyNumber.text(total);
            } else if (notifyNumber.length !== 0 && parseInt(total) === 0) {
                notifyNumber.remove();
            } else if (notifyNumber.length === 0 && parseInt(total) !== 0) {
                $('.wrap-tows').append('<span class="badge color-58CC59 badge_message">' + total + '</span>');
            } else {
                console.log('cannot update notification'); //TODO
            }
        },
        error: function (error) {
            // place holder for error handling
            logError(error, 'getting updated notification');
        }
    });
}

/**
 * Call ajax to read messages
 *
 * @param talkRoomId
 */
function readMessage(talkRoomId) {
	$.ajax({
		type: 'GET',
		url: '/messages/read',
        data: {talkRoomId: talkRoomId},
        success: function (data) {
            // nothing to do here
        },
        error: function (error) {
            logError(error, 'reading messages');
        }
	});
}

/**
 * Log error when ajax fail
 *
 * @param error
 * @param place
 */
function logError(error, place) {
    let ajaxError = {
        function: place,
        status: error.status,
        statusText: error.statusText
    };

    $.ajax({
        type: 'POST',
        url: '/ajax/log-error',
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        data: {error: JSON.stringify(ajaxError)},
        dataType: 'JSON',
        success: function (data) {
            // do nothing
        },
        error: function (error) {
            console.log('Log status: ' + error.status);
        }
    });
}
