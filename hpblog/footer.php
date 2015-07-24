<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		<header class="header-mobile">
	<nav class="nav-main">
		<ul>
			<li class="hide-small"><a href="<?php echo home_url('/')?>about">About</a></li>
			<li class="hide-small"><a href="<?php echo home_url('/')?>authors">Authors</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/party-planning">Party planning</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/food">Food</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/family-and-kids">Family &amp; kids</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/entertainment">Entertainment</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/inside-house-party">Inside House Party</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/connected">Connected</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/lifestyle">Lifestyle</a></li>
			<li><a href="http://houseparty.com/about" target="_blank">About House Party</a></li>
			<li><a href="http://houseparty.com/help" target="_blank">Get Help</a></li>
			<li><a href="http://houseparty.com/press" target="_blank">Press Center</a></li>
			<li><a href="http://houseparty.com/terms" target="_blank">Terms of Service</a></li>
			<li><a href="http://houseparty.com/privacy" target="_blank">Privacy Policy</a></li>
			<li><a href="http://houseparty.com/contact" target="_blank">Feedback</a></li>
		</ul>
	</nav>
</header>

<footer class="hide-small">
	<div class="footer-text">
		<p class="pull-left">&copy; Copyright 2014 House Party, Inc.</p>
		<ul class="pull-right">
			<li><a href="http://facebook.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-facebook.png"></a></li>
			<li><a href="http://twitter.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-twitter.png"></a></li>
			<li><a href="http://instagram.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-instragram.png"></a></li>
			<li><a href="http://www.pinterest.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-pinterest.png"></a></li>
			<li><a href="http://feeds.feedburner.com/HousepartyBlog" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-rss.png"></a></li>
			<li><a href="http://houseparty.com" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-home.png"></a></li>
		</ul>
	</div>
	<div class="footer-nav">
		<ul class="clear">
			<li class="hide-small"><a href="<?php echo home_url('/')?>about">About</a></li>
			<li class="hide-small"><a href="<?php echo home_url('/')?>authors">Authors</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/party-planning">Party planning</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/food">Food</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/family-and-kids">Family &amp; kids</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/entertainment">Entertainment</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/inside-house-party">Inside House Party</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/connected">Connected</a></li>
			<li class="hide-small"><a href="<?php echo home_url("/");?>category/lifestyle">Lifestyle</a></li>
			<li><a href="http://houseparty.com/about" target="_blank">About House Party</a></li>
			<li><a href="http://houseparty.com/help" target="_blank">Get Help</a></li>
			<li><a href="http://houseparty.com/press" target="_blank">Press Center</a></li>
			<li><a href="http://houseparty.com/terms" target="_blank">Terms of Service</a></li>
			<li><a href="http://houseparty.com/privacy" target="_blank">Privacy Policy</a></li>
			<li><a href="http://houseparty.com/contact" target="_blank">Feedback</a></li>
		</ul>
	</div>
	
</footer>

	<?php wp_footer(); ?>
</body>
</html>
