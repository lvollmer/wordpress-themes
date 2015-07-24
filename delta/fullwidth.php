<?php
/**
 * Template Name: FullWidth, no sidebar
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
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

<?php get_footer(); ?>
