<?php
/*
Template Name: Team
*/
?>

<?php include_once('_incs/html/header.php'); ?>
<div class="row">
<div class="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; else: endif; ?>
	
		<?php query_posts('category_name='.get_permalink().'&post_status=publish,future');?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
	<?php endwhile; else: endif; ?>

	<?php if(function_exists('wp_paginate')) {
	    wp_paginate('range=4&anchor=2&nextpage=Next&previouspage=Previous');
	} ?>
</div>
</div>
<?php include_once('_incs/html/footer.php'); ?>