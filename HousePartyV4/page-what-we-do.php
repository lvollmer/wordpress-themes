<?php
/*
Template Name: What We Do
*/
get_header();
?>

  	
		<div id="sidebar">
	  		<ul id="nav">
	        	<li id="tab">
					<h3>
						<a href="reach.php" id="reach">Reach</a>
					</h3>
				</li>
	        	<li id="tab">
					<h3>
						<a href="engagement.php" id="engagement">Engagement</a>
					</h3>
				</li>
	        	<li id="active_tab">
					<h3>
						<a href="branding.php" id="branding">Branding</a>
					</h3>
				</li>
	        	<li id="tab">
					<h3>
						<a href="sales.php" id="sales">Sales</a>
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
