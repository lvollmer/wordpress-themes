<?php
get_header();
?>

  	
		
  		<div class="hphome">
			<!-- start# Top Gallery -->
			<div class="apage topGallery" style="margin-top: -21px; background: url(<?php echo bloginfo('template_url');?>/images/spotlight.jpg);height: 443px;width:958px;margin-left: -20px;">
				<?php $contactus_url = get_permalink(get_option('houseparty_contactusid'));?>
				<a href="<?php echo $contactus_url;?>"><div class="button_large_contact">Contact Us</div></a>
						<div class="whatishp">
							<a href="http://youtu.be/Ytg26dx7dDY" data-ob="lightbox"><img src="<?php echo bloginfo('template_url');?>/images/play-what-is-hp.png" class="play-img"/></a>
						</div>
			</div>
			<!-- end# Top Gallery -->
			
			 <?php 
			 /* to show the home page */

			 $home_page_id = get_option('houseparty_homepage');
			 if($home_page_id!=0){
				 $page_data = get_page( $home_page_id );
				 $page_content = one_half_home('apage', $page_data->post_content);
				 //$page_content = one_half('', $page_content);
				 echo '<div id="midpage">'.$page_content.'</div>';
			 }
			 ?> 
			<div class="clearboth"></div>
			 <!-- start# Display categories of About Us -->
			 <div class="apage" id="aboutcats">
				<dl id="pillars">
				<dt>
					<img src="<?php echo bloginfo('template_url');?>/images/wwd_reach.png" />
					<h2>Reach</h2>
					<p>
						Thousands of parties. Millions of conversations and recommendations.
					</p>
					<div class="button_inset">
						<a href="<?php echo get_permalink(371);?>">
						<div class="media_button">
							Learn more
						</div>
						</a>
					</div>
				</dt>
				<dt>
					<img src="<?php echo bloginfo('template_url');?>/images/wwd_engagement.png" />
					<h2>Engagement</h2>
					<p>
						Facebook posts. Tweets. UGC. Hundreds of thousands of hours of brand immersion and advocacy.
					</p>
					<div class="button_inset">
						<a href="<?php echo get_permalink(375);?>">
						<div class="media_button">
							Learn more
						</div>
						</a>
					</div>
				</dt>
				<dt>
					<img src="<?php echo bloginfo('template_url');?>/images/wwd_branding.png">
					<h2>Branding</h2>
					<p>
						Familiarity. Favorability. Advocacy intent. Purchase intent. Double digit lifts that last.
					</p>
					<div class="button_inset">
						<a href="<?php echo get_permalink(377);?>">
						<div class="media_button">
							Learn more
						</div>
						</a>
					</div>
				</dt>
				<dt>
					<img src="<?php echo bloginfo('template_url');?>/images/wwd_sales.png">
					<h2>Sales</h2>
					<p>
						It's not just talk. It's moving the sales needle. And delivering the strong ROI.
					</p>
					<div class="button_inset">
						<a href="<?php echo get_permalink(380);?>">
						<div class="media_button">
							Learn more
						</div>
						</a>
					</div>
				</dt>
			</dl>
				
				<div class="clearboth"></div>
			 </div>
			 <!-- end# Display categories of About Us -->

			 
			 <div class="apage">
				<div class="one_half" style="width:46%;">
				<!-- start# Promo Box -->
				<?php 
					$promo_box_img = get_option('houseparty_PromoBoxImgUrl');

					if($promo_box_img){
						$promo_box_img_link = get_option('houseparty_PromoBoxLinkUrl');
						
				?>
					<div class="home_img_container"><a href="<?php echo $promo_box_img_link;?>"><img src="<?php echo $promo_box_img;?>" id="homebanner" /></a></div>
				<?php }?>
				<!-- end# Promo Box -->

				<div id="botgallery">
				<!-- start# Gallery 1-->
				<?php 
					$galleryid1 = get_option('houseparty_gallery_id1');
					if( $galleryid1 ){
						global $wpdb, $table_prefix;	
						$attachments = $wpdb->get_results( "SELECT g.path, p.filename, p.alttext, p.description FROM ".$table_prefix."ngg_gallery g inner join ".$table_prefix."ngg_pictures p on g.gid = p.galleryid where g.gid = '".$galleryid1."' order by p.sortorder asc " );
						if( count($attachments) > 0){
							$gallerytitle1 = get_option('houseparty_gallery_title1');
						?>
						<h3 class="cgallerytitle"><?php echo $gallerytitle1;?></h3>
						<div class="flexslider1 carousel" style="width: 100%;">
						  <ul class="slides">
						  <?php
						foreach($attachments as $key => $attachment) :?>
							<li> 
								<img src="<?php echo home_url()."/".$attachment->path."/".$attachment->filename; ?>" title="<?php echo $attachment->description;?>" />
							</li>
							<?php
						endforeach;
						?>						
						  </ul>
						</div>
						<?php
						}
						  wp_reset_query();
					}
				?>	
				
				<!-- end# Gallery 1-->

				<!-- start# Gallery 1-->
				<?php 
					$galleryid2 = get_option('houseparty_gallery_id2');
					if( $galleryid2 ){
						global $wpdb, $table_prefix;	
						$attachments = $wpdb->get_results( "SELECT g.path, p.filename, p.alttext, p.description FROM ".$table_prefix."ngg_gallery g inner join ".$table_prefix."ngg_pictures p on g.gid = p.galleryid where g.gid = '".$galleryid2."' order by p.sortorder asc " );
						if( count($attachments) > 0){
						$gallerytitle2 = get_option('houseparty_gallery_title2');
						?>
						<h3 class="cgallerytitle"><?php echo $gallerytitle2;?></h3>
						<div class="flexslider2 carousel" style="width: 100%;">
						  <ul class="slides">
						  <?php
						foreach($attachments as $key => $attachment) :?>
							<li> 
								<img src="<?php echo home_url()."/".$attachment->path."/".$attachment->filename; ?>" title="<?php echo $attachment->description;?>" />
							</li>
							<?php
						endforeach;
						?>						
						  </ul>
						</div>
						<?php
						}
						  wp_reset_query();
					}
				?>	
				
				<!-- end# Gallery 1-->
				</div>
				</div>

				<div class="one_half last" id="twitterbox" style="width: 47%;padding: 10px 1.3%;">
					<a class="twitter-timeline" href="https://twitter.com/housepartyinc" data-widget-id="332510500476829696" data-theme="light" data-link-color="#20aebf" data-tweet-limit="6" data-related="twitterapi,twitter" data-chrome="nofooter noavatar noscrollbar noborders" data-aria-polite="assertive" width="455" height="600" lang="EN">Tweets by @housepartyinc</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			 </div>			
			<div class="clearboth"></div>
  		</div>
  	
  <?php get_footer(); ?>
