<?php
/*
Template Name: Event Single Page
*/
get_header();
?>

  	
		<div id="sidebar">
		<?php

		// putting here the id of newsroom		
		$parent_id = 79;

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
				  // events master page id = 2990
						foreach ($pages as $page) {
							// Check active or not
							if( 2990 == $page->ID )
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
  		<div id="container" class="events_container">
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_event' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
<style>
.one_half ul{list-style: disc !important;}
.one_half ul li{padding-bottom: 20px;}
</style>