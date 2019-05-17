$(document).ready(function(){
	var button_on  = 'すべてのエリアを選択';
	var button_off = 'エリア選択をすべて解除';
	var all_checked = true;
	var $button = $("#select-all-area");
	var $inputs = $("input[name^=corporate_area_id]");
	// ボタンの表示を設定
	function set_button() {
		all_checked = true;
		$inputs.each(function() {
			if (!$(this).prop('checked')) {
				all_checked = false;
				return false; // break
			}
		});
		if (!all_checked) {
			// 未チェックがある場合
			$button.text(button_on);
		} else {
			// 全部チェックされている場合
			$button.text(button_off);
		}
	}
	set_button();
	$inputs.click(function(){
		set_button();
	});
	$button.click(function(){
		if (!all_checked) {
			// すべて選択
			$inputs.each(function(){
				$(this).prop("checked",true);
			});
		} else {
			// 選択を解除
			$inputs.each(function(){
				$(this).prop("checked",false);
			});
		}
		set_button();
	});
});
