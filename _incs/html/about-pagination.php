<?php
/**
 * Module Name: About Section Pagination
 *
 * @package <theme name>
 * @since 1.0
 */

?>


    <footer class="gridbase about-pagination">
      <hr class="hr-thin offset-bottom" />
        <?php
          $siblings = get_page_siblings('');
          $html = '';

          if(!empty($siblings['prev'])){
            $html.='<a href="'.$siblings['prev']['url'].'" title="'.PostSnippets::getSnippet('Find out more about', 'subject='.$siblings['prev']['title']).'" class="badge-left-yellow">'.$siblings['prev']['title'].'</a>';
          }

          if(!empty($siblings['next'])){
            $html.='<a href="'.$siblings['next']['url'].'" title="'.PostSnippets::getSnippet('Find out more about', 'subject='.$siblings['next']['title']).'" class="badge-right-yellow">'.$siblings['next']['title'].'</a>';
          }

          echo $html;

        ?>

      <hr class="hr-thin offset-top" />
    </footer>
