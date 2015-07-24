<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php 

global $more; $more = false; # some wordpress wtf logic

$query_string ="post_type=post&paged=$paged";

$cat_id = 3;//get_cat_ID(single_cat_title('', false));

if(!empty($cat_id))
{
	$query_string.= '&cat='.$cat_id;
}


$args = array(
'post_type' => 'post',
'posts_per_page' => 5,
'paged'=>$paged,
'cat'=>$cat_id
);
query_posts( $args );

?>
 <?php

$num_of_posts = $wp_query->post_count;
$cur_post = 0;

if (have_posts()) : while (have_posts()) : the_post();
	
	$cur_post++;
	$image_thumb = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
	    
	    $pp_blog_image_width = 230;
		$pp_blog_image_height = 100;
	}
?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<article id="post-<?php the_ID(); ?>" class="blog">
			<header>
				<h1 class="pageTitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div style="clear:both;height:1px;"></div>				
				<div class="postmetadata">
					<?php twentyten_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header>
			<div class="singleblogPost">
						<?php
							$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 1 ) );
							if ( $images ) :
								$total_images = count( $images );
								$image = array_shift( $images );
								$image_img_tag = wp_get_attachment_image( $image->ID, 'full' );
						?>
								<div class="postImg">
									<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
								</div><!-- .gallery-thumb -->
								
						<?php endif; ?>
						<div class="clearfix"></div>

						<div class="entry-content">
							<?php the_content( __( '<div class="readMore"><div class="mainButton">Read More</div></div>', 'twentyten' ) ); ?>
						</div><!-- .entry-content -->
						<div class="clearfix"></div>
	<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>

						<div id="entry-author-info">
							<div id="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							</div><!-- #author-avatar -->
							<div id="author-description">
								<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
								<?php the_author_meta( 'description' ); ?>
								<div id="author-link">
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
									</a>
								</div><!-- #author-link	-->
							</div><!-- #author-description -->
						</div><!-- #entry-author-info -->
	<?php endif; ?>

						<footer class="postFooterSingle">
							<?php if ( count( get_the_category() ) ) : ?>
								<span class="cat-links">
									<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
								</span>
								<span class="meta-sep">|</span>
							<?php endif; ?>
							<?php
								$tags_list = get_the_tag_list( '', ', ' );
								if ( $tags_list ):
							?>
								<span class="tag-links">
									<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
								</span>
								<span class="meta-sep">|</span>
							<?php endif; ?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
							<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-utility -->
					</div><!-- .singleblogPost -->
				</article><!-- #post-## -->

	
<?php endwhile; endif; ?>

<div class="pagination"><?php posts_nav_link(' '); ?></div>