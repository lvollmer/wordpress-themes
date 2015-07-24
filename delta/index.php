<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div class="row">
    <div class="col-xs-12">
      <h2>Delta Automotive's Commitment to Quality and Excellence Translates to Fast, <br>
        Dependable, Nationwide Auto Transportation.</h2>
    </div>
  </div>
  <div class="row latestNews">
   <?php // <h3>Latest News</h3> ?>
    <div class="col-md-15">
    	<div class="newsDetail">
        	<h5>EQUIPMENT</h5>
            <img src="<?php echo bloginfo('template_url')?>/images/latest-news-6.jpg" alt="">
        </div>
    </div>
    <div class="col-md-15">
    <div class="newsDetail">
      <h5>Network Map</h5>
      <img src="<?php echo bloginfo('template_url')?>/images/latest-news-7.jpg" alt=""> </div>
      </div>
    <div class="col-md-15">
    <div class="newsDetail">
      <h5>Employment</h5>
      <img src="<?php echo bloginfo('template_url')?>/images/latest-news-8.jpg" alt=""></div>
      </div>
    <div class="col-md-15">
    <div class="newsDetail">
      <h5 class="line-height-Normal">Client <br>
        Testimonials</h5>
      <img src="<?php echo bloginfo('template_url')?>/images/latest-news-9.jpg" alt=""> </div>
      </div>
    <div class="col-md-15">
    <div class="newsDetail">
      <h5>Affiliations</h5>
      <img src="<?php echo bloginfo('template_url')?>/images/latest-news-10.jpg" alt=""> </div>
      </div>
  </div>
  <div class="row brand">
				  				
				<?php 
					$galleryid = get_option('delta_brandlogogalleryid');
					if( $galleryid ){
						global $wpdb, $table_prefix;	
						$attachments = $wpdb->get_results( "SELECT g.path, p.filename, p.alttext, p.description FROM ".$table_prefix."ngg_gallery g inner join ".$table_prefix."ngg_pictures p on g.gid = p.galleryid where g.gid = '".$galleryid."' order by p.sortorder asc " );
						if( count($attachments) > 0){
						?>
						  <?php
							$counter = 0;
						foreach($attachments as $key => $attachment) :
							$attachment->path = str_replace("\\", "/", $attachment->path);
							$active = $counter==0?' active':'';
						?>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
								<a href="<?php echo $attachment->description;?>" target="_blank"><img src="<?php echo home_url().$attachment->path."/".$attachment->filename; ?>" title="<?php echo $attachment->description;?>">		</a> 
								
							</div>
							<?php
							$counter++;
						endforeach;
						?>						
						<?php
						}
						  wp_reset_query();
					}
				?>		
										
				
  </div>

<?php get_footer(); ?>