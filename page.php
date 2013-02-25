<!-- Standard page template -->

<?php include_once('_incs/html/header.php'); ?>
	<div class="row">
	<div class="content">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php comments_template( '', true ); ?>
		<?php endwhile; ?>
	</div>
	</div>
<?php include_once('_incs/html/footer.php'); ?>