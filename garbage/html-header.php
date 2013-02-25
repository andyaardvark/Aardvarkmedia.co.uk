<?php
/**
* Module Name: Header
*
* @package <theme name>
* @since 1.0
*/


?><!DOCTYPE html>
<!--[if IE 8]>			<html class="no-js lt-ie8" <?php language_attributes(); ?>>   <![endif]-->
<!--[if IE 9]>			<html class="no-js lt-ie9" <?php language_attributes(); ?>>   <![endif]-->
<!--[if gt IE 9]><!-->  <html class="no-js" <?php language_attributes(); ?>>          <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>

    <script type="text/javascript" src="//use.typekit.net/yjy4bfl.js"></script>
    <script type="text/javascript">try{
      Typekit.load();
    } catch(e){
    }</script>

    <link rel="stylesheet" href="/_incs/css/com.website.<?php echo cgy_get_current_page(); ?>.css">
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/royalslider.css' type='text/css' media='screen' />
    <!--[if IE]><!-->
    <link rel="stylesheet" href="/_incs/css/com.website.ie.css">
    <!--<![endif]-->

    <script src="/_incs/js/lib/modernizr.2.6.2.min.js"></script>

    <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>
  <div class="container">