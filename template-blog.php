<?php
/**
 * Category Template: Blog
 */
?>

<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="row">
	<div class="content">
 <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>
   <header>
    <h1>
      <?php printf( __( '%s', 'starkers' ), '' . single_cat_title( '', false ) . '' ); ?>
    </h1>
    </header>
      <?php while (have_posts()) : the_post(); ?>
    <article>
      <div class="thumb"><a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail();?>
        </a></div>

      <h3><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></h3>
        <p class="excerpt"><?php echo excerpt(20); ?></p>

    </article>
        <?php endwhile; ?>
       	<div class="pag"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
	</div>
</div>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>