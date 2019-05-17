<?
$visible = isset($visible) ? $visible : [];
$visible = array_merge([
    'article_purpose_type_id' => true,
    'article_category_id' => true,
    'article_trade_type_id' => true,
    'corporate_type_id' => true,
], $visible);

if ($visible['article_purpose_type_id']) {
    $article_purpose_types = isset($article_purpose_types) ? $article_purpose_types : 'article_purpose_types';
}
if ($visible['article_trade_type_id']) {
    $article_trade_types = isset($article_trade_types) ? $article_trade_types : 'article_trade_types';
}
?>
<section class="researchBox">
    <table>
        <tbody>
        <tr class="col-md-24 col-sm-24">
            <td class="clause">都道府県</td>
            <td class="btn">
                <div class="btnWhRed">
                    <a id="prefectures">選択</a>
                </div>
            </td>
            <td class="more" id="occupation_checkboxes">
                @if (!empty($data['pref_id']))
                    <a type="button" data-id="{{ $data['pref_id'] }}" class="btn btn-default close x-button-close-prefs"><span aria-hidden="true">{{ array_get(Config::get('dentaku.prefs'), $data['pref_id']) }}<label> ×</label></span></a>
                @endif
            </td>
        </tr>
        <tr class="col-md-24 col-sm-24">
            <td class="clause">市区町村</td>
            <td class="btn">
                <div class="btnWhRed">
                    <a id="municipality">選択</a>
                </div>
            </td>
            <td class="more" id="work_location_checkboxes">
                @if (!empty($data['areas']))
                    @foreach ($data['areas'] as $id_area => $value_area)
                        <a type="button" data-id="{{ $value_area }}" class="btn btn-default close x-button-close-area"><span aria-hidden="true">{{ $areas[$value_area] }}<label> ×</label></span></a>
                    @endforeach
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</section>
<section class="researchBox">
    <table>
        <tbody>
        <tr class="col-md-24 col-sm-24">
            <td class="clause">取引形態</td>
            <td class="btn">
                <div class="btnWhRed">
                    <a id="transaction_type">選択</a>
                </div>
            </td>
            <td class="more" id="transaction_type_checkboxes">
                @if (!empty($data['article_trade_type_id']))
                    <a type="button" data-id="{{ $data['article_trade_type_id'] }}" class="btn btn-default close x-button-close-transaction-type"><span aria-hidden="true">{{ array_get(Config::get('dentaku.article_trade_types'), $data['article_trade_type_id']) }}<label> ×</label></span></a>
                @endif
            </td>
        </tr>
        <tr class="col-md-24 col-sm-24">
            <td class="clause">物件タイプ</td>
            <td class="btn">
                <div class="btnWhRed">
                    <a id="property_category">選択</a>
                </div>
            </td>
            <td class="more" id="article_category_checkboxes">
                @if (!empty($data['category_type_ids']))
                    @foreach($data['category_type_ids'] as $id_category => $value_category)
                        <a type="button" data-id="{{ $value_category }}" class="btn btn-default close x-button-close-category-type"><span aria-hidden="true">{{ $article_categories[$value_category] }}<label> ×</label></span></a>
                    @endforeach
                @endif
            </td>
        </tr>
        {{--<tr class="col-md-24 col-sm-24">--}}
            {{--<td class="clause"></td>--}}
            {{--<td class="btn">--}}
                {{--<div class="btnWhRed">--}}
                    {{--<a id="property_type">選択</a>--}}
                {{--</div>--}}
            {{--</td>--}}
            {{--<td class="more" id="work_location_checkboxes aticle-category">--}}

            {{--</td>--}}
        {{--</tr>--}}
        </tbody>
    </table>
</section>
<div class="col-md-12" id="required">
    <div class="col-md-2" id="title-content-show">
        その他条件
    </div>
    <div class="col-md-5" >
        <? $_ = 'price_from' ?>
        <div class="form-detail">
{{--            @foreach(Config::get('dentaku.price_range') as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach--}}
            <div class="form-group select_style box-select1">
                <!-- <strong>目的</strong><br /> -->
                {!! Form::select($_, (['' => '価格の下限'] + Config::get('dentaku.price_range')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
            </div>
        </div>
        <div class="col-md-1 col-sm-1" id="about">~</div>
        <div class="form-detail" id="item-cut">
        <? $_ = 'price_to' ?>
{{--        @foreach(Config::get('dentaku.price_range') as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach--}}
            <div class=" form-group select_style box-select1">
                <!-- <strong>目的</strong><br /> -->
                {!! Form::select($_, (['' => '価格の下限'] + Config::get('dentaku.price_range')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                <i class="glyphicon glyphicon-triangle-bottom f11px"></i>
            </div>
    </div>
</div>
<div class="col-md-5">
    <div class="form-detail">
        <? $_ = 'area_from' ?>
        <div class="form-group select_style box-select1">
            <!-- <strong>目的</strong><br /> -->
            {!! Form::select($_, (['' => '価格の下限'] + Config::get('dentaku.building_area')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
            <i class="glyphicon glyphicon-triangle-bottom f11px"></i>
        </div>
    </div>
    <div class="col-md-1 col-sm-1" id="about">~</div>
        <div class="form-detail">
            <? $_ = 'area_to' ?>
            <div class=" form-group select_style box-select1">
                <!-- <strong>目的</strong><br /> -->
                {!! Form::select($_, (['' => '価格の下限'] + Config::get('dentaku.building_area')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                <i class="glyphicon glyphicon-triangle-bottom f11px"></i>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12" id="box2">
    <div class="col-md-2"></div>
    <div class="col-md-5">
            <? $_ = 'yeild' ?>
            <div class="form-group select_style box-select1">
                <!-- <strong>目的</strong><br /> -->
                {!! Form::select($_, (['' => '利回り'] + Config::get('dentaku.yeild')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                <i class="glyphicon glyphicon-triangle-bottom f11px"></i>
            </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="rightBox" id="search_form_btn">
    <input type="submit" class="btn btn-default color-FFFFFF btn-lg w100px" value="検索"/>
</div>
@include('_tpl.modal.modal_1')
@include('_tpl.modal.modal_2')
@include('_tpl.modal.modal_3')
@include('_tpl.modal.modal_4')
