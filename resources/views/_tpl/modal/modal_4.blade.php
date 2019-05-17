<div class="modal fade" id="modalPropertyCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog popup" role="document">
        <div class="title-symbol">
            <span><span class="font-red"><i class="glyphicon glyphicon-ok"></i></span>物件タイプを選択する(複数選択可)</span>
            <div class="close-popup">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: unset;"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
        <div class="line-dropdown">

            <? $i = 0; ?>
            @foreach($master_data as $key_master_data => $value_master_data)
                <? $i++; ?>

                <div class="dropdown-popup">
                    <div class="cloud">
                        <span style="padding-left: 10px;">
                            <input class="styled-checkbox-test checkall" id="styled-checkbox-{{ $i }}" type="checkbox">
                            <label for="styled-checkbox-{{ $i }}"><span style="vertical-align:middle;">{{ $key_master_data }}</span></label>
                        </span>
                        <div class="icon-arrow @if($i==1) active @endif">
                            <i class="fas fa-angle-up arrow-up"></i>
                            <i class="fas fa-angle-down arrow-down"></i>
                        </div>
                    </div>
                    <div class="current-dropdow @if($i==1) active @endif">
                        <div class="show-dropdow">
                            @foreach($value_master_data as $key_article_category => $article_category)
                                <div class="flex-dropdown padding-3-0">
                                <span style="padding-left: 10px;">
                                    <input data-name="{{$article_category->name}}" class="x-property-category-checkbox styled-checkbox-test" id="styled-checkbox-{{ $i }}-{{ $article_category->id }}" value="{{ $article_category->id }}" type="checkbox">
                                    <label for="styled-checkbox-{{ $i }}-{{ $article_category->id }}" style="display: inline-flex;"><span style="vertical-align:middle;">{{ $article_category->name }}</span></label>
                                </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="footer-content">
            <a class="btn btn-default btn-button x-button-modal-property-category">決定</a>
        </div>
    </div>
</div>