@extends('_tpl.login')
@section('title', 'ログイン')
@section('content')

    <div class="container-fluid">
        <div class="loginBox">
            {!! Form::open() !!}

            <div class="centerText f20px bold mT10" style="line-height: 48px;">
                <img src="/data/img/logo.png" style="max-width: 360px; height: auto;" class="hidden-xs" />
                <img src="/data/img/logo.png" style="max-width: 240px; height: auto;" class="visible-xs-inline" />
            </div>

            @if(!empty($message))
                <p class="help-block centerText f20px mT20"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> {!! $message !!}</p>
            @endif

            <div class="boxWrap form-group mT30">
                <? $_ = 'login_id'; ?>
                <label for="<?= $_  ?>" class="control-label col-sm-3">ログインID</label>
                <div class="col-sm-9">
                    {!! Form::text($_, old($_), ['id' => $_, 'class' => 'form-control input-lg', 'placeholder' => 'ログインIDを入力してください。', 'maxlength' => 255]) !!}
                    {!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
                </div>
            </div>

            <div class="boxWrap form-group mT10">
                <? $_ = 'password'; ?>
                <label for="<?= $_  ?>" class="control-label col-sm-3">パスワード</label>
                <div class="col-sm-9">
                    {{--{!! Form::text($_, old($_), ['id' => $_, 'class' => 'form-control input-lg', 'placeholder' => 'パスワードを入力してください。', 'maxlength' => 32]) !!}--}}
                    {!! Form::password('password', ['id' => $_, 'class' => 'form-control input-lg', 'placeholder' => 'パスワードを入力してください。', 'maxlength' => 32]) !!}
                    {!! $errors->first($_, '<p class="help-block error-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> :message</p>') !!}
                </div>
            </div>

            <div class="boxWrap form-group">
                <div class=" col-sm-3"></div>
                <label class="col-sm-9">
                    {!! Form::checkbox($_ = 'remember_me', '1', old($_) === '1', ['id' => $_]) !!}
                    次から自動的にログインする
                </label>
            </div>
            <div class="boxWrap form-group">
                <div class=" col-sm-3"></div>
                <label class="col-sm-9">
                    <a href="/login/forgot">&Gt; パスワードを忘れた方はこちら</a>
                </label>
            </div>

            <div class="boxWrap mT30">
                <a class="flat_button fb-orange h40px btnSubmit" data-action="<?= url('/login') ?>" data-default="true">
                    ログイン
                </a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('footer-js')
    @parent
@endsection