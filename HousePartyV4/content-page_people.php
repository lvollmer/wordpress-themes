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
				<?php
					$title = get_post_meta(get_the_id(), 'title', true);
				?>

				<h2><?php the_title(); ?> - <?php echo $title;?></h2>
				<?php the_content(); ?>
			
				<!-- @TODO should style some meta tags -->
				<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
  		</div>
  	
