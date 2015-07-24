<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Twenty Thirteen 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'twentythirteen_author_bio_avatar_size', 800 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	<header><h1 class="hed"><?php printf( __( 'About %s', 'twentythirteen' ), get_the_author() ); ?></h1></header>
	<div class="body">		
		
			<p><?php the_author_meta( 'description' ); ?></p>
		
	</div><!-- .author-description -->	
</article><!-- .author-info -->
<article style="padding:0;">
<h2>Posts by <?php echo get_the_author();?></h2>
</article>