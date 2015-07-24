<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<section class="babybear tile">	
<?php if ( have_posts() ) : ?>
	<h1 class="section-title"><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
	

		<?php /* The loop */ ?>
		<?php 
			$counter = 1;
			while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content-babybear', get_post_format() ); ?>
			<?php
			if($counter == 10){
				facebook_widget();
			}

			if($counter == 12){
				twiter_widget();
			}

			$counter++;
			endwhile; ?>

		<?php wp_pagenavi(); ?>
	
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>