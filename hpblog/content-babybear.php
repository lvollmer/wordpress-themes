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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> onclick="location.href='<?php the_permalink(); ?>'">
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
		

</article><!-- #post -->
