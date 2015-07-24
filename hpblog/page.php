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

	<section class="fullpost">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
					if($img_src[0]==""){
						$img_src[0] = home_url()."/wp-content/themes/hpblog/images/800x600-624x468.gif";
					}
					?>
					<img src="<?php echo $img_src[0];?>" id="feature-image" title="<?php echo get_the_title(); ?>">

					<header>
						<h1 class="hed"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="body">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

			<?php endwhile; ?>

		</section>

<?php get_footer(); ?>