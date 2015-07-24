<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 
global $paged;


?>
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php 
				// list of posts for first page and for non-single and non-search
				if( !is_single() && !is_search() && $paged < 2 ){
					$counter = 1;
					while ( have_posts() ) : the_post(); 
						if( $counter == 1 ){
					?>
							<section class="papabear tile">
								<?php get_template_part( 'content-mamabear', get_post_format() ); ?>
							</section>
					<?php
						
						}
						
						if( $counter == 2 ):
							echo '<section class="mamabear tile">';
						endif;
							 
						if( $counter == 7 ):
							echo '<section class="babybear tile">';
						endif;
						if( $counter != 1 ){
							get_template_part( 'content-mamabear', get_post_format() );
						}

						if( $counter == 6 ):
							echo '</section>';
						endif;							 

						if( $counter == 24 ):
							echo '</section>';
						endif;

						if($counter == 10){
							facebook_widget();
						}

						if($counter == 12){
							twiter_widget();
						}

						$counter++;
					
					endwhile; 

					// close missing section
					if( ($counter < 6 && $counter > 1) || ($counter < 24 && $counter > 6) ):
						echo '</section>';
					endif;			
				}else{
					$counter2 = 1;
					echo '<section class="babybear tile">';
					while ( have_posts() ) : the_post(); 						
						get_template_part( 'content-babybear', get_post_format() );	
						if($counter2 == 10){
							facebook_widget();
						}

						if($counter2 == 12){
							twiter_widget();
						}

						$counter2++;
					endwhile;
					echo '</section>';

				}
				
			?>

			<?php wp_pagenavi(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>