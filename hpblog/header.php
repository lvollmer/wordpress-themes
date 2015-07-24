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

	<link href="<?php bloginfo( 'template_url' ); ?>/css/stylesheet.css" rel="stylesheet">
	<!-- <script type="text/javascript" src="//use.typekit.net/qne3sfd.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header-global">
		<a href="<?php echo home_url('/')?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo-houseparty-header.png" class="logo"></a>
		<nav class="nav-main">
			<ul>
				<li><a href="<?php echo home_url('/')?>about">About</a></li>
				<li><a href="<?php echo home_url('/')?>authors">Authors</a></li>
				<li><a href="http://facebook.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-facebook.png"></a></li>
				<li><a href="http://twitter.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-twitter.png"></a></li>
				<li><a href="http://instagram.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-instragram.png"></a></li>
				<li><a href="http://www.pinterest.com/housepartyfun" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-pinterest.png"></a></li>
				<li><a href="http://feeds.feedburner.com/HousepartyBlog" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-rss.png"></a></li>
				<li><a href="http://houseparty.com" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon-home.png"></a></li>
			</ul>
		</nav>
		<div class="searchbox">
			<!-- This needs a search icon in the field somehow -->
			<!-- This totally breaks under 1024px, can you figure it out? The search bar always falls down to the next line -->
			<form action="<?php echo home_url('/')?>" class="search-form" method="get" role="search">
				<input type="search" name="s" value="">
			</form>
		</div>
	</header>

	<header class="header-mobile">
		<a href="<?php echo home_url('/')?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo-houseparty-header.png" class="logo"></a>
	</header>

	<?php /* nav */ ?>
	<nav class="nav-category">
		<ul>
			<li><a href="javascript: void();" class="cat-plan">Party planning</a></li>
			<li><a href="javascript: void();" class="cat-food">Food</a></li>
			<li><a href="javascript: void();" class="cat-family">Family &amp; kids</a></li>
			<li><a href="javascript: void();" class="cat-entertain">Entertainment</a></li>
			<li><a href="javascript: void();" class="cat-hp">Inside House Party</a></li>
			<li><a href="javascript: void();" class="cat-connected">Connected</a></li>
			<li><a href="javascript: void();" class="cat-life">Lifestyle</a></li>
		</ul>
	</nav>

	<?php
		// infant bear list with more button will come hover on menu category
		// collecting categories id into an array
		$categories = array('party-planning'=>'cat-plan', 'food'=>'cat-food', 'family-and-kids'=>'cat-family', 'entertainment'=>'cat-entertain', 'inside-house-party'=>'cat-hp', 'connected'=>'cat-connected',8=>'cat-life');
		foreach( $categories as $key=>$cat){
				$args = array(
				'post_type' => 'post',
				'posts_per_page' => 7,
				'category_name'=>$key,
				'paged'=>1
				);
				query_posts( $args );
				$num_of_posts = $wp_query->post_count;

				if ( have_posts() ) :
					echo '<aside class="infant-bear infant-'.$cat.'">';
						$aside_counter = 1;
						while ( have_posts() ) : the_post();
							get_template_part( 'content-babybear', get_post_format() );
							$aside_counter++;
							if($aside_counter>6) break;
						endwhile;
						$theCatId = get_term_by( 'slug', $key, 'category' );
						$theCatId = $theCatId->term_id;
						$category_link = esc_url(get_category_link( $theCatId ));
						if($num_of_posts >= 6)
							$page = 2;
						else
							$page = 1;
						echo '<a href="'.$category_link.'?paged='.$page.'" class="btn btn-aside">See more &raquo;</a>';
						echo '<a href="javascript:;" onclick="jQuery(\'.infant-'.$cat.'\').hide();jQuery(\'.nav-category a\').removeClass(\'active\');" class="btn btn-aside-close">Close</a>';
					echo '</aside>';
				endif;
		}

		wp_reset_query();

	?>
<script>
jQuery(function(){
	// click on menu category to show infant bear
	jQuery(".nav-category").find("a").click( function(e){	
		if(jQuery(this).hasClass("active")){			
			jQuery(".infant-bear").hide();
			jQuery(".nav-category a").removeClass("active");
			return false;
		}
		var menucls = jQuery(this).attr("class");
		jQuery(".infant-bear").hide();
		jQuery(".nav-category a").removeClass("active");
		jQuery(this).addClass("active");
		jQuery(".infant-"+menucls).slideDown("slow");
		
	});
});
</script>
<!-- subscriber modal -->
<?php $subscriber_txt = get_option('hpblog_subscriber_txt');?>
<div class="blackout" style="display: none;">
	<div class="modal">
		<h1>Sign up for emails</h1>
		<p><?php echo $subscriber_txt;?></p>
		<br/>
		<label></label>
		<form name="FeedBlitz_30351491636c11e39754002590771175" id="FeedBlitz_30351491636c11e39754002590771175" style="display:block" method="POST" target='_newsub' action="https://www.feedblitz.com/f/f.fbz?AddNewUserDirect&ajax=4"> Email address <input name="EMAIL" maxlength="64" type="text" size="25" value="" placeholder="Enter you email address"> <input name="EMAIL_" maxlength="64" type="hidden" size="25" value=""> <input name="EMAIL_ADDRESS" maxlength="64" type="hidden" size="25" value=""> <input name="FEEDID" type="hidden" value="922512"> <input name="PUBLISHER" type="hidden" value="34381607"> <a href="javascript:;" class="btn" onclick="return FeedBlitz_30351491636c11e39754002590771175s(this.form);">Submit</a> <a href="javascript:;" onclick="nothanks();" class="pull-right">No thanks</a></form>
		<br/>
		
	</div>
	
	
	<script language="Javascript">
		</script>
<p>&nbsp;</p>
</div>
<script>
jQuery(document).ready(function(){
    if (document.cookie.indexOf('visited=true') ) {        
		//jQuery(".blackout").show();
    }

	function FeedBlitz_30351491636c11e39754002590771175i(){var x=document.getElementsByName('FeedBlitz_30351491636c11e39754002590771175');for(i=0;i<x.length;i++){x[i].EMAIL.style.display='block'; x[i].action='https://www.feedblitz.com/f/f.fbz?AddNewUserDirect';}} 
	function FeedBlitz_30351491636c11e39754002590771175s(v){
			v.submit();
		// chaul code, open the 3 line codes after subscriber work
		var fifteenDays = 1000*60*60*24*15;
        var expires = new Date((new Date()).valueOf() +  fifteenDays);
        document.cookie = "visited=true;expires=" +  expires.toUTCString();
		// #chaul code
	}
	FeedBlitz_30351491636c11e39754002590771175i();
});
function nothanks(){
	jQuery(".blackout").hide();
	var fifteenDays = 1000*60*60*24*15;
	var expires = new Date((new Date()).valueOf() +  fifteenDays);
	document.cookie = "visited=true;expires=" +  expires.toUTCString();
}
</script>
<!-- #subscriber modal -->