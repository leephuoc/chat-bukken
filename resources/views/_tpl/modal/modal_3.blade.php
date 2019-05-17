<div class="modal fade" id="modalTransactionType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="height: auto;">
    <div class="modal-dialog" role="document">
        <div class="title-symbol">
            <span><span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>取引形態</span>
            <div class="close-popup">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="line-dropdown">
            <div class="dropdown-popup">
                <div class="current-dropdow active">
                    <div class="show-dropdow">
                        @foreach(Config::get('dentaku.article_trade_types') as $trade_type_id => $value)
                            <div class="flex-dropdown padding-3-0">
                                <span style="padding-left: 10px;">
                                    <input data-name="{{$value}}" class="styled-checkbox-test" id="styled-checkbox-transaction-type-{{$trade_type_id}}" value="{{$trade_type_id}}" type="checkbox">
                                    <label for="styled-checkbox-transaction-type-{{$trade_type_id}}"><span style="vertical-align:middle;">{{$value}}</span></label>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <button class="btn btn-default btn-button x-button-modal-transaction-type">決定</button>
        </div>
    </div>
</div>