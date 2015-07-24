<?php
/*
Template Name Posts: Press Release Post Template
*/
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		
		<div id="sidebar">
		<?php
		$parent_id = 79;

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
							if( 264 == $page->ID )
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

					

					<?php get_template_part( 'content', 'single' ); ?>

					<div style="margin: 10px 0;">
						
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next" style="float:right;"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</div><!-- #nav-single -->

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			
		</div><!-- #container -->

<?php get_footer(); ?>