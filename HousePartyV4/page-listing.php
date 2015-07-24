<?php
/*
Template Name: People Listing Template
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
			'child_of' => $parent_id,
			'sort_column' => 'menu_order',
			'hierarchical' => 0,
			'parent' => $parent_id,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 1
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
  		
  		<div id="container">
			
				<?php
				$parent_id = $post->ID;
					

				$args2=array(
					'child_of' => $parent_id,
					'sort_column' => 'menu_order',
					'hierarchical' => 0,
					'parent' => $parent_id,
					'exclude_tree' => '',
					'number' => '',
					'offset' => 1
				);
				$pages2 = get_pages($args2); 
				
				/*echo '<pre>';
				print_r($pages2);*/
				
				?>
				<div id="managementcontainer">
					<?php foreach ($pages2 as $page2) {
						
						// Get page information
						$page_data = get_page( $page2->ID );
						//echo $page_data->post_title;
						// Get page information
							
							$title = get_post_meta($page2->ID, 'title', true);
						?>
					<div class="mgmt-photo">
						<a href="<?php echo get_permalink( $page2->ID );?>" id="<?php echo $page_data->post_title;?>">
						
						<?
							$image_thumb = '';								
							if(has_post_thumbnail($page2->ID, 'large'))
							{
								$image_id = get_post_thumbnail_id($page2->ID);
								$image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
								
								$pp_blog_image_width = 250;
								$pp_blog_image_height = 250;

								if($image_thumb)
									echo '<img src="'. $image_thumb[0].'" width="200" height="200">';
								else
									echo '<img src="'. bloginfo('template_url').'/images/people.gif"  width="200" height="200">';
							}

						?>
						<h2>
							<?php echo $page_data->post_title;?>
						</h2>
						</a>
						<h3>
							<?php echo $title;?>
						</h3>
					</div>
					<?php }?>
				</div>
		
  		</div>
  	
  <?php get_footer(); ?>
