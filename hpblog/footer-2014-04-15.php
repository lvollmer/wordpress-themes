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
			<li><a href="../views/single.php">About</a></li>
			<li><a href="../views/authors.php">Authors</a></li>
			<li><a href="#" class="cat-plan">Party planning</a></li>
			<li><a href="#" class="cat-food">Food</a></li>
			<li><a href="#" class="cat-family">Family & kids</a></li>
			<li><a href="#" class="cat-entertain">Entertainment</a></li>
			<li><a href="#" class="cat-hp">Inside House Party</a></li>
			<li><a href="#" class="cat-connected">Connected</a></li>
			<li><a href="#" class="cat-life">Lifestyle</a></li>
		</ul>
	</nav>
</header>

<footer class="hide-small">
	<div class="footer-text">
		<p class="pull-left">&copy; Copyright 2014 House Party, Inc.</p>
		<ul class="pull-right">
			<li><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-facebook.png"></a></li>
			<li><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-twitter.png"></a></li>
			<li><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-instragram.png"></a></li>
			<li><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-pinterest.png"></a></li>
			<li><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-rss.png"></a></li>
			<li><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-home.png"></a></li>
		</ul>
	</div>
	<div class="footer-nav">
		<ul class="clear">
			<li class="hide-small"><a href="#">About</a></li>
			<li class="hide-small"><a href="#">Authors</a></li>
			<li class="hide-small"><a href="#">Party planning</a></li>
			<li class="hide-small"><a href="#">Food</a></li>
			<li class="hide-small"><a href="#">Family &amp; kids</a></li>
			<li class="hide-small"><a href="#">Entertainment</a></li>
			<li class="hide-small"><a href="#">Inside House Party</a></li>
			<li class="hide-small"><a href="#">Connected</a></li>
			<li class="hide-small"><a href="#">Lifestyle</a></li>
			<br/>
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
