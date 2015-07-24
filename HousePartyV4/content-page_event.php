<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
		<?php
		if(has_post_thumbnail(get_the_ID(), 'large'))
					{
						$image_id = get_post_thumbnail_id(get_the_ID());
						$image_src = wp_get_attachment_image_src($image_id, 'large', true);
						$image_src = $image_src[0];
					}else{
						$image_src = home_url('/').'wp-content/themes/HouseParty/images/150x150.gif';
					}

					$event_date = get_post_meta(get_the_ID(), 'event_date', true);
					$event_location = get_post_meta(get_the_ID(), 'event_location', true);
					$page_excerpt = get_post_meta(get_the_ID(), 'page-excerpt', true);
					$external_url = get_post_meta(get_the_ID(), 'external_url', true);
					?>
  		<li>
			<div class="cs_left">
				<img src="<?php echo $image_src;?>">
				
			</div>	
			<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
			<p><?php echo date("F j, Y", strtotime($event_date)).'<br>'.$event_location; ?></p>
			<br>
			<p>
				<?php the_content(); ?>
			</p>
			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</li>

		