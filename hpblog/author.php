<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<section class="fullpost">
	

		<?php if ( have_posts() ) : ?>

			<?php
				/*
				 * Queue the first post, that way we know what author
				 * we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			

			<?php
				/*
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>
			
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php endif; ?>

	</section>
	<section class="babybear tile">
			<?php /* The loop */ ?>
			<?php 
				while ( have_posts() ) : the_post(); ?>
				<?php 
				get_template_part( 'content-babybear', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php wp_pagenavi(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
</section><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>