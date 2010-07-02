<?php
/**
 * @package Doctor House Quotes
 * @version 1.0
 */
/*
Plugin Name: Doctor House Quotes
Plugin URI: http://ejohnny.net/blog/2010/doctor-house-quotes-wordpress-plugin.html
Description: This is just a plugin that quotes some lines used by Doctor House in House MD tv show. This plugin is based on Hello Dolly and i hope in time it will do more than just quote some lines.
Author: Mihai Ioan
Version: 1.0 (beta)
Author URI: http://ejohnnny.net/
*/

function doctor_house_get_quotes() {
	/** These are the Doctor House Quotes */
	$quotes = "Everybody lies.	Reality is almost always wrong.
Never trust doctors.
Truth begins in lies.
Humanity is overrated.I don't ask why patients lie, I just assume they all do.We all make mistakes, and we all pay a price.I solved the case, my work is done.Pretty much all the drugs I prescribe are addictive and dangerous.Weird works for me.";

	// Here we split it into lines
	$quotes = explode("\n", $quotes);

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function doctor_house() {
	$chosen = doctor_house_get_quotes();
	echo "<p id='house'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'doctor_house');

// We need some CSS to position the paragraph
function house_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#house {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'house_css');

?>
