<?php
/*
Template Name: Events List Page
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
  		
  		<div id="container" class="events_container">
			<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page_new' ); ?>
			<?php endwhile; // end of the loop. ?>


			<?php	
				// to get the upcoming events
				$parent_id = $post->ID;
				$args = array(
					'child_of' => $parent_id,
					'parent' => $parent_id,
					'orderby' => 'meta_value',
					'order' => 'asc',
					'post_type' => 'page',
					'meta_key' => 'event_date',
					'meta_query' => array(
						array(
							'key' => 'event_date',
							'value' => date("Y-m-d"),
							'compare' => '>='
						)
					)

				 );
				query_posts( $args );
				
				?>

				<?php
				$counter = 1;
				if (have_posts()) : while (have_posts()) : the_post();
					if( $counter == 1 ){
						echo '<h1>Upcoming events</h1>';
					}

					if(has_post_thumbnail(get_the_ID(), 'large'))
					{
						$image_id = get_post_thumbnail_id(get_the_ID());
						$image_src = wp_get_attachment_image_src($image_id, 'large', true);
						$image_src = $image_src[0];
					}else{
						$image_src = home_url('/').'wp-content/themes/HouseParty/images/150x150.gif';
					}

					$event_date = get_post_meta(get_the_ID(), 'event_date', true);
					$event_location = get_post_meta(get_the_ID(), 'event_location', true);
					$page_excerpt = get_post_meta(get_the_ID(), 'page-excerpt', true);
					$external_url = get_post_meta(get_the_ID(), 'external_url', true);

					?>
		    <div class="events_container_li">
						<div class="cs_left">
							<img src="<?php echo $image_src;?>">
							<div class="button_inset">
								<a href="<?php echo $external_url;?>" target="_blank">
								<div class="media_button">
									View
								</div>
								</a>
							</div>
						</div>	
						<h2><a href="<?php echo $external_url;?>" target="_blank"><?php the_title(); ?></a></h2>
						<p><?php echo date("F j, Y", strtotime($event_date)).'<br>'.$event_location; ?></p>
						<br>
						<p>
							<?php the_content(); ?>
						</p>
					</div>
				<?php
					 
					$counter++;
				 endwhile; endif; ?>
				</div>

				<div id="container" class="events_container">
				<?php	
				// to get the past events
				$parent_id = $post->ID;
				$args = array(
					'child_of' => $parent_id,
					'parent' => $parent_id,
					'orderby' => 'meta_value',
					'order' => 'desc',
					'post_type' => 'page',
					'meta_key' => 'event_date',
					'meta_query' => array(
						array(
							'key' => 'event_date',
							'value' => date("Y-m-d"),
							'compare' => '<'
						)
					)

				 );
				query_posts( $args );
				
				?>

				<?php
				$counter = 1;
				if (have_posts()) : while (have_posts()) : the_post();
					if( $counter == 1 ){
						echo '<h1>Past events</h1>';
					}

					if(has_post_thumbnail(get_the_ID(), 'large'))
					{
						$image_id = get_post_thumbnail_id(get_the_ID());
						$image_src = wp_get_attachment_image_src($image_id, 'large', true);
						$image_src = $image_src[0];
					}else{
						$image_src = home_url('/').'wp-content/themes/HouseParty/images/150x150.gif';
					}

					$event_date = get_post_meta(get_the_ID(), 'event_date', true);
					$event_location = get_post_meta(get_the_ID(), 'event_location', true);
					$page_excerpt = get_post_meta(get_the_ID(), 'page-excerpt', true);
					$external_url = get_post_meta(get_the_ID(), 'external_url', true);
				?>
					<div class="events_container_li">
						<div class="cs_left">
							<img src="<?php echo $image_src;?>">
							<div class="button_inset">
								<a href="<?php echo $external_url;?>" target="_blank">
								<div class="media_button">
									View
								</div>
								</a>
							</div>
						</div>	
						<h2><a href="<?php echo $external_url;?>" target="_blank"><?php the_title(); ?></a></h2>
						<p><?php echo date("F j, Y", strtotime($event_date)).'<br>'.$event_location; ?></p>
						<br>
						<p>
							<?php the_content(); ?>
						</p>
					</div>
				<?php
					$counter++;
				 endwhile; endif;
				?>
	  		</div>
  	
  <?php get_footer(); ?>
