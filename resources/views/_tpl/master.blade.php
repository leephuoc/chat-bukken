<?php
	$segments = Request::segments();
	$segment_lv1 = $segments[0];
	$segment_lv2 = $segments[0].(!isset($segments[1]) ? : '/'.$segments[1]);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
@section('meta')
<meta charset="UTF-8" />
@include('analytics.analytics')
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
@show

<title>@yield('title') | 物件会議</title>

@section('header-css')
<!-- Bootstrap -->
<link href="/data/css/class.css" rel="stylesheet" />
<link href="/data/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="/data/bootstrap/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="/data/bootstrap/bootstrap3-dialog/css/bootstrap-dialog.min.css" rel="stylesheet" />
<link href="/data/css/simple-sidebar.css" rel="stylesheet" />
<link href="/data/css/common.css" rel="stylesheet" />
<link href="/data/css/master.css" rel="stylesheet" />
@show

@section('header-js')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@show

</head>
<body>
<div id="left-wrapper">
@section('left-sidebar')
<!-- Sidebar -->
<div id="sidebar-left-wrapper">
	<ul class="sidebar-nav">
		<li class="sidebar-brand separate">
			<a href="/">
				<img src="/data/img/logo.png" width="170" height="36" alt="DENTAKU" title="DENTAKU" />
			</a>
			<p>
			グランドライン株式会社<br />
			田中広紀さん　ログイン中
			</p>
			<div class="mT20 boxWrap">
			<a href="/dentaku" class="flat_button f15px">
				<img src="/data/img/icon_20x20_001.png" />
				DENTAKU する
			</a>
			</div>
		</li>
		<li class="separate">
			<a href="/" class="sidebar_item type001 @if ($segment_lv1 === '') this @endif">
				ホーム
			</a>
		</li>
		<li class="separate">
			<a href="/push/reg" class="sidebar_item type002 @if ($segment_lv1 === 'push') this @endif">
				情報を配信する
				<span class="badge">4</span>
			</a>
		</li>
		<li class="separate">
			<a href="/message" class="sidebar_item type003 @if ($segment_lv1 === 'message') this @endif">
				メッセージ
				<span class="badge">4</span>
			</a>
		</li>
		<li class="separate">
			<a href="/dentaku" class="sidebar_item type004 @if ($segment_lv1 === 'dentaku') this @endif">
				DENTAKU
			</a>
		</li>
		<li class="separate">
			<a href="/prop/index" class="sidebar_item type005 @if ($segment_lv1 === 'prop') this @endif">
				自社物件リスト
			</a>
		</li>
		<li class="separate">
			<a href="/push/list" class="sidebar_item type006 @if ($segment_lv2 === 'push/list') this @endif">
				配信リスト
			</a>
		</li>
		<li>
			<a href="/search/re" class="sidebar_item type007 @if ($segment_lv2 === 'search/re') this @endif">
				不動産会社を探す
			</a>
		</li>
		<li>
			<a href="/search/constr" class="sidebar_item @if ($segment_lv2 === 'search/constr') this @endif">
				建築会社を探す
			</a>
		</li>
		<li class="separate">
			<a href="/search/prop" class="sidebar_item @if ($segment_lv2 === 'search/prop') this @endif">
				物件を探す
			</a>
		</li>
		<li>
			<a href="/settings/account" class="sidebar_item type009 @if ($segment_lv2 === 'settings/account') this @endif">
				アカウント設定
			</a>
		</li>
		<li>
			<a href="/settings/push" class="sidebar_item type009 @if ($segment_lv2 === 'settings/push') this @endif">
				通知設定
			</a>
		</li>
		<li>
			<a href="/settings/block" class="sidebar_item type009 @if ($segment_lv2 === 'settings/block') this @endif">
				ブロック設定
			</a>
		</li>
		<li>
			<a href="/logout" class="sidebar_item type009">
				ログアウト
			</a>
		</li>
	</ul>
<!--		<div class="copyright">
		Copyright&copy; DENTAKU. All rights reserved.
	</div>-->
</div>
<!-- /#sidebar-left-wrapper -->
@show
@yield('content')
</div>
<!-- /#left-wrapper -->
@section('footer-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/data/bootstrap/js/bootstrap.min.js"></script>
<script src="/data/bootstrap/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/data/bootstrap/bootstrap-select/js/i18n/defaults-ja_JP.js"></script>
<script src="/data/bootstrap/bootstrap3-dialog/js/bootstrap-dialog.min.js"></script>
<script src="/data/js/common.js"></script>
@show
</body>
</html>
