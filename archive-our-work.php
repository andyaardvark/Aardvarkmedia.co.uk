<?php
/**
 * Template Name: Archive Pages: Default
 *
 * @package <theme name>
 * @since 1.0
 */


  $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest' && isset($_POST['say_what']));



  /* NONAJAX CONTENT */
  if(!$isAjax):
?>

  <?php include_once('_incs/html/header.php'); ?>

  <article class="fadeable" role="main">
    <header class="header-generic header-ourwork">

      <?php
        $contentPageID = 3143;

        if(get_post_status($contentPageID) ==='private'){
          $h1       = get_field('heading', $contentPageID);
          $h2       = get_field('subheading', $contentPageID);
          $fullHead = !empty($h1) && !empty($h2);

          if($h1){
            $html=($fullHead ? '<hgroup class="heading-generic heading-ourwork headline-borderless gridbase">' : '');
            $html.= empty($h1) ? '' : '<h1>'.$h1.'</h1>';
            $html.= empty($h2) ? '' : '<h2 class="sideStripes-light	leadingReset"><span>'.$h2.'</span></h2>';
            $html.=($fullHead ? '</hgroup>' : '');
          }
        };


        echo $html ?: '<h1 class="generic-title">'. post_type_archive_title('', false).'</h1>';


      ?>
    </header>
    <section class="gridbase section-headless">
      <ul class="gridList" id="workList">
<?php
  /* ENDOF: NONAJAX CONTENT */
  endif;







  if (have_posts()) : while (have_posts()) : the_post();

    $html = '<li class="gridEntry column-4 autoFadeIn">'.
              '<figure>'.
                '<a class="gridThumb" href="'.get_permalink().'" title='.PostSnippets::getSnippet('Learn more about project', 'title='.get_the_title()).'">'.
                  '<img src="'. (get_field('listing_thumbnail')?:'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAoAAAAHgAQMAAAAPH06nAAAAA1BMVEXl5eX7Oj7PAAAAPElEQVR4Xu3AAQkAAADCMPunNsdhWxAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHJfgAAHQxHQ6AAAAAElFTkSuQmCC' ) .'" alt="'.get_the_title().'" aria-hidden="true" role="presentation">'.
                  '<div class="gridOverlay">'.
                    '<img class="gridThumb-logo" src="'. get_field('company_logo') .'" alt="'.get_the_title().'">'.
                  '</div>'.
                '</a>'.

                '<figcaption class="gridCaption">'.
                  '<a class="gridHeading" href="'. get_permalink(). '" title="'. PostSnippets::getSnippet('Learn more about project', 'title='.get_the_title()) .'">'.
                    '<h3 class="sideStripes-dark leadingReset gridTitle"><span>'. get_the_title() .'</span></h3>'.
                  '</a>'.
                  get_field('listing_description').
                '</figcaption>'.
               '</figure>';
            /* Closing </li> is removed intentionally, as a workaround for spacing bug with inline-block elements */

    echo $html;

  endwhile; endif;







  /* NONAJAX CONTENT */
  if(!$isAjax):
?>
      </ul>

      <footer id="pagination-ourWork" class="pagination" data-total-pages="<?php echo $wp_query->max_num_pages ?>" data-current="<?php echo get_query_var('paged'); ?>" data-ajax-button="<?php echo PostSnippets::getSnippet('Load More') ?>">
        <?php
          echo str_replace(
                  'href=',
                  'title="'.PostSnippets::getSnippet('View Newer Projects').'" class="button-yellow pagination-lite-link" href=',
                  get_previous_posts_link(PostSnippets::getSnippet('Newer Projects'))

               ).str_replace(
                  'href=',
                  'title="'.PostSnippets::getSnippet('View Older Projects').'" class="button-yellow pagination-lite-link" href=',
                  get_next_posts_link(PostSnippets::getSnippet('Older Projects'))
               );


        ?>
      </footer>

    </section>

  </article>

  <?php include_once('_incs/html/footer.php'); ?>

<?php
  /* ENDOF: NONAJAX CONTENT */
  endif;
?>