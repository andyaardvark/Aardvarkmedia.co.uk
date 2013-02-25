<?php
/**
 * Template Name: Single Default
 *
 * @package <theme name>
 * @since 1.0
 */

 $x=1;

?>

<?php include_once('_incs/html/header.php'); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <article role="main" class="fadeable">




      <!-- HEADER -->
      <header class="header-project" style="background-image: url('<?php echo get_field('header_pattern'); ?>')">

        <div class="project-backdrop-container">
          <div class="project-backdrop" style="background-image: url('<?php echo get_field('header_image') ;?>')"></div>
        </div>

        <hgroup class="heading-project headline-borderless gridbase">
          <h1 class="sideStriped"><span>
            <?php
              $logo = get_field('company_logo');

              echo empty($logo) ?
                    get_the_title():
                    '<img class="project-header-background" src="'.$logo.'" alt="'.get_the_title().'">';

            ?>
          </span></h1>

          <h2><?php echo get_field('main_heading'); ?></h2>
        </hgroup>

        <a class="badge-right-yellow" title="<?php echo get_field('site_url_tooltip'); ?>" href="<?php echo get_field('site_url') ;?>"><?php the_title(); ?></a>

      </header>
      <!-- ENDOF: HEADER -->





      <!-- MAIN SLIDER + INTRO -->
      <div class="container-grey-even">
        <section class="intro">
          <div id="project-slider-main" class="royalSlider rsUni">

            <?php
              $mainSlider = get_field('main_slider');
              if(!empty($mainSlider)){

                $html = '';


                foreach($mainSlider as $s){
                  $html.= '<a href="'.$s['sizes']['medium'].'" data-rsbigimg="'.$s['sizes']['large'].'" class="rsImg">'.
                      cgy_or(array($s['alt'], $s['title'])).
                      '<img width="100" src="'.$s['sizes']['thumbnail'].'" class="rsTmb">'.
                      '</a>';
                }

                echo $html;

              }
            ?>

          </div>

          <div class="gridbase description-main">
            <?php echo get_field('main_description'); ?>
          </div>

        </section>
      </div>
      <!-- ENDOF: MAIN SLIDER + INTRO -->




      


      <!-- STATS -->
      <section class="container-dark project-stats"><div class="gridbase gridbase-stats">


        <!-- STATS: AWARDS -->
        <div class="project-awards">
          <h3><?php echo PostSnippets::getSnippet('awards'); ?></h3>
          <ul class="blockList project-awardList">
            <?php
              $awards = get_field('awards');

              if(!empty($awards)){

                $html = '';

                foreach($awards as $a){

                  $html.= '<li>'.reset($a).'</li>';
                }

                echo $html;

              }
             ?>
          </ul>
        </div>


        <!-- STATS: LINKS -->
        <div class="project-links">
          <h3><?php echo PostSnippets::getSnippet('links'); ?></h3>
          <ul class="blockList">
            <?php
              $links = get_field('links');

              if(!empty($links)){
                $html = '';

                foreach($links as $l){
                  $html.= '<li><a class="icon-'.$l['link_icon'].'" title="'.$l['link-tooltip'].'">'.
                      $l['link-tooltip'].
                      '</a></li>';
                }

                echo $html;
              }
            ?>
          </ul>
        </div>


        <!-- STATS: NUMBERS -->
        <div class="project-numbers">
          <h3 class="sideStripes statColoured"><span><?php echo PostSnippets::getSnippet('some-stats'); ?></span></h3>

            <?php

              $stats  = get_field('stats');
              $html   = '<ul class="stats-list separatedList-col'.count($stats).'">';

              foreach($stats as $s){
                $html.= '<li>'.
                          '<em class="stat-number icon-'.$s['stat_icon'].'">'.
                            $s['stat_value'].
                          '</em>'.
                          $s['stat_description'].
                        '</li>';
              }

              $html.= '</ul>';

              echo $html;
            ?>

        </div>

      </div></section>
      <!-- ENDOF: STATS ->






      <!-- SECONDARY CONTENT -->
      <div class="container-grey-even">
        <section class="gridbase">
          <h2 class="sideStripes leadingReset h2-baseFont statColoured"><span><?php echo get_field('secondary_section_heading'); ?></span></h2>

          <?php echo get_field('secondary_section_content'); ?>


          <!-- SECONDARY CONTENT: SLIDER-->
          <div id="project-secondarySlider" class="royalSlider rsUni browserSlider">
            <?php
              $secondarySlider = get_field('secondary_section_slider');

              if(!empty($secondarySlider)){
                $html = '';

                foreach($secondarySlider as $s){
                  $html.= '<a href="'.$s['sizes']['medium'].'" data-rsbigimg="'.$s['sizes']['large'].'" class="rsImg" alt="'.cgy_or(array($s['alt'], $s['title'])).'">'.
                      '<span class="rsCaption">'.$s['caption'].'</span>'.
                      '<img width="100" src="'.$s['sizes']['thumbnail'].'" class="rsTmb">'.
                      '</a>';
                }

                echo $html;
              }

            ?>
          </div>

          <!-- SECONDARY CONTENT: COLUMNS -->
          <?php
            $secondaryCols = get_field('secondary_section_columns');

            if($secondaryCols){
              $colCount = count($secondaryCols);
              $html = '<div class="secondaryContent-columns content-col'.$colCount.'">';
              foreach($secondaryCols as $col){


                /* TESTIMONIAL */
                if($col['secondary_section_column_type']=='testimonial'){

                  $html.=  '<figure class="column-'.$colCount.' column-'.$col['secondary_section_column_type'].'">';
                  $html.=    '<blockquote>'.$col['secondary_section_column_content'].'</blockquote>';
                  $html.=    '<figcaption>'.$col['secondary_section_column_testimonial_author'].'</figcaption>';
                  $html.=  '</figure>';



                /* GENERIC COLUMN */
                }else{
                  $html.='<div class="column-'.$colCount.' column-'.$col['secondary_section_column_type'].'">';

                  if(isset($col['secondary_section_column_image']) && !empty($col['secondary_section_column_image'])){
                    $html.='<img src="'.$col['secondary_section_column_image']['url'].'" alt="'.cgy_or(array($col['secondary_section_column_image']['alt'], $col['secondary_section_column_image']['title'])).'" class="column-image" />';
                  }

                  $html.= '<h3 class="column-heading">'.$col['secondary_section_column_heading'].'</h3>';
                  $html.= $col['secondary_section_column_content'];

                  $html.='</div>';

                }

              };

              $html.= '</div>';

              echo $html;
            }

          ?>



        </section>




      </div>
      <!-- ENDOF: SECONDARY CONTENT -->






      <!-- TERTIARY CONTENT -->
      <div class="container-grey-even">
        <section class="gridbase">
          <h2 class="sideStripes leadingReset h2-baseFont statColoured"><span><?php echo get_field('tertiary_section_heading'); ?></span></h2>
          <?php echo get_field('tertiary_section_main_content'); ?>

	        <!-- TERTIARY CONTENT: SLIDER-->
          <div class="shadowFramedSlider-wrapper column-2 content-half">
            <div id="project-tertiarySlider" class="royalSlider rsUni shadowFramedSlider">
            <?php
              $tertiarySlider = get_field('tertriary_secrion_slider');

              if(!empty($tertiarySlider)){
                $html = '';

                foreach($tertiarySlider as $s){
                  $html.= '<a href="'.$s['sizes']['medium'].'" class="rsImg" alt="'.cgy_or(array($s['alt'], $s['title'])).'">'.
                      '<span class="rsCaption">'.cgy_or(array($s['alt'], $s['title'], $s['caption'])).'</span>'.
                      '</a>';
                }

                echo $html;
              }

            ?>
            </div>
          </div>


          <div class="project-tertiaryContent column-2 content-half">
            <?php echo get_field('tertiary_section_side_content'); ?>
          </div>

        </section>
      </div>
      <!-- ENDOF: TERTIARY CONTENT -->






      <!-- ADDITIONAL CONTENT BLOCK -->
      <?php
        $extras = get_field('additional_sections');

        if(!empty($extras)){
          foreach($extras as $e){?>

            <div class="container-grey-even">
              <section class="gridbase">
                <h2 class="sideStripes leadingReset h2-baseFont statColoured"><span><?php echo $e['additional_section_header']; ?></span></h2>

                <?php echo $e['additional_section_content']; ?>

                <!-- TERTIARY CONTENT: COLUMNS-->
                <?php
                $colCount = count($e['additional_section_columns']);


                if($colCount>0){
                  $html = '<div class="additionalContent-columns content-col'.$colCount.'">';

                  foreach($e['additional_section_columns'] as $col){
                    $class = 'content-full';

                    switch ($col['column_width']) {
                      case '66%':
                        $class = 'column-3-4';
                        break;
                      case '50%':
                        $class = 'column-2';
                        break;
                      case '33%':
                        $class = 'column-3';
                        break;
                    }

                    if( !empty($col['column_visual_content']) && empty($col['column_text_content']) ){
                      $html.='<img src="'.$col['column_visual_content']['sizes']['medium'].'" alt="'.cgy_or(array($col['column_visual_content']['title'], $col['column_visual_content']['alt'])).'" class="'.$class.'" />';

                    }else{
                      $html.='<div class="'.$class.'">';
                      $html.=   '<h3 class="column-heading">'.$col['column_header'].'</h3>';
                      $html.=   $col['column_text_content'];
                      $html.='</div>';
                    }
                  }


                  $html.= '</div>';
                  echo $html;
                }


                ?>
              </section>
            </div>
            <?php

          }
        }

      ?>
      <!-- ENDOF: ADDITIONAL CONTENT BLOCK -->





      <footer class="hintBox container-grey-even"><em class="hintBox-content">
	      Like the look of the work we’ve done for Harwin? <a href="">Get in touch today</a> to find out we can help you!
      </em></footer>
    </article>


  <?php endwhile; endif; ?>

<?php include_once('_incs/html/footer.php'); ?>