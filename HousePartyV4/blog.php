<?php
/*
Template Name: Blog Page
*/
get_header();
?>

  	
		<div class="blog-sidebar">
		<?php get_sidebar(); ?>
  		</div>
  		
 
  		<div id="container_full">
			<ul style="margin-left: 2px;">
			<?php
				global $more; $more = false; # some wordpress wtf logic
				$query_string ="post_type=post&paged=$paged";
				// Id of Blog category
				$cat_id = '21';//get_cat_ID(single_cat_title('', false));
				if(!empty($cat_id))
				{
					$query_string.= '&cat='.$cat_id;
				}
				$args = array(
				'post_type' => 'post',
				'posts_per_page' => 20,
				'paged'=>$paged,
				'cat'=>$cat_id
				);
				query_posts( $args );
				
				$num_of_posts = $wp_query->post_count;
				$cur_post = 0;

				if (have_posts()) : while (have_posts()) : the_post();
					
					$cur_post++;
					
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
								<P><em>Published on <?php echo get_the_time('M j, Y');?></em></P>
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
								
							</article>

							
		<?php endwhile; endif; ?>
		</ul>
		<div class="clearboth"></div>
		<?php wp_pagenavi(); ?>
  		</div>
  	
  <?php get_footer(); ?>
