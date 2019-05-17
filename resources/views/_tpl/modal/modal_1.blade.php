<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg btn-modal-1 btn-modal" data-toggle="modal" data-target="#myModal1">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body col-md-12 col-sm-12">
                <div class="col-md-12 col-sm-12 article-category">
                    <span class="glyphicon glyphicon-ok glyphicon-color-red"></span><span><b>都道府県</b></span>
                    <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-modal">&times;</span></button>
                </div>
                <p class="hr-modal mB5"></p>
                <div class="col-md-12 col-sm-12 prefs mt-2">
                    <? $_ = 'pref_id'; ?>
                    <? $input = Input::get($_, []); $input = is_array($input) ? $input : []; ?>
                    @foreach(Config::get('dentaku.prefs') as $prefs=>$value)
                        <div class="col-md-4">
                            <input class="styled-checkbox-test prefs-checkbox" id="pref-{{$prefs}}" data-name="{{$value}}" value="{{$prefs}}" type="checkbox">
                            <label for="pref-{{$prefs}}"><span style="vertical-align:middle;">{{$value}}</span></label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <p class="hr-modal mB5 mt-0"></p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn-accept-data x-button-confirm-prefectures mt-2" data-dismiss="modal">決定</button>
                {{--<span class="modal-footer-text">全ての条件をクリア</span>--}}
            </div>
        </div>
    </div>
</div>
