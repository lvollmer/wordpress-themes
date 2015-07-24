<?php
/*
Template Name: Whitepaper Custom Page
*/
get_header();
?>

  	
		
  		<div id="container_full">
  		<style>.w2llabelDownload_URL {display:none;} #sf_Download_URL{display:none} .Download_URL {display:none;}</style>
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_fullwidth' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
