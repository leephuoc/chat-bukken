
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg btn-modal-2 btn-modal" data-toggle="modal" data-target="#myModal2">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body col-md-12 col-sm-12">
                <div class="col-md-12 col-sm-12" id="areas">
                    <span class="glyphicon glyphicon-ok glyphicon-color-red"></span><span><b>市区町村</b></span>
                    <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-modal">&times;</span></button>
                </div>
                <p class="hr-modal mB5"></p>
                <div class="col-md-12 col-sm-12 areas ">
                    {{--@foreach(\App\Area::orderBy('rank')->select('id', 'name')->lists('name', 'id')->toArray() as $area => $value)--}}
                        {{--<div class="col-md-4 d-flex">--}}
                            {{--<input class="styled-checkbox-test areas-checkbox" id="areas-{{$area}}" value="{{$value}}" type="checkbox">--}}
                            {{--<label for="areas-{{$area}}"><span style="vertical-align:middle;">{{$value}}</span></label>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <p class="hr-modal mB5 mt-0"></p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn-accept-data x-button-confirm-municipality mt-2" data-dismiss="modal">決定</button>
                {{--<span class="modal-footer-text">全ての条件をクリア</span>--}}
            </div>
        </div>
    </div>
</div>