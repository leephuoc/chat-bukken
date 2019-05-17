<?php
	$segments = Request::segments();
	$segment_lv1 = $segments[0];
	$segment_lv2 = $segments[0].(!isset($segments[1]) ? : '/'.$segments[1]);
	$version = '20180614';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
@section('meta')
<meta charset="UTF-8" />
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1" />-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="_token" content="{!! csrf_token() !!}"/>
@show

<link rel="apple-touch-icon" sizes="57x57" href="/data/img/favicon/apple-touch-icon-57x57.png?ctime=160331">
<link rel="apple-touch-icon" sizes="60x60" href="/data/img/favicon/apple-touch-icon-60x60.png?ctime=160331">
<link rel="apple-touch-icon" sizes="72x72" href="/data/img/favicon/apple-touch-icon-72x72.png?ctime=160331">
<link rel="apple-touch-icon" sizes="76x76" href="/data/img/favicon/apple-touch-icon-76x76.png?ctime=160331">
<link rel="apple-touch-icon" sizes="114x114" href="/data/img/favicon/apple-touch-icon-114x114.png?ctime=160331">
<link rel="apple-touch-icon" sizes="120x120" href="/data/img/favicon/apple-touch-icon-120x120.png?ctime=160331">
<link rel="apple-touch-icon" sizes="144x144" href="/data/img/favicon/apple-touch-icon-144x144.png?ctime=160331">
<link rel="apple-touch-icon" sizes="152x152" href="/data/img/favicon/apple-touch-icon-152x152.png?ctime=160331">
<link rel="apple-touch-icon" sizes="180x180" href="/data/img/favicon/apple-touch-icon-180x180.png?ctime=160331">
<link rel="icon" type="image/png" href="/data/img/favicon/favicon-32x32.png?ctime=160331" sizes="32x32">
<link rel="icon" type="image/png" href="/data/img/favicon/android-chrome-192x192.png?ctime=160331" sizes="192x192">
<link rel="icon" type="image/png" href="/data/img/favicon/favicon-96x96.png?ctime=160331" sizes="96x96">
<link rel="icon" type="image/png" href="/data/img/favicon/favicon-16x16.png?ctime=160331" sizes="16x16">
<link rel="manifest" href="/data/img/favicon/manifest.json?ctime=160331">
<link rel="mask-icon" href="/data/img/favicon/safari-pinned-tab.svg?ctime=160331" color="#5bbad5">
<link rel="shortcut icon" href="/data/img/favicon/favicon.ico?ctime=160331">
<meta name="apple-mobile-web-app-title" content="物件会議">
<meta name="application-name" content="物件会議">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/data/img/favicon/mstile-144x144.png?ctime=160331">
<meta name="msapplication-config" content="/data/img/favicon/browserconfig.xml?ctime=160331">
<meta name="theme-color" content="#ffffff">

<title>@yield('title') | 物件会議</title>

@section('header-css')
<!-- Bootstrap -->
<link href="/data/css/class.css" rel="stylesheet" />
<link href="/data/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="/data/bootstrap/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<!--<link href="/data/bootstrap/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" />-->
<link href="/data/bootstrap/bootstrap3-dialog/css/bootstrap-dialog.min.css" rel="stylesheet" />
<link href="/data/css/common.css" rel="stylesheet" />
<link href="/data/css/login.css" rel="stylesheet" />
@show

@section('header-js')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="/data/js/hcommon.js?ctime=<?= $version ?>"></script>
@show

</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<a href="/"><img src="/data/img/logo_jp.png" class="mT8" style="height: 24px; width: auto;"/></a>
	</div>
</nav>
	
@yield('content')
</div>
<!-- /#wrapper -->
@section('footer-js')
<script src="/data/js/php.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/data/js/jquery.timer.js"></script>
<script src="/data/bootstrap/js/bootstrap.min.js"></script>
<script src="/data/bootstrap/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/data/bootstrap/bootstrap-select/js/i18n/defaults-ja_JP.js"></script>
<!--<script type="text/javascript" src="/data/bootstrap/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>-->
<script src="/data/bootstrap/bootstrap3-dialog/js/bootstrap-dialog.min.js"></script>
<script src="/data/js/common.js"></script>
@show
</body>
</html>