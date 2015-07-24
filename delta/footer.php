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

		
	</div><!-- #page -->

	<footer>
	  <div class="container">
		<div class="row">
		  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<div class="logo-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo bloginfo('template_url')?>/images/footer-logo.png" alt="" /></a> </div>
			<p>Copyright &copy; 2014 Delta Auto Transport</p>
			<div class="socialLinks"> <a class="facebook" href="#">&nbsp;</a> <a class="inn" href="#">&nbsp;</a> <a class="twitter" href="#">&nbsp;</a> <a class="google" href="#">&nbsp;</a> </div>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		  </div>
		  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		  </div>
		</div>
	  </div>
	</footer>

	<?php wp_footer(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
	<script src="<?php echo bloginfo('template_url')?>/js/bootstrap.min.js"></script>
</body>
</html>