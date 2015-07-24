<?php
/*
Template Name: Full Width Template
*/
get_header();
?>

  	
		
  		<div id="container_full">
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_fullwidth' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
