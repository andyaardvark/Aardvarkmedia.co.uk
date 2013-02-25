<?php
/**
 * Template Name: Homepage
 *
 * @package <theme name>
 * @since 1.0
 */
?>

<?php include_once('_incs/html/header.php'); ?>

  <section class="slider-home fadeable">
    <?php echo get_new_royalslider(1); ?>
  </section>

  <div class="gridbase fadeable mainContent">
    <div class="content-full">
      <hgroup class="headline">
        <span class="h2 smiley"><?php the_field('main_heading_opening'); ?></span>
        <h1><?php the_field('main_heading_h2'); ?></h1>
        <h2><?php the_field('main_heading_h3'); ?></h2>
      </hgroup>




      <!-- SERVICES PANEL -->
      <section class="content-half-separated">
        <img src="/_incs/images/_temp/services-placeholder.png" alt="<?php echo strip_tags(get_field('services_heading')); ?>" class="h3-starter img-filler"/>
        <h3 class="sideStripes-double leadingReset"><?php the_field('services_heading'); ?></h3>

        <?php the_field('services_text'); ?>

        <a href="<?php the_field('services_button_destination'); ?>" title="<?php the_field('services_button_tooltip'); ?>" class="button-grey button-full"><?php the_field('services_button'); ?></a>
      </section>
      <!-- ENDOF: SERVICES PANEL -->





      <!-- NEWS PANEL -->
      <section class="content-half-separated">
	      <h3 class="sideStripes leadingReset"><span><?php the_field('news_heading'); ?></span></h3>



				<?php
					$posts = new WP_Query(array(
						'post_type'       => 'post',
						'posts_per_page'  => 2
					));

					if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post();
				?>

		      <article class="postSnippet">

						<h1 class="entry-title">
					    <a href="<?php the_permalink();?>" title="<?php PostSnippets::getSnippet('Proceed to full article'); ?>" class="nonColoured" rel="bookmark">
					      <?php the_title(); ?>
					    </a>
					  </h1>

						<div class="entry-content">
				      <a href="<?php the_permalink();?>" title="<?php PostSnippets::getSnippet('Proceed to full article'); ?>" class="entry-thumb-container">
					      <?php
					      if(has_post_thumbnail()){
						      $thumbID = get_post_thumbnail_id($post->ID);

						      echo '<img src="'.reset(wp_get_attachment_image_src($thumbID, 'thumbnail')).'" alt="'.cgy_or(array(get_post_meta($thumbID, '_wp_attachment_image_alt', true), get_the_title())).'" class="entry-thumb" />';
					      }else{
						      echo '<img src="/_incs/images/placeholders/placeholder-image.svgz" alt="'.get_the_title().'" class="entry-thumb" />';
					      }
					      ?>
				      </a>

						  <?php the_excerpt(); ?>

					    <?php echo '<time class="entry-date" datetime="'.the_date('c', '', '', false).'" pubdate="">'.get_the_time('d M').'</time>'; ?>
						</div>

		      </article>

	      <?php endwhile; endif; ?>

        <?php wp_reset_query(); ?>

	      <a href="<?php the_field('news_button_destination'); ?>" title="<?php the_field('news_button_tooltip'); ?>" class="button-yellow button-full"><?php the_field('news_button'); ?></a>
      </section>
      <!-- ENDOF: NEWS PANEL -->



    </div>
  </div>






<?php include_once('_incs/html/footer.php'); ?>