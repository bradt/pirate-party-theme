<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/1">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset/reset-min.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style-ie6.css" />
	<![endif]-->
	
<?php wp_head(); ?>
</head>

<body>

<div id="wrapper">
<div id="main">

<div id="header">
	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	<ul class="lang">
		<li class="current"><a href="">English</a> | </li>
		<li><a href="">Français</a></li>
	</ul>
</div>

<ul id="nav">
	<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
