<?php
/*
 * Template Name: About Us: Who We Are
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
      <ul class="gridbase gridHex" id="about-team-grid">
        <?php

          $team = get_field('team');

          $html='';
          foreach($team as $t){
            $imagedim = getimagesize($t['url']);


            $html.='<li class="gridHex-entry">'.

                      '<div class="gridHex-thumb">'.
                        '<div class="gridHex-entry-inner1">'.
                          '<div class="gridHex-entry-inner2" style="background-image: url('.(($imagedim[0]>500 || $imagedim[1]>300) ? aq_resize($t['url'], 480, 270) : $t['url']).');">'.
                            '<div class="gridHex-entry-overlay-fill"></div>'.
                          '</div>'.
                        '</div>'.
                      '</div>'.

                      '<div class="gridHex-overlay">'.
                        '<div class="gridHex-overlay-content">'.
                          '<h3>'.$t['title'].'</h3>'.
                          '<h4>'.$t['caption'].'</h4>'.
                          '<p>'.$t['description'].'</p>'.
                        '</div>'.
                      '</div>'.

                    '</li>';

          }

          echo $html;

        ?>
      </ul>
    </section>
    <!-- ENDOF: TEAM GRID -->


    <!-- PAGINATION -->
    <div class="container-grey-odd">
      <?php include_once('_incs/html/about-pagination.php'); ?>
    </div>
    <!-- ENDOF: PAGINATION -->


  </article>


<?php include_once('_incs/html/footer.php'); ?>