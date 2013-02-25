<?php
/**
 * Template Name: Style Guide
 *
 * @package <theme name>
 * @since 1.0
 */
?>

<?php
	include_once('_incs/html/header.php');

	if (have_posts()) : while (have_posts()) : the_post();

		$body = get_the_content();

		function cgy_codifyBody($matches){
			return '<pre'.$matches[1].'><code'.$matches[1].'>'. trim(str_replace(array('<', '>'), array('&lt;', '&gt;'), $matches[2])) .'</code></pre>'.PHP_EOL.'<div class="blowout" data-label="render as:">'.$matches[2].'</div>';
		}


?>

		<article role="main">
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php
				echo '<h2>Table of Contents</h2>'.PHP_EOL.
					cgy_generate_toc($body).PHP_EOL.
					preg_replace_callback( '%<pre(.*?)>\s*?<code.*?>(.*?)<\/code>\s*?<\/pre>%ism', cgy_codifyBody,	$body	);
			?>
		</article>


<?php
	endwhile; endif;

	include_once('_incs/html/footer.php');
?>