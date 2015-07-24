<?php
/*
Template Name: Contact Page
*/
get_header();
?>

  	
		
  		<div id="container_full" class="contact">
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_contact' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
