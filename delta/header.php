<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link href="<?php echo bloginfo('template_url')?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo bloginfo('template_url')?>/css/styles.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<header>
  <div class="container">
    <div class="slogan"> FAST, DEPENDABLE, NATIONWIDE AUTO TRANSPORT </div>
    <div class="searchbox">
      <!-- <input type="text" class="form-control" placeholder="Search..."> -->
	  <?php get_search_form(); ?>
    </div>
    <div class="clr"></div>
	<div class="slogo">
			<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo bloginfo('template_url')?>/images/logo.jpg" alt="Delta Logo" /></a></div>
			<div class="phoneNumber" style="width: 200px;"> 908-526-3400 </div>
	</div>
	<div class="clr"></div>
    <div class="nav-wrapper">
      <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="navbar-collapse collapse">
          <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="#">Delta Automotive Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#about">Services</a></li>
            <li><a href="#contact">Quality & Safety</a></li>
            <li> <a href="#">Contact</a> </li>
          </ul> -->
		  <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav navbar-nav', 'container'=>'' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</header>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">

				<?php 
					$galleryid = get_option('delta_topgalleryid');
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
							<div class="item<?php echo $active;?>">
								<img src="<?php echo home_url().$attachment->path."/".$attachment->filename; ?>" title="<?php echo $attachment->description;?>" />
								<div class="carousel-caption"></div>
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
  
</div>

	<div class="container">
