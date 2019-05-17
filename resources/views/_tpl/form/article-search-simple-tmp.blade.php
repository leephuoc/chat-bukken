<section class="researchBox">
<div style="width: 100%; font-family:'Yu Gothic';">
    <div class="item">
        <? $_ = 'keyword'; ?>
        <div class="input-item c-flex">
            <span class="c-flex-title" style="font-weight: 500;">キーワード</span>
            <input type="text" name="keyword" placeholder="会社名、担当者名で検索" value="{{ isset($data['keyword']) ? $data['keyword'] : ''  }}" class="c-flex-content c-input">
        </div>
        <div class="middle">
            <div class="border-bottom">
                <div class="middle-content c-flex">
                    <span class="c-flex-title" style="font-weight: 500;">都道府県</span>
                    <div class="c-flex-content">
                        <div class="box-flex">
                            <div class="submit" style="display: flex; align-items: center;">
                                <a class="c-add x-button-prefs btn btn-default" data-toggle="modal" data-target="#modalPrefectures" style="border: 1px solid #5b87ff; height: 29px; width: 300px; font-weight: 500; padding: 3px 7px;">選択</a>
                            </div>
                            <div class="c-close x-tags-box-prefectures c-close-tag">
                                @if(!empty($data['pref_id']))
                                    <a data-id="{{ $data['pref_id'] }}" class="chip btn btn-default x-item-tag-prefectures" style="height: 27px; color: #333; font-weight:600; font-size: 11px;"><span>{{ array_get(Config::get('dentaku.prefs'), $data['pref_id']) }}</span><span class="icons-close-pop">&nbsp;</span></a>
                                    <span class="placeholder-search placeholder-prefs" style="font-size: 11px; color: #888; display: none;">&nbsp;&nbsp;&nbsp;選択されていません</span>
                                @else
                                    <span class="placeholder-search placeholder-prefs" style="font-size: 11px; color: #888;">&nbsp;&nbsp;&nbsp;選択されていません</span>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

                <div class="middle-content c-flex">
                    <span class="c-flex-title" style="font-weight: 500;">市区町村</span>
                    <div class="c-flex-content">
                        <div class="box-flex">
                            <div class="submit" style="display: flex; align-items: flex-start;">
                                <a class="c-add x-button-municipality btn btn-default" data-toggle="modal" data-target="#modalMunicipality" style="border: 1px solid #5b87ff; height: 29px; width: 300px; font-weight: 500; padding: 3px 7px;">選択</a>
                            </div>
                            <div class="c-close x-tags-box-municipality c-close-tag">
                                @if(!empty($data['areas']))
                                    @foreach($data['areas'] as $id_area)
                                        @if (!empty($areas[$id_area]))
                                            <a data-id="{{ $id_area }}" class="chip btn btn-default x-item-tag-municipality" style="height: 27px; color: #333; font-weight:600; font-size: 11px;"><span>{{ $areas[$id_area] }}</span><span class="icons-close-pop">&nbsp;</span></a>
                                        @endif
                                    @endforeach
                                        <span class="placeholder-search placeholder-areas" style="font-size: 11px; color: #888; display: none;">&nbsp;&nbsp;&nbsp;&nbsp;選択されていません</span>
                                @else
                                    <span class="placeholder-search placeholder-areas" style="font-size: 11px; color: #888;">&nbsp;&nbsp;&nbsp;&nbsp;選択されていません</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-bottom">
                <div class="middle-content c-flex">
                    <span class="c-flex-title" style="font-weight: 500;">取引形態</span>
                    <div class="c-flex-content">
                        <div class="box-flex">
                            <div class="submit" style="display: flex; align-items: flex-start;">
                                <a class="c-add x-button-transaction btn btn-default" data-toggle="modal" data-target="#modalTransactionType" style="border: 1px solid #5b87ff; height: 29px; width: 300px; font-weight: 500; padding: 3px 7px;">選択</a>
                            </div>
                            <div class="c-close x-tags-box-transaction-type c-close-tag">
                                @if (!empty($data['article_trade_type_ids']))
                                    @foreach($data['article_trade_type_ids'] as $article_trade_type_id)
                                        <a data-id="{{ $article_trade_type_id }}" class="chip btn btn-defaul x-item-tag-transaction-type" style="height: 27px; color: #333; font-weight:600; font-size: 11px;"><span>{{ array_get(Config::get('dentaku.condition_search_article_trade_type'), $article_trade_type_id) }}</span><span class="icons-close-pop">&nbsp;</span></a>
                                    @endforeach
                                        <span class="placeholder-transaction" style="font-size: 11px; color: #888; display: none;">&nbsp;&nbsp;&nbsp;&nbsp;選択されていません</span>
                                @else
                                    <span class="placeholder-transaction" style="font-size: 11px; color: #888;">&nbsp;&nbsp;&nbsp;&nbsp;選択されていません</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="middle-content c-flex">
                    <span class="c-flex-title" style="font-weight: 500;">物件タイプ</span>
                    <div class="c-flex-content">
                        <div class="box-flex">
                            <div class="submit" style="display: flex; align-items: flex-start;">
                                <a class="c-add x-button-property-category btn btn-default" data-toggle="modal" data-target="#modalPropertyCategory" style="border: 1px solid #5b87ff; height: 29px; width: 300px; font-weight: 500; padding: 3px 7px;">選択</a>
                            </div>
                            <div class="c-close x-tags-box-property-category c-close-tag">
                                @if(!empty($master_data) && !empty($data['category_type_ids']))
                                    @foreach($article_categories as $id_article_category => $name_article_category)
                                        @foreach($data['category_type_ids'] as $parent_id => $category_type_id)
                                            @if (in_array($id_article_category, $category_type_id))
                                                <a data-id="{{ $id_article_category }}" data-id-type-category="{{ $parent_id }}" class="chip btn btn-defaul x-item-tag-property-category" style="height: 27px; color: #333; font-weight:600; font-size: 11px;">
                                                    <span>{{ $name_article_category }}</span><span class="icons-close-pop">&nbsp;</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endforeach
                                        <span class="placeholder-category" style="font-size: 11px; color: #888; display: none;">&nbsp;&nbsp;&nbsp;&nbsp;選択されていません</span>
                                    @else
                                        <span class="placeholder-category" style="font-size: 11px; color: #888;">&nbsp;&nbsp;&nbsp;&nbsp;選択されていません</span>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="middle-content">
                <div id="required">
                    <span class="c-flex-title" style="font-weight: 500;" id="title-content-show">その他条件</span>
                    <div class="c-flex-content">
                        <div class="flex-tag" style="padding-left:22px;overflow: hidden; position: relative">
                            <div class="col-sm-6" >
                                <? $_ = 'price_from' ?>
                                <div class="form-detail">
                                    {{--            @foreach(Config::get('dentaku.price_range') as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach--}}
                                    <div class="form-group select_style box-select1">
                                        <!-- <strong>目的</strong><br /> -->
                                        {!! Form::select($_, (['' => '価格の下限'] + Config::get('dentaku.price_range')), isset($data[$_]) ? $data[$_] : '',['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                                        <i class="glyphicon icon-drop-down"></i>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1" id="about">~</div>
                                <div class="form-detail">
                                    <? $_ = 'price_to' ?>
                                    {{--        @foreach(Config::get('dentaku.price_range') as $key => $label) {!! Form::hidden($_.'['.$key.']', '') !!} @endforeach--}}
                                    <div class=" form-group select_style box-select1">
                                        <!-- <strong>目的</strong><br /> -->
                                        {!! Form::select($_, (['' => '価格の上限'] + Config::get('dentaku.price_range')), isset($data[$_]) ? $data[$_] : '',['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                                        <i class="glyphicon icon-drop-down"></i>
                                    </div>
                                </div>
                            </div>
                            <canvas id="myCanvas" width="50px" height="35px" style="position: absolute; left:44%"></canvas>
                            <script>
                                var c = document.getElementById("myCanvas");
                                var ctx = c.getContext("2d");
                                ctx.moveTo(50,0);
                                ctx.lineTo(0,100);
                                ctx.stroke();
                            </script>
                            <div class="col-sm-6">
                        <div class="form-detail">
                            <? $_ = 'area_from' ?>
                            <div class="form-group select_style box-select1">
                                <!-- <strong>目的</strong><br /> -->
                                {!! Form::select($_, (['' => '面積の下限'] + Config::get('dentaku.building_area')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                                <i class="glyphicon icon-drop-down"></i>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1" id="about">~</div>
                        <div class="form-detail">
                            <? $_ = 'area_to' ?>
                            <div class=" form-group select_style box-select1">
                                <!-- <strong>目的</strong><br /> -->
                                {!! Form::select($_, (['' => '面積の上限'] + Config::get('dentaku.building_area')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                                <i class="glyphicon icon-drop-down"></i>
                            </div>
                        </div>
                    </div>
                            <div class="col-sm-6">
                                <? $_ = 'yeild' ?>
                                <div class="form-group select_style box-select1">
                                    <!-- <strong>目的</strong><br /> -->
                                    {!! Form::select($_, (['' => '利回り'] + Config::get('dentaku.yeild')), Input::get($_),['id' => 'simple-'. $_, 'class' => 'form-control input-xs selectPerPages mR15']) !!}
                                    <i class="glyphicon icon-drop-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line" style="border-bottom: 1px dashed #888;"></div>
        <div class="footer-content">
            <button id="button-submit-search" class="btn btn-default color-FFFFFF btn-lg w100px">決定</button>
            <span></span>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPropertyCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="background: #E6E6E6;width: 60%;">
    <div class="modal-dialog" role="document" style="height:390px">
        <div class="title-symbol">
            <span><span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>物件タイプを選択する(複数選択可)</span>
            <div class="close-popup">
                <a class="x-close-modal" data-dismiss="modal" aria-label="Close"><img src="/images/icon-close.png"></a>
            </div>
        </div>
        <div class="line-dropdown" style="padding: 0;height: 304px">
            <div class="popup-inner">
            <? $i = 0; ?>
            @foreach($master_data as $key_master_data => $value_master_data)
                <? $i++; ?>

                <div class="dropdown-popup">
                    <div class="cloud">
                        <span style="padding-left: 10px;">
                            <input class="styled-checkbox-test checkall" id="styled-checkbox-{{ $i }}" type="checkbox">
                            <label for="styled-checkbox-{{ $i }}"><span style="vertical-align:middle;">{{ $key_master_data }}</span></label>
                        </span>
                        <div class="icon-arrow background-arrow-down @if($i==1) active @endif">
                            <i class="fas fa-angle-up arrow-up"></i>
                            <i class="fas fa-angle-down arrow-down"></i>
                        </div>
                    </div>
                    <div class="x-current-dropdow current-dropdow @if($i==1) active @endif">
                        <div class="x-show-dropdow-{{$i}} show-dropdow is-ov-hidden" style="max-height: inherit;">
                            @foreach($value_master_data as $key_article_category => $article_category)
                            <div class="flex-dropdown padding-3-0">
                                <span style="padding-left: 10px;">
                                    <input data-name="{{ $article_category->name }}" data-id-type-category="{{ $i }}" data-class-parent="x-show-dropdow-{{$i}}" data-input-check-all="styled-checkbox-{{ $i }}" class="x-property-category-checkbox styled-checkbox-test" id="styled-checkbox-{{ $i }}-{{ $article_category->id }}" value="{{ $article_category->id }}" type="checkbox">
                                    <label for="styled-checkbox-{{ $i }}-{{ $article_category->id }}" style="display: inline-flex;"><span style="vertical-align:middle;">{{ $article_category->name }}</span></label>
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="footer-content">
            <a class="btn btn-default btn-button x-button-modal-property-category" style="background: #2C354A;">決定</a>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTransactionType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="max-height: 360px;background: #E6E6E6;width: 60%;">
    <div class="modal-dialog" role="document">
        <div class="title-symbol">
            <span><span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>業種を選択する（複数選択可）</span>
            <div class="close-popup">
                <a class="x-close-modal" data-dismiss="modal" aria-label="Close"><img src="/images/icon-close.png"></a>
            </div>
        </div>
        <div class="line-dropdown">
            <div class="dropdown-popup">
                <div class="current-dropdow active" style="min-height:210px">
                    <div class="show-dropdow" style="max-height: 210px;">
                        @foreach(Config::get('dentaku.condition_search_article_trade_type') as $trade_type_id => $value)
                            <div class="flex-dropdown padding-3-0">
                                <span style="padding-left: 10px;">
                                    <input data-name="{{$value}}" class="x-transaction-type-checkbox styled-checkbox-test" id="styled-checkbox-transaction-type-{{$trade_type_id}}" value="{{$trade_type_id}}" type="checkbox">
                                    <label for="styled-checkbox-transaction-type-{{$trade_type_id}}" style="display: flex;"><span style="vertical-align:middle;">{{$value}}</span></label>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <a class="btn btn-default btn-button x-button-modal-transaction-type" style="background: #2C354A;">決定</a>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPrefectures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="max-height: 360px; background: #E6E6E6;width: 60%;">
    <div class="modal-dialog" role="document">
        <div class="title-symbol">
            <span><span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>都道府県を選択する</span>
            <div class="close-popup">
                <a class="x-close-modal" data-dismiss="modal" aria-label="Close"><img src="/images/icon-close.png"></a>
            </div>
        </div>
        <div class="line-dropdown">
            <div class="dropdown-popup">
                <div class="current-dropdow active">
                    <div class="show-dropdow" style="max-height: 210px;">
                        <? $_ = 'pref_id'; ?>
                        <? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
                        @foreach(Config::get('dentaku.prefs') as $prefs=>$value)
                            <div class="flex-dropdown padding-3-0">
                                <span style="padding-left: 10px;">
                                    <input data-name="{{$value}}" class="x-prefectures-checkbox styled-checkbox-test" id="styled-checkbox-prefectures-{{$prefs}}" value="{{$prefs}}" type="checkbox">
                                    <label for="styled-checkbox-prefectures-{{$prefs}}"><span style="vertical-align:middle;">{{$value}}</span></label>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <a class="btn btn-default btn-button x-button-modal-prefectures" style="background: #2C354A;">決定</a>
        </div>
    </div>
</div>
<div class="modal fade" id="modalMunicipality" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="max-height: 360px; background: #E6E6E6;width: 60%;">
    <div class="modal-dialog" role="document">
        <div class="title-symbol">
            <span><span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>エリアを選択する（複数選択可）</span>
            <div class="close-popup">
                <a class="x-close-modal" data-dismiss="modal" aria-label="Close"><img src="/images/icon-close.png"></a>
            </div>
        </div>
        <div class="line-dropdown">
            <div class="dropdown-popup">
                <div class="current-dropdow active">
                    <div class="show-dropdow x-list-checkbox-municipality" style="max-height: 210px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <a class="btn btn-default btn-button x-button-modal-municipality" style="background: #2C354A;">決定</a>
        </div>
    </div>
</div>
</section>

<style>
    .is-ov-hidden{
        overflow: hidden !important;
    }
    .img-reponsive {
        display: block;
        width: 100%;
    }
    button {
        outline: none;
    }
    .search {
        font-size: 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }
    .item {
        background: #f4f4f4;
        padding: 30px 30px 0 30px;
        margin-top: 15px;
    }
    .c-flex {
        display: flex;
        -webkit-display: flex;
    }
    .c-flex .c-flex-title {
        flex-basis: 10%;
        -webkit-flex-basis: 10%;
        max-width: 90%;
        padding: 6px 0;
    }
    .c-flex .c-flex-content {
        margin-left: 15px;
        flex-basis: 90%;
        -webkit-flex-basis: 90%;
        max-width: 90%;
    }
    .box-flex {
        display: flex;
        -webkit-display: flex;
    }
    .box-flex .submit {
        flex-basis: 8%;
        -webkit-flex-basis: 8%;
        max-width: 6.5%;
    }
    .box-flex .submit .c-add {
        border: 1px solid #5b87ff;
        border-radius: 5px;
        background: transparent;
        color: #5b87ff;
        height: 35px;
    }
    .box-flex .c-close {
        flex-basis: 92%;
        -webkit-flex-basis: 92%;
        max-width: 92%;
        line-height: 35px;
    }
    .box-flex .c-close .chip {
        margin-right: 6px;
        display: inline-block;
        padding: 0 15px;
        height: 25px;
        font-size: 16px;
        line-height: 25px;
        border-radius: 5px;
        background-color: #e6e6e6;
    }
    .box-flex .c-close .fas {
        padding-left: 10px;
        color: #ff4241;
        cursor: pointer;
    }
    .input-item {
        border-bottom: 1px dotted #888;
        padding-bottom: 15px;
    }
    .input-item .c-input {
        height: 35px;
        padding: 15px;
        max-width: 600px;
        outline: none;
    }
    .border-bottom {
        border-bottom: 1px dotted #888;
        padding-bottom: 15px;
    }
    .middle-content {
        padding: 15px 0 0;
    }
    .c-color-btn {
        color: #5b87ff;
        outline: none !important;
    }
    .c-color-btn:hover {
        color: #5b87ff;
    }
    .display-inline {
        display: flex;
        -webkit-display: flex;
        margin-bottom: 15px;
    }
    .display-inline .approximately {
        font-size: 24px;
        padding: 0 10px;
        color: #5b87ff;
    }
    .display-inline .line {
        width: 2px;
        height: 35px;
        background: #888;
        margin: 0 30px;
        transform: rotate(30deg);
    }
    .footer-content {
        text-align: center;
        padding: 15px;
        position: relative;
    }
    .footer-content .btn-button {
        padding: 7px 50px;
        background: #300f6d;
        color: #fff;
        border-radius: 5px;
        outline: none;
    }
    .footer-content span {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        color: #ff4241;
    }
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 700px;
        height: 430px;
        background: #ccc;
        padding: 20px;
        border-radius: 10px;
    }
    .popup.active {
        display: block;
    }
    .popup .title-symbol {
        font-size: 18px;
        padding-bottom: 10px;
        font-weight: bold;
        display: flex;
        -webkit-display: flex;
        justify-content: space-between;
        -webkit-justify-content: space-between;
    }
    .popup .title-symbol .font-red {
        color: #ff4241;
        padding: 0 5px;
    }
    .popup .title-symbol .close-popup {
        cursor: pointer;
    }
    .popup .title-symbol .fas {
        font-size: 24px;
    }
    .popup .line-dropdown {
        border-bottom: 1px dotted #888;
        border-top: 1px dotted #888;
        padding: 10px 0px;
    }
    .popup .dropdown-popup input[type=checkbox] {
        margin: 0 10px;
    }
    .popup .dropdown-popup .cloud {
        background: #fff;
        display: flex;
        -webkit-display: flex;
        justify-content: space-between;
        -webkit-justify-content: space-between;
        padding: 5px 0;
        margin: 10px 0;
    }
    .popup .dropdown-popup .fas {
        margin-right: 15px;
        margin-top: 3px;
    }
    .popup .dropdown-popup .current-dropdow {
        display: none;
    }
    .popup .dropdown-popup .current-dropdow.active {
        display: block;
    }
    .popup .dropdown-popup .current-dropdow.active .flex-dropdown.padding-3-0 span{
        display: block;
    }
    .popup .dropdown-popup .show-dropdow {
        display: flex;
        -webkit-display: flex;
        max-height: 80px;
        word-break: break-word;
        flex-wrap: wrap;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .popup .dropdown-popup .show-dropdow .flex-dropdown {
        flex-basis: 33.33333333%;
        -webkit-flex-basis: 33.33333333%;
        max-width: 33.333333333%;
    }
    .icon-arrow {
        cursor: pointer;
    }
    .icon-arrow .arrow-up {
        display: none;
    }
    .icon-arrow.active .arrow-up {
        display: block !important;
    }
    .icon-arrow.active .arrow-down {
        display: none !important;
    }
    .modal-open .modal {
        overflow-y: hidden;
    }
    .modal-dialog {
        width: 95%;
        margin: 0;
    }

    /* checkbox */

    .styled-checkbox-test {
        position: absolute;
        opacity: 0;
    }

    .styled-checkbox-test + label {
        position: relative;
        padding: 0 0 0 29px;
        cursor: pointer;
        margin: unset;
    }

    .styled-checkbox-test + label:before {
        position: absolute;
        top: 0;
        left: 0;
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        width: 21px;
        height: 21px;
        background: white;
        border: 1px solid;
        border-radius: 3px;
        display: block;
    }

    .styled-checkbox-test:hover + label:before {
        background: white;
    }

    .styled-checkbox-test:checked + label:before {
        background: white;
    }

    .styled-checkbox-test:disabled + label {
        color: #b8b8b8;
        cursor: auto;
    }

    .styled-checkbox-test:disabled + label:before {
        -webkit-box-shadow: none;
        box-shadow: none;
        background: #b8b8b8;
    }

    .styled-checkbox-test:checked + label:after {
        content: '';
        position: absolute;
        left: 5px;
        top: 10px;
        background: red;
        width: 3px;
        height: 3px;
        -webkit-box-shadow: 2px 0 0 red, 4px 0 0 red, 4px -2px 0 red, 4px -4px 0 red, 4px -6px 0 red, 4px -8px 0 red;
        box-shadow: 2px 0 0 red, 4px 0 0 red, 4px -2px 0 red, 4px -4px 0 red, 4px -6px 0 red, 4px -8px 0 red;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .padding-3-0 {
        padding: 3px 0px;
    }

    .modal:before {
        height: unset;
    }
    .popup-inner{
        max-height: 280px;
        overflow-y: auto;
    }
    .background-arrow-down {
        background-image: url('/images/icon-arrow-down.png');
        background-repeat: no-repeat;
        background-position-y: center;
        position: relative;
        right: 10px;
    }

    .background-arrow-up {
        background-image: url('/images/icon-arrow-up.png');
        background-repeat: no-repeat;
        background-position-y: center;
        position: relative;
        right: 10px;
    }

    .icon-arrow.active {
        background-image: url('/images/icon-arrow-up.png');
        background-repeat: no-repeat;
        background-position-y: center;
        position: relative;
        right: 10px;
    }
    .popup .dropdown-popup .show-dropdow .flex-dropdown{
        position: relative;
    }
    #button-submit-search {
        height: 40px;
        width: 200px !important;
        border-radius: 4px;
        margin-top: 15px;
        background-color: #2C354A;
        color: #fff;
        padding: 0;
        font-size: 16px;
    }
    .c-close-tag {
        margin-left: 10px;
    }
    .styled-checkbox-test {
        position: absolute;
        opacity: 0;
    }

    .styled-checkbox-test + label {
        position: relative;
        padding: 0 0 0 29px;
        cursor: pointer;
        margin: unset;
    }

    .styled-checkbox-test + label:before {
        position: absolute;
        top: 0;
        left: 0;
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        width: 21px;
        height: 21px;
        background: white;
        border: 1px solid;
        border-radius: 3px;
        display: block;
    }

    .styled-checkbox-test:hover + label:before {
        background: white;
    }

    .styled-checkbox-test:checked + label:before {
        background: white;
    }

    .styled-checkbox-test:disabled + label {
        color: #b8b8b8;
        cursor: auto;
    }

    .styled-checkbox-test:disabled + label:before {
        -webkit-box-shadow: none;
        box-shadow: none;
        background: #b8b8b8;
    }

    .styled-checkbox-test:checked + label:after {
        content: '';
        position: absolute;
        left: 5px;
        top: 10px;
        background: red;
        width: 3px;
        height: 3px;
        -webkit-box-shadow: 2px 0 0 red, 4px 0 0 red, 4px -2px 0 red, 4px -4px 0 red, 4px -6px 0 red, 4px -8px 0 red;
        box-shadow: 2px 0 0 red, 4px 0 0 red, 4px -2px 0 red, 4px -4px 0 red, 4px -6px 0 red, 4px -8px 0 red;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .padding-3-0 {
        padding: 3px 0px;
    }

    .modal:before {
        height: unset;
    }
    .popup-inner{
        max-height: 280px;
        overflow-y: auto;
    }
    .background-arrow-down {
        background-image: url('/images/icon-arrow-down.png');
        background-repeat: no-repeat;
        background-position-y: center;
        position: relative;
        right: 10px;
    }

    .background-arrow-up {
        background-image: url('/images/icon-arrow-up.png');
        background-repeat: no-repeat;
        background-position-y: center;
        position: relative;
        right: 10px;
    }

    .icon-arrow.active {
        background-image: url('/images/icon-arrow-up.png');
        background-repeat: no-repeat;
        background-position-y: center;
        position: relative;
        right: 10px;
    }
    .popup .dropdown-popup .show-dropdow .flex-dropdown{
        position: relative;
    }
    .icon-drop-down {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 8px solid #036bd5;
    }
</style>

