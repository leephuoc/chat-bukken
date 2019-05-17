<? /* <div class="form-group">
	<? $_ = 'zipcode_code' ?>
	<label for="<? $_ ?>" class="control-label col-sm-3">郵便番号 <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span></label>
	<div class="col-sm-9">
		<p class="form-control-static">{{ Input::get($_) }}&nbsp;</p>
	</div>
</div> */ ?>
<?
	$required = isset($required) ? $required : [];
?>

<div class="form-group">
	<? $_ = 'pref_id'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">{{ trans('attribute.pref_id') }}@if(array_get($required, $_, true)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<p class="form-control-static">{{ array_get($prefs, Input::get($_, '')) }}</p>
	</div>
	
	<div class="clearfix visible-xs-block">&nbsp;</div>

	<? $_ = 'area_id'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-2">{{ trans('attribute.area_id') }}@if(array_get($required, $_, true)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<p class="form-control-static">{{ array_get($areas, Input::get($_, '')) }}</p>
	</div>
</div>

<div class="form-group">
	<? $_ = 'addr2'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">{{ trans('attribute.addr2') }}@if(array_get($required, $_, true)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-9">
		<p class="form-control-static">{{ Input::get($_) }}</p>
	</div>
	
	<div class="clearfix visible-xs-block">&nbsp;</div>
</div>

@if(Input::get('addr_lat') && Input::get('addr_lon'))
<? $_ = 'googlemaps'; ?>
<div class="form-group">
	<label for="" class="control-label col-sm-3">{{ trans('attribute.googlemaps') }}@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-9">
		@if(Input::get('addr_lat') && Input::get('addr_lon'))
			<div id="boxGoogleMap" class="clearFix mB20" style="height: 240px; border: 1px solid #000000;"></div>
		@else
			<div class="alert alert-danger" role="alert">緯度経度が入力されていないため地図を表示できません。</div>
		@endif
	</div>
</div>
@endif

<? /* <div class="form-group">
	<? $_ = 'addr_lat'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">緯度 <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span></label>
	<div class="col-sm-3">
		<p class="form-control-static">{{ Input::get($_) }}&nbsp;</p>
	</div>
	
	<div class="clearfix visible-xs-block">&nbsp;</div>

	<? $_ = 'addr_lon'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-2">経度 <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span></label>
	<div class="col-sm-3">
		<p class="form-control-static">{{ Input::get($_) }}&nbsp;</p>
	</div>
</div> */ ?>