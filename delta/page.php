<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="services">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h3><?php the_title(); ?></h3>
				<?php the_content(); ?>
			<?php endwhile; ?>
		  </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<?php get_sidebar('main'); ?>
	</div>
</div>

<?php get_footer(); ?>