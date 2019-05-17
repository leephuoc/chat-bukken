<div class="wrap-article-detail post-detail-no-box">
    <div class="actions">
        <label for="" class="btn-edit x-btn-edit" data-article-id="{{ $article->id }}">編集する</label>
        <label for="" class="btn-delete ml-4 x-btn-delete" data-article-id="{{ $article->id }}">削除する</label>
    </div>

    <?php use App\Helpers\Common;?>
    <div class="article-detail">
        <div class="parameter-detail">
            @if($article->name)
                <p class="posted-title"><b>{{ $article->name }}</b></p>
            @endif
            <p class="para-properties articleInfo mt-6">{!! nl2br(e($article->comment)) !!}</p>
            <div class="table-info mt-6">
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

    <div class="article-rep-area boxWrap">
        <div class="media col-sm-9">
            @if($article->corporate->logo_exists)
                <div class="media-left">
                    <img src="{{ $article->corporate->logo_url }}" class="media-object img-circle" style="max-height: 60px;" />
                </div>
            @else
                <div class="media-left">
                    <img src="/data/img/noimage.png" class="media-object img-circle" style="max-height: 60px;" />
                </div>
            @endif
            <div class="media-body">
                <h4>{{ $article->corporate->full_name }}</h4>
                <h5 style="margin-top: 5px; margin-bottom: 0;"><strong class="corporate-name mR10">担当者</strong>{{ $article->user->name }}</h5>

            </div>
        </div>
    </div>
</div>