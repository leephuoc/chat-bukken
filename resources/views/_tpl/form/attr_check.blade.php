<?
	$required = isset($required) ? $required : [];
?>
<div class="form-group">
	<? $_ = 'land_area'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">土地面積@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<p class="form-control-static">
			<? if(Input::get($_, '') !== ''): ?>
				{{ Input::get($_) }}m<sup>2</sup>
			<? else: ?>
				未入力
			<? endif ?>
		</p>
	</div>

	<div class="clearfix visible-xs-block">&nbsp;</div>

	<? $_ = 'building_area'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-2">建物面積@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<p class="form-control-static">
			<? if(Input::get($_, '') !== ''): ?>
				{{ Input::get($_) }}m<sup>2</sup>
			<? else: ?>
				未入力
			<? endif ?>
		</p>
	</div>
</div>

<div class="form-group">
	<? $_ = 'price'; ?>
	<label for="<? $_ ?>" class="control-label col-sm-3">価格@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-9">
		<p class="form-control-static">
			<? if(Input::get($_, '') !== ''): ?>
				{{ Input::get($_) }}万円
			<? else: ?>
				未入力
			<? endif ?>
			<? if(Input::get('price_ask') || Input::get('price_yet')): ?>
				<?
					$str = [];
					if(Input::get('price_ask')) $str[] = 'ＡＳＫ';
					if(Input::get('price_yet')) $str[] = '未定';
				?>
				(
					<?= implode('、', $str) ?>
				)
			<? endif ?>

		</p>
	</div>
</div>