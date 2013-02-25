<section class="row content">
	<div id="hp-news" class="twelvecol">
	<h4 class="prim">Follow us on Twitter</h4>
    <?php include_once(ABSPATH . WPINC . '/feed.php');
		$rss = fetch_feed('https://api.twitter.com/1/statuses/user_timeline.rss?screen_name=aardvarkmedia');
		$maxitems = $rss->get_item_quantity(1);
		$rss_items = $rss->get_items(0, $maxitems); ?>
	<ul>
	<?php if ($maxitems == 0) echo '<li>No items.</li>';
	else
	// Loop through each feed item and display each item as a hyperlink.
	foreach ( $rss_items as $item ) : ?>
		<li>
		<a href='<?php echo $item->get_permalink(); ?>'>
		<?php echo $item->get_title(); ?>
		</a>
		</li>
	<?php endforeach; ?>
	</ul>
	</div>
	</div>
</section>

<footer class="main">
	<div class="row content">
			<h4 class="prim">Say Hello</h4>
			<span class="email">enquiries@aardvarkmedia.co.uk</span><span class="phone_number">+44 (0) 20 7582 7711</span>
			<div class="address">Aardvark Media Ltd. 101 Design Centre East, First Floor, Chelsea Harbour, London, SW10 0XF</div>
			<div class="links">
				<a href="http://h2vx.com/vcf/www.aardvarkmedia.co.uk/" class="vcard">vCard</a>
				<a href="http://feeds.feedburner.com/AardvarkMedia" class="rss">RSS Feed</a>
				<a href="http://www.twitter.com/aardvarkmedia/" class="twitter">Twitter</a></div>
	</div>
</footer>
<footer class="copyright">
  	<div class="row">
	    &copy; 1996 &ndash; <?php echo date("Y"); ?> Aardvark Media Ltd | 
	    Registered in England, No: 03182500. VAT: 685005829. 
    </div>
</div>
 </footer>




