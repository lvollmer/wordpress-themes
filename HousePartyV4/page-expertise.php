<?php
/*
Template Name: Category Expertise Master
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
					<li id="tab">
						<h3>
							<a id="clients" href="<?php echo get_permalink( 73 );?>">Client results</a>
						</h3>
					</li>
					<li id="active_tab">
						<h3>
							<a id="hpknows" href="<?php echo get_permalink( 2697 );?>">Category expertise</a>
						</h3>
					</li>
					<li id="tab">
						<h3>
							<a id="pastparties" href="<?php echo get_permalink( 2700 );?>">Past parties</a>
						</h3>
					</li>		
				</ul>      	
	        			
			<?php dynamic_sidebar( 'contact' ); ?>
  		</div>
  		
  		<div id="container" class="events_container">
			<h1>House Party knows</h1>
			
			<?php
				if ($pages) {
				  
						foreach ($pages as $page) {
							
							// Get page information
							$page_data = get_page( $page->ID );
							
							
							?>
								
								<div class="events_container_li">
								<div class="cs_left">
									<?
										$image_thumb = '';								
										if(has_post_thumbnail($page->ID, 'large'))
										{
											$image_id = get_post_thumbnail_id($page->ID);
											$image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
											
											$pp_blog_image_width = 250;
											$pp_blog_image_height = 250;

											if($image_thumb)
												echo '<img src="'. $image_thumb[0].'" width="150">';
											else
												echo '<img src="'. bloginfo('template_url').'/images/people.gif" width="150">';
										}

									?>
									<div class="button_inset">
										<?php $video_url = get_post_meta($page->ID, 'video-url', true);
										if( !$video_url )
											$video_url = get_permalink( $page->ID );
										?>
										<a href="<?php echo $video_url;?>" data-ob="lightbox">
										<div class="media_button">
											Watch video
										</div>
										</a>
									</div>
								</div>	
								<h2><a href="<?php echo get_permalink( $page->ID );?>"><?php echo $page_data->post_title;?></a></h2>
								<p>
									<?php   
										
									echo get_post_meta($page->ID, 'page-excerpt', true);
									?>
								</p>
								</br>
								<p>
									<a href="<?php echo get_permalink( $page->ID );?>">Learn more &raquo;</a>
								</p>
							</div>

							<?php

						}
				 }
			?>
		
  		</div>
  	
  <?php get_footer(); ?>
  <script>
  jQuery(function(){
	  jQuery("#menu-item-2621").addClass("current-menu-item");
  });
  </script>
