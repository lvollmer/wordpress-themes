<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=hero div and all content after
 *

 */
?>

</div>
  	<div id="footer">
		<div class="container">
			<div id="footer-widgets" class="clearfix">
				<div id="logo-footer"><img src="http://about.houseparty.com/wp-content/themes/feather/images/hp-logo-footer.png" weight="200" height="53" border="0"><br>
				<p id="copyright">&copy; Copyright House Party, Inc. 2012</p>
				</div>
					</div>
					
					<div id="footer-bottom" class="clearfix">
									<div class="menu-footer-navigation">
									
									<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>
									
									
									
									
									<!--<ul id="menu-footer-navigation" class="menu"><li id="menu-item-2035" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2035"><a href="http://about.houseparty.com/">Home</a></li>
					<li id="menu-item-1040" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1040"><a href="http://about.houseparty.com/what-we-do/">What We Do</a>
					<ul class="sub-menu">
						<li><a href="http://about.houseparty.com/what-we-do/reach/">Reach</a></li>
						<li><a href="http://about.houseparty.com/what-we-do/engagement/">Engagement</a></li>
						<li><a href="http://about.houseparty.com/what-we-do/branding/">Branding</a></li>
						<li><a href="http://about.houseparty.com/what-we-do/sales/">Sales</a></li>
					</ul>
					</li>
					<li id="menu-item-1071" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1071"><a href="http://about.houseparty.com/how-we-do-it/">How We Do it</a>
					<ul class="sub-menu">
						<li><a href="http://about.houseparty.com/how-we-do-it/our-community/">Our community</a></li>
						<li><a href="http://about.houseparty.com/how-we-do-it/our-platform/">Our platform</a></li>
						<li><a href="http://about.houseparty.com/how-we-do-it/party/">The parties</a></li>
						<li><a href="http://about.houseparty.com/how-we-do-it/measurement-and-reporting/">Measurement &amp; reporting</a></li>
						<li><a href="http://about.houseparty.com/how-we-do-it/the-house-party-process/">The House Party process</a></li>
					</ul>
					</li>
					<li id="menu-item-1042" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1042"><a href="http://about.houseparty.com/case-studies/">Case Studies</a>
					</li>
					<li><a href="http://about.houseparty.com/newsroom/">Newsroom</a>
					<ul class="sub-menu">
						<li><a href="http://about.houseparty.com/newsroom/in-the-press/">In the Press</a></li>
						<li><a href="http://about.houseparty.com/newsroom/press-releases/">Press Releases</a></li>
					</ul>
					</li>
					<li id="menu-item-1045" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1045"><a href="http://about.houseparty.com/about-us/">About Us</a>
					<ul class="sub-menu">
						<li><a href="http://about.houseparty.com/about-us/meet-our-management/">Meet Our Management</a></li>
						<li><a href="http://about.houseparty.com/about-us/meet-our-board/">Meet Our Board</a></li>
						<li><a href="careers.php">Careers</a></li>
					</ul>
					</li>
					<li><a href="http://about.houseparty.com/contact-us/">Contact Us</a></li>
					</ul>--></div>
					<div id="socialmedia">
						<a href="http://www.facebook.com/housepartyfun"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/facebook.png"></a>
						<a href="http://www.twitter.com/housepartyfun"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/twitter.png"></a>
					</div>
			</div>
		</div>
	</div>
	<?php
		/* Always have wp_footer() just before the closing </body>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to reference JavaScript files.
		 */

		wp_footer();
	?>
  </body>
  </html>