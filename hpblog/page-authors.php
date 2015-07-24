<?php
/**
 * Template Name: Authors
 *
 * A custom page template for the list of authors.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<section class="babybear tile">
<h1 class="section-title">Authors</h1>
<?php
$counter = 0;
$blogusers = get_users('orderby=nicename&exclude=1');
foreach ($blogusers as $user) {
	echo '<article onclick="location.href=\''.esc_url( get_author_posts_url( $user->ID ) ).'\'">';
		
		//echo userphoto__get_userphoto($user->ID, USERPHOTO_THUMBNAIL_SIZE, $before, $after, $attributes, $default_src);
		$author_bio_avatar_size = apply_filters( 'twentythirteen_author_bio_avatar_size', 800 );
		echo get_avatar( $user->ID, $author_bio_avatar_size );
		echo '<header>
				<h1 class="hed">' . $user->display_name . '</h1>
				<h1 class="hed-link"><a href="'.esc_url( get_author_posts_url( $user->ID ) ).'">' . $user->display_name . '</a></h1>
			</header>';
	echo '</article>';
	 
}

?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>