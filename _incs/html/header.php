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

    <link rel="stylesheet" href="/_incs/css/aardvarkmedia.<?php echo cgy_get_current_page(); ?>.css">
    <?php if(is_page_template('page-styleGuide.php')){?><link rel="stylesheet" href="/_incs/css/partials/libs/prismjs.css"><?php } ?>
    <?php if(is_page() && strstr($_SERVER["REQUEST_URI"], '/about-us/')!==false){?><link rel="stylesheet" href="/_incs/css/aardvarkmedia.article.about.css"><?php } ?>
    <!--[if IE]><!--> <link rel="stylesheet" href="/_incs/css/aardvarkmedia.ie.css"> <!--<![endif]-->

    <script src="/_incs/js/lib/modernizr.2.6.2.min.js"></script>
	  <!--[if lte IE 8]><script src="/_incs/js/lib/ie/selectivizr.js"></script><script src="/_incs/js/lib/ie/respond.min.js"></script><![endif]-->

    <?php wp_head(); ?>
	  <?php
			if(is_single() && get_post_type()==='our-work'){
				$linkColour   = get_field('link_colour');
				$statsColour  = get_field('stats_colour');

				$styleHTML = '';

				if($linkColour = is_colour(get_field('link_colour'))){
					$styleHTML.=  '.linkColoured, .project-links a, .project-links a:before, .container-grey-even p a, .container-grey-odd p a, .hintBox-content a{'.
													'color:'.$linkColour.';'.
												'}'.

												'.linkColoured:hover, .project-links a:hover, .project-links a:hover:before, .container-grey-even p a:hover, .container-grey-odd p a:hover, .hintBox-content a:hover{'.
													'color:'.adjustBrightness($linkColour, 40).';'.
												'}'.

												'.linkColoured:active, .project-links a:active, .project-links a:active:before, .container-grey-even p a:active, .container-grey-odd p a:active, .hintBox-content a:active{'.
													'color:'.adjustBrightness($linkColour, 80).';'.
												'}';

				}

				if($statsColour = is_colour(get_field('stats_colour'))){
					$styleHTML.=  '.stats-list em{'.
													'color:'.$statsColour.';'.
												'}'.

												'.statColoured span:before, .statColoured span:after{'.
													'background-color:'.$statsColour.';'.
												'}';
				}

				if(!empty($styleHTML)){
					echo '<style type="text/css">'.$styleHTML.'</style>';
				}
			}
		?>
  </head>
  <body>
    <div class="container">
      <input type="checkbox" class="hidden" id="isQuickContactOpen">
      <div id="quick-contact" class="quick-contact gridbase">

        <?php

          /* This is a rather nasty Contact Form 7 override. Use with caution. Switch to Gravity Forms ASAP */
          echo preg_replace(
                '/\>#(.*?)\</',
                " placeholder='\\1'><",
                str_replace( array(' title="',       ' value="#',                'wpcf7-use-title-as-watermark' ) ,
                             array(' placeholder="', ' value="" placeholder="',  ''                             ),
                             do_shortcode('[contact-form-7 id="2255" title="Quick Contact"]')
                           )
                );

        ?>
      </div>

      <?php

        cgy_get_header_html(false, true, true);

      ?>

