<?php
/**
 * The template for displaying Category Archive pages */
?>
<?php include_once('_incs/html/header.php'); ?>
<div class="row">
	<div class="content">
	<?php if ( have_posts() ): ?>
	<h1><?php echo single_cat_title( '', false ); ?></h1>
	<ul>
	<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<article>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</article>
		</li>
	<?php endwhile; ?>
	</ul>
	<?php else: ?>
	<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
	<?php endif; ?>
	</div>
</div>
<?php include_once('_incs/html/footer.php'); ?>