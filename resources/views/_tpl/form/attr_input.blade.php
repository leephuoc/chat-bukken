<?
	$defaults = isset($defaults) ? $defaults : [];
	$required = isset($required) ? $required : [];
?>
<div class="form-group mT30">

	<? $_ = 'land_area'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">土地面積@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<div class="input-group">
			{!! Form::text($_, Input::get($_, Input::old($_, array_get($defaults, $_, ''))), ['id' => $_, 'class' => 'form-control', 'placeholder' => '']) !!}
			<div class="input-group-addon">m<sup>2</sup></div>
		</div>
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
	
	<div class="clearfix visible-xs-block">&nbsp;</div>
	
	<? $_ = 'building_area'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">建物面積@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<div class="input-group">
			{!! Form::text($_, Input::get($_, Input::old($_, array_get($defaults, $_, ''))), ['id' => $_, 'class' => 'form-control', 'placeholder' => '']) !!}
			<div class="input-group-addon">m<sup>2</sup></div>
		</div>
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
	
</div>

<div class="form-group mT30">
				
	<? $_ = 'price'; ?>
	<label for="<?= $_ ?>" class="control-label col-sm-3">価格@if(array_get($required, $_, false)) <span class="required"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">(必須)</span></span>@endif</label>
	<div class="col-sm-3">
		<div class="input-group">
			{!! Form::text($_, Input::get($_, Input::old($_, array_get($defaults, $_, ''))), ['id' => $_, 'class' => 'form-control', 'placeholder' => '']) !!}
			<div class="input-group-addon">万円</div>
		</div>
		
		{!! Form::hidden($_.'_ask', '') !!}
		{!! Form::checkbox($_.'_ask', '1',  Input::get($_.'_ask', Input::old($_, array_get($defaults, $_.'_ask', ''))) === '1', ['id' => $_.'_ask', 'class' => 'css-form']) !!}<label for="<?= $_.'_ask' ?>" class="mB0">ＡＳＫ</label>
		
		{!! Form::hidden($_.'_yet', '') !!}
		{!! Form::checkbox($_.'_yet', '1',  Input::get($_.'_yet', Input::old($_, array_get($defaults, $_.'_yet', ''))) === '1', ['id' => $_.'_yet', 'class' => 'css-form']) !!}<label for="<?= $_.'_yet' ?>" class="mB0">未定</label>
		
		<p class="help-block">ASK・未定にチェックでも可</p>
		
		{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
	</div>
</div>