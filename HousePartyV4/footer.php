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
				<div id="logo-footer"><img src="http://about.houseparty.com/wp-content/themes/HouseParty/images/hp-logo-footer.png" weight="200" height="53" border="0"><br>
				<p id="copyright">&copy; Copyright House Party, Inc. 2013</p>
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
									
									
									
									
									</div>
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
<?php if(is_home() || is_front_page()):?>
<link rel="stylesheet" type="text/css" media="all" href='<?php bloginfo('template_url'); ?>/css/flexslider.css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js'></script>
<script type="text/javascript">
    
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide"
      });

	  $('.flexslider1').flexslider({
        animation: "slide",
		animationLoop: true,
		itemWidth: 90,
		itemMargin: 20
      });

	  $('.flexslider2').flexslider({
		animation: "slide",
		animationLoop: true,
		itemWidth: 90,
		itemMargin: 20
	  });
    });
  </script>
  <?php endif;?>
  </body>
  </html>
  