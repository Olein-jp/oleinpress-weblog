<?php

use Inc2734\WP_GitHub_Theme_Updater\GitHub_Theme_Updater;

$updater = new GitHub_Theme_Updater( get_template(), 'Olein-jp', 'oleinpress-weblog' );

/**
 * There is a case that comes back to GitHub's zip url.
 * In that case it returns false because it is illegal.
 */
add_filter(
	'inc2734_github_theme_updater_zip_url',
	function( $url ) {
		if ( 0 !== strpos( $url, 'https://olein-design.com/webhooks/weblog/' ) ) {
			return false;
		}
		return $url;
	}
);

/**
 * Customize request URL that for updating
 */
add_filter(
	'inc2734_github_theme_updater_request_url',
	function( $url ) {
		return 'https://olein-design.com/webhooks/weblog/response.json';
	}
);