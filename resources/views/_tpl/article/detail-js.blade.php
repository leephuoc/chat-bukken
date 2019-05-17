@include('_tpl.js.googlemaps', ['lat' => $article->addr_lat, 'lon' =>  $article->addr_lon])
<script type="text/javascript">
	$(function()
	{
		var $googlemap = $('#boxGoogleMap');
		$(window).on('resize', function(){
			$("#carousel-example-generic .item img").css('height', $googlemap.height() + 'px');
		}).trigger('resize');
	});
</script>