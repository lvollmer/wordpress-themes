<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

								<?
									if(get_post_thumbnail_id(get_the_ID()))
									{
										?>
											<div class="blog-header-image"><a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>" /></a></div>
										<?php
									}
								?>
	<div class="title">
		<h1><?php the_title(); ?></h1>
		<P><em>Published on <?php echo get_the_time('M j, Y');?></em></P>
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
	</div>
	



	<div class="body">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<div class="post-share">
				<div id="social-bar-holder" class="group"><?php my_socialbar(); ?></div>
	</div>
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
	<?php /*	<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->

		</div><!-- #author-info --> */ ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
