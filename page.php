<!-- Standard page template -->

<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<div class="row">
	<div class="content">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php comments_template( '', true ); ?>
		<?php endwhile; ?>
	</div>
	</div>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>