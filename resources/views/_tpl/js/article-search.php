<script type="text/javascript">
<!--//

	$(function()
	{
		$(".btnSearch").on(tapEventName,{f:function(e)
		{
			var $formSearchBox = $('#formSearchBox');
			BootstrapDialog.show({
				onshow: function(dialog){
					$('.selectpicker-dialog', dialog.$modalBody).selectpicker({language: 'ja-JP'});
				},
				cssClass: 'dialog-header-none',
				message: $('#formSearchBox').html().replace(/[\r\n]/g, ''),
				closable: true,
				buttons: [{
					label: '条件をリセット',
					cssClass: 'btn btn-default w240px',
					action: function(dialog){
						$("input[type='checkbox'][name^='article_purpose_type_id']:checked", dialog.$modalBody).prop('checked', false).closest('label').removeClass('active');
						$("input[type='checkbox'][name^='article_category_id']:checked", dialog.$modalBody).prop('checked', false).closest('label').removeClass('active');
						$("input[type='checkbox'][name^='corporate_type_id']:checked", dialog.$modalBody).prop('checked', false).closest('label').removeClass('active');
						$("input[type='checkbox'][name^='article_trade_type_id']:checked", dialog.$modalBody).prop('checked', false).closest('label').removeClass('active');
					}
				},{
					label: 'この条件で絞り込み',
					cssClass: 'btn btn-warning w240px',
					action: function(dialog){
						dialog.close();
						var $article_purpose_type_id = $("input[type='checkbox'][name^='article_purpose_type_id']:checked", dialog.$modalBody);
						var $article_category_id = $("input[type='checkbox'][name^='article_category_id']:checked", dialog.$modalBody);
						var $corporate_type_id = $("input[type='checkbox'][name^='corporate_type_id']:checked", dialog.$modalBody);
						var $article_trade_type_id = $("input[type='checkbox'][name^='article_trade_type_id']:checked", dialog.$modalBody);

						$("input[type='checkbox'][name^='article_purpose_type_id']:checked", $formSearchBox).prop('checked', false);
						if($article_purpose_type_id.size() > 0)
						{
							$article_purpose_type_id.each(function()
							{
								var $self = $(this);
								$("input[type='checkbox'][name^='article_purpose_type_id'][value='"+$self.val()+"']", $formSearchBox).prop('checked', true);
							});
						}

						$("input[type='checkbox'][name^='article_category_id']:checked", $formSearchBox).prop('checked', false);
						if($article_category_id.size() > 0)
						{
							$article_category_id.each(function()
							{
								var $self = $(this);
								$("input[type='checkbox'][name^='article_category_id'][value='"+$self.val()+"']", $formSearchBox).prop('checked', true);
							});
						}

						$("input[type='checkbox'][name^='corporate_type_id']:checked", $formSearchBox).prop('checked', false);
						if($corporate_type_id.size() > 0)
						{
							$corporate_type_id.each(function()
							{
								var $self = $(this);
								$("input[type='checkbox'][name^='corporate_type_id'][value='"+$self.val()+"']", $formSearchBox).prop('checked', true);
							});
						}

						$("input[type='checkbox'][name^='article_trade_type_id']:checked", $formSearchBox).prop('checked', false);
						if($article_trade_type_id.size() > 0)
						{
							$article_trade_type_id.each(function()
							{
								var $self = $(this);
								$("input[type='checkbox'][name^='article_trade_type_id'][value='"+$self.val()+"']", $formSearchBox).prop('checked', true);
							});
						}
						if(!dialog.$modalBody.find('select[name=area_id\\[\\]]').val()){
							dialog.$modalBody.find('select[name=area_id\\[\\]]').val('');
							dialog.$modalBody.append('<input type="hidden" name="area_id" value=0 />');
						}
						// return;
						$('.modal-params').html(dialog.$modalBody);

						$('#dentakuForm').submit();
					}
				}]
			});

			return false;
		}}, checkClick);
	});
//-->
</script>
