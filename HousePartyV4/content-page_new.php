<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

  	
		<div id="apage">	
				<!-- <h1><?php //the_title(); ?></h1> -->
				<?php the_content(); ?>
			
				<!-- @TODO should style some meta tags -->
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
  		</div>
  	
