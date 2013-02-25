<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */


// The Query
$about_page = new WP_Query( array('pagename'=>'about') );

// The Loop
while ( $about_page->have_posts() ) :
	$about_page ->the_post();
	echo '<li>' . get_the_content() . '</li>';
endwhile;

wp_reset_postdata();




?>
<?php include_once('_incs/html/header.php'); ?>
<div class="content row">
	<?php if ( have_posts() ): ?>
	<?php if ( is_day() ) : ?>
	<h2>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h2>							
	<?php elseif ( is_month() ) : ?>
	<h2>Archive: <?php echo  get_the_date( 'M Y' ); ?></h2>	
	<?php elseif ( is_year() ) : ?>
	<h2>Archive: <?php echo  get_the_date( 'Y' ); ?></h2>								
	<?php else : ?>
	<h2>Archive</h2>	
	<?php endif; ?>
	<ol>
	<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<article>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				<?php the_content(); ?>
			</article>
		</li>
	<?php endwhile; ?>
	</ol>
	<?php else: ?>
	<h2>No posts to display</h2>	
	<?php endif; ?>
</div>
<?php include_once('_incs/html/footer.php'); ?>