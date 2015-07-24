<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article class="blog listpost">	
		<?
			if(get_post_thumbnail_id(get_the_ID()))
			{
				?>
					<div class="blog-header-image"><a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>" /></a></div>
				<?php
			}
		?>
		<div class="title">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</div>
		<?php 
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if( count( get_the_category() ) )
				$tag_list_txt = " | Tagged in ".get_the_category_list( ', ' );
			else
				$tag_list = '';

			$total_comments = get_comments_number();

		?>
		<div class="meta">
			Posted by <!--<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">-->
				<?php printf( __( '%s', 'twentyten' ), get_the_author() ); ?>
			<!--</a>--><?php echo $tag_list_txt;?> | <a href="<?php the_permalink(); ?>"><?php echo $total_comments;?> comments</a>
		</div>
		

		<div class="body">
			<?php echo get_the_excerpt();?>
		</div>	
		<div class="readmore">
			<div class="button_inset">
				<a href="<?php the_permalink(); ?>">
					<div class="button_large">
						Read more
					</div>
				</a>
			</div>
		</div>

		
	</article><!-- #post-<?php the_ID(); ?> -->
