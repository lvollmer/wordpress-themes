<?php
/*
Template Name: Past Parties
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
					<li id="tab">
						<h3>
							<a id="hpknows" href="<?php echo get_permalink( 2697 );?>">Category expertise</a>
						</h3>
					</li>
					<li id="active_tab">
						<h3>
							<a id="pastparties" href="<?php echo get_permalink( 2700 );?>">Past parties</a>
						</h3>
					</li>		
				</ul>      	
	        			
			<?php dynamic_sidebar( 'contact' ); ?>
  		</div>
  		
  		<div id="container">
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_new' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
  <script>
  jQuery(function(){
	  jQuery("#menu-item-2621").addClass("current-menu-item");
  });
  </script>