<?
	$visible = isset($visible) ? $visible : [];
	$visible = array_merge([
		'article_purpose_type_id' => true,
		'article_category_id' => true,
		'article_trade_type_id' => true,
		'corporate_type_id' => true,
	], $visible);

	if($visible['article_purpose_type_id'])
	{
		$article_purpose_types = isset($article_purpose_types) ? $article_purpose_types : 'article_purpose_types';
	}
	if($visible['article_trade_type_id'])
	{
		$article_trade_types = isset($article_trade_types) ? $article_trade_types : 'article_trade_types';
	}

?>
<div style="display:none">
	<div id="formSearchBox">
		<div class="leftText" style="padding: 30px 50px;">

			<? $_ = 'article_purpose_type_id'; ?>
			@if(!empty($visible[$_]))
				@foreach(Config::get('dentaku.'.$article_purpose_types) as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach
				<div class="row">
					<strong>目的</strong> ( 複数選択可 )
				</div>
				<div class="row" style="padding:10px 0; border-bottom: 1px solid #DFDFDF;">
					{!! Form::hidden($_, '') !!}
					<div data-toggle="buttons">
						<? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
						@foreach(Config::get('dentaku.'.$article_purpose_types) as $key => $label)
							<label for="{!! $_.$key !!}" class="btn btn-default btn-sm mB5 @if(in_array($key, $input)) active @endif" style="width:120px;">
								{!! Form::checkbox($_.'['.$key.']', $key, in_array($key, $input), ['id' => $_.$key]) !!} {!! $label !!}
							</label>
						@endforeach
					</div>
				</div>
			@endif


			<? $_ = 'article_category_id'; ?>
			@if(!empty($visible[$_]))
				@foreach(\App\ArticleCategory::orderBy('rank')->get() as $articleCategory) {!! Form::hidden($_.'['.$articleCategory->id.']', '') !!} @endforeach
				<div class="row mT20">
					<strong>カテゴリ</strong> ( 複数選択可 )
				</div>
				<div class="row" style="padding:10px 0; border-bottom: 1px solid #DFDFDF;">
					{!! Form::hidden($_, '') !!}
					<div data-toggle="buttons">
						<? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
						@foreach(\App\ArticleCategory::orderBy('rank')->get() as $articleCategory)
							<label for="{!! $_.$articleCategory->id !!}" class="btn btn-default btn-sm mB5 @if(in_array($articleCategory->id, $input)) active @endif" style="width:120px;">
								{!! Form::checkbox($_.'['.$articleCategory->id.']', $articleCategory->id, in_array($articleCategory->id, $input), ['id' => $_.$articleCategory->id]) !!} {!! $articleCategory->name !!}
							</label>
						@endforeach
					</div>
				</div>
			@endif

			<? $_ = 'article_trade_type_id'; ?>
			@if(!empty($visible[$_]))
				@foreach(Config::get('dentaku.article_trade_types') as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach
				<div class="row mT20">
					<strong>取引形態</strong> ( 複数選択可 )
				</div>
				<div class="row" style="padding:10px 0; border-bottom: 1px solid #DFDFDF;">
					<div data-toggle="buttons">
						<? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
						@foreach(Config::get('dentaku.article_trade_types') as $key => $label)
							<label for="{!! $_.$key !!}" class="btn btn-default btn-sm mB5 @if(in_array($key, $input)) active @endif" style="width:95px;">
								{!! Form::checkbox($_.'['.$key.']', $key, in_array($key, $input), ['id' => $_.$key]) !!} {!! $label !!}
							</label>
						@endforeach
					</div>
				</div>
			@endif
			@if($login_user->corporate->corporate_type_id == Config::get('dentaku.corporate_type.re'))
			<? $_ = 'corporate_type_id'; ?>
			@if(!empty($visible[$_]))
				@foreach(Config::get('dentaku.corporate_types') as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach
				<div class="row mT20">
					<strong>業種</strong> ( 複数選択可 )
				</div>
				<div class="row" style="padding:10px 0; border-bottom: 1px solid #DFDFDF;">
					{!! Form::hidden($_, '') !!}
					<div data-toggle="buttons">
						<? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
						@foreach(Config::get('dentaku.corporate_types') as $key => $label)
							<label for="{!! $_.$key !!}" class="btn btn-default btn-sm mB5 @if(in_array($key, $input)) active @endif" style="width:120px;">
								{!! Form::checkbox($_.'['.$key.']', $key, in_array($key, $input), ['id' => $_.$key]) !!} {!! $label !!}
							</label>
						@endforeach
					</div>
				</div>
			@endif
			@endif

			<? $_ = 'pref_id'; ?>
			<div class="row mT20">
				<strong>都道府県</strong>
			</div>
			<div class="row" style="padding:10px 0; border-bottom: 1px solid #DFDFDF;">
				<div data-toggle="buttons">
					<? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
					{!! Form::select($_, (['' => '指定なし'] + Config::get('dentaku.prefs')), Input::get($_), ['id' => $_, 'class' => 'selectpicker-dialog show-tick']) !!}
					{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
				</div>
			</div>
			<?php if(isset($areas)): ?>
				<? $_ = 'area_id'; ?>
				<div class="row mT20">
					<strong>市区町村</strong>
				</div>
				<div class="row" style="padding:10px 0; border-bottom: 1px solid #DFDFDF;">
					<div data-toggle="buttons">
						<? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
						{!! Form::select($_.'[]', $areas, Input::get($_, Input::old($_)), ['id' => $_, 'class' => 'selectpicker-dialog show-tick', 'data-max-options' => '3', 'data-not-empty' => '1', 'multiple' => 'multiple', 'data-width' => '100%']) !!}
						<p class="help-block">３つまで選択できます</p>
						{!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
