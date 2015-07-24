<?php
/*
Template Name: Careers Page
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
  		
  	<!--
  		Not sure what this is, so will revisit it later 
  		<div class="backnext">
  			<a href="#">&laquo; Home</a><span class="nextarticle"><a href="#">How we do it &raquo;</a></span>
  		</div>
  	-->
  		<div id="container" class="careers_container">
			<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page_new' ); ?>
			<?php endwhile; // end of the loop. ?>
			<?php
				/* To get the pages under careers, 
					Assumption: this templete is only for career page
				*/
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
							?>
							<li>
								<h2><a href="<?php echo get_permalink( $page->ID );?>" id="<?php echo $page_data->post_title;?>" style="<?php echo $icon_style;?>"><?php echo $page_data->post_title;?></a></h2>
								<p>
									<?php   
										
									echo get_post_meta($page->ID, 'page-excerpt', true);
									?>
								</p>
								
								<div class="button_inset">
									<a href="<?php echo get_permalink( $page->ID );?>">
									<div class="media_button">
										Learn more
									</div>
									</a>
								</div>
							</li>
							<?php

						}
				 }
			?>
		
  		</div>
  	
  <?php get_footer(); ?>
