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
<link rel="stylesheet" type="text/css" href="<?php echo content_url(); ?>/themes/HouseParty/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo content_url(); ?>/themes/HouseParty/css/home.css">
<link rel="stylesheet" type="text/css" href="<?php echo content_url(); ?>/themes/HouseParty/css/rwd.css">


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
</head>

  <body>
  	<header id="header_container">
  		<div id="masthead">
  			<div id="header-left">
  				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/11/houseparty_main_logo.png" alt="House Party Logo" width="362" />
				</a>
  				<h6><?php bloginfo( 'description' ); ?></h6>
  			</div>
  			<div id="header-right">
				<div id="houseparty-site">
					<h6>
						Get the consumer experience at <a href="http://www.houseparty.com" target="_blank" class="external">houseparty.com &raquo;</a>
					</h6>
				</div>
				<div id="socialmedia">
					<a href="http://www.facebook.com/housepartyfun"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/facebook.png"></a>
					<a href="http://www.twitter.com/housepartyfun"><img src="<?php echo content_url(); ?>/themes/HouseParty/images/twitter.png"></a>
				</div>
			</div>	
  		</div>
  		<nav>
  			<ul>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  			</ul>
  		</nav>
  	</header>
	<div id="hero">
