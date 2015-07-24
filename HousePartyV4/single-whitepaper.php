<?php
/*
Template Name Posts: WhitePaper Post Template
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
							if( 2993 == $page->ID )
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

		<div id="containerwp" class="wp_container whitepapersingle">
								  		<style>.w2llabelDownload_URL {display:none;} #sf_Download_URL{display:none} .Download_URL {display:none;}</style>

				
				<?php while ( have_posts() ) : the_post(); ?>
					
					<ul style="margin-left: 2px;">
					<li>
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
							
							
							
						</div>
						
						<h2><?php the_title(); ?></h2>

								<p>by <!--<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">-->
										<?php printf( __( '%s', 'twentyten' ), get_the_author() ); ?>
									<!--</a>--> <br>Published on <?php echo get_the_time('M j, Y');?>
								</p>
								<p>&nbsp;</p>
								
									<?php the_content();?>
								
					</li>
					</ul>
					
					

					<div class="clearboth"></div>
				<!--	<div style="margin: 10px 0;">
						
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next" style="float:right;"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</div>--><!-- #nav-single -->


				<?php endwhile; // end of the loop. ?>

			
		</div><!-- #container -->
<style>
#readytodownload{display: none;};
</style>
<?php get_footer(); ?>