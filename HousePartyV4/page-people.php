<?php
/*
Template Name: New Two Columns People
*/
get_header();
?>

  	
		<div id="sidebar">
		<?php
		if($post->post_parent)
			$parent_id = $post->post_parent;
		else
			$parent_id = $post->ID;

		$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_page($parent[0]);
$parent_id = $first_parent->ID;

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
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_people' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
