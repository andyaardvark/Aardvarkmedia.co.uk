<?php
/**
 * Template Name: Archive Pages: Default
 *
 * @package <theme name>
 * @since 1.0
 */
?>

<?php include_once('_incs/html/header.php'); ?>

<div class="gridbase no-header">
  <h1 class="generic-title"><?php echo single_cat_title( '', false ) ; ?></h1>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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
            $thumbID = get_post_thumbnail_id(get_the_ID());

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

</div>

<?php include_once('_incs/html/footer.php'); ?>
