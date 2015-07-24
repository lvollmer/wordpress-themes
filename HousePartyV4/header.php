<?php
/**
 * The Header file for this theme.
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!--<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />-->
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/css/home.css">
<!--<link rel="stylesheet" type="text/css" href="<?php echo content_url(); ?>/themes/HouseParty/css/rwd.css">-->


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-314167-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
  <body>
  	<header id="header_container">
  		<div id="masthead">
  			<div id="header-left">
  				
				<!--Header image-->
				<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}
					?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else :
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>
				<!--Header image-->
  				<h6><?php bloginfo( 'description' ); ?></h6>
  			</div>
  			<div id="header-right">
				<div id="houseparty-site">
					<h6><em>Corporate:</em></h6>
					<a href="http://www.linkedin.com/company/house-party-inc" target="_blank"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/hp-corp-icon-linkedin.png" align="absmiddle" ></a>
					<a href="https://plus.google.com/107080493613351817538/posts" target="_blank"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/hp-corp-icon-googleplus.png" align="absmiddle"></a>
					<a href="http://www.twitter.com/housepartyinc" target="_blank"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/twitter.png" align="absmiddle"></a>

					<h6 style="padding-left:150px;"><em>Consumer:</em></h6>
					<a href="http://www.houseparty.com" target="_blank"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/hp-corp-icon-houseparty.png" align="absmiddle"></a>
					<a href="https://plus.google.com/107080493613351817538/posts" target="_blank"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/hp-corp-icon-facebook.png" align="absmiddle"></a>
					<a href="http://www.twitter.com/housepartyinc" target="_blank"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/twitter.png" align="absmiddle"></a>
				</div>

				<div id="opt-in" class="newsletter_top">Receive occasional news from House Party, inc., including research findings, our quarterly newsletter and more. <a href="">Terms of Service</a> | <a href="">Privacy Policy</a><br><br>
				<form method="post" action="<?php echo home_url();?>/opt-in-confirm/">
				    <label style="font-weight:bold">Email address: &nbsp;</label> <input type="text" name="email" class="w2linput" value=""> &nbsp;
				    <input type="submit" name="w2lsubmit" class="w2linput submit" value="Sign me up!">
				</form>
				</div>
				<style>
				.newsletter_top{clear: both; top: 10px; width: 425px; font-size: 13px;padding:20px 20px 10px;position:relative;border-top: 1px solid #f1f1e7;border-right:1px solid #f1f1e7;border-left:1px solid #f1f1e7;background:#fff;font-family: Museo Slab;}
				.newsletter_top input[type="text"]{width: 197px;}
				.newsletter_top .submit{background: none repeat scroll 0px 0px rgb(34, 183, 201); color: rgb(255, 255, 255); border-radius: 6px 6px 6px 6px; border: 1px solid rgb(34, 183, 201); padding: 3px 12px; font-weight: bold;font-family: Museo Slab;font-size:14px;}
				#header_container nav{margin-top:0px;}
				</style>


			<!--	<div id="socialmedia">

					<a href="http://www.facebook.com/housepartyfun"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/facebook.png"></a>
					<a href="http://www.twitter.com/housepartyfun"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/twitter.png"></a>
				</div> -->
			</div>	
  		</div>
	    
  		<nav>
  			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  		</nav>
  	</header>
	<div id="wrapper">
