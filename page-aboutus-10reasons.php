<?php
/*
 * Template Name: About Us: 10 Reasons
 *
 * @package <theme name>
 * @since 1.0
 */
?>

<?php include_once('_incs/html/header.php'); ?>

  <article class="container fadeable" role="main">





    <!-- HEADER -->
    <?php include_once('_incs/html/about-header.php'); ?>
    <!-- ENDOF: HEADER -->







    <!-- TEAM GRID -->
    <section class="container-grey-even">
      <ol class="gridbase accordion about-reasons" id="about-reasons">

        <?php

          $reasonHTML = '';

          foreach( get_field('reasons') as $k=>$r ){
            $reasonHTML.= '<li>'.
                            '<input type="radio" class="hidden" name="accordion-reasons" value="'.$k.'" id="accordion-section'.( $k+1 ).'" '.( $k==0 ? 'checked ' : '').'>'.
                            '<div class="accordion-content-wrapper">'.
                              '<h3 class="accordion-header"><label tabindex="'.( 10+$k+1 ).'" for="accordion-section'.( $k+1 ).'" data-tabid="'.$k.'">'. $r['reason_heading'] .'</label></h3>'.
                              '<div class="accordion-content">'. $r['reason_content'] .'</div>'.
                            '</div>'.
                          '</li>';
          }

          echo $reasonHTML;

        ?>
      </ol>
    </section>
    <!-- ENDOF: TEAM GRID -->


    <!-- PAGINATION -->
    <div class="container-grey-odd">
      <?php include_once('_incs/html/about-pagination.php'); ?>
    </div>
    <!-- ENDOF: PAGINATION -->


  </article>


<?php include_once('_incs/html/footer.php'); ?>

