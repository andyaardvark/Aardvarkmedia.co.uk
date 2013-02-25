<?php
/**
 * Category Template: About
 */
?>

<?php get_header(); ?>
<div class="row">
	<div class="content cf">
		<div id="tabs" class="tab-nav">
			<?php if ( have_posts() ): ?>
			<ul>
				<li><a href="#team">Who We Are</a></li>	
				<?php while ( have_posts() ) : the_post(); ?>					    
				<li><a href="#tab-<?php echo $wp_query->current_post; ?>"><?php the_title(); ?></a></li>		    
				<?php endwhile; ?>			
			</ul>
		<?php else: ?>	    
		<?php endif; ?>
	
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div id="tab-<?php echo $wp_query->current_post; ?>" class="tab-content cf">			    
			<?php the_content(); ?>
			</div>  
			<?php endwhile; ?>
		<?php else: ?>	    
		<?php endif; ?>
		
		
			<div id="team" class="tab-content cf">			    
			<?php query_posts( 'post_type=Team'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			 <?php the_post_thumbnail(); ?>
		<h2><?php the_title(); ?></h2>
		<?php echo get_post_meta($post->ID, 'Job title', true); ?>
		<?php the_excerpt(); ?>
	<?php endwhile; else: endif; ?>

			</div>
				</div>
			<div class="cf">
				<h4 class="prim">We've won the odd award too</h4>
				<div class="award">
					<h4>Webby awards</h4>
				</div>
				<div class="award">
					<h4>RAR awards</h4>
				</div>
				<div class="award">
					<h4>Lovie awards</h4>
				</div>
				<div class="award">
					<h4>W3 awards</h4>
				</div>
			</div>
			 <?php
            $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query();
    $wp_query->query('category_name=about-bottom');
    ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			 <?php the_post_thumbnail(); ?>
		<h2><?php the_title(); ?></h2>
		<?php echo get_post_meta($post->ID, 'Job title', true); ?>
		<?php the_excerpt(); ?>
	<?php endwhile; else: endif; ?>

		
	</div>
</div>
<?php get_footer(); ?>