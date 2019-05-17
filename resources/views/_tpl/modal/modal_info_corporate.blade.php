<!-- Button trigger modal -->
<button type="button" class="modal-show btn btn-primary" data-toggle="modal" style="display: none" data-target="#exampleModal"></button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="popupInfoCorporateBox">
                    <div class="container-fluid">
                        <table class="userInfo">
                            <tr>
                                <td style="padding: 0;" class="logo-corporate">
                                    @if(!empty($corporate->logo_exists))
                                        <img src="{{ $corporate->logo_url }}" alt="" class="img-circle"  style="width: 90px!important;"/>
                                    @else
                                        <img src="/data/img/noimage.png" alt="" class="img-circle" />
                                    @endif
                                </td>
                                <td>
                                    <div class="mB5">
                                        <span class="tag area-name">{{ !empty($corporate->area->name) ? $corporate->area->name : '' }}</span>
                                    </div>
                                    <strong class="full-name-corporate">
                                        {{ !empty($corporate->full_name) ? $corporate->full_name : '' }}
                                    </strong>
                                </td>
                            <tr>
                        </table>

                        <div class="container-fluid mT30 form-horizontal" style="padding-right: 0">
                            <span class="group-license">
                            @if(isset($corporate->corporate_type_id) && (in_array($corporate->corporate_type_id, [Config::get('dentaku.corporate_type.re'), Config::get('dentaku.corporate_type.constr')])))
                                <div class="form-group">
                                    <label for="license" class="control-label col-sm-3 w100-when-531-down">
                                        @if(isset($corporate->corporate_type_id) && $corporate->corporate_type_id == Config::get('dentaku.corporate_type.re'))
                                            宅地建物取引業<br />免許番号
                                        @elseif(isset($corporate->corporate_type_id) && $corporate->corporate_type_id == Config::get('dentaku.corporate_type.constr'))
                                            建物業許可番号
                                        @endif
                                    </label>

                                    <div class="col-sm-9">
                                        <p class="form-control-static license">{{ isset($corporate->license) ? $corporate->license : '' }}</p>
                                    </div>
                                </div>
                            @endif
                            </span>

                            <div class="form-group">
                                <label for="" class="control-label col-sm-3 w100-when-531-down">住所</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static full-addr">{{ isset($corporate->full_addr) ? $corporate->full_addr : '' }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <? $_ = 'comment'; ?>
                                <label for="<? $_ ?>" class="control-label col-sm-3 w100-when-531-down">PR・コメント欄</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static comment">{!! isset($corporate->comment)  ? nl2br(e($corporate->comment)) : '' !!}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" style="color:#444;" class="btn flat_button fb-light-gray w130px" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn flat_button fb-green x-btn-redirect-detail w130px" data-href="/search/{{!empty($corporate->corporate_type_id2key) ? $corporate->corporate_type_id2key : ''}}/{{ !empty($corporate->id) ? $corporate->id : '' }}/dentaku?tab=detail">詳細へ</button>
                <button type="button" class="btn flat_button fb-green x-btn-redirect-search w130px btn-row-only" data-href="/search/{{!empty($corporate->corporate_type_id2key) ? $corporate->corporate_type_id2key : ''}}/{{ !empty($corporate->id) ? $corporate->id : '' }}/dentaku?tab=list-post" >投稿一覧</button>
            </div>
        </div>
    </div>
</div>