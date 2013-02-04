<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<div class="row">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article class="content">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h3>About <?php echo get_the_author() ; ?></h3>
			<?php the_author_meta( 'description' ); ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
	</div>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>