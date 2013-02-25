<div id="quick-contact" class="row animate">
    <div class="content">
        <?php echo do_shortcode('[contact-form-7 id="2255" title="Contact form 1"]'); ?>
    </div>
</div>	      

<header class="main">
	<div class="row">
		<div class="logo-bg">
		 	<h2 class="logo"><a href="/"><?php bloginfo( 'name' ); ?></a></h2>	
		</div>
	 	  <nav>
	 	  <ul class="toggle">
	 	  	 <li id="contact-toggle"><a data-toggle="collapse" class="btn-contact">Contact</a></li>
		 	 <li id="nav-toggle"><a data-toggle="collapse" class="btn-navbar">Navigation</a></li>
	 	  </ul>
		 	  <div id="main-nav" style="display:none;">	
		 	  <?php wp_nav_menu( array( 'theme_location' => 'mainleft' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'mainright' ) ); ?>
		 	  </div>
	      </nav>				
	 	</div>
</header>
