

      <section class="panel-lowered twitterFeed fadeable">
        <h3 class="sideStripes leadingReset"><span><?php echo PostSnippets::getSnippet('twitter-heading'); ?></span></h3>

        <div id="twitterBalloon" class="contentBalloon"><?php /* Twitter Feed goes here */ ?></div>

        <a title="<?php echo PostSnippets::getSnippet('twitter-tooltip'); ?>" href="http://twitter.com/aardvarkmedia/" class="twitterLink"><?php echo PostSnippets::getSnippet('aardvark-twitter'); ?></a>

      </section>



      <footer id="footer" class="fadeable">

	      <?php /* FOOTER NAV */ ?>

		      <?php
			      wp_nav_menu( array(
				      'container'       => false,
				      'items_wrap'      => '<nav class="bottomNav"><ul class="bottomNavList">%3$s</ul></nav>',
				      'walker'          => new AM_Walker_Footer_Menu(),
				      'menu'            => 'Bottom Navigation',
				      'echo'            => true
			      ));
		      ?>

	      <?php /* ENDOF: FOOTER NAV */ ?>



        <div class="gridbase">

	        <h4 class="sideStripes-dark"><span><?php echo PostSnippets::getSnippet('footer-heading'); ?></span></h4>




	        <?php /* CONTACT DETAILS */ ?>

	          <?php
	            $email = PostSnippets::getSnippet('aardvark-email');
	            $phone = PostSnippets::getSnippet('aardvark-phone');
	          ?>

		        <address class="vcard footer-vcard">
			        <a href="mailto:<?php echo $email; ?>" title="<?php echo PostSnippets::getSnippet('aardvark-email-tooltip'); ?>" class="email"><?php echo $email; ?></a>
			        <a href="tel:<?php echo $phone; ?>" title="<?php echo PostSnippets::getSnippet('aardvark-phone-tooltip'); ?>" class="tel"><?php echo $phone; ?></a>



			        <a class="gmapsLink" href="https://maps.google.com/maps?q=101+Design+Centre+East,+Chelsea+Harbour,+London,+SW10+0XF&amp;t=m&amp;z=16">
			          <span class="fn org">Aardvark Media Ltd.</span>
			          <span class="adr">
						      <span class="street-address">101 Design Centre East</span>,
					        <span class="extended-address">First Floor</span>,
					        <span class="extended-address">Chelsea Harbour</span>,
					        <span class="locality">London</span>,
					        <span class="postal-code">SW10 0XF7</span>
			          </span>

			        </a>

			        <div class="footer-urls">
				        <a class="url icon-vcard" href="http://h2vx.com/vcf/www.aardvarkmedia.co.uk/">vCard</a>
				        <a class="url icon-rss" href="http://feeds.feedburner.com/AardvarkMedia">RSS Feed</a>
				        <a class="url icon-twitter" href="http://www.twitter.com/aardvarkmedia/">Twitter</a>
				      </div>

		        </address>


	        <?php /* ENDOF: CONTACT DETAILS */ ?>







		      <?php /* FOOTER FORMS */ ?>

		        <div id="footer-forms">






			        <form action="#" method="POST" id="searchform-footer" action="<?php echo home_url( '/' ); ?>" role="search" class="form-linear-dark">
				        <fieldset>
					        <label for="footer-signup"><?php echo PostSnippets::getSnippet('search-aardvark'); ?></label>
					        <input type="text" id="footer-signup" placeholder="e.g.: corporate design" name="s" /><button type="submit" class="submit" name="submit" id="footer-submit-signup" value="Search"><?php echo PostSnippets::getSnippet( 'go' ); ?></button>
				        </fieldset>
			        </form>


			        <form action="#" method="POST" class="form-linear-dark">
				        <fieldset>
					        <label for="footer-search"><?php echo PostSnippets::getSnippet('sign-up-for-our-newsletter'); ?></label>
					        <input type="email" id="footer-search" placeholder="e.g.: name@website.com" /><button type="submit" class="submit ir" name="submit" id="footer-submit-search"><?php echo PostSnippets::getSnippet( 'subscribe' ); ?></button>
				        </fieldset>
			        </form>


		        </div>

		      <?php /* ENDOF: FOOTER FORMS */ ?>





		      <?php /* AWARDS */ ?>

						<?php
				      wp_nav_menu( array(
					      'container'       => false,
					      'items_wrap'      => '<ol class="inlineBlockList awardList">%3$s</ol>',
					      'walker'          => new AM_Walker_FooterAward(),
					      'menu'            => 'Footer Awards',
					      'echo'            => true
				      ));
						?>

		      <?php /* ENDOF: AWARDS */ ?>

        </div>





				<?php /* COPYRIGHT */ ?>

	        <div role="contentinfo" class="copyright">
	          <?php echo PostSnippets::getSnippet('copyright', 'year='.date('Y')); ?>
	        </div>

	      <?php /* ENDOF: COPYRIGHT */ ?>



      </footer>


    </div>


    <!-- SCRIPTS: EXTERNAL -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="/_incs/js/lib/jquery-1.9.0.min.js"><\/script>')</script>
    <!-- ENDOF: SCRIPTS: EXTERNAL -->



    <!-- SCRIPTS: GLOBAL -->
      <script src="/_incs/js/lib/hide-address-bar.js"></script>
      <script src="/_incs/js/lib/jQuery/hoverIntent.js"></script>
      <script src="/_incs/js/lib/jQuery/easing.1.3.js"></script>
      <script src="/wp-content/plugins/contact-form-7/includes/js/jquery.form.js"></script>
      <script src="/wp-content/plugins/contact-form-7/includes/js/scripts.js"></script>

      <script src="/_incs/js/app/Vars.js"></script>
      <script src="/_incs/js/app/Nav_Dropdown.js"></script>
      <script src="/_incs/js/app/Forms/ContactForm7_Override.js"></script>
      <script src="/_incs/js/app/Social/Twitter.js"></script>
    <!-- ENDOF: SCRIPTS: GLOBAL -->




      <?php if(cgy_get_current_page()==='home'){ ?>
        <!-- SCRIPTS: SECTION: HOME -->
          <script src="/_incs/js/lib/jQuery/royalslider.min.js"></script>
          <script src="/_incs/js/app/Sliders/RoyalSlider_Responsive.js"></script>
        <!-- ENDOF: SCRIPTS: SECTION: HOME -->
        <?php wp_footer(); ?>
        <!-- SCRIPTS: SECTION: HOME -->
          <script src="/_incs/js/aardvarkmedia.<?php echo ucfirst(cgy_get_current_page()); ?>.js"></script>
        <!-- ENDOF: SCRIPTS: SECTION: HOME -->






      <?php }elseif(is_single() && get_post_type()==='our-work'){ ?>
        <!-- SCRIPTS: SECTION: BLOG ARTICLE -->
          <script src="/_incs/js/lib/jQuery/royalslider.min.js"></script>
          <script src="/_incs/js/aardvarkmedia.<?php echo ucfirst(cgy_get_current_page()); ?>.js"></script>
        <!-- ENDOF: SCRIPTS: SECTION: BLOG ARTICLE -->






      <?php }elseif(is_single() && (get_post_type()==='post' || get_post_type()==='page') ){ ?>
        <!-- SCRIPTS: SECTION: BLOG ARTICLE -->
          <script src="/_incs/js/aardvarkmedia.<?php echo ucfirst(cgy_get_current_page()); ?>.js"></script>
        <!-- ENDOF: SCRIPTS: SECTION: BLOG ARTICLE -->







      <?php }elseif(is_archive()){ ?>
        <!-- SCRIPTS: SECTION: BLOG ARTICLE -->
          <script src="/_incs/js/aardvarkmedia.<?php echo ucfirst(cgy_get_current_page()); ?>.js"></script>
        <!-- ENDOF: SCRIPTS: SECTION: BLOG ARTICLE -->






      <?php }else{ ?>
        <!-- SCRIPTS: SECTION: STYLEGUIDE -->
          <script src="/_incs/js/aardvarkmedia.<?php echo ucfirst(cgy_get_current_page()); ?>.js"></script>
        <!-- ENDOF: SCRIPTS: SECTION: STYLEGUIDE -->
        <?php wp_footer(); ?>
      <?php } ?>




  </body>
</html>


