<?php
/*
Template Name: Expertise Page Template
*/
get_header();
?>

  	
		<div id="sidebar">
		
		
	  		<ul id="nav">
					<li id="tab">
						<h3>
							<a id="clients" href="<?php echo get_permalink( 73 );?>">Client results</a>
						</h3>
					</li>
					
						
					<li<?php if($post->post_parent==2697){echo ' id="active_tab"';}else{echo ' id="tab"';}?>>
						<h3>
							<a id="hpknows" href="<?php echo get_permalink( 2697 );?>">Category expertise</a>
						</h3>
					</li>

					<?php
							$args2=array(
								'child_of'		=> 2697,
								'sort_column'	=> 'menu_order',
								'hierarchical'	=> 0,
								'parent'		=> 2697,
								'exclude_tree'	=> '',
								'number'		=> '',
								'offset'		=> 1
							);
							$pages2 = get_pages($args2);

								

						?>
								<?php
								if ($pages2) {
								  
										foreach ($pages2 as $page2) {
											// Check active or not
											if( $post->ID == $page2->ID )
												$li_ID = "active_sub_tab";
											else
												$li_ID = "sub_tab";
											// Get page information
											$page2_data = get_page( $page2->ID );
											$icon_url = get_post_meta($page2->ID, 'page-icon-url', true);
											if($icon_url ){
												$icon_style = 'background: url('.$icon_url.') no-repeat 10px center;';
											}else{
												$icon_style = '';
											}

											$page_custom_title = get_post_meta($page2->ID, 'page-custom-title', true);
											echo '<li id="'.$li_ID.'"><h3><a href="'.get_permalink( $page2->ID ).'" id="'.$page2_data->post_title.'" style="'.$icon_style.'">'.$page_custom_title.'</a></h3></li>';

										}
								 }
							?>
					<li<?php if($post->post_parent==2700){echo ' id="active_tab"';}else{echo ' id="tab"';}?>>
						<h3>
							<a id="pastparties" href="<?php echo get_permalink( 2700 );?>">Past parties</a>
						</h3>
					</li>			
				</ul> 
			<?php dynamic_sidebar( 'contact' ); ?>
  		</div>
  		
  	<!--
  		Not sure what this is, so will revisit it later 
  		<div class="backnext">
  			<a href="#">&laquo; Home</a><span class="nextarticle"><a href="#">How we do it &raquo;</a></span>
  		</div>
  	-->
  		<div id="container">
			<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page_new' ); ?>


				<?php endwhile; // end of the loop. ?>
		
  		</div>
  	
  <?php get_footer(); ?>
<style>
.one_half ul{list-style: disc !important;}
.one_half ul li{padding-bottom: 20px;}
</style>