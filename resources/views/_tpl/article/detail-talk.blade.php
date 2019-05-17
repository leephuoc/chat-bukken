<div class="buyer-info post-detail">
    @include('_tpl.modal.modal_info_corporate')
    <?php
        if (!empty($article->article_trade_type_id)) {
            if ($article->article_trade_type_id == 1) {
                $data['bg_article_trade_type'] = 'article-red';
            }

            if ($article->article_trade_type_id == 2) {
                $data['bg_article_trade_type'] = 'article-blue';
            }

            if ($article->article_trade_type_id == 3) {
                $data['bg_article_trade_type'] = 'article-red-light';
            }

            if ($article->article_trade_type_id == 4) {
                $data['bg_article_trade_type'] = 'article-blue-light';
            }

            if ($article->article_trade_type_id == 5) {
                $data['bg_article_trade_type'] = 'article-green';
            }
        }
    ?>
    <?php use App\Helpers\Common;?>
    <div class="buyer-list article-detail">
        <div class="buyer-inner">
            <div class="trademark">
                <div class="trademark-brokerage @if (!$article->isBlock($login_user)) company-logo @endif" data-id_corporate="{{ $corporate->id }}">
                    <div class="circle-brokerage-type {{ $data['bg_article_trade_type'] }}">
                        <p>{{ $data['article_trade_type_id_short'] }}</p>
                    </div>
                    <div class="logo-trade">
                        <a href="javascript:;" data-toggle="modal" data-target="#modal-division"
                           data-user-id="{{ !empty($user->id) ? $user->id : '' }}" data-id="{{ !empty($corporate->id) ? $corporate->id : '' }}"
                           data-type="{{ !empty($corporate->corporate_type_id2key) ? $corporate->corporate_type_id2key : '' }}">
                            @if(!empty($corporate->logo_exists))
                                <img src="{{ $corporate->logo_url }}" class="img-circle logo-host" alt=""
                                     style=" width: 100px;">
                            @else
                                <img src="/data/img/noimage.png" class="img-circle logo-host" alt="" width="100"
                                     height="100!important">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="trademark-caption">
                    <div class="trademark-caption-inner">
                        <p class="para-rating">
                            <span class="">&nbsp;</span>
                        </p>
                        <p class="real-estate">{{ !empty($corporate->full_name) ? $corporate->full_name : '' }}</p>
                        <p class="property-taro">{{ !empty($user->name) ? $user->name : '' }}</p>
                    </div>
                </div>
            </div>
            <div class="parameter-detail">
                @if($article->name)
                    <p class="posted-title"><b>{{ $article->name }}</b></p>
                @endif
                <p class="para-properties articleInfo">{!! nl2br(e($article->comment)) !!}</p>
                <div class="table-info">
                    <div class="table-responsive table-scroll">
                        <div class="table-line">
                            <table class="table">
                                <tbody>

                                @if(!empty($data['article_trade_type_id']))
                                    <tr>
                                        <th>取引形態</th>
                                        <td>{{ $data['article_trade_type_id'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty($data['article_category_name']))
                                    <tr>
                                        <th>物件カテゴリ</th>
                                        <td>{{ $data['article_category_name'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty($data['article_category_type_name']))
                                    <tr>
                                        <th>物件タイプ</th>
                                        <td>{{ $data['article_category_type_name'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty($data['recruitment_period']))
                                    <tr>
                                        <th>募集期間</th>
                                        <td>{{ $data['recruitment_period'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty($data['pref_id']))
                                    <tr>
                                        <th>都道府県</th>
                                        <td>{{ $data['pref_id'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty($data['areas']))
                                    <tr>
                                        <th>市区町村</th>
                                        <td>{{ $data['areas'] }}</td>
                                    </tr>
                                @endif
                                @if(!empty($data['price_range_from']) || !empty($data['price_range_to']))
                                    <tr>
                                        <th>価格帯</th>
                                        <td>{{ $data['price_range_from'] }}{{ $data['price_range_to'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'yeild'))
                                    <tr>
                                        <th>利回り</th>
                                        <td> {{ $data['yeild'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'land_area_from'))
                                    <tr>
                                        <th>土地面積</th>
                                        <td>{{ $data['land_area_from'] }}{{ $data['land_area_to'] }}</td>
                                    </tr>
                                @endif
                                @if (Common::checkShowStep4Dentaku($data, 'building_area_from'))
                                    <tr>
                                        <th>建物面積</th>
                                        <td>{{ $data['building_area_from'] }}{{ $data['building_area_to'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'age_from'))
                                    <tr>
                                        <th>築年数</th>
                                        <td>{{ $data['age_from'] }}{{ $data['age_to'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'construction'))
                                    <tr>
                                        <th>構造</th>
                                        <td>{{ substr($data['construction'], 0, strlen($data['construction']) - 1) }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'floor_plan'))
                                    <tr>
                                        <th>間取り</th>
                                        <td>{{ $data['floor_plan'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'access'))
                                    <tr>
                                        <th>接道</th>
                                        <td>{{ $data['access'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'frontage'))
                                    <tr>
                                        <th>間口</th>
                                        <td>{{ $data['frontage'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'capacity'))
                                    <tr>
                                        <th>収容台数</th>
                                        <td>{{ $data['capacity'] }}</td>
                                    </tr>
                                @endif
                                @if(Common::checkShowStep4Dentaku($data, 'industry'))
                                    <tr>
                                        <th>業種</th>
                                        <td>{{ $data['industry'] }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="time">
                        <span class="mR25">{{ $data['updated_at'] }} </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="chatbox-buyer">
        <div class="chatbox-inner">
            <div class="comment-above">
                <table>
                    <thead>
                    <tr>
                        <td class="userInfoBox">

                        </td>
                    <tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td>

                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td class="message-body scrollArea">
                            <div class="scroll-message">
                                <ul style="height: 586px;overflow-y: scroll; overflow-x: hidden">
                                    
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="chatbox-post">
                <table class="talkTools">
                    <tr>
                        <td colspan="2">
                            <div class="chatbox-form">
                                <div class="chatbox-group">
                                    {!! Form::textarea($_ = 'talk_item_text', '', ['id' => $_, 'class' =>'form-control', 'placeholder' => 'コメントを入力する...', 'rows' => '7', 'maxlength' => '450']) !!}
                                </div>
                            </div>
                        </td>
                    <tr>
                    <tr>
                        <td>
                            <div class="icon-file d-flex" data-toggle="tooltip" data-placement="right">
                                {!! Form::file('file', ['id' => 'talkFile', 'title' => 'pdf, jpg, png, gif, docx, doc）ファイルを送信できます']) !!}
                                <a class="btn-show-chat-template" data-toggle="modal" data-target="#modal-list-template">
                                    <img src="/data/img/chat_template_icon.png" class="img-chat-template" width="20" height="20" title="テンプレートを利用">
                                </a>
                            </div>
                        </td>
                        <td>
                            <input id="sendMessageBtn" type="button" class="btn-message-send btn btn-xs" value="送信"/>
                        </td>
                    <tr>
                    <tr>
                        <td colspan="2">
                            <div id="errorFile" class="mT10"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

{{--modal list template--}}
<div class="modal modal-select-search fade" id="modal-list-template" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content list-template">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&nbsp;</button>
                <h4 class="modal-title">
                    <span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>
                    メッセージ用テンプレートを選択する
                </h4>
            </div>
            <div class="modal-body">
                <div class="nav-btn-group">
                    <a class="btn btn-default text-primary list-template-go-add">
                        新しいテンプレートを作成する
                    </a>
                    <a class="btn btn-default delete-template @if (count($templates) == 0) hide-when-no-data @endif">
                        削除
                    </a>
                    <a class="btn btn-default list-template-go-edit @if (count($templates) == 0) hide-when-no-data @endif">
                        編集
                    </a>
                </div>
                <div class="alert alert-danger alert-template-custom alert-dismissible fade in" id="error-dont-check" role="alert">
                    <a href="#" class="close">&times;</a>
                    {{ trans('validation.template.edit_multi') }}
                </div>
                <div class="panel-scroll" style="overflow-y: auto; overflow-x: hidden;">
                    <?php $i = 0; ?>
                    @forelse ($templates as $template)
                        <?php $i++; ?>
                        <div class="panel-group" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default dropdown-popup">
                                <div class="panel-heading" role="tab" id="heading-{{ $i }}">
                                    <h4 class="panel-title">
                                        <input class="styled-checkbox-test js-template-checkbox" id="checkbox-template-{{ $i }}" data-id="{{ $template->template_id }}" type="checkbox">
                                        <label for="checkbox-template-{{ $i }}" class="fix-checked"><span>{{ htmlentities($template->title) }}</span></label>
                                        <a class="collapse-drop @if ($i == 1) active @endif" data-id-category="{{ $i }}" role="button" data-toggle="collapse" href="#collapse-{{ $i }}" aria-expanded="true" aria-controls="collapse-{{ $i }}">&nbsp;</a>
                                    </h4>
                                </div>
                                <div id="collapse-{{ $i }}" class="panel-collapse x-show-dropdow collapse @if ($i == 1) in @endif" role="tabpanel" style="" aria-expanded="@if ($i == 1) true @else false @endif">
                                    <div class="panel-body x-show-dropdow-{{ $i }}">
                                        <div class="template-content">{{ htmlentities($template->content) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="template-empty">
                            「新しいテンプレートを作成する」ボタンで新しいテンプレートを作成してください。
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-decide btn-load-data-temp @if (count($templates) == 0) hide-when-no-data @endif" data-dismiss="modal">挿入</button>
            </div>
        </div>

        <!-- add template modal -->
        <div class="modal-content add-template" style="display: none;">
            <form id="form-add-template" class="validate-template-form" method="POST">
                <div class="modal-header">
                    <button type="button" class="close add-template-go-list" id="addTempCloseBtn">&nbsp;</button>
                    <h4 class="modal-title">
                        <span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>
                        メッセージ用テンプレートを作成する
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title-add">テンプレート名</label>
                        <input type="text" name="title" class="form-control" id="title-add" placeholder="例：挨拶テンプレート">
                    </div>
                    <div class="form-group">
                        <label for="content-add">テンプレートの内容</label>
                        <textarea type="text" name="content" class="form-control" id="content-add"
                                  placeholder="例：
○○株式会社○○の部○○です。
○○の目的で、○○エリア辺りで○○用地を紹介させて頂きます。○○坪以上で、○○万円くらい。。。" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-decide btn-change-db">登録</button>
                </div>
            </form>
        </div>

        <!-- modal edit template -->
        <div class="modal-content edit-template" style="display: none;">
            <form id="form-edit-template" class="validate-template-form" method="POST">
                <div class="modal-header">
                    <button type="button" class="close edit-template-go-list" id="editTempCloseBtn">&nbsp;</button>
                    <h4 class="modal-title">
                        <span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>
                        メッセージ用テンプレートを編集する
                    </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editedId" value="">
                    <div class="form-group">
                        <label for="title-edit">テンプレート名</label>
                        <input type="text" name="title" class="form-control" id="title-edit" placeholder="例：挨拶テンプレート">
                    </div>
                    <div class="form-group">
                        <label for="content-edit">テンプレートの内容</label>
                        <textarea type="text" name="content" class="form-control" id="content-edit"rows="10"
                                  placeholder="例：
○○株式会社○○の部○○です。
○○の目的で、○○エリア辺りで○○用地を紹介させて頂きます。○○坪以上で、○○万円くらい。。。"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-decide btn-change-db">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal delete confirm -->
<div id="modal-delete-template" class="modal fade" role="dialog" style="z-index: 1600;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="bootstrap-dialog-body">
                    <div class="bootstrap-dialog-message">
                        <span class="dialog-icon dialog-icon-notice">&nbsp;</span>
                        <h2>このテンプレートを削除してもよろしいですか？</h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default border-transparent" data-dismiss="modal">キャンセル</button>
                <button type="button" class="btn btn-primary" id="btnDelete">削除</button>
            </div>
        </div>
    </div>
</div>
{{--modal error database--}}
<div id="modal-error-db" class="modal fade" role="dialog" style="z-index: 1600;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="bootstrap-dialog-body">
                    <div class="bootstrap-dialog-message">
                        <span class="dialog-icon dialog-icon-notice">&nbsp;</span>
                        <h2>システムが異常が発生しています。</h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default border-transparent" data-dismiss="modal">画面に戻る</button>
            </div>
        </div>
    </div>
</div>
<script>
   function modal() {
       $('button.modal-show').click();
   }
</script>
<style>
    /*----- reset -----*/
    html,
    body,
    div,userInfo
    span,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    a,
    address,
    em,
    img,
    strong,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    thead,
    tbody,
    tfoot,
    tr,
    th,
    td {
        border: 0;
        font-family: inherit;
        font-size: 100%;
        margin: 0;
        outline: 0;
        padding: 0;
    }

    :focus {
        outline: 0;
    }

    ol,
    ul {
        list-style: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }

    img {
        vertical-align: top
    }

    /*----- common -----*/
    body {
        background-color: #fff;
        color: #000;
        font: normal normal 100% 'メイリオ', Meiryo, sans-serif;
        line-height: 1.5em;
        font-size: 14px;
    }

    input {
        border: 0
    }

    a:link,
    a:visited {
        color: #114285;
    }

    a:hover {
        color: #94c03d
    }

    img {
        width: auto \9;
        height: auto;
        max-width: 100%;
        vertical-align: middle;
        -ms-interpolation-mode: bicubic;
    }

    /*wrapper*/
    #wrapper {
        height: auto;
        margin: 0 auto;
        padding: 0;
    }

    .container {
        margin: 0 auto;
        width: 1030px;
    }

    /*----- Header -----*/
    #header {
        background-color: #2e3548;
        color: #fff;

    }

    .tmp_hlogo h1,
    .tmp_hlogo p {
        display: block;
        width: 144px;
        height: 32px;
        background: url(/data/img/front/logo.png) no-repeat left top;
    }

    .tmp_hlogo a {
        display: block;

        height: 32px;
    }

    .tmp_hlogo h1 span,
    .tmp_hlogo p span {
        display: block;
        width: 144px;
        height: 32px;
        position: relative;
        z-index: -1;
        overflow: hidden;
    }

    .header-aside {

    }

    .header-aside:before,
    .header-aside:after,
    .navigation:before,
    .navigation:after,
    .navigation ul:before,
    .navigation ul:after {
        content: "";
        display: table;
    }

    .navigation:after,
    .navigation ul:after,
    .header-aside:after {
        clear: both;
    }

    .navigation {

    }

    .navigation ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .navigation ul li {
    }

    .navigation ul li a {
        display: block;
        text-align: center;
        text-decoration: none;
    }

    .navigation ul li a:hover,
    .navigation ul li a:focus {
        text-decoration: none;
    }

    .navigation ul li a .nav-symbol {
        margin-bottom: 8px;
        display: inline-block;
        width: 61px;
        height: 61px;
        text-align: center;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    .navigation ul li a .nav-symbol .icons-nav-search,
    .navigation ul li a .nav-symbol .icons-nav-pen {
        margin-top: 15px;
    }

    .navigation ul li a .nav-symbol .icons-nav-history {
        margin-top: 14px;
    }

    .navigation ul li a .nav-text {
        color: #fff;
        display: block;

    }

    .navigation ul li a:hover .nav-text,
    .navigation ul li a:focus .nav-text {
        text-decoration: none;
    }

    .navigation ul li.active a .nav-symbol,
    .navigation ul li a:hover .nav-symbol,
    .navigation ul li a:focus .nav-symbol {
        background-color: #8d9ab1;
    }

    .setting-link {
        float: right;
        width: 124px;
    }

    .setting-link a {
        margin-bottom: 9px;
        padding: 5px 6px;
        display: block;
        text-align: center;
        line-height: 1.2;
        color: #fff;
        background-color: #8e9cb3;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        font-size: 12px;
    }

    .setting-link a:hover,
    .setting-link a:focus {
        text-decoration: none;
        background-color: #8cb2f1;
    }

    .setting-link a:last-child {
        margin-bottom: 0;
    }

    #breadcrumb {
        background-color: #cad0df;
    }

    #breadcrumb .breadcrumb {
        padding: 5px 0;
        margin: 0;
        background-color: #cad0df;
    }

    #breadcrumb .breadcrumb > li + li:before {
        font-family: 'Glyphicons Halflings';
        -webkit-font-smoothing: antialiased;
        font-style: normal;
        font-weight: 400;
        color: #2C354A;
        content: "\e258";
        position: relative;
        top: 1px;
        margin-right: 5px;
    }

    #breadcrumb .breadcrumb > li a {
        color: #337ab7;
        text-decoration: none;
    }

    #breadcrumb .breadcrumb > li a:focus,
    #breadcrumb .breadcrumb > li a:hover {
        color: #23527c;
        text-decoration: underline;
    }

    /*paging*/
    .paginater .pagination > li:first-child > a,
    .paginater .pagination > li:first-child > span {
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
        margin: 0 5px 5px;
    }

    .paginater .pagination > li:last-child > a,
    .paginater .pagination > li:last-child > span {
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
        margin: 0 5px 5px;
    }

    .paginater .pagination > li > a,
    .paginater .pagination > li > span {
        font-size: 12px;
    }

    .paginater .pagination > li > a,
    .paginater .pagination > li > span {
        margin: 0 5px 5px;
        border-color: #d6dae4;
        color: #2c354a;
    }

    .paginater .pagination > .active > a,
    .paginater .pagination > .active > a:focus,
    .paginater .pagination > .active > a:hover,
    .paginater .pagination > .active > span,
    .paginater .pagination > .active > span:focus,
    .paginater .pagination > .active > span:hover {
        color: #fff;
        border-color: #2c354a;
        background-color: #2c354a;
    }

    /*----- Content -----*/
    #main-content {
        min-height: 100%;
    }
    /**
 * DENTAKU
 */
    .dentakuModeDelete {
        display: none;
    }

    a.popupInfoCorporate,
    a.popupInfoUser {
        cursor: pointer !important;
        text-decoration: none;
        color: #000;
    }

    #popupInfoCorporateBox table.userInfo,
    #popupInfoUserBox table.userInfo {
        width: 100%;
        margin: 0 auto;
        color: #000;
    }

    #popupInfoCorporateBox table.userInfo td,
    #popupInfoUserBox table.userInfo td {
        height: 120px;
        vertical-align: middle;
    }

    #popupInfoCorporateBox table.userInfo td:first-child,
    #popupInfoUserBox table.userInfo td:first-child {
        width: 100px;
        padding-left: 14px;
        padding-right: 14px;

    }
    #popupInfoCorporateBox table.userInfo td:last-child,
    #popupInfoUserBox table.userInfo td:last-child {
        padding-right: 14px;
        text-align: left;
    }

    #popupInfoCorporateBox table.userInfo td:last-child strong,
    #popupInfoUserBox table.userInfo td:last-child strong {
        font-size: 18px;
    }

    #popupInfoCorporateBox table.userInfo td img.img-circle,
    #popupInfoUserBox table.userInfo td img.img-circle {
        width: 90px;
        height: auto;
    }

    #popupInfoCorporateBox .form-horizontal .form-control-static,
    #popupInfoUserBox .form-horizontal .form-control-static {
        text-align: left;
    }
    #exampleModal .modal-content{
        background: #ffffff;
    }

    /* ==================================================
    Start property conference
    ================================================== */
    .btn-file{
        padding-left: 2px;
        width: 25px;
    }
    .main-inner {
        padding-top: 25px;
    }

    .conference-title {
        margin-bottom: 10px;
        padding: 0 0 10px 29px;
        font-size: 16px;
        color: #282b30;
        font-weight: bold;
        border-bottom: 1px solid #c3c5cb;
        background: url(../img/front/icon-search.png) no-repeat 0 0 scroll;
    }

    .panel-search {
        padding: 25px 40px;
        margin-bottom: 32px;
        color: #000000;
        background-color: #f4f4f4;

    }

    .group-search:before,
    .group-search:after,
    .group-search .group-search-item:before,
    .group-search .group-search-item:after,
    .group-search .search-nearby .search-main:before,
    .group-search .search-nearby .search-main:after,
    .select-row:before,
    .select-row:after,
    .select-separate:before,
    .select-separate:after {
        content: "";
        display: table;
    }

    .group-search:after,
    .group-search .group-search-item:after,
    .group-search .search-nearby .search-main:after,
    .select-row:after,
    .select-separate:after {
        clear: both;
    }

    .group-search {
        padding: 15px 0;
        border-bottom: 1px dotted #a5a5a5;
    }

    .group-search .search-nearby .form-control {
        border: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
    }

    .group-search .search-nearby select.form-control,
    .group-search .search-nearby select.form-control option {
        text-align: center;
    }

    .group-search .search-nearby .form-control:focus {
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .group-submit {
        position: relative;
        margin-top: 20px;
        text-align: center;
    }

    .group-submit .btn-search-keyword,
    .btn-decide {
        padding: 10px 12px;
        text-align: center;
        display: inline-block;
        min-width: 200px;
        font-size: 15px;
        line-height: 1.2;
        color: #fff;
        background-color: #2c354a;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
    }

    .btn-decide:hover,
    .btn-decide:focus,
    .group-submit .btn-search-keyword:hover,
    .group-submit .btn-search-keyword:focus {
        color: #fff;
        text-decoration: underline;
    }

    .group-submit a.btn-clear-condition,
    a.btn-clear-popup {
        position: absolute;
        right: 0;
        top: 10px;
        color: #db0808;
        font-size: 12px;
        display: inline-block;
        vertical-align: middle;
    }

    a.btn-clear-popup:hover,
    a.btn-clear-popup:focus,
    .group-submit .btn-clear-condition:hover,
    .group-submit .btn-clear-condition:focus {
        text-decoration: underline;
    }

    .group-search .group-search-item {
        margin-bottom: 20px;
    }

    .group-search .group-search-item:last-child {
        margin-bottom: 0;
    }

    .group-search .search-label {
        padding-right: 10px;
        float: left;
        width: 120px
    }

    .group-search .search-label .search-keyword {
        font-size: 12px;
        color: #000;
        display: inline-block;
        padding-top: 4px;
    }

    .group-search .search-label-input .search-keyword {
        padding-top: 9px;
    }

    .group-search .search-nearby {
        margin-left: 120px;
    }

    .group-search .search-main .action-choice {
        padding: 0 10px;
        float: left;
        width: 75px;
    }

    .group-search .search-main .action-choice a {
        padding: 5px 7px 4px;
        line-height: 1.2;
        font-size: 12px;
        font-weight: 500;
        display: inline-block;
        color: #036bd5;
        border: 1px solid #5b87ff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }

    .group-search .search-main .action-choice a:hover,
    .group-search .search-main .action-choice a:focus {
        text-decoration: underline;
    }

    .group-search .search-main .category-tags {
        margin-left: 75px;
    }

    .category-tags .tags-item {
        margin: 0 4px 4px 0;
        padding: 6px 15px 5px;
        font-size: 12px;
        vertical-align: top;
        display: inline-flex;
        -webkit-display: inline-flex;
        align-items: center;
        -webkit-align-items: center;
        line-height: 1.2;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        color: #333;
        background-color: #e6e6e6;
        text-decoration: none;
    }

    .category-tags .tags-item:last-child {
        margin-bottom: 0;
    }

    .category-tags .tags-item span {
        display: inline-block;
        vertical-align: middle;
    }

    .category-tags .tags-item:hover .tags-text,
    .category-tags .tags-item:focus .tags-text {
        text-decoration: underline;
    }

    .icons-close-pop {
        position: relative;
        top: -1px;
        margin-left: 8px;
        display: inline-block;
        vertical-align: middle;
        width: 8px;
        height: 8px;
        background: url(../img/front/icons-close.png) no-repeat scroll;
    }

    .select-row {
        margin: 0 -36px;
        overflow: hidden;
    }

    .select-row .select-col {
        position: relative;
        padding: 0 36px;
        float: left;
        width: 50%;
    }

    .select-row:first-child .select-col:nth-child(1):after {
        content: "";
        display: inline-block;
        position: absolute;
        right: -9px;
        top: 2px;
        width: 19px;
        height: 31px;
        background: url(../img/front/bg-line.png) no-repeat scroll;
    }

    .select-separate {
        margin: 0 -14px;
        overflow: hidden;
    }

    .select-separate .separate-item {
        position: relative;
        padding: 0 14px;
        float: left;
        width: 50%;
        margin-bottom: 10px;
    }

    .select-separate .separate-item:nth-child(2):before {
        content: '〜';
        color: #036bd5;
        font-size: 14px;
        font-weight: bold;
        line-height: 14px;
        display: inline-block;
        position: absolute;
        left: -6px;
        top: 10px;
    }

    .select-separate select.form-control {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #036bd5;
        font-size: 12px;
        border: 0;
    }

    .panel-result:before,
    .panel-result:after,
    .panel-result .result-heading:before,
    .panel-result .result-heading:after {
        content: "";
        display: table;
    }

    .panel-result:after,
    .panel-result .result-heading:after {
        clear: both;
    }

    .panel-result .result-heading {
        padding-bottom: 20px;
        border-bottom: 1px solid #c3c5cb;
    }

    .panel-result .result-wrap {
        float: left;
    }

    .panel-result .result-title {
        padding-left: 34px;
        margin-top: 9px;
        font-size: 16px;
        line-height: 1.3;
        color: #282b30;
        font-weight: bold;
        background: url(../data/img/front/icons-searh-result.png) no-repeat 0 0 scroll;
    }

    .panel-result .search-sort {
        float: right;
        width: 600px;
        text-align: right;
    }

    .panel-result .search-result,
    .panel-result .search-rank-row,
    .panel-result .search-rank {
        display: inline-block;
    }

    .panel-result .search-rank {
        margin-left: 6px;
    }

    .panel-result .search-rank label,
    .panel-result .search-rank .form-control {
        font-size: 12px;
        color: #3e455a;
    }

    .panel-result .search-result {
        padding-right: 22px;
        margin-right: 12px;
        border-right: 1px solid #c0c0c0;
    }

    .panel-result .search-result p {
        color: #000;
        font-size: 12px;
    }

    .panel-result .search-result .result-val {
        display: inline-block;
        padding: 0 3px;
        font-size: 25px;
        color: #f6687c;
        font-weight: bold;
        letter-spacing: -0.05em;
    }

    .panel-result .search-rank label {
        padding-right: 3px;
    }

    .panel-result .search-rank .form-control {
        display: inline-block;
        width: 80px;
        height: 30px;
        border: 1px solid #3e455a;
        font-size: 12px;
    }

    .result-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .result-list .result-item {
        margin-bottom: 20px;
        overflow: hidden;
        border-top: 1px solid #c3c5cb;
        border-right: 1px solid #c3c5cb;
        border-bottom: 1px solid #c3c5cb;
        background-color: #fff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        cursor: pointer;
    }

    .result-list .result-item:hover,
    .result-list .result-item:focus {
        background-color: #f4f4f4;
    }

    .result-list .result-item:first-child {
        border-top: 0;
    }

    .result-list .result-item .result-inside {
        padding: 23px 0 20px;
        overflow: hidden;
    }

    .result-list .result-item .company-heading {
        padding: 10px 3px;
        float: left;
        width: 50px;
        color: #fff;
        text-align: center;
    }

    .result-list .result-item .article-red {
        background-color: #e7362d;
    }

    .result-list .result-item .article-red-light {
        background-color: #f7574f;
    }

    .result-list .result-item .article-blue {
        background-color: #285cb4;
    }

    .result-list .result-item .article-blue-light {
        background-color: #5380ca;
    }

    .result-list .result-item .article-green {
        background-color: #52bd55;
    }

    .result-list .result-item .company-heading span {
        font-size: 14px;
        font-weight: bold;
        line-height: 1.2;
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
    }

    .result-list .result-item .company-name {
        padding: 0 37px;
        float: left;
        width: 205px;
    }

    .result-list .company-name .company-logo {
        margin-bottom: 20px;
    }

    .result-list .company-name .company-logo img {
        display: block;
        margin: 0 auto;
        width: 100%;
        height: auto;
        border: 1px solid #e7e7e7;
    }

    .result-list .result-item .company-information:before,
    .result-list .resul-item .company-information:after,
    .company-control:before,
    .company-control:after,
    .company-above:before,
    .company-above:after {
        content: "";
        display: table;
    }

    .result-list .result-item .company-information:after,
    .company-control:after,
    .company-above:after {
        clear: both;
    }

    .result-list .result-item .company-information {
        /* margin-left: 237px; */
        overflow: hidden;
    }

    .result-list .result-item .company-information .company-business {
        padding-right: 25px;
    }

    .company-control .company-tags {
        width: 649px;
        float: left;
    }

    .company-tags .company-tags-item {
        margin-bottom: 6px;
    }

    .company-tags .btn-tag {
        min-width: 60px;
        display: inline-block;
        padding: 6px 8px 5px;
        color: #fff;
        font-size: 12px;
        line-height: 1.2;
    }

    .real-estate {
        display: inline-block;
        vertical-align: middle;
        margin-left: 6px;
        color: #282b30;
        font-size: 12px;
    }

    .company-tags .btn-tag {
        background-color: #dedede;
    }

    .company-tags .btn-tag-graydark {
        background-color: #5d5d5d;
    }

    .company-tags .btn-tag-graylight {
        color: #000000;
        background-color: #dedede;
    }

    .company-tags .btn-tag-red {
        background-color: #be2c0a;
    }

    .company-tags .btn-tag-blue {
        background-color: #3467bc;
    }

    .company-tags .btn-tag-yellow {
        background-color: #beb80a;
    }

    .company-control {
        overflow: hidden;
        padding-bottom: 10px;
        border-bottom: 1px dotted #838383;
    }

    .company-ranking {
        padding-top: 15px;
    }

    .company-ranking .ranking-title {
        margin-bottom: 12px;
        font-size: 15px;
        font-weight: bold;
        line-height: 1.5;
    }

    .company-ranking .ranking-title a {
        color: #036bd5;
    }

    .company-ranking .ranking-title a:hover,
    .company-ranking .ranking-title a:focus {
        text-decoration: underline;
    }

    .para-ranking {
        font-size: 12px;
        margin-bottom: 10px;
    }

    .para-ranking-date {
        margin-bottom: 0;
        font-size: 10px;
        color: #373737;
    }

    .para-ranking-date span {
        display: inline-block;
    }

    .ranking-views {
        margin-left: 10px;
    }

    .para-price {
        font-size: 13px;
        color: #282b30;
        overflow: hidden;
    }

    .para-price .price-label {
        float: left;
        width: 90px;
        padding-right: 5px;
    }

    .para-price .price-detail {
        display: block;
        overflow: hidden;
        color: #e7362d;
    }

    .status-list {
        float: right;
        text-align: right;
    }

    .status-list .symbol-item {
        padding: 0 4px;
        vertical-align: middle;
        display: inline-block;
    }

    .placeholder-search {
        font-size: 11px;
        color: #888;
    }

    /* ==================================================
    End property conference
    ================================================== */
    /* ==================================================
    Start modal
    ================================================== */
    @media (min-width: 768px) {
        .modal-select-search .modal-dialog {
            width: 790px;
        }

        .modal-division .modal-dialog {
            width: 490px;
        }
    }

    .modal-select-search .modal-header,
    .modal-division .modal-header {
        padding-bottom: 12px;
        border-bottom: 1px dotted #a5a5a5;
    }

    .modal-select-search .modal-title,
    .modal-division .modal-title {
        font-size: 16px;
        font-weight: bold;
    }

    .modal-select-search .modal-title .font-red,
    .modal-division .modal-title .font-red {
        color: #ff4241;
        padding: 0 5px;
    }

    .modal-select-search .modal-body {

    }

    .modal-select-search .modal-footer,
    .modal-division .modal-footer {
        position: relative;
        text-align: center;
        border-top: 1px dotted #a5a5a5;
    }

    .modal-select-search .modal-footer .btn-clear-popup {
        top: 25px;
        right: 15px;
    }

    .modal-footer .text-center {
        text-align: center;
    }

    /* ==================================================
    End modal
    ================================================== */
    /* ==================================================
    Start property conference detail
    ================================================== */
    /*----- comment -----*/

    .chatbox-buyer .chatbox-inner {
        position: relative;
        background-color: #ffffff;
    }

    .chatbox-comment {
        position: relative;
        overflow: hidden;
        height: 100%;
        width: 100%;
        list-style: none;
        padding: 0 19px 20px 22px;
        background-color: #d0d5e2;
    }

    .chatbox-comment .comment-inverted:before,
    .chatbox-comment .comment-inverted:after {
        content: "";
        display: table;
    }

    .chatbox-comment .comment-inverted:after {
        clear: both;
    }

    .chatbox-comment .comment-inverted {
        list-style: none;
    }

    .chatbox-comment .comment-panel .item-case {
        margin-bottom: 22px;
        display: table;
        width: 100%;
        position: relative;
    }

    .chatbox-comment .comment-panel .patients,
    .chatbox-comment .comment-panel .box-body {
        display: table-cell;
        vertical-align: top;
    }

    .chatbox-comment .comment-panel .patients {
        padding-right: 28px;
        padding-top: 13px;
        width: 41px;
    }

    .chatbox-comment .item-case .box-body {
        padding-right: 19px;
    }

    .chatbox-comment .item-case .box-body .box-comment:before,
    .chatbox-comment .item-case .box-body .box-comment:after {
        content: "";
        display: table;
    }

    .chatbox-comment .item-case .box-body .box-comment:after {
        clear: both;
    }

    .chatbox-comment .comment-inverted:nth-child(odd) .box-comment {
        float: right;
    }

    .chatbox-comment .comment-inverted:nth-child(even) .comment-time {
        float: left;
    }

    .chatbox-comment .comment-inverted:nth-child(odd) .comment-time {
        left: 86px;
    }

    .chatbox-comment .comment-inverted:nth-child(even) .comment-time {
        right: 52px;
    }

    .chatbox-comment .item-case .box-body .comment-time {
        position: absolute;
        bottom: 0;
    }

    .chatbox-comment .item-case .box-body .comment-time span {
        font-size: 10px;
    }

    .chatbox-comment .item-case .box-body .box-comment {
        position: relative;
        letter-spacing: -1px;
        max-width: 280px;
        min-width: 279px;
        text-align: left;
        width: auto;
        -webkit-border-radius: 11px;
        -moz-border-radius: 11px;
        border-radius: 11px;
        padding: 10px 10px 8px 18px;
        word-break: break-all;
        word-wrap: break-word;
        letter-spacing: -1px;
        color: #000000;
        background-color: #fff;
    }

    .chatbox-comment .item-case .box-body .box-comment p {
        font-size: 14px;
        display: block;
        width: 100%;
    }

    .chatbox-comment .box-comment .box-arrow-left,
    .chatbox-comment .box-comment .box-arrow-right {
        width: 19px;
        height: 13px;
        z-index: 100;
        position: absolute;
        top: 34px;
    }

    .chatbox-comment .box-comment .box-arrow-left {
        left: -19px;
        background: url(../img/front/comment-arrow-left.png) no-repeat scroll;
    }

    .chatbox-comment .box-comment .box-arrow-right {
        right: -19px;
        background: url(../img/front/comment-arrow-right.png) no-repeat scroll;
    }

    .chatbox-comment .item-case .box-body .box-comment.bg-blue-light {
        background-color: #e1e6f4;
    }

    .chatbox-comment .item-case .patients span,
    .chatbox-comment .item-case .box-body .box-comment {
        display: -moz-inline-stack;
        display: inline-block;
        vertical-align: top;
        zoom: 1;
        *display: inline;
    }

    .chatbox-comment .item-case .patients span.avatar {
        width: 20px;
        display: block;
    }

    .chatbox-comment .item-case .patients span.avatar img {
        display: block;
        width: 100%;
        height: auto;
    }

    .chatbox-form .chatbox-group {
        margin-bottom: 12px;
    }

    .chatbox-form .chatbox-action {
        position: relative;
        text-align: center;
    }

    .chatbox-file {
        position: absolute;
        left: 0;
        top: 5px;
    }

    .chatbox-file .btn-file {
        padding-left: 3px;
        min-height: 22px;
        min-width: 30px;
        cursor: pointer;
    }

    .chatbox-file .glyphicon {
        font-size: 26px;
    }

    .chatbox-file .file-input {
        cursor: pointer;
        display: inline-block;
    }

    .chatbox-form .btn-chatbox-send {
        padding: 6px 10px;
        text-align: center;
        min-width: 160px;
        font-size: 14px;
        color: #fff;
        background-color: #2c354a;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
    }

    .chatbox-form .btn-chatbox-send:hover,
    .chatbox-form .btn-chatbox-send:focus {
        color: #fff;
        text-decoration: underline;
    }

    .buyer-info:before,
    .buyer-info:after {
        content: "";
        display: table;
    }

    .buyer-info:after {
        clear: both;
    }

    .buyer-info .buyer-list {
        float: left;
        width: 565px;
        margin-right: 30px;
    }

    .buyer-info .buyer-list .mCSB_outside + .mCS-minimal-dark.mCSB_scrollTools_vertical,
    .buyer-info .buyer-list .mCSB_outside + .mCS-minimal.mCSB_scrollTools_vertical {
        right: -28px;
    }

    .buyer-info .chatbox-buyer {
        overflow: hidden;
    }

    .chatbox-buyer .chatbox-post {
        padding: 20px;
        background-color: #bdc3d0;
    }

    .chatbox-buyer textarea.form-control {
        padding: 12px 15px;
        -webkit-border-radius: 11px;
        -moz-border-radius: 11px;
        border-radius: 11px;
        font-size: 14px;
        height: 86px;
        overflow-y: auto;
        resize: none;
    }

    .comment-date {
        padding-top: 18px;
        margin-bottom: 22px;
        text-align: center;
    }

    .comment-date .label-date {
        font-size: 12px;
        padding: 4px 5px;
        line-height: 1.4;
        display: inline-block;
        color: #fff;
        background-color: #9a9a9a;
        min-width: 80px;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
    }

    .trademark:before,
    .trademark:after {
        content: '';
        display: table;
    }

    .trademark:after {
        clear: both;
    }

    .trademark {
        padding: 40px 0 46px;
        text-align: center;
    }

    .trademark-inner {
        display: inline-block;
        min-width: 335px;
    }

    .trademark .trademark-brokerage {
        width: 190px;
        overflow: hidden;
        float: left;
        margin: 9px 12px 0 0;
    }

    .trademark-brokerage .circle-brokerage-type,
    .trademark-brokerage .logo-trade {
        width: 97px;
        height: 97px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        float: left;
    }
    .post-detail .logo-host {
        width: 97px;
        height: 97px;
    }

    .trademark-brokerage .circle-brokerage-type {
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        padding: 0 20px 0 20px;
    }

    .trademark-brokerage .circle-brokerage-type p {
        display: table-cell;
        height: 100px;
        width: 100px;
        padding: 10px 0;
        vertical-align: middle;
        color: #fff;
    }

    .trademark-brokerage .logo-trade {
        position: relative;
        z-index: 99;
        margin-left: -11px;
        background-color: #f6f5f6;
        overflow: hidden;
    }

    .trademark .trademark-caption {
        overflow: hidden;
        text-align: left;
    }
    .trademark .trademark-caption .trademark-caption-inner{
        height: 88px;
        width: 300px;
        display: table-cell;
        vertical-align: middle;
    }
    .trademark .para-rating {
        margin-bottom: 5px;
    }

    .trademark .real-estate {
        margin-left: 0;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .trademark .property-taro {
        font-size: 12px;
    }

    .parameter-detail .posted-title {
        margin-bottom: 46px;
        font-size: 18px;
        font-weight: bold;
        line-height: 1.6;
    }

    .parameter-detail .para-properties {
        margin-bottom: 25px;
        line-height: 1.99;
        font-size: 13px;
        word-break: break-word;
    }
    .table-info .table-responsive{
        margin-bottom: 16px;
    }
    .table-info .table-line{
        position: relative;
        padding-bottom: 3px;
    }
    .table-info .table-line:after{
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 1;
        height: 1px;
        width: 100%;
        background: url(/data/img/front/bdr_line_th.png) repeat-x left top scroll;
    }
    .table-info .table tr:last-child > th:after{
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 0;
        height: 3px;
        width: 100%;
        max-width: 140px;
        background: #eeeeee;
    }
    .post-detail ~ .modal-select-search .panel-default>.panel-heading+.panel-collapse>.panel-body {
        background: #ffffff;
        border-top: 7px solid #E7E7E7;
    }
    .post-detail ~ .modal-select-search .panel-group .panel+.panel {
        margin-top: 17px;
    }
    .post-detail ~ .modal-select-search .panel-heading .collapse-drop.active {
        height: 29px;
    }
    .post-detail ~ .modal-select-search .panel-heading .collapse-drop {
        height: 29px;
    }
    .post-detail ~ .modal-select-search .panel-group {
        margin-bottom: 15px;
    }
    .post-detail ~ .modal-select-search .styled-checkbox-test + label {
        padding: 1px 18px 0 29px;
    }
    .post-detail ~ .modal-select-search .styled-checkbox-test + label span {
        word-break: break-word;
    }
    .post-detail ~ #modal-error-db .modal-footer .btn,
    .post-detail ~ #modal-delete-template .modal-footer .btn {
        width: 96px !important;
    }
    .post-detail ~ .modal-select-search textarea,
    .post-detail ~ .modal-select-search input {
        -webkit-appearance: none;
        box-shadow: none;
        -webkit-box-shadow: none;
    }
    .post-detail ~ .modal-select-search textarea {
        resize: none;
    }
    .post-detail .btn-show-chat-template {
        margin-left: 15px;
        cursor: pointer;
    }
    .post-detail .btn-message-send {
        width: 85px;
        float: right;
    }
    .post-detail .chatbox-buyer .chatbox-post {
        position: relative;
    }
    .post-detail .talkTools .file-input {
        position: unset;
    }
    .post-detail .talkTools .file-input .kv-upload-progress {
        left: 30px;
        top: 200px;
    }
    .post-detail #popupInfoCorporateBox table.userInfo td img.img-circle {
        object-fit: contain;
    }
    .post-detail .message-body ul li.talk_item.left .userInfo img {
        object-fit: contain;
    }

    @media screen and (min-width: 4000px) {
        @-ms-viewport { width: 4000px; }
        .table-info .table-line{
            padding-bottom: 2px;
        }
    }
    .table-info .table{
        margin-bottom: 0;
    }
    .table-info .table tr > td,
    .table-info .table tr > th {
        padding: 7px 10px 5px 20px;
        border-top: 0;
        font-size: 12px;
        background: url(/data/img/front/bdr_line_th.png) repeat-x left top scroll;
    }

    .table-info .table tr > th {
        font-weight: normal;
        background-color: #eeeeee;
        width: 140px;
    }

    .table-info .table tr:last-child > td,
    .table-info .table tr:last-child > th {
        border-bottom: 0;
    }
    .table-info .table-scroll {
        max-height: 379px;
        overflow: auto;
        margin-top: 20px;
    }
    .table-info .table-scroll{
        border: 0;
    }
    
    .post-date {
        color: #373737;
        font-size: 10px;
    }

    #tmp_pankuzu {
        margin: 20px 0;
        font-size: 12px;
        display: none;
    }

    #tmp_pankuzu a {
        color: #000000;
    }

    #tmp_pankuzu a:hover,
    #tmp_pankuzu a:focus {
        text-decoration: underline;
    }

    .checkbox-list:before,
    .checkbox-list:after {
        content: '';
        display: table;
    }

    .checkbox-list:after {
        clear: both;
    }

    .checkbox-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .checkbox-list .checkbox-item {
        padding: 3px 0;
        width: 33.32%;
        float: left;
    }

    .checkbox-list .checkbox-item:nth-child(3n+1) {
        clear: both;
    }

    .modal-division {
        padding: 15px;
    }

    .media-division {
        margin-bottom: 20px;
    }

    .media-division .media-image {
        margin-right: 15px;
        width: 100px;
    }

    .media-division .media-body {
        padding: 15px 0;
    }

    .media-division .media-body .company-tags {
        margin-bottom: 15px;
    }

    .media-division .media-heading {
        font-weight: bold;
        font-size: 16px;
    }

    .area-detail-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .area-detail-list .area-detail-item {
        overflow: hidden;
        padding-bottom: 10px;
    }

    .area-detail-list .area-detail-item:last-child {
        padding-bottom: 0;
    }

    .area-detail-list .area-detail-item .area-name {
        width: 130px;
        float: left;
        font-weight: bold;
    }

    .area-detail-list .area-detail-item .area-cnt {
        overflow: hidden;
    }

    /* ==================================================
    End property conference detail
    ================================================== */
    /*----- Footer -----*/
    #footer {
        text-align: right;
        padding: 10px 0;
        color: #000000;
        background-color: #fff;
    }

    /*Media Query*/
    @media (max-width: 1023px) {
        .post-detail ~ .modal-select-search textarea {
            outline-offset: 0px;
            outline-style: auto;
            outline-width: 0px;
        }
    }
    @media (max-width: 991.98px) {
        .tmp_hlogo {
            float: ;
        }

        .tmp_hlogo h1,
        .tmp_hlogo p {
            display: block;
            width: 34px;
            height: 31px;
            background: url(/data/img/front/logo-sp.png) no-repeat left top;
        }

        .tmp_hlogo a {
            display: block;
            width: 34px;
            height: 31px;
            margin: 0 auto;
        }

        .tmp_hlogo h1 span,
        .tmp_hlogo p span {
            display: block;
            width: 34px;
            height: 31px;
            position: relative;
            z-index: -1;
            overflow: hidden;
        }

        .setting-link {
            display: none;
        }

        .navigation {
            float: none;
            width: auto;
        }

        .navigation ul li {

        }

        .icons-nav-search,
        .icons-nav-history {
            width: 22px;
            height: 22px;
            -webkit-background-size: 100%;
            background-size: 100%;
        }

        .icons-nav-pen {
            width: 20px;
            height: 20px;
            -webkit-background-size: 100%;
            background-size: 100%;
        }


        .navigation ul li a .nav-symbol .icons-nav-search,
        .navigation ul li a .nav-symbol .icons-nav-pen {
            margin-top: 9px;
        }

        .navigation ul li a .nav-symbol .icons-nav-history {
            margin-top: 8px;
        }

        .navigation ul li a .nav-symbol {
            width: 40px;
            height: 40px;
        }

        .main-inner {
            overflow-x: hidden;
        }

        .trademark .trademark-caption{
            padding-top: 0;
            margin-top: 5px;
        }
        .table-info .table-scroll{
            height: auto;
            border-: 0;
            border-bottom: 0;
        }
        /* ==================================================
        Start smart phone property conference detail
        ================================================== */

        #main-content {
            overflow: inherit;
        }

        .container {
            width: 100%;
        }

        .trademark {
            padding: 40px 0 20px;
        }

        .post-detail .trademark {
            padding: 0 0 20px;
        }

        .post-detail .time {
            text-align: left;
        }

        .post-detail .time span {
            margin-right: 0px !important;
        }

        .post-detail .chatbox-buyer .comment-above {
            position: relative;
            background: #fff;
            border-left: none;
        }

        .post-detail .chatbox-buyer .comment-above:after {
            content : "";
            position: absolute;
            left    : 15px;
            top  : 0;
            height  : 1px;
            width   : calc(100% - 30px);
            border-top: 1px solid #bec3d1;
        }

        .post-detail #tmp_pankuzu {
            font-size: 12px;
            font-family: Yu Gothic, YuGothic, Montserrat, sans-serif;
            margin: 20px 0 0;
            padding: 9px 22px;
            background: #e1e1e1;
        }

        .post-detail .btn-message-send {
            float: right;
        }

        .post-detail .table-info .table tr:last-child > th:after {
            background: unset;
        }
        .post-detail .message-body ul li.talk_item .file img {
            width: 100%;
        }
        .post-detail .trademark-brokerage .circle-brokerage-type p {
            width: 80px;
            height: 80px;
        }
        .post-detail .trademark-brokerage .circle-brokerage-type {
            width: 80px;
            height: 80px;
        }
        .post-detail .logo-host {
            width: 80px;
            height: 80px;
        }
        .post-detail .trademark-brokerage .logo-trade {
            width: 80px;
            height: 80px;
        }
        .post-detail .trademark .trademark-brokerage {
            width: 150px;
        }
        .post-detail ~ .modal-select-search .modal-footer .btn {
            width: 85px;
        }
        .post-detail ~ .modal-select-search .modal-dialog {
            left: -2px;
        }
        .post-detail .btn-file .glyphicon {
            top: 3px;
        }
        .post-detail #talk_item_text {
            outline-offset: 0px;
            outline-style: auto;
            outline-width: 0px;
        }
        .buyer-info .buyer-list {
            padding: 0 15px;
            width: 100% !important;
            float: none;
            margin-right: 0;
            clear: both;
        }

        .buyer-info .chatbox-buyer {
            clear: both;
            float: none;
            padding: 0;
            margin: 18px 0 0;
        }

        .buyer-info .chatbox-buyer .chatbox-inner {
            margin: 0;
        }

        .parameter-detail .posted-title {
            margin-bottom: 20px;
            font-size: 17px;
        }

        .parameter-detail .para-properties {
            line-height: 1.8;
        }

        .table-info .table tr > th {
            width: 110px;
        }

        .table-info .table-responsive {
            margin-bottom: 5px;
        }

        .post-date {
            text-align: right;
        }

        #tmp_pankuzu {
            display: block;
        }

        .chatbox-comment {
            max-height: 370px;
            overflow-y: auto;
        }

        .chatbox-comment .item-case .box-body .box-comment {
            max-width: 230px;
            min-width: 229px;
        }

        .chatbox-comment .comment-inverted:nth-child(odd) .comment-time {
            left: 48px;
        }

        .chatbox-comment .comment-inverted:nth-child(even) .comment-time {
            right: 22px;
        }


        .chatbox-buyer .chatbox-post {
            position: static;
        }

        .checkbox-list .checkbox-item {
            width: 49.9%;
        }

        .checkbox-list .checkbox-item:nth-child(2n+1) {
            clear: both;
        }
        .message-body ul li.talk_item.right .text,
        .message-body ul li.talk_item.right .file,
        .message-body ul li.talk_item.left .text,
        .message-body ul li.talk_item.left .file{
            width: 251px;
        }
        /* ==================================================
        End smart phone property conference detail
        ================================================== */
        /* ==================================================
        Start smart phone property conference
        ================================================== */
        .main-inner {
            padding-top: 0;
        }

        .conference-title {
            padding: 14px 10px 13px 39px;
            margin: 0 -15px;
            background-color: #dadada;
            background-position: 10px 13px;
        }

        .panel-search {
            padding: 20px;
            margin: 0 -15px;
            border-bottom: 1px solid #c5c5c5;
        }

        .group-search {
            padding: 10px 0;
        }

        .group-search:first-child {
            padding-top: 0;
        }

        .group-search:nth-child(2) .group-search-item:nth-child(1),
        .group-search:nth-child(4) .group-search-item:nth-child(1) {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dotted #a5a5a5;
        }

        .group-search .search-label {
            padding-right: 5px;
            width: 74px;
        }

        .group-search .search-label.search-label-input {
            float: none;
            clear: both;
            width: 100%;
            padding-right: 0;
        }

        .select-row:first-child .select-col:nth-child(1):after {
            display: none;
        }

        .group-search .search-nearby {
            margin-left: 74px;
        }

        .group-search .search-label-input .search-keyword {
            padding-top: 0;
        }

        .group-search .search-nearby.search-nearby-input {
            margin-left: 0;
        }

        .group-search .search-nearby select.form-control {
            background: #ededed;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            border: 1px solid #036bd5;
        }

        .select-separate .separate-item:nth-child(2):before {
            content: '〜';
            color: #000;
        }

        .group-search .search-main .action-choice {
            float: none;
            width: 50px;
            padding: 0;
        }

        .group-search .search-main .category-tags {
            margin-left: 0;
        }

        .group-search .group-search-item {
            margin: 0;
        }

        .group-search .search-nearby .search-main-flex {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: row-reverse;
            flex-direction: row-reverse;
            align-items: center;
        }

        .group-search .search-main .category-tags {
            width: 268px;
        }

        .group-search .search-main .action-choice {
            text-align: right;
        }

        .select-row {
            margin: 0;
        }

        .select-row .select-col {
            padding: 0;
            width: 100%;
            float: none;
        }

        .group-submit a.btn-clear-condition, a.btn-clear-popup {
            margin-top: 18px;
            position: static;
        }

        .group-submit .btn-search-keyword, .btn-decide {
            display: block;
            max-width: 240px;
            margin: 0 auto;
        }

        .panel-result .search-result, .panel-result .search-rank {
            display: block;
        }

        .panel-result .result-heading {
            border-bottom: 0;
        }

        .panel-result .search-sort {
            width: 100%;
        }

        .panel-result .search-rank-row {
            margin: 10px -15px 0;
            padding: 15px 0;
            clear: both;
            display: block;
            background-color: #2e3548;
            overflow: hidden;
        }

        .panel-result .search-rank {
            float: left;
            width: 50%;
            padding: 0 15px;
            margin-left: 0;
        }

        .panel-result .search-rank .form-control {
            width: 105px;
        }

        .panel-result .search-rank:nth-child(1) {
            padding-right: 28px;
            border-right: 1px solid #c0c0c0
        }

        .panel-result .search-rank label {
            color: #fff;
            display: inline-block;
            vertical-align: middle;
            width: 32px;
            line-height: 1.2;
        }

        .result-list .result-item,
        .result-list .result-item .company-heading span {
            display: block;
            border-right: 0;
        }

        .result-list .result-item .company-heading {
            float: none;
            width: 100%;
            clear: both;
            text-align: center;
        }

        .result-list .result-item .company-name {
            padding: 0 0 5px;
            width: 100%;
            float: none;
            overflow: hidden;
        }

        .result-list .result-item .company-information {
            margin-left: 0;
            clear: both;
        }

        .result-list .result-item .result-inside {
            padding: 12px 0;
        }

        .result-list .result-item .company-information .company-business {
            padding-right: 0;
        }

        .result-list .company-name .company-logo {
            padding: 0 14px 0 0;
            margin-bottom: 0;
            float: left;
            width: 98px;
        }

        .result-list .result-item .company-name .company-tags {
            width: 120px;
            overflow: hidden;
            float: left;
        }

        .result-list .result-item .company-name .status-list {
            float: right;
        }

        .company-control .company-tags {
            overflow: hidden;
            width: 100%;
            float: none;
        }

        .result-list .result-item {
            position: relative;
            border-top: 0;
            border-bottom: 0;
            margin-bottom: 15px;
            padding: 8px 0 16px;
            overflow: visible;
        }

        .result-list .result-item:after {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 0 -15px;
            content: '';
            height: 10px;
            border: 1px solid #d3d3d3;
            background-color: #e9e9e9;
        }

        .result-list .result-item:hover,
        .result-list .result-item:focus {
            background: none;
        }

        .company-tags .company-tags-item {
            margin-bottom: 0;
        }

        .company-tags .btn-tag {
            margin-bottom: 6px;
        }

        .status-list {
            float: right;
            padding-right: 0;
        }

        .panel-result .result-wrap {
            padding: 33px 0 0;
            float: none;
            width: 100%;
            overflow: hidden;
        }

        .panel-result .result-title {
            float: left;
        }

        .result-wrap .search-result {
            float: right;
            width: 160px;
            text-align: right;
        }

        .panel-result .result-title {
            margin-top: 3px;
        }

        .modal-dialog {
            margin-top: 40px;
        }

        /* ==================================================
        End smart phone property conference
        ================================================== */
    }

    @media (max-width: 415px ) {
        .message-body ul li.talk_item.right .text,
        .message-body ul li.talk_item.right .file,
        .message-body ul li.talk_item.left .text,
        .message-body ul li.talk_item.left .file{
            width: 251px;
        }
        .post-detail .para-rating {
            display: none;
        }
    }

    @media (max-width: 380px) {
        .post-detail ~ .modal-select-search .add-template .modal-body,
        .post-detail ~ .modal-select-search .edit-template .modal-body {
            max-height: 362px;
            overflow-y: auto;
        }
    }

    @media (max-width: 370px) {
        .message-body ul li.talk_item.right .text,
        .message-body ul li.talk_item.right .file,
        .message-body ul li.talk_item.left .text,
        .message-body ul li.talk_item.left .file{
            width: 196px;
        }
    }

    @media (max-width: 350px) {
        .panel-result .search-rank .form-control{
            width: 90px;
        }
        .trademark .trademark-caption {
            width: 102px;
        }
        .trademark-brokerage .logo-trade {
            margin-left: -22px;
        }
        .trademark .trademark-brokerage {
            margin-right: 5px;
            width: 179px;
        }
        .trademark .real-estate {
            font-size: 13px;
        }
    }

    /*icon*/
    [class^="icons-"],
    [class*=" icons-"] {
        display: inline-block;
        *margin-right: .3em;
        vertical-align: text-top;
    }

    .icons-star {
        height: 18px;
        line-height: 18px;
        width: 20px;
        background: url(/data/img/front/icons-star.png) no-repeat scroll;
    }

    .icons-star-check {
        height: 18px;
        line-height: 18px;
        width: 20px;
        background: url(/data/img/front/icons-star-check.png) no-repeat scroll;
    }

    .icons-mailbox {
        height: 16px;
        line-height: 16px;
        width: 20px;
        background: url(/data/img/front/icons-mailbox.png) no-repeat scroll;
    }

    .icons-mailbox-new {
        height: 26px;
        line-height: 26px;
        width: 21px;
        background: url(/data/img/front/icons-mailbox-new.png) no-repeat scroll;
    }

    .icons-mailbox-open {
        height: 21px;
        line-height: 21px;
        width: 20px;
        background: url(/data/img/front/icons-mailbox-open.png) no-repeat scroll;
    }

    .icons-nav-search {
        height: 34px;
        line-height: 34px;
        width: 34px;
        background: url(/data/img/front/icons-nav-search.png) no-repeat scroll;
    }

    .icons-nav-pen {
        height: 30px;
        line-height: 30px;
        width: 30px;
        background: url(/data/img/front/icons-nav-pen.png) no-repeat scroll;
    }

    .icons-nav-history {
        height: 31px;
        line-height: 31px;
        width: 33px;
        background: url(/data/img/front/icons-nav-history.png) no-repeat scroll;
    }
    @media (min-width: 768px){
        .modal-select-search .modal-dialog{
            width: 791px;
        }
        .modal-division .modal-dialog{
            width: 490px;
        }
    }
    @media (min-width: 1020px) and (max-width: 1200px) {
        .post-detail .buyer-list {
            width: 515px !important;
        }
    }
    .modal-select-search .modal-header,
    .modal-division .modal-header{
        padding-bottom: 12px;
        border-bottom: 1px dotted #a5a5a5;
    }
    .modal-select-search .modal-title,
    .modal-division .modal-title{
        font-size: 16px;
        font-weight: bold;
    }
    .modal-select-search .modal-title .font-red,
    .modal-division .modal-title .font-red {
        color: #ff4241;
        padding: 0 5px;
    }
    .modal-select-search .modal-body{

    }
    .modal-select-search .modal-footer,
    .modal-division .modal-footer{
        position: relative;
        text-align: center;
        border-top: 1px dotted #a5a5a5;
    }
    .modal-select-search .modal-footer .btn-clear-popup{
        top: 25px;
        right: 15px;
    }
    .modal-footer .text-center{
        text-align: center;
    }

    #talk_item_text {
        height: 140px;
        -webkit-appearance: none;
        box-shadow: none;
        -webkit-box-shadow: none;
    }
</style>
