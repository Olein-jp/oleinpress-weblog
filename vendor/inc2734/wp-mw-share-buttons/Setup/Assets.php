<?php
namespace MwShareButtons\Setup;

class Assets {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	public function wp_enqueue_scripts() {
		$url = plugins_url( \MwShareButtons\Setup\Config::NAME );

		wp_enqueue_style(
			\MwShareButtons\Setup\Config::NAME,
			$url . '/assets/css/style.min.css'
		);
		wp_enqueue_script(
			\MwShareButtons\Setup\Config::NAME,
			$url . '/assets/js/app.min.js',
			array( 'jquery' ),
			null,
			false
		);

		$feedly_action = \MwShareButtons\Setup\Config::KEY . '_feedly';
		wp_localize_script(
			\MwShareButtons\Setup\Config::NAME,
			$feedly_action,
			array(
				'endpoint'    => admin_url( 'admin-ajax.php' ),
				'action'      => $feedly_action,
				'_ajax_nonce' => wp_create_nonce( $feedly_action )
			)
		);

		$pocket_action = \MwShareButtons\Setup\Config::KEY . '_pocket';
		wp_localize_script(
			\MwShareButtons\Setup\Config::NAME,
			$pocket_action,
			array(
				'endpoint'    => admin_url( 'admin-ajax.php' ),
				'action'      => $pocket_action,
				'_ajax_nonce' => wp_create_nonce( $pocket_action ),
			)
		);
	}
}
