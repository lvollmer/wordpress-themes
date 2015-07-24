<?php
/*
Template Name: WhitePapers Master
*/
get_header();
?>

  	
		<div id="sidebar">
		<?php
		
		if($post->post_parent)
			$parent_id = $post->post_parent;
		else
			$parent_id = $post->ID;

		$args=array(
			'child_of'		=> $parent_id,
			'sort_column'	=> 'menu_order',
			'hierarchical'	=> 0,
			'parent'		=> $parent_id,
			'exclude_tree'	=> '',
			'number'		=> '',
			'offset'		=> 1
		);
		$pages = get_pages($args);  
		
		?>

			
	        	
		<ul id="nav">
			<?php
				if ($pages) {
				  
						foreach ($pages as $page) {
							// Check active or not
							if( $post->ID == $page->ID )
								$li_ID = "active_tab";
							else
								$li_ID = "tab";
							// Get page information
							$page_data = get_page( $page->ID );
							$icon_url = get_post_meta($page->ID, 'page-icon-url', true);
							if($icon_url ){
								$icon_style = 'background: url('.$icon_url.') no-repeat 10px center;';
							}else{
								$icon_style = '';
							}
							echo '<li id="'.$li_ID.'"><h3><a href="'.get_permalink( $page->ID ).'" id="'.$page_data->post_title.'" style="'.$icon_style.'">'.$page_data->post_title.'</a></h3></li>';

						}
				 }
			?>		
		</ul>      	
	        			
		<?php dynamic_sidebar( 'contact' ); ?>
  		</div>
  		
  		<div id="container" class="events_container">
			<h1>Research</h1>
			<ul style="margin-left: 2px;">
			<?php
				global $more; $more = false; # some wordpress wtf logic
				$query_string ="post_type=post&paged=$paged";
				$cat_id = 20;//get_cat_ID(single_cat_title('', false));
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


						<div class="events_container_li">
								<div class="cs_left">
									<?
										$image_thumb = '';								
										if(has_post_thumbnail(get_the_ID(), 'large'))
										{
											$image_id = get_post_thumbnail_id(get_the_ID());
											$image_thumb = wp_get_attachment_image_src($image_id, 'full', true);

											if($image_thumb)
												echo '<img src="'. $image_thumb[0].'" width="150" height="200">';
											
										}else
											echo '<img src="'. home_url().'/wp-content/themes/HouseParty/images/150by200.gif" width="150">';

									?>
									<div class="button_inset">
										
										<a href="<?php the_permalink();?>">
										<div class="media_button">
											Download
										</div>
										</a>
									</div>
								</div>	
									
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<!--	<p>by <!--<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">-->
										<!--<?php printf( __( '%s', 'twentyten' ), get_the_author() ); ?>-->
									<!--</a>--> <br>Published on <?php echo get_the_time('M j, Y');?>
								<!--</p>-->
								<p>&nbsp;</p>
								<style>.readmore {display:none;}</style>
						
									<?php the_excerpt('');?>
							</div>

							
		<?php endwhile; endif; ?>
		</ul>
		<div class="clearboth"></div>
		<div class="pagination"><?php posts_nav_link(' '); ?></div>
  		</div>
  	
  <?php get_footer(); ?>
