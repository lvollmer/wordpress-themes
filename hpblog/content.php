<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
	if($img_src[0]==""){
		$img_src[0] = home_url()."/wp-content/themes/hpblog/images/800x600-624x468.gif";
	}
	?>
	<img src="<?php echo $img_src[0];?>" id="feature-image" title="<?php echo get_the_title(); ?>">

	<header>
		<?php if ( is_single() ) : ?>
		<h1 class="hed"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="hed-link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php endif; // is_single() ?>
	</header>
	<div class="body">
		<?php echo hpblog_entry_meta();?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __('') ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		<div class="kicker"><?php echo userphoto__get_userphoto(get_the_author_meta( 'ID' ), USERPHOTO_THUMBNAIL_SIZE, $before, $after, $attributes, $default_src);;?><?php the_author_meta( 'description' ); ?><div style="clear: both; height: 2px;">&nbsp;</div></div>
	</div>
	

</article><!-- #post -->
