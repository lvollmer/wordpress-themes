<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

  	<div id="wrapper">
		<div id="left-area">	
				<!-- <h1><?php //the_title(); ?></h1> -->
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
			
				<!-- @TODO should style some meta tags -->
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
  		</div>
  	</div>
