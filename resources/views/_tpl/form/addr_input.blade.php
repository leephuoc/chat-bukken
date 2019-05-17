<?
	$defaults = isset($defaults) ? $defaults : [];
	$googlemaps = isset($googlemaps) ? $googlemaps : true;
	$required = isset($required) ? $required : [];
?>
<? /* <div class="form-group">
	<label for="" class="control-label col-sm-3">郵便番号 <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span></label>
	<div class="col-sm-9">
		<div class="alert alert-warning" role="alert">
			<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
			<span class="sr-only"> ポイント</span>　
			住所検索すると都道府県から町域まで自動で入力します。(既に入力されている場合は上書きされます。)
		</div>
		<div class="row">
			<div class="col-xs-1">
				<p class="form-control-static">〒</p>
			</div>
			<div class="col-xs-6" style="padding-left: 10px; padding-right: 5px;">
				<? $_ = 'zipcode_code'; ?>
				{!! Form::text($_, Input::get($_, array_get($defaults, $_, '')), array('id' => $_, 'class' => 'form-control', 'placeholder' => '例：1010065', 'maxlength' => 20)) !!}
			</div>
			<div class="col-xs-2" style="padding-left: 5px">
				<button type="button" class="btn btn-primary" id="btnZipcode">
					住所検索
				</button>
			</div>
		</div>
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
</div> */ ?>
<? $_ = 'zipcode_code'; ?>
{!! Form::hidden($_, Input::get($_, array_get($defaults, $_, '')), array('id' => $_)) !!}

<div class="form-group">
	<? $_ = 'pref_id'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">都道府県@if(array_get($required, $_, true)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		{!! Form::select($_, $prefs, Input::get($_, Input::old($_, array_get($defaults, $_, ''))), ['id' => $_, 'class' => 'selectpicker show-tick', 'data-width' => '100%']) !!}
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
	
	<div class="clearfix visible-xs-block">&nbsp;</div>

	<? $_ = 'area_id'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-2">市区町村@if(array_get($required, $_, true)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-4">
		{!! Form::select($_, $areas, Input::get($_, Input::old($_, array_get($defaults, $_, ''))), ['id' => $_, 'class' => 'selectpicker show-tick', 'data-width' => '100%']) !!}
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
</div>

<div class="form-group">
	<? $_ = 'addr2'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">町域・番地・マンション名@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-9">
		{!! Form::text($_, Input::get($_, Input::old($_, array_get($defaults, $_, ''))), ['id' => $_, 'class' => 'form-control', 'placeholder' => '例：○○町１丁目']) !!}
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
</div>

@if($googlemaps)
<? $_ = 'googlemaps'; ?>
<div class="form-group mT30">
	<label for="" class="control-label col-sm-3">地図の確認・調整@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-9">
		@if($errors->first('addr_lat') || $errors->first('addr_lon'))
			<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> 地図内にピンを設定してください。</p>
		@endif
		
		<p class="help-block">
			<a class="btnAddr2Location btn btn-primary mB5 mR15"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> 住所から地図にピンを表示・設定する</a>
			<span class="f12px">ピンが表示されない・位置が変わらない場合は地図をタップして調整してください。</span>
		</p>
		<div class="boxWrap mT10" style="height: 360px; border: 1px solid #000000;">
			<div id="boxGoogleMap" style="height: 360px;">
				<p class="centerText f16px" style="padding-top: 60px; line-height: 60px;">地図を読み込み中...</p>
			</div>
		</div>
		<div class="alert alert-warning mT10" role="alert">
			<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
			<span class="sr-only"> ポイント</span>　
			マップをタップしたりピンを動かしたりするとより正確な場所を指定することができます。
		</div>
	</div>
</div>
@endif

<? /* <div class="form-group">
	<? $_ = 'addr_lat'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">緯度 <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span></label>
	<div class="col-sm-3">
		{!! Form::text($_, Input::get($_, array_get($defaults, $_, '')), array('id' => $_, 'class' => 'form-control', 'placeholder' => '例：35.698816', 'maxlength' => 24)) !!}
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>

	<div class="clearfix visible-xs-block">&nbsp;</div>
	
	<? $_ = 'addr_lon'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-2">経度 <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span></label>
	<div class="col-sm-3">
		{!! Form::text($_, Input::get($_, array_get($defaults, $_, '')), array('id' => $_, 'class' => 'form-control', 'placeholder' => '例：139.75615', 'maxlength' => 24)) !!}
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
</div> */ ?>

<? $_ = 'addr_lat'; ?>
{!! Form::hidden($_, Input::get($_, array_get($defaults, $_, '')), ['id' => $_]) !!}
<? $_ = 'addr_lon'; ?>
{!! Form::hidden($_, Input::get($_, array_get($defaults, $_, '')), ['id' => $_]) !!}