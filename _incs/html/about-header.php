<?php
/**
 * Module Name: About Section Header with subnavigation
 *
 * @package <theme name>
 * @since 1.0
 */

?>

  <header class="container-grey-odd no-header-with-subnav">

    <nav class="gridbase">
      <ul class="inlineBlockList subnav">

        <?php
        echo wp_list_pages($args = array(
          'child_of'     => ($post->post_parent != '0') ? $post->post_parent : $post->ID,
          'title_li'     => false,
          'echo'         => 1,
          'walker'       => new AM_Walker_AboutSubnav(),
          'post_type'    => 'page',
          'post_status'  => 'publish'
        ));
        ?>

      </ul>
    </nav>

    <div class="headline-borderless gridbase">
      <h1 class="sideStripes"><span><?php echo get_field('main_heading'); ?></span></h1>
      <?php echo get_field('main_content'); ?>
    </div>

  </header>

