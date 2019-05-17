<script type="text/javascript">
<!--//
	var $pref_id = $("#simple-pref_id");
	var $area_id = $("#simple-area_id");

	if($pref_id.size() && $area_id.size())
	{
		$pref_id.change(function(e, item) {
			var $self = $(this);
			console.log($(this).val())
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
						$area_id.empty();
						var html = '';

						// if(true || !$area_id.data('not-empty'))
						// {
						// 	html = '<option value="" selected>指定なし</option>';
						// }

						for(var key in json.areas)
						{
							var area = json.areas[key];
							html += '<option value="' + area.id + '">' + area.name + '</option>';
						}

						$area_id.html(html);
						console.log($area_id)

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
//-->
</script>
