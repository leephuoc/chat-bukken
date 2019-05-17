$(document).ready(function(){
	$("input[name=all]").click(function(){
		console.log('ok');
		if ( $(this).prop("checked") ) {
			$("input[name^=user]").each(function(){
				$(this).prop("checked",true);
			});
		} else {
			$("input[name^=user]").each(function(){
				$(this).prop("checked",false);
			});
		}
	});
});
