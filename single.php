<?php
/**
 * Template Name: Single Default
 *
 * @package <theme name>
 * @since 1.0
 */
?>

<?php include_once('_incs/html/header.php'); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <article role="main" class="gridbase no-header">
      <h1 class="generic-title"><?php the_title(); ?></h1>

      <?php the_content();  ?>

      <footer class="entry-meta">
        <?php
        echo  PostSnippets::getSnippet('Written by', 'author=<a href="'.get_author_posts_url(get_the_author()).'" title="'.PostSnippets::getSnippet('Discover more articles by', 'author='.get_the_author()).'">'.get_the_author().'</a>').' '.
            PostSnippets::getSnippet('posted on').
            ' <time datetime="'.the_date('c', '', '', false).'" pubdate="">'.get_the_time('d.m.Y').'</time>. ';

        the_tags(PostSnippets::getSnippet('Tagged as').': ', ', ', '.');

        ?>
      </footer>
    </article>


  <?php endwhile; endif; ?>

<?php include_once('_incs/html/footer.php'); ?>