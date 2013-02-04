<!DOCTYPE html>
<html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/">
	<head>
		<title><?php wp_title(''); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<?php wp_head(); ?>
		<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/royalslider.css' type='text/css' media='screen' />
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--[if lt IE 9]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="screen"><![endif]-->
		<script type="text/javascript" src="//use.typekit.net/yjy4bfl.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>
	<body <?php body_class(); ?>>
	<div class="container">