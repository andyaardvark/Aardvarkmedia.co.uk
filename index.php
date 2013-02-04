<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="slider">

		<?php echo get_new_royalslider(1); ?>
</section>
<section class="row content">
<div class="headline">
	<h1>We create outstanding customer experiences</h1>
	<h2>One user session at a time</h2>
</div>
<div id="hp-serv" class="sixcol first">
<h4 class="prim">Introducing</h4>
<h4>OUR JOINED UP DIGITAL SERVICE</h4>
<p>We provide a seamless digital service for delivering outstanding online customer experience.</p>
</div>
	<div id="hp-blog" class="sixcol last">
	<h4 class="prim">What's Happening</h4>
		<ul class="post-list">
	        <?php query_posts('category_name=blog&showposts=2'); ?>
	        <?php while (have_posts()) : the_post(); ?>
	        <li>
	         	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	         	<p><?php echo excerpt(20); ?></p>
	        </li>
		    <?php endwhile; ?>
		</ul>
	</div>
</section>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>