<?php
namespace MwShareButtons\Setup;

class Ajax {

	public function __construct() {
		$feedly_action = \MwShareButtons\Setup\Config::KEY . '_feedly';
		add_action( 'wp_ajax_' . $feedly_action       , array( $this, 'get_feedly' ) );
		add_action( 'wp_ajax_nopriv_' . $feedly_action, array( $this, 'get_feedly' ) );

		$pocket_action = \MwShareButtons\Setup\Config::KEY . '_pocket';
		add_action( 'wp_ajax_' . $pocket_action       , array( $this, 'get_pocket' ) );
		add_action( 'wp_ajax_nopriv_' . $pocket_action, array( $this, 'get_pocket' ) );
	}

	public function get_feedly() {
		$feedly_action = \MwShareButtons\Setup\Config::KEY . '_feedly';
		check_ajax_referer( $feedly_action );

		$feed_url = rawurlencode( get_bloginfo( 'rss2_url' ) );
		$response = wp_remote_get( "https://cloud.feedly.com/v3/feeds/feed%2F$feed_url" );
		$body     = wp_remote_retrieve_body( $response );
		wp_send_json( json_decode( $body ) );
	}

	public function get_pocket() {
		$pocket_action = \MwShareButtons\Setup\Config::KEY . '_pocket';
		check_ajax_referer( $pocket_action );

		if ( empty( $_GET['post_id'] ) ) {
			return 0;
		}

		$post_id  = $_GET['post_id'];
		$url      = rawurlencode( get_permalink( $post_id ) );
		$response = wp_remote_get( "https://widgets.getpocket.com/v1/button?count=vertical&url=$url" );
		$body     = wp_remote_retrieve_body( $response );
		preg_match( '/<em id="cnt">(\d*?)<\/em>/', $body, $reg );

		$count = 0;
		if ( !empty( $reg[1] ) ) {
			$count = $reg[1];
		}
		wp_send_json( $count );
	}
}
