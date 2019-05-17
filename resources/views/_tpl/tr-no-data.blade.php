<?
	$td_attr = empty($td_attr) ? [] : $td_attr;
	$title = empty($title) ? '' : $title;
	$message = empty($message) ? '' : $message;
	$label = empty($label) ? '' : $label;
	$href = empty($href) ? '' : $href;
?>
<tr class="tr-no-data">
	<td {!! HTML::attributes($td_attr) !!}>
		<!--<img src="/data/img/nodata.png" class="mB5" />-->
		@if($title)
			<h4 class="centerText notification-search"><strong>{!! $title !!}</strong></h4>
		@endif
		@if($message)
			<p class="centerText">{!! $message !!}</p>
		@endif
		@if($label && $href)
			<div class="row mT20">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="{{ $href }}" class="flat_button fb-blue">{!! $label !!}</a>
				</div>
			</div>
		@endif
	</td>
</tr>