<?php

/* limit wordpress title whitout code */
/* Method 1 :*/
/*Note: this method will limit title function all-around*/
function max_title_length( $title ) {
$max = 30;
if( strlen( $title ) > $max ) {
return substr( $title, 0, $max ). " …";
} else {
return $title;}}
 
add_filter( 'the_title', 'max_title_length');


/* method 2:*/
/* Note: this method will limit title function every where you want */
$thetitle = $post->post_title; /* or you can use get_the_title() */
$getlength = strlen($thetitle);
$thelength = 29;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";


/* Active wordpress thumbnail */
add_theme_support( 'post-thumbnails' );
remove_action('wp_head', 'wp_generator');

/* Disable Feed from wordpress */
function disable_feeds() {
	wp_redirect( home_url() );
	die;
}

add_action( 'do_feed',      'disable_feeds', -1 );
add_action( 'do_feed_rdf',  'disable_feeds', -1 );
add_action( 'do_feed_rss',  'disable_feeds', -1 );
add_action( 'do_feed_rss2', 'disable_feeds', -1 );
add_action( 'do_feed_atom', 'disable_feeds', -1 );

// Disable comment feeds.
add_action( 'do_feed_rss2_comments', 'disable_feeds', -1 );
add_action( 'do_feed_atom_comments', 'disable_feeds', -1 );

// Prevent feed links from being inserted in the <head> of the page.
add_action( 'feed_links_show_posts_feed',    '__return_false', -1 );
add_action( 'feed_links_show_comments_feed', '__return_false', -1 );
remove_action( 'wp_head', 'feed_links',       2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );









