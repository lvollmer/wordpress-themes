<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<section class="fullpost">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>

	</section><!-- #primary -->

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>