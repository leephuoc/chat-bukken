<?php
$segments = Request::segments();
$segment_lv1 = array_get($segments, 0, '');
$segment_lv2 = $segment_lv1.(!isset($segments[1]) ? : '/'.$segments[1]);
$wrapper = isset($wrapper) ? $wrapper : ['class' => 'right-toggled'];
$version = '20180615';
?>
		<!DOCTYPE html>
<html lang="ja">
<head>
	@section('meta')
		<meta charset="UTF-8" />
		@include('analytics.analytics')
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!--<meta name="viewport" content="width=device-width, initial-scale=1" />-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<meta http-equiv="refresh" content="3600;url=/logout" />
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
		<link href="/data/bootstrap/bootstrap3-dialog/css/bootstrap-dialog.min.css" rel="stylesheet" />
		<link href="/data/css/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
		<link href="/data/css/layout.css?ctime=<?= $version ?>" rel="stylesheet" />
		<link href="/data/css/common_rebuild.css" rel="stylesheet" />
		<link href="/data/css/common.css?ctime=<?= $version ?>" rel="stylesheet" />
		<link href="/data/css/master.css?ctime=<?= $version ?>" rel="stylesheet" />
		<style type="text/css">
			/*----- reset -----*/
			html,
			body,
			div,
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
			.no-fixed-top {
				padding-top: 0;
			}
			.no-fixed-top .navbar-fixed-top{
				position: static;
			}
			.fixed-top {
				padding-top: 170px;
			}
			input {
				border: 0
			}

			a:link,
			a:visited {
				color: #114285;
			}

			/*a:hover {*/
				/*color: #94c03d*/
			/*}*/

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
				padding: 0;
			}

			/*----- Header -----*/
			#header {
				background-color: #2e3548;
				color: #fff;

			}
			.show-mb{
				display: none;
			}
			.tmp_hlogo {
				width: 200px;
				padding: 27px 0;
				float: left;
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
				width: 74%;
				height: 100%;
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

				position: relative;
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
			.wrap-tows{
				position: absolute;
				top: 3px;
				left: 50px;
			}
			.wrap-tows > span {
				padding: 3px 6px;
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
				padding: 17px 0;
			}
			.navigation ul li.current{
				background: #394157;
			}
			.navigation ul li:nth-child(1) a{
				border-right: 1px solid transparent !important;
			}
			/*.navigation ul li:hover a,*/
			.navigation ul li.current a{
				border-right: 1px solid transparent;
				border-left: 1px solid transparent !important;
			}
			.header-aside .navigation ul{
				display: flex;
				-webkit-display:flex;
				width: 100%;
			}
			.header-aside .navigation ul li:nth-child(1){
				flex-basis: 18.8%;
				-webkit-flex-basis: 18.8%;
				width: 18.8%;
			}
			.header-aside .navigation ul li:nth-child(2){

			}
			.header-aside .navigation ul li{
				flex-basis: 20.6%;
				-webkit-flex-basis: 20.6%;
				width: 20.6%;
			}
			.header-aside .navigation ul li:nth-child(5){
				flex-basis: 19.4%;
				-webkit-flex-basis: 19.4%;
				width: 19.4%;
				padding-right: 3px;
			}
			.navigation ul li a {
				display: block;
				text-align: center;
				text-decoration: none;
				border-right: 1px solid #8e9bb3;
			}

			.navigation ul li a.first-item {
				border-left: 1px solid #8e9bb3;
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
				font-size: 12px;
				margin-top: 8px;
			}

			.navigation ul li a:hover .nav-text,
			.navigation ul li a:focus .nav-text {
				text-decoration: none;
			}

			.navigation ul li.active a .nav-symbol,
			.navigation ul li a:hover .nav-symbol,
			.navigation ul li a:focus .nav-symbol {
				background-color: #394157;
			}
			.setting-link {
				width: 124px;
				position: relative;
				float: right;
				top: 50%;
				transform: translate(0%, -50%);
			}
			.menu-mb{
				display: none;
			}
			.setting-link a {
				margin-bottom: 9px;
				padding: 4px 6px;
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
				font-size: 12px;
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
			
			#breadcrumb .breadcrumb > li a .glyphicon-home{
				margin-right: 7px;
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

			/* ==================================================
            Start property conference
            ================================================== */
			.main-inner {
				padding-top: 15px;
			}

			.conference-title {
				margin-bottom: 10px;
				padding: 0 0 10px 29px;
				font-size: 16px;
				color: #282b30;
				font-weight: bold;
				border-bottom: 1px solid #c3c5cb;
				background: url(/data/img/front/icon-search.png) no-repeat 0 0 scroll;
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
				box-shadow: none;
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
				text-decoration: none;
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
				padding: 0;
				float: left;
				width: 75px;
			}

			.group-search .search-main .action-choice a {
				padding: 5px 7px 4px;
				line-height: 1.2;
				font-size: 12px;
				font-weight: 500;
				display: inline-block;
				text-align: center;
				color: #036bd5;
				border: 1px solid #5b87ff;
				-moz-border-radius: 4px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				min-width: 44px;
			}

			.group-search .search-main .action-choice a:hover,
			.group-search .search-main .action-choice a:focus {
				text-decoration: none;
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
				display: inline-flex;
				align-items: center;
				vertical-align: middle;
			}

			.category-tags .tags-item:hover .tags-text,
			.category-tags .tags-item:focus .tags-text {
				text-decoration: none;
			}

			.icons-close-pop {
				position: relative;
				top: -1px;
				cursor: pointer;
				margin-left: 8px;
				display: inline-block;
				vertical-align: middle;
				width: 8px;
				height: 8px;
				background: url(/data/img/front/icons-close.png) no-repeat scroll;
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
				background: url(/data/img/front/bg-line.png) no-repeat scroll;
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
				background: url(/data/img/front/icons-searh-result.png) no-repeat 0 0 scroll;
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
				width: 92px;
				height: 30px;
				border: 1px solid #3e455a;
				font-size: 12px;
				text-align: center;
				text-align-last: center;
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
            .btn-message-send:focus{
                color: #ffffff;
            }
			.result-list .result-item:hover,
			.result-list .result-item:focus {
				background-color: #f4f4f4;
			}

			.result-list .result-item .result-inside {
				padding: 23px 0 20px;
				overflow: hidden;
				width: 100%;
			}

			.result-list .result-item .company-heading {
				padding: 10px 3px;
				float: left;
				width: 32px;
				color: #fff;
				text-align: center;
			}

			.article-red {
				background-color: #e7362d;
			}

			.article-red-light {
				background-color: #f7574f;
			}

			.article-blue {
				background-color: #285cb4;
			}

			.article-blue-light {
				background-color: #5380ca;
			}

			.article-green {
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

			.result-list .company-name .company-logo{
				margin-bottom: 20px;
				height: 130px;
				height: 130px;
				display: -webkit-box;
				display: -webkit-flex;
				display: -moz-flex;
				display: -ms-flexbox;
				display: flex;
				flex-direction: column;
				justify-content: center;
				background-color: #ffffff;
				overflow: hidden;
				border: 1px solid #e7e7e7;
			}

			.result-list .company-name .company-logo img {
				display: block;
				margin: 0 auto;
			}

			.result-list .company-name .logo{
				margin-bottom: 20px;
				height: 130px;
				height: 130px;
				display: -webkit-box;
				display: -webkit-flex;
				display: -moz-flex;
				display: -ms-flexbox;
				display: flex;
				flex-direction: column;
				justify-content: center;
				background-color: #ffffff;
				overflow: hidden;
				border: 1px solid #e7e7e7;
			}

			.result-list .company-name .logo img {
				display: block;
				margin: 0 auto;
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
				position: relative;
				padding-bottom: 32px;
				overflow: hidden;
				height: 100%;
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
				font-weight: bold;
			}
			.punctuate-txt{
				font-weight: bold;
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
				font-size: 17.66px;
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
				font-size: 14.66px;
				margin-bottom: 10px;
				-webkit-box-orient: vertical;
				overflow: hidden;
				display: -webkit-box;
				line-clamp: 3;
				-webkit-line-clamp: 2;
			}

			.para-ranking-date {
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
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
				font-size: 12px;
				color: #9a9a9a;
			}

			/* ==================================================
            End property conference
            ================================================== */
			/* ==================================================
            Start modal
            ================================================== */
			@media (min-width: 768px) {
				.modal-select-search .modal-dialog {
					width: 791px;
				}

				.modal-division .modal-dialog {
					width: 490px;
				}
			}

			.modal-select-search .modal-header,
			.modal-division .modal-header {
				padding-bottom: 12px;
				border-bottom: 1px dotted #a5a5a5;
				background-color: inherit;
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
				background: url(/img/front/comment-arrow-left.png) no-repeat scroll;
			}

			.chatbox-comment .box-comment .box-arrow-right {
				right: -19px;
				background: url(/img/front/comment-arrow-right.png) no-repeat scroll;
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

			.buyer-info .buyer-list .mCSB_outside + .mCS-minimal-dark.mCSB_scrollTools_vertical,
			.buyer-info .buyer-list .mCSB_outside + .mCS-minimal.mCSB_scrollTools_vertical {
				right: -28px;
			}

			.buyer-info .chatbox-buyer {
				overflow: hidden;
			}

			.chatbox-buyer .chatbox-post {
				padding: 12px 0;
				background-color: #ffffff;
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
				border: 1px solid #cccccc !important;
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
				padding: 40px 0 50px;
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
				margin: 12px 22px 0 0;
			}

			.trademark-brokerage .circle-brokerage-type,
			.trademark-brokerage .logo-trade {
				width: 100px;
				height: 100px;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				border-radius: 50%;
				float: left;
			}

			.trademark-brokerage .circle-brokerage-type {
				font-size: 14px;
				font-weight: bold;
				text-align: center;
				padding: 0 20px 0 10px;
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
				margin-bottom: 20px;
				font-size: 18px;
				font-weight: bold;
				line-height: 1.6;
			}

			.parameter-detail .para-properties {
				margin-bottom: 30px;
				line-height: 1.7;
				font-size: 13px;
			}

			.table-info .table tr > td,
			.table-info .table tr > th {
				padding: 8px 10px 5px 20px;
				border-top: 1px dotted #808080;
				font-size: 12px;
			}

			.table-info .table tr > th {
				font-weight: normal;
				background-color: #eeeeee;
				width: 140px;
			}

			.table-info .table-line {
				border-bottom: 1px dotted #808080;
				padding-bottom: 0 !important;
				margin-bottom: 3px;
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
				margin: 0 -10px;
			}


			.checkbox-list .checkbox-item {
				padding: 3px 10px;
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
			.dropdown-setting{
				top: 53px;
			}
			.dropdown-setting:before{
				position: absolute;
				left: 50%;
				top: -5px;
				margin-left: -5px;
				content: '';
				width: 0;
				height: 0;
				border-left: 9px solid transparent;
				border-right: 9px solid transparent;
				border-bottom: 9px solid #d7deee;
			}
            .create-re-responsive ~ .modal-select-search .panel-default>.panel-heading+.panel-collapse>.panel-body {
                background: #ffffff;
                border-top: 7px solid #E7E7E7;
            }
            .create-re-responsive ~ .modal-select-search .panel-group .panel+.panel {
                margin-top: 17px;
            }
			.create-re-responsive ~ .modal-select-search .panel-heading .collapse-drop.active {
				height: 29px;
			}
			.create-re-responsive ~ .modal-select-search .panel-heading .collapse-drop {
				height: 29px;
			}
			.create-re-responsive ~ .modal-select-search .panel-group {
				margin-bottom: 15px;
			}
			.create-re-responsive .btn-show-template {
				text-decoration: none;
				cursor: pointer;
			}
			.create-re-responsive .btn-show-template ~ .note {
				align-self: flex-end;
				margin-left: 3px;
			}
			.create-re-responsive .bootstrap-select.btn-group .dropdown-menu.inner {
				max-height: 250px !important;
			}
			.create-re-responsive ~ .modal-select-search .styled-checkbox-test + label {
				padding: 1px 18px 0 29px;
			}
			.create-re-responsive ~ .modal-select-search .styled-checkbox-test + label span {
				word-break: break-word;
			}
			.create-re-responsive ~ #modal-error-db .modal-footer .btn,
			.create-re-responsive ~ #modal-delete-template .modal-footer .btn {
				width: 96px !important;
			}
			.create-re-responsive textarea,
			.create-re-responsive input,
			.create-re-responsive ~ .modal-select-search textarea,
			.create-re-responsive ~ .modal-select-search input {
				-webkit-appearance: none;
				box-shadow: none;
				-webkit-box-shadow: none;
			}
			.create-re-responsive ~ .modal-select-search textarea {
				resize: none;
			}
			.create-re-responsive .add-iteam {
				width: 40px;
				font-size: 20px;
				padding-left: 10px;
				line-height: 1.6;
			}
			.validate-template-form .modal-body {
				padding: 15px 25px;
			}
			#title-add.error,
			#title-edit.error,
			#content-add.error,
			#content-edit.error {
				color: #555 !important;
			}
			.mg-custom {
				margin-bottom: 7px;
			}
            .template-content {
				word-break: break-word;
                text-align: left;
                white-space: pre-wrap;
            }
            .nav-btn-group {
                display: flex;
                padding: 0 25px 10px;
                flex-direction: row-reverse;
            }
            .nav-btn-group a {
                margin-left: 7px;
            }
			.nav-btn-group a:nth-child(1) {
				color: #337ab7;
				font-weight: bold;
			}
			.template-empty {
				margin: 0px 25px 15px;
				padding: 80px 10px;
				background: #fff;
			}
			.hide-when-no-data {
				display: none !important;
			}
			.edit-template .form-group,
			.add-template .form-group {
				text-align: left;
			}
			.edit-template .form-group label,
			.add-template .form-group label {
				margin-bottom: 3px;
				font-weight: normal;
			}
			.border-transparent {
				border-color: transparent;
			}
			.border-transparent:hover {
				border-color: #adadad;
			}
			.alert-template-custom {
				margin: 0px 25px 10px 10px;
			}
			/*Media Query*/
			@media (max-width: 1200px) {
				.dropdown-setting{
					right: 0;
				}
				.dropdown-setting:before{
					right: 52px;
					left: auto;
				}
			}

			@media (min-width: 992px) and (max-width: 1030px) {
				.container {
					width: 960px !important;
				}
				#wrapper {
					min-width: 990px;
				}
				#header {
					min-width: 990px;
				}
                .create-re-responsive,
                .confirm-create-post {
                    padding: 0px ;
                }
				.mg-custom {
					margin-bottom: 2px !important;
				}

                .create-re-responsive .add-iteam {
                    padding: 0 15px;
                }
			}

			@media (max-width: 1023px) {
				.create-re-responsive ~ .modal-select-search textarea,
				.create-re-responsive #comment {
					outline-offset: 0px;
					outline-style: auto;
					outline-width: 0px;
				}
			}

			@media (max-width: 991.98px) {
				#containerWrap {
					padding: 0;
				}
				#contents {
					padding: 0;
				}
				#contentsWrap {
					padding: 0;
				}

				.create-re-responsive {
					padding: 0 15px;
					min-height: calc(100vh - 110px);
				}
				.create-re-responsive .oneclick3,
				.create-re-responsive .oneclick6,
				.create-re-responsive .oneclick10 {
					margin-bottom: 10px;
				}
				.create-re-responsive #add-item-placeholder label span {
					padding: 0px 15px;
				}
				.create-re-responsive .title-step {
					margin: 0 0 5px 0;
				}
				.create-re-responsive .control-label {
					margin-bottom: 5px;
					padding-top: 0px;
					width: 100%;
				}
				.create-re-responsive .form-horizontal .form-group {
					margin-bottom: 32px;
				}
				.create-re-responsive .form-group .btn-group.bootstrap-select {
					width: 100%;
				}
				.create-re-responsive .btn-group.bootstrap-select button span {
					text-align: center !important;
				}
				.create-re-responsive .mT50 {
					margin-top: 0 !important;
				}
				.create-re-responsive .add-iteam {
					float: left;
					width: unset;
					padding: 0;
					line-height: 1.5;
				}
				.create-re-responsive .select-horizontal {
					float: left;
					width: 48.5%;
				}
				.create-re-responsive .bootstrap-select.btn-group .dropdown-menu li a span.text {
					white-space: normal;
				}
				.create-re-responsive .mT50 .visible-xs-block {
					display: none !important;
				}
				.create-re-responsive a.flat_button.h40px.submit-articles {
					width: 100%;
				}
				.create-re-responsive .mg-btn-on-sm-devi {
					margin-bottom: 10px;
				}
				.create-re-responsive .error-two-select {
					display: inline-block;
					padding: 0px 15px;
				}
				.create-re-responsive .noti-when-change-selection .modal-footer .btn {
					width:80px ;
				}
				.create-re-responsive ~ .modal-select-search .modal-footer .btn {
					width: 85px;
				}
				.create-re-responsive ~ .modal-select-search .modal-dialog {
					left: -2px;
				}
				#modal-delete-template .btn-default,
				#modal-delete-template .btn-primary,
				#modal-error-db .btn-default {
					width: 85px;
				}
				.confirm-create-post {
                    min-height: calc(100vh - 110px);
					padding: 0px 15px;
				}
				.confirm-create-post .mT50 {
					margin-top: 0 !important;
				}
				.hide-small-device {
					display: block;
				}
				.nav-btn-group {
					padding: 0 10px 10px;
				}
				.template-empty {
					margin: 0px 10px 15px;
				}
				.mg-custom {
					margin-bottom: 2px !important;
				}
				.alert-template-custom {
					margin: 0px 10px 10px 10px;
				}
				.header-aside .headerBalloon.userMenu{
				    top: 106% !important;
				 }
				.dropdown-setting{
				    top: 67px;
				    right: 0;
				    width: 100%;
				    -moz-box-shadow: none;
				    -webkit-box-shadow: none;
				    box-shadow: none;
				}
				.dropdown-setting:before{
					display: none;
				}
				.dropdown-setting .dropdown-body {
					/*background-color: rgba(255, 255, 255, 0.9);*/
					-moz-box-shadow: none;
				    -webkit-box-shadow: none;
				    box-shadow: none;
				}
				/*.dropdown-setting .dropdown-body .dropdown-heading {*/
					/*padding: 13px 24px;*/
					/*background-color: #2e3548;*/
					/*line-height: 1.2;*/
					/*font-weight: bold;*/
					/*color: #fff;*/
				/*}*/
				.dropdown-setting .dropdown-body .dropdown-list-nav {
					list-style: none;
					margin: 0;
					padding: 10px 0;
				}
				/*.dropdown-setting .dropdown-body .dropdown-list-nav li {*/
					/*padding: 10px 10px 10px 36px;*/
					/*background: none;*/
					/*line-height: 1.1;*/
				/*}*/
				.dropdown-setting .dropdown-body .dropdown-list-nav li a {
					display: block;
					text-decoration: none;
					/*color: #000;*/
				}
				.dropdown-setting .dropdown-body .dropdown-list-nav li a:hover,
				.dropdown-setting .dropdown-body .dropdown-list-nav li a:focus{
					text-decoration: underline;
				}
				.fixed-top {
					padding-top: 43px;
				}
				#footer{
					padding: 6px 0px !important;
					font-size: 8px;
					color: #fff !important;
				    background: #2c354a !important;
					font-family: Yu Gothic, YuGothic, Montserrat, sans-serif;
					text-align: center !important;
				}
				#footer .container{
					padding: 0 15px;
				}
				.hide-mb{
					display: none;
				}
				.show-mb{
					display: block;
				}
				.tmp_hlogo {
					padding: 4px 0 0;
					float: initial;
					margin: 0 auto;
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
					width: initial;
					height: 31px;
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

				.header-aside {

				}

				.setting-link {
					display: none;
				}
				.menu-mb{
					display: block;
					position: relative;
					width: 100%;
					height: 63px;
					background: #3e455a;
					float: initial;
					margin: 0 auto;
					cursor: pointer;
				}
				.menu-mb span{
					position: absolute;
					width: 30px;
					height: 2px;
					background: #fff;
					top: calc(50% - 1px);
					left: calc(50% - 15px);
					transition: 0.2s;
				}
				.menu-mb span:nth-child(1){
					transform: translateY(-10px);
				}
				.menu-mb span:nth-child(3){
					transform: translateY(10px);
				}
				.menu-mb.open span:nth-child(2){
				    display: none;
				}
				.menu-mb.open span:nth-child(1){
					transform: translateY(-10px);
					-moz-transform: rotate(45deg);
					-webkit-transform: rotate(45deg);
					transform: rotate(45deg);
				}
				.menu-mb.open span:nth-child(3){
					transform: translateY(10px);
					-moz-transform: rotate(-45deg);
					-webkit-transform: rotate(-45deg);
					transform: rotate(-45deg);
				}
				.navigation {
					float: none;
					width: auto;
				}

				.navigation ul li {
					padding: 8px 0 6px;
				}
				.navigation ul li:nth-child(4) a{
					border-right: 0;
				}
				.navigation ul li.navigation-last{
					padding: 0;
					background: #3e455a;
					padding-right: 0px !important;
				}
				#breadcrumb{
					display: none;
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
				.border-btnBack {
					margin: 0 15px 15px;
					border-bottom: 1px solid #dfdfdf;
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
				.navigation ul li a .nav-text{
					font-size: 10px;
					line-height: 1.1;
					margin-top: 8px;
				}
				.navigation ul li a img{
					max-width: 30px;
					margin: 0 auto;
				}
				.navigation ul li a #img-corporate {
					height: 30px;
					width: 30px;
					max-width: 100%;
				}
				.navigation ul li .tmp_hlogo a img{
					max-width: 34px;
				}
				.main-inner {
					overflow-x: hidden;
				}
				/* ==================================================
                Start smart phone property conference detail
                ================================================== */

				.format-chatbox {
					overflow-y: auto;
				}

				.format-chatbox.modal-open {
					overflow-y: hidden;
				}

				#main-content {
					overflow: inherit;
				}

				.container {
					width: 100% !important;
				}

				.wrap-tows {
					position: absolute;
					top: 0px;
					left: 38px;
				}

				.trademark {
					padding: 36px 0 40px;
				}

				.buyer-info .buyer-list {
					width: 100%;
					float: none;
					margin-right: 0;
					clear: both;
				}

				.buyer-info .chatbox-buyer {
					clear: both;
					float: none;
					padding: 0 15px;
					margin: 18px -15px 0;
				}

				.buyer-info .chatbox-buyer .chatbox-inner {
					margin: 0 -15px;
				}

				.parameter-detail .posted-title {
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
				.checkbox-list .checkbox-item:nth-child(3n+1){
				    clear: inherit;
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
					font-size: 14px;
					padding: 14px 10px 13px 39px;
					margin: 0 -15px;
					background-color: #dadada;
					background-position: 10px 13px;
				}

				.panel-search {
					padding: 20px;
					margin: 0 -15px;
					border-bottom: 1px solid #c5c5c5;
					background: #ededed;
				}

				.group-search {
					padding: 10px 0;
				}

				.group-search:first-child {
					padding-top: 0;
				}

				.group-search:nth-child(2) .group-search-item:nth-child(1),
				.group-search:nth-child(3) .group-search-item:nth-child(1) {
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
					background: url(/data/img/front/bg-drop-select-sp.png) no-repeat right center scroll #ededed;
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
					max-width: inherit;
					margin: 0 auto;
					width: 100%;
				}

				.panel-result .search-result, .panel-result .search-rank {
					display: block;
				}
				.panel-result .search-result{
					padding-right: 0;
					margin-right: 0;
					border-right: 0;
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
					text-align: center;
					text-align-last: center;
				}

				.panel-result .search-rank:nth-child(1) {
					padding-right: 14px;
					border-right: 1px solid #c0c0c0
				}
				.panel-result .search-rank:nth-child(2) {
					text-align: left;
				}
				.panel-result .search-rank label {
					color: #fff;
					display: inline-block;
					vertical-align: middle;
					width: 33px;
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
					padding: 6px 3px;
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
					padding-bottom: 0px;
				}

				.result-list .result-item .result-inside {
					padding: 12px 0;
				}

				.result-list .result-item .company-information .company-business {
					padding-right: 0;
				}

				.result-list .company-name .company-logo {
					padding: 0;
					margin: 0 14px 0 0;
					float: left;
					width: 80px;
					height: 80px;
				}
				.result-list .result-item .company-name .company-tags {
					overflow: hidden;
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
					padding: 4px 9px 4px;
					margin-bottom: 6px;
					text-align: center;
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
					margin-top: 15px;
				}

				.post-detail-no-box.wrap-article-detail {
					padding: 0px 14px 0px 15px;
				}

				.post-detail-no-box.wrap-article-detail .table-info .table-responsive {
					border: unset;
				}

				.post-detail-no-box.wrap-article-detail .table-info .table tr > th {
					width: 141px;
					padding: 8px 0 0 20px;
				}

				.para-ranking {
					margin-bottom: 7px;
				}

				.para-ranking-date {
					position: unset;
					line-height: 1;
				}

				/* ==================================================
                End smart phone property conference
                ================================================== */
			}
			@media (max-width: 576px) {
				.nav-btn-group {
					flex-wrap: wrap;
				}
				.nav-btn-group a:nth-child(2),
				.nav-btn-group a:nth-child(3) {
					margin-top: 7px;
				}
			}
			@media (max-width: 380px) {
				.create-re-responsive ~ .modal-select-search .add-template .modal-body,
				.create-re-responsive ~ .modal-select-search .edit-template .modal-body {
					max-height: 362px;
					overflow-y: auto;
				}
			}
			@media (max-width: 360px) {
				.create-re-responsive .select-horizontal {
					float: left;
					width: 48%;
				}
				.create-re-responsive .add-iteam {
					line-height: 1.8;
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
			@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
				.create-re-responsive .add-iteam {
					line-height: 1.8;
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
			#img-corporate {
				height: 61px;
				width: 61px;
				object-fit: contain;
				background: #ffffff;
			}
			.search-list #contents{
				padding-top: 0;
			}
			/*.search-list .navbar-fixed-top{*/
				/*position: static;*/
			/*}*/
			.create-article #main-content {
				margin-top: 170px;
			}
			.setting-account-corporate #main-content {
				margin-top: 160px;
			}
		</style>
		<style>
			.tooltip {
				z-index: 9999999;
				position: fixed;
			}
		</style>
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
<body class="@yield('body_class')">
<input type="hidden" name="user_id" value="{{ $login_user->id }}" id="current_user_id">
<div id="containerWrap">
	<div class="navbar-fixed-top">
		<header id="header">
			<div class="container">

				<div class="header-aside">
					<nav class="navigation">
						<ul>
							<li class="navigation-hover nav-header-item">
								<div class="tmp_hlogo">
									<a href="/dentaku/all">
										<img src="/data/img/front/logo-text.png" alt="物件会議" title="物件会議" class="hide-mb" />
										<img src="/data/img/front/logo-menu-mb.png" alt="物件会議" title="物件会議" class="show-mb" />
									</a>
								</div>
							</li>
                            <? $flag = (Request::segment(1) == '' || Request::segment(2) == 'all' || Request::segment(3) == 'detail') ? true : false ?>
							<li class="navigation-hover @if (!empty($flag)) current @endif">
								<a href="/dentaku/all" class="reset-pd-header-item first-item">
									@if ($flag)
										<img src="/data/img/header/icn_02_active.png" alt="買い手を探す" title="買い手を探す" />
									@else
										<img src="/data/img/header/icn-02.png" alt="買い手を探す" title="買い手を探す" width="61" height="61">
									@endif
									<span class="nav-text">買い手を探す</span>
								</a>
							</li>
							<? $flag = (Request::segment(2) == 'create' || Request::segment(3) == 'check' || Request::segment(3) == 'edit') ? true : false ?>
							<li class="active navigation-hover @if (!empty($flag)) current @endif">
								<a href="/dentaku/create" class="reset-pd-header-item">
									@if ($flag)
										<img src="/data/img/header/icn_01_active.png" alt="探している物件" title="探している物件" />
									@else
										<img src="/data/img/header/icn_01.png" alt="探している物件" title="探している物件" />
									@endif
									<span class="nav-text"><span>新規投稿</span><span class="hide-mb">（物件を募集する）</span> </span>
								</a>
							</li>
							<? $flag = Request::segment(1) == 'history-chat' ?>
							<li class="navigation-hover @if (!empty($flag)) current @endif">
								<a id="headerCorporateLogo" class="reset-pd-header-item" href="javascript:void(0)">
									@if($login_user->corporate->logo_exists)
										<img id="img-corporate" class="img-circle" src="{{ $login_user->corporate->logo_url }}" height="61" width="61" style="display: inline;"/>
									@else
										@if ($flag)
											<img src="/data/img/header/icon_chat_active.png" alt="マイページ" title="マイページ" height="61" width="61"/>
										@else
											<img src="/data/img/header/icon_chat.png" alt="マイページ" title="マイページ" height="61" width="61"/>
										@endif
									@endif
									<span class="wrap-noti wrap-tows">
										@if($total_notification > 0)
											<span class="badge color-58CC59 badge_message">{{ $total_notification }}</span>
										@endif
									</span>
									<p class="nav-text" style="color: white;">
										<span class="hide-mb">ﾁャット</span>
										<span class="show-mb">ﾁャット</span>
									</p>
								</a>

							</li>
							<li class="navigation-hover navigation-last">
								<div class="menu-mb">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<div class="setting-link">
									<a class="btn btn-xs dropBtnSettings">
										マイページ
									</a>
									<a href="/infos/" class="btn btn-xs color-9AABC1">
										@if(!empty($badge_info))
											<span class="badge color-E53632 badge_info">{{ $badge_info }}</span>
										@endif
										ニュース
									</a>
									<a href="https://tayori.com/faq/f37d4afc92478d1d5a075d5563576f915032b402" target='_blank'>
										使い方マニュアル
									</a>
								</div>
							</li>
						</ul>
					</nav>

					<div class="headerBalloon userMenu" style="display: none; position:absolute; z-index: 100; box-shadow: 0px 1px 1px 0px #b3b3b3; left: 70%;
    top: 89%;transform: translate(-50%, 0%); opacity: 1;">
						<p style="background-color: #d7deee; padding: 5px 10px 5px 5px; margin: 0 !important;">
							<strong style="color: black; text-align: left;">{{ $login_user->corporate->full_name }}</strong>
							<a href="/settings/account/user" style="text-align: left;">{{ $login_user->name }}</a>
							<span style="color: black;">さん</span>
						</p>
						<span style="width: 0;height: 0;border-style: solid;border-width: 0 10px 10px 10px;border-color: transparent transparent #d7deee transparent;position: absolute;top: -9px;left: 0;right: 0;margin: 0 auto;"></span>
					</div>

					<div class="dropdown-setting">
						<div class="dropdown-body">
							<div class="dropdown-heading">
								投稿管理
							</div>
							<ul class="dropdown-list-nav">
								<li><a href="/dentaku/create">新規投稿（物件を募集する）</a></li>
								<li><a href="/dentaku/my-list">自分の投稿一覧</a></li>
							</ul>
							<div class="dropdown-heading">
								アカウント設定
							</div>
							<ul class="dropdown-list-nav">
								@if($login_user->user_auth_type_id >= Config::get('dentaku.user_auth_type.admin'))
									<li><a href="/settings/account/corporate">会社情報</a></li>
								@endif
								<li><a href="/settings/account/user">自分の情報</a></li>
								@if($login_user->user_auth_type_id >= Config::get('dentaku.user_auth_type.admin'))
									<li><a href="/settings/account/users">担当者管理</a></li>
								@endif
								@if($login_user->user_auth_type_id >= Config::get('dentaku.user_auth_type.admin'))
									<li><a href="/settings/account/plan_payment">契約プラン・支払情報</a></li>
								@endif
							</ul>
							<div class="dropdown-heading">
								ブロック設定
							</div>
							<ul class="dropdown-list-nav">
								<li><a href="/settings/blocks">ブロック設定</a></li>
							</ul>
							<div class="dropdown-heading">
								ログアウト
							</div>
							<ul class="dropdown-list-nav">
								<li><a href="/logout">ログアウト</a></li>
							</ul>
							<div class="dropdown-heading hide-small-device">
								ニュース
							</div>
							<ul class="dropdown-list-nav hide-small-device">
								<li><a href="/infos/">ニュース</a></li>
							</ul>
							<div class="dropdown-heading hide-small-device">
								使い方マニュアル
							</div>
							<ul class="dropdown-list-nav hide-small-device">
								<li><a href="/">使い方マニュアル</a></li>
							</ul>
						</div>
					</div>
					{{--<div class="headerBalloon settingsMenuDrop">--}}
					{{--<span></span>--}}
					{{--<div class="headerBalloonFooter">--}}
					{{--<div class="headerBalloonBody">--}}
					{{--<div>--}}
					{{--アカウント設定--}}
					{{--</div>--}}
					{{--<ul>--}}
					{{--@if($login_user->user_auth_type_id >= Config::get('dentaku.user_auth_type.admin'))--}}
					{{--<li><a href="/settings/account/corporate">会社情報</a></li>--}}
					{{--@endif--}}
					{{--<li><a href="/settings/account/user">自分の情報</a></li>--}}
					{{--@if($login_user->user_auth_type_id >= Config::get('dentaku.user_auth_type.admin'))--}}
					{{--<li><a href="/settings/account/users">担当者管理</a></li>--}}
					{{--@endif--}}
					{{--@if($login_user->user_auth_type_id >= Config::get('dentaku.user_auth_type.admin'))--}}
					{{--<li><a href="/settings/account/plan_payment">契約プラン・支払情報</a></li>--}}
					{{--@endif--}}
					{{--</ul>--}}
					{{--<div>--}}
					{{--通知設定--}}
					{{--</div>--}}
					{{--<ul>--}}
					{{--<li><a href="/settings/push">通知設定</a></li>--}}
					{{--</ul>--}}
					{{--<div>--}}
					{{--ブロック設定--}}
					{{--</div>--}}
					{{--<ul>--}}
					{{--<li><a href="/settings/blocks">ブロック設定</a></li>--}}
					{{--</ul>--}}
					{{--<div>--}}
					{{--受信エリア設定--}}
					{{--</div>--}}
					{{--<ul>--}}
					{{--<li><a href="/dentaku/areas">受信エリア設定</a></li>--}}
					{{--</ul>--}}
					{{--<div>--}}
					{{--ログアウト--}}
					{{--</div>--}}
					{{--<ul>--}}
					{{--<li><a href="/logout">ログアウト</a></li>--}}
					{{--</ul>--}}
					{{--</div>--}}
					{{--</div>--}}
					{{--</div>--}}
				</div>
			</div>
		</header>
		<section id="breadcrumb">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="/"><span class="glyphicon glyphicon-home"></span>ホーム</a></li>
					@if(!empty($article))
						@if(strpos(URL::previous(), 'comments'))
							<li><a href="<?= URL::previous() ?>">売りたい履歴</a></li>
						@elseif(strpos(URL::previous(), 'transmits'))
							<li><a href="<?= URL::previous() ?>">買いたい履歴</a></li>
						@endif
					@endif
					<li class="active">
						投稿詳細
					</li>
				</ol>
			</div>
		</section>
	</div>
	<div id="main-content">
		<div id="contents">
			<div id="contentsWrap">
				@yield('content')
			</div>
		</div>
	</div>

	<footer id="footer" style="min-width: inherit; margin:0;">
		<div class="container">
			<div id="footerWrap">
				all rights reserved by 物件会議株式会社（特許出願中）
			</div>
		</div>
	</footer>

</div>
<!-- /#container -->

@section('footer-js')
	<script src="/data/js/php.js"></script>
	<script src="/data/js/jquery.min.js"></script>
	<script src="/data/js/jquery.timer.js"></script>
	<script src="/data/bootstrap/js/bootstrap.min.js"></script>
	<script src="/data/bootstrap/bootstrap-select/js/bootstrap-select.min.js"></script>
	<script src="/data/bootstrap/bootstrap-select/js/i18n/defaults-ja_JP.js"></script>
	<script src="/data/bootstrap/bootstrap3-dialog/js/bootstrap-dialog.min.js"></script>
	<script src="/data/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="/data/js/common.js?ctime=<?= $version ?>"></script>
	<script src="/data/bootstrap/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script src="/data/bootstrap/bootstrap-fileinput/js/fileinput_locale_ja.js"></script>
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
	<!-- footer-js -->
	<script type="text/javascript" src="/data/js/talk2.js?ctime=<?= $version ?>"></script>
	<script src="/data/js/common_rebuild.js"></script>
	<script type="text/javascript">
        $(function()
        {
            // $('#headerCorporateLogo').on("click", function() {
            //     $('.userMenu').stop(true, true).slideToggle();
            // });

            var location = window.location.pathname;

            switch(location) {
                case '/dentaku/transmits':
                    $('body').addClass('comments');
                    break;
                case '/dentaku/create':
                    $('body').addClass('create');
                    break;
                case '/dentaku/all':
                    $('body').addClass('all');
                    break;
                case '/dentaku/comments':
                    $('body').addClass('comments');
                    break;
                default:
                    $('body').removeClass('empty');
            }


            if(reportMode) return;

			@if($login_user->settings_dentaku_item_max)
			@if($login_user->settings_dentaku_item_max - $settings_dentaku_item_current <= 0)
            <?// Session::set('dialog.empty_dentaku_item', '0');  ?>
			@if(!Session::get('dialog.empty_dentaku_item'))
			@if($login_user->user_auth_type_id == Config::get('dentaku.user_auth_type.admin'))
            BootstrapDialog.show({
                cssClass: 'dialog-header-none',
                title: 'お知らせ',
                message: '<span class="dialog-icon dialog-icon-notice">&nbsp;</span><h2>お知らせ</h2>問い合わせ・物件配信の情報配信回数が残数が無くなりました。<br />引き続き配信を行う場合は右上の「追加する」から手続きを行ってください。',
                closable: false,
                buttons: [{
                    label: 'はい',
                    cssClass: 'btn-primary w120px',
                    action: function(dialog){
                        dialog.close();
                    }
                }]
            });
			@else
            BootstrapDialog.show({
                cssClass: 'dialog-header-none',
                title: 'お知らせ',
                message: '<span class="dialog-icon dialog-icon-notice">&nbsp;</span><h2>お知らせ</h2>問い合わせ・物件配信の情報配信回数が残数が無くなりました。<br />引き続き配信を行う場合は管理者にお問い合わせください。',
                closable: false,
                buttons: [{
                    label: 'はい',
                    cssClass: 'btn-primary w120px',
                    action: function(dialog){
                        dialog.close();
                    }
                }]
            });
			@endif
            <? Session::set('dialog.empty_dentaku_item', '1');  ?>
			@endif

			@if($login_user->user_auth_type_id == Config::get('dentaku.user_auth_type.admin'))

            <?
            $systemServices = \App\SystemService::select('id', DB::raw("CONCAT(name, ':', FORMAT(fee_value, 0), '円') AS `name`"))->whereIn('id', [14, 15])->where('corporate_type_id', '=', $login_user->corporate->corporate_type_id)->lists('name', 'id');
            ?>

            $(".btnAddSystemServicPushNum").on(tapEventName, function(){
                BootstrapDialog.show({
                    cssClass: 'dialog-header-none',
                    title: 'お知らせ',
                    message: '<h2>追加購入</h2>{!! Form::select('', $systemServices, '', ['id'=>'btnAddSystemServicPushNumSelect', 'class'=>'f16px show-tick', 'data-width' => '60%']) !!}<div class="mB15 f12px">※購入する内容をお選びください。次回の請求時に加算されます。</div>選択した内容を追加購入しますがよろしいですか？',
                    closable: false,
                    onshow: function(dialog) {
                        $('#btnAddSystemServicPushNumSelect', dialog.$modalBody).selectpicker({language: 'ja-JP'});
                    },
                    buttons: [{
                        label: '購入する',
                        cssClass: 'btn-primary w120px',
                        action: function(dialog){

                            dialog.enableButtons(false);

                            $.ajax({
                                type : 'POST',
                                url : '<?= url('ajax/add-system-service-push-num') ?>',
                                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                                dataType : 'json',
                                data : {
                                    'id':$('#btnAddSystemServicPushNumSelect', dialog.$modalBody).val()
                                },
                                success : function(json)
                                {
                                    if(json && json.hasOwnProperty('result') && json.result)
                                    {
                                        dialog.close();

                                        BootstrapDialog.show({
                                            cssClass: 'dialog-header-none',
                                            title: 'お知らせ',
                                            message: '<span class="dialog-icon dialog-icon-ok">&nbsp;</span><h2>お知らせ</h2>購入が完了しました。<br />引き続き物件会議をご活用ください。',
                                            closable: false,
                                            buttons: [{
                                                label: 'はい',
                                                cssClass: 'btn-primary w120px',
                                                action: function(dialog){
                                                    location.reload(true);
                                                }
                                            }]
                                        });
                                    }
                                    else
                                    {
                                        BootstrapDialog.show({
                                            cssClass: 'dialog-header-none',
                                            title: 'お知らせ',
                                            message: '<span class="dialog-icon dialog-icon-error">&nbsp;</span><h2>お知らせ</h2>問題が発生したため購入できませんでした。<br />お手数ですが画面を更新の上もう一度操作を行ってください。<br />それでも改善しない場合はお問い合わせください。',
                                            closable: false,
                                            buttons: [{
                                                label: 'はい',
                                                cssClass: 'btn-primary w120px',
                                                action: function(dialog){
                                                    location.reload(true);
                                                }
                                            }]
                                        });
                                    }
                                }
                            });
                        }
                    },{
                        label: 'キャンセル',
                        cssClass: 'btn-default w120px',
                        action: function(dialog){
                            dialog.close();
                        }
                    }]
                });
            });
			@endif
					@endif
					@endif

            if(typeof talk2 == 'object')
            {
                talk2.connect(
                    '{{ $login_user->id }}',
                    {
                        'key': '{{ env('PUSHER_KEY') }}',
                        'cluster': '{{ env('cluster') }}'
                    }
                );
            }
        });
	</script>
	<script>(function(t,a,y,o,r,i){r=a.createElement(y),i=a.getElementsByTagName(y)[0];r.type='text/javascript';r.async=1;r.src='//tayori.com/chat/f9ca69036dd28269ba523c7353805b9c042959cb/tag.js';r.id='tayori-chat-tag';i.parentNode.insertBefore(r,i)})(window,document,'script');</script>
@show
<!-- /footer-js -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="https://js.pusher.com/4.3/pusher.min.js"></script>--}}
<script>
	$(document).ready(function(){
	   if($('.scrollArea').length){
	        var boxScroll = $('.scrollArea ul');
	        boxScroll.on('scroll', function() {
	            boxScroll.off('scroll');
	        })
	    }
	});
</script>
</body>

</html>
