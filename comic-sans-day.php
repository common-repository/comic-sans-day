<?php
/*
Plugin Name: Comic Sans Day
Plugin URI: http://autovisie.nl/devblog/comic-sans-day
Description: Want to join in on Comic Sans Day? Now you can!
Version: 1.0
Author: Maarten Soetens <maarten.soetens@woensdag.nl>
Author URI:
License:
Text Domain: comic-sans-day
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function av_comic_sans_day_style() {

	return '<style>*:not(.fa):not(.icon):not(.glyphicons):not([class^="ab-"]):not([class^="fi-"]):not(.dashicons):not(.typcn):not(.genericon) { font-family: "Comic Sans MS"!important; }</style>';

}


function av_comic_sans_day() {


	$comic_sans_day = date('Y-m-d', strtotime(date('Y').'-07-00 first friday'));

	$to_day = date('Y-m-d');

	if ( $comic_sans_day == $to_day) {

		echo av_comic_sans_day_style();

	}
	elseif ( isset( $_GET['comic-sans-day'] ) && ( $_GET['comic-sans-day'] == "preview" ) ) {

		echo av_comic_sans_day_style();

	}

}



add_action('wp_head', 'av_comic_sans_day');



function av_comic_sans_day_preview( $links, $file )
{

	if ( $file == plugin_basename(dirname(__FILE__) . '/comic-sans-day.php') ) {

		$blog_url = home_url();

		$links[] = '<a href="' . $blog_url . '?comic-sans-day=preview">' . __('Preview','comic-sans-day') . '</a>';

	}

	return $links;

}

add_filter( 'plugin_action_links', 'av_comic_sans_day_preview', 10, 2 );
