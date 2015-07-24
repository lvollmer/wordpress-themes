<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>

		<div id="container">
			

				<?php while ( have_posts() ) : the_post(); ?>

					

					<?php get_template_part( 'content', 'single' ); ?>

					<div style="margin: 10px 0;">
						
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next" style="float:right;"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</div><!-- #nav-single -->

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			
		</div><!-- #container -->

<?php get_footer(); ?>