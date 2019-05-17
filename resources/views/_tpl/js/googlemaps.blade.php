<?
	$prefix = isset($prefix) ? $prefix : '';
	$default = isset($default) ? $default : '';
?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;key=<?= env('GOOGLE_MAPS_API_KEY', '') ?>&amp;sensor=SET_TO_TRUE_OR_FALSE"></script>
<script type="text/javascript" src="/data/js/googlemaps-fullscreen.js"></script>
<script type="text/javascript" src="/data/js/jquery.timer.js"></script>

<? if(!empty($edit)): ?>

<script type="text/javascript">
<!--//
	
	$(function()
	{
		var map = {};
		var marker = {};
		var options = {
			disableDefaultUI: false,
			navigationControl: true,
			navigationControlOptions: 
			{
				style: google.maps.NavigationControlStyle.DEFAULT,
				position: google.maps.ControlPosition.LEFT_TOP
			},
			mapTypeControl: false,
			scaleControl: false,
			zoom: 17,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false
		};
		
		(function fixInfoWindow() {
			var set = google.maps.InfoWindow.prototype.set;
			google.maps.InfoWindow.prototype.set = function(key, val) {
				if (key === "map") {
					if (! this.get("noSuppress")) {
						return;
					}
				}
				set.apply(this, arguments);
			}
		})();

		if($('#<?= $prefix ?>addr_lat').val() != '' && $('#<?= $prefix ?>addr_lon').val() && $('#<?= $prefix ?>addr_lat').val() != '0.0' && $('#<?= $prefix ?>addr_lon').val() != '0.0')
		{
			setGmap($('#<?= $prefix ?>addr_lat').val(), $('#<?= $prefix ?>addr_lon').val(), true);
		}
		else
		{
			if('<?= $default ?>' != '')
			{
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({
					address: '<?= $default ?>'
				}, resultGmap);
			}
			else if (navigator.geolocation)
			{
				navigator.geolocation.getCurrentPosition(function(pos){
					$('#<?= $prefix ?>addr_lat').val(pos.coords.latitude);
					$('#<?= $prefix ?>addr_lon').val(pos.coords.longitude);
					setGmap(pos.coords.latitude, pos.coords.longitude);
				}, function(){
					setGmap(35.689521, 139.691704);
				});
			}
			else
			{
				setGmap(35.689521, 139.691704);
			}
		}
		
		function setGmap(lat, lon, showMarker)
		{
			if(php.empty(showMarker))
			{
				showMarker = false;
			}
			
			var name = '<?= $prefix ?>addr';
			options.center = new google.maps.LatLng(parseFloat(lat), parseFloat(lon));
			map[name] = new google.maps.Map(document.getElementById("boxGoogleMap"), options);
			var resizeEventName = navigator.userAgent.match(/(iPhone|iPod|iPad|Android)/) ? 'orientationchange' : 'resize';
			google.maps.event.addDomListener(window, resizeEventName, function() {
				var center = map[name].getCenter();
				google.maps.event.trigger(map[name], resizeEventName);
				map[name].setCenter(center);
			});
			
			map[name].controls[google.maps.ControlPosition.TOP_RIGHT].push(FullScreenControl(map[name], '全画面に切り替え', '元の画面に戻る'));
			
			if(showMarker)
			{
				// ドラッグ可能なマーカー
				marker[name] = new google.maps.Marker(
				{
					position: options.center,
					map: map[name],
					draggable: true
				});

				// ドロップ時に緯度経度取得
				google.maps.event.addListener(marker[name], 'dragend', function()
				{
					var p = marker[name].getPosition();
					map[name].panTo(p);
					var geocoder = new google.maps.Geocoder();
					geocoder.geocode({
						latLng: p
					}, resultGmapLatlon);
				});
			}
			
			google.maps.event.addListener(map[name], 'click', function(event)
			{
				if(!marker.hasOwnProperty(name))
				{
					// ドラッグ可能なマーカー
					marker[name] = new google.maps.Marker(
					{
						position: options.center,
						map: map[name],
						draggable: true
					});

					// ドロップ時に緯度経度取得
					google.maps.event.addListener(marker[name], 'dragend', function()
					{
						var p = marker[name].getPosition();
						map[name].panTo(p);
						var geocoder = new google.maps.Geocoder();
						geocoder.geocode({
							latLng: p
						}, resultGmapLatlon);
					});
				}
				
				marker[name].setPosition(event.latLng);
				map[name].panTo(event.latLng);
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({
					latLng: event.latLng
				}, resultGmapLatlon);
			});
		}

		function reset(name)
		{
			$('#<?= $prefix ?>addr_lat').val('');
			$('#<?= $prefix ?>addr_lon').val('');
		}
		
		function parse_results(results)
		{
//			console.log('parse_results:', results);
			var obj = results[0].address_components;
			var data = {
				zipcode:'',
				pref:'',
				addr1:'',
				addr2:'',
				lat:void 0,
				lon:void 0
			};
			
			for(var key in obj)
			{
				if(/^[0-9]{3}-[0-9]{4}$/.test(obj[key].long_name))
				{
					data.zipcode = obj[key].long_name;
					php.array_pop(obj);
					
					var newArr = new Array;
					var arr1 = obj.slice(0, key);
					var arr2 = obj.slice(key + 1);
					obj = newArr.concat(arr1, arr2);
					break;
				}
			}
			
//			console.log('data.zipcode:', data.zipcode);
			
			if(data.zipcode == '' && (results[0].hasOwnProperty('formatted_address') || results.hasOwnProperty('formatted_address')))
			{
				var formatted_address = results[0].hasOwnProperty('formatted_address') ? results[0].formatted_address : results.formatted_address;
//				console.log(formatted_address, /〒[0-9]{3}-[0-9]{4}/.test(formatted_address));
				
				if(/〒[0-9]{3}-[0-9]{4}/.test(formatted_address))
				{
//					console.log(formatted_address.match(/〒([0-9]{3}-[0-9]{4})/));
					
					data.zipcode = formatted_address.match(/〒([0-9]{3}-[0-9]{4})/)[1];
				}
			}
				
			for(var key in obj)
			{
				if(obj[key].long_name == '日本')
				{
					php.array_pop(obj);
					
					var newArr = new Array;
					var arr1 = obj.slice(0, key);
					var arr2 = obj.slice(key + 1);
					obj = newArr.concat(arr1, arr2);
					break;
				}
			}
			
			for(var key in obj)
			{
				if(/(都|道|府|県)$/.test(obj[key].long_name))
				{
					data.pref = obj[key].long_name;
					php.array_pop(obj);
					
					var newArr = new Array;
					var arr1 = obj.slice(0, key);
					var arr2 = obj.slice(key + 1);
					obj = newArr.concat(arr1, arr2);
					break;
				}
			}
			
			if(obj.length > 0)
			{
				data.addr1 = obj[obj.length - 1].long_name;
				php.array_pop(obj);

				if(obj.length > 0)
				{
					var addr2 = [];

					for(var i = obj.length - 1; i >= 0; i--)
					{
						addr2.push(obj[i].long_name);
					}

					data.addr2 = addr2.join('');
				}
			}
			
			if(results[0].hasOwnProperty('geometry'))
			{
				obj = results[0].geometry;
				
				if(obj.hasOwnProperty('location'))
				{
					if(typeof(obj.location.lat) == 'function')
					{
						data.lat = obj.location.lat();
						data.lon = obj.location.lng();
					}
					else
					{
						data.lat = obj.location.lat;
						data.lon = obj.location.lng;
					}
				}
			}
			
//			console.log('after:', data);
			
			return data;
		}
		
		function set_form_data(data, without)
		{
			if(php.empty(without))
			{
				without = [];
			}
			
//			var $option = $("#<?= $prefix ?>pref_id").find(":contains('" + data.pref + "')");
//			
//			if(!php.in_array('#<?= $prefix ?>pref_id', without))
//			{
//				$("#<?= $prefix ?>pref_id").val($option.val());
//				$("#<?= $prefix ?>pref_id").selectpicker('render');
//				$("#<?= $prefix ?>pref_id").trigger('change.googlemaps', {'selected_text':[data.addr1]});
//			}
//			
//			if(!php.in_array('#<?= $prefix ?>zipcode_code', without))
//			{
//				$("#<?= $prefix ?>zipcode_code").val('');
//				$("#<?= $prefix ?>zipcode_code").val(data.zipcode.replace('-', ''));
//			}
//			
//			if(!php.in_array('#<?= $prefix ?>addr2', without))
//			{
//				$("#<?= $prefix ?>addr2").val('');
//				$("#<?= $prefix ?>addr2").val(data.addr2);
//			}
			
			if(data.lat !== void 0 && data.lon !== void 0)
			{
				if(!php.in_array('#<?= $prefix ?>addr_lat', without))
				{
					$("#<?= $prefix ?>addr_lat").val(data.lat);
				}
				
				if(!php.in_array('#<?= $prefix ?>addr_lon', without))
				{
					$("#<?= $prefix ?>addr_lon").val(data.lon);
				}
			}
		}
		
		function resultGmapLatlon(results, status)
		{
			switch(status)
			{
				case (google.maps.GeocoderStatus.OK):
					set_form_data(parse_results(results));
					break;
				default:
					commonError(status);
					break;
			}
		}

		function resultGmap(results, status)
		{
			switch(status)
			{
				case (google.maps.GeocoderStatus.OK):
					var data = parse_results(results);
					
					if(data.lat && data.lon)
					{
						setGmap(data.lat, data.lon);
					}
					
					break;
					
				case (google.maps.GeocoderStatus.ZERO_RESULTS):
					
					setGmap(35.689521, 139.691704);
					
					break;
				default:
					//commonError(status);
					break;
			}
		}
		
		function commonError(status)
		{
			switch(status)
			{
				case (google.maps.GeocoderStatus.ERROR):
					alert('通信エラーが発生しました。\nもう一度操作を行ってください。');
					break;

				case (google.maps.GeocoderStatus.INVALID_REQUEST):
					alert('パラメータに問題があるため\n設定できませんでした。');
					break;
				case (google.maps.GeocoderStatus.OVER_QUERY_LIMIT):
					alert('通信エラーが発生しました。\n時間をおいてもう一度操作を行ってください。');
					break;
				case (google.maps.GeocoderStatus.REQUEST_DENIED):
					alert('マップ情報を取得できませんでした。');
					break;
				case (google.maps.GeocoderStatus.ZERO_RESULTS):
					alert('住所からマップが見つかりませんでした。');
					break;
				case (google.maps.GeocoderStatus.UNKNOWN_ERROR):
					alert('通信エラーが発生しました。\nもう一度操作を行ってください。');
					break;
				default:
					alert('マップ情報を取得できませんでした。');
					break;
			}
		}
		
		var concatLevel = 4;
		
		$(".btnAddr2Location").on(tapEventName, function()
		{
			var pref_id = $("#<?= $prefix ?>pref_id").val();
			var area_id = $("#<?= $prefix ?>area_id").val();
			var addr2 = $("#<?= $prefix ?>addr2").val();
			
			if(php.empty(pref_id) || php.empty(area_id) || php.empty(addr2))
			{
				var msg = [];
				
				if(php.empty(pref_id)) msg.push('都道府県');
				if(php.empty(area_id)) msg.push('市区町村');
				if(php.empty(addr2)) msg.push('町域');
				
				alert(msg.join('・') + 'を入力してください。\nピンが表示されない・位置が変わらない場合は\n地図をタップして調整してください。');
			}
			else
			{
				$(".btnAddr2Location").addClass('disabled');
				
				concatLevel = 4;
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({
					address: $("#<?= $prefix ?>pref_id :selected").text() + $("#<?= $prefix ?>area_id :selected").text() + $("#<?= $prefix ?>addr2").val() + $("#<?= $prefix ?>addr3").val()
				}, resultGmap2);
			}
		});
		
		function resultGmap2(results, status)
		{
			switch(status)
			{
				case (google.maps.GeocoderStatus.OK):
					var data = parse_results(results);
					
					if(data.lat && data.lon)
					{
						setGmap(data.lat, data.lon, true);
						$('#<?= $prefix ?>addr_lat').val(data.lat);
						$('#<?= $prefix ?>addr_lon').val(data.lon);
					}
					
					$(".btnAddr2Location").removeClass('disabled');
					
					break;
					
				case (google.maps.GeocoderStatus.ZERO_RESULTS):
					
					if(concatLevel > 1)
					{
						--concatLevel;
						
						var geocoder = new google.maps.Geocoder();
						var addr = $("#<?= $prefix ?>pref_id :selected").text();
						
						if(concatLevel >= 2)
						{
							addr += $("#<?= $prefix ?>area_id :selected").text()
						}
						
						if(concatLevel >= 3)
						{
							addr += $("#<?= $prefix ?>addr2").val()
						}

						geocoder.geocode({address: addr}, resultGmap2);
					}
					
					break;
				default:
				
					$(".btnAddr2Location").removeClass('disabled');
					//commonError(status);
					break;
			}
		}
	});
//-->
</script>

<? elseif(!empty($lat) && $lat !== '' && !empty($lon) && $lon !== ''): ?>

<script type="text/javascript">
<!--//
	$(function()
	{
		var map;
		var marker;
		var options = {
			disableDefaultUI: false,
			navigationControl: true,
			navigationControlOptions: 
			{
				style: google.maps.NavigationControlStyle.DEFAULT,
				position: google.maps.ControlPosition.LEFT_TOP
			},
			mapTypeControl: false,
			scaleControl: false,
			zoom: 17,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false
		};
		
		(function fixInfoWindow() {
			var set = google.maps.InfoWindow.prototype.set;
			google.maps.InfoWindow.prototype.set = function(key, val) {
				if (key === "map") {
					if (! this.get("noSuppress")) {
						return;
					}
				}
				set.apply(this, arguments);
			}
		})();

		options.center = new google.maps.LatLng(<?= $lat ?>, <?= $lon ?>);
		map = new google.maps.Map(document.getElementById("boxGoogleMap"), options);
		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(FullScreenControl(map, '全画面に切り替え', '元の画面に戻る'));
		
		var resizeEventName = navigator.userAgent.match(/(iPhone|iPod|iPad|Android)/) ? 'orientationchange' : 'resize';
		google.maps.event.addDomListener(window, resizeEventName, function() {
			var center = map.getCenter();
			google.maps.event.trigger(map, resizeEventName);
			map.setCenter(center);
		});

		// マーカー
		marker = new google.maps.Marker(
		{
			position: options.center,
			map: map
		});
	});
//-->
</script>

<? endif; ?>
