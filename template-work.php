<?php
/**
 * Category Template: Work
 */
?>

<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="row">
<div class="content">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

<header>
    <h1>
      <?php printf( __( '%s', 'starkers' ), '' . single_cat_title( '', false ) . '' ); ?>
    </h1>
        <p><?php echo category_description(); ?></p>
    </header>

<div id="filter" class="option-set">
    <ul>
        <li><a href="#" data-filter="*" class="selected">All</a></li>
        <li><a href="#" data-filter=".RetailLeisure">Retail / Leisure</a></li>
        <li><a href="#" data-filter=".Publishing">Publishing</a></li>
        <li><a href="#" data-filter=".Corporate">Corporate</a></li>
        <li><a href="#" data-filter=".Technology">Technology</a></li>
    </ul>
</div>


<?php if (have_posts()) : ?>
<div id="work">
<?php while (have_posts()) : the_post(); ?>
   		<div class="item <?php foreach((get_the_category()) as $childcat) {
		if (cat_is_ancestor_of(5, $childcat)) {
			echo $childcat->cat_name . ' '; }
	} ?> ">
   			<a href="<?php the_permalink() ?>" class="mosaic-overlay">
				<span class="details">
					<span class="title"><h2><?php the_title(); ?></h2></span>
					
				</span>
			</a>
			 <?php the_post_thumbnail(); ?> 
			 </div>
<?php endwhile; ?>
</div>
<?php else : ?>
<?php endif; ?>
</div>
</div>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>