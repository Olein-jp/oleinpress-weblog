<?php
namespace MwShareButtons\Setup;

class Shortcode {

	public function __construct() {
		$shortcode_name = \MwShareButtons\Setup\Config::KEY;
		add_shortcode( $shortcode_name, array( $this, 'buttons' ) );
		add_shortcode( $shortcode_name . '_facebook', array( $this, 'facebook' ) );
		add_shortcode( $shortcode_name . '_twitter',  array( $this, 'twitter' ) );
		add_shortcode( $shortcode_name . '_hatena',   array( $this, 'hatena' ) );
		add_shortcode( $shortcode_name . '_pocket',   array( $this, 'pocket' ) );
		add_shortcode( $shortcode_name . '_feedly',   array( $this, 'feedly' ) );
	}

	public function facebook( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'      => 'balloon',
			'permalink' => get_permalink(),
		), $attributes );

		return $this->render( 'facebook', array(
			'type'      => $attributes['type'],
			'permalink' => $attributes['permalink'],
		) );
	}

	public function twitter( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'      => 'balloon',
			'title'     => get_the_title(),
			'permalink' => get_permalink(),
		), $attributes );

		return $this->render( 'twitter', array(
			'type'      => $attributes['type'],
			'title'     => $attributes['title'],
			'permalink' => $attributes['permalink'],
		) );
	}

	public function hatena( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'      => 'balloon',
			'title'     => get_the_title(),
			'permalink' => get_permalink(),
		), $attributes );

		return $this->render( 'hatena', array(
			'type'      => $attributes['type'],
			'title'     => $attributes['title'],
			'permalink' => $attributes['permalink'],
		) );
	}

	public function pocket( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'      => 'balloon',
			'title'     => get_the_title(),
			'permalink' => get_permalink(),
		), $attributes );

		return $this->render( 'pocket', array(
			'type'      => $attributes['type'],
			'title'     => $attributes['title'],
			'permalink' => $attributes['permalink'],
		) );
	}

	public function feedly( $attributes ) {
		$attributes = shortcode_atts( array(
			'type' => 'balloon',
		), $attributes );

		return $this->render( 'feedly', array(
			'type' => $attributes['type'],
		) );
	}

	public function buttons( $attributes ) {
		$attributes = shortcode_atts( array(
			'type'      => 'balloon',
			'title'     => get_the_title(),
			'permalink' => get_permalink(),
		), $attributes );

		return do_shortcode( $this->render( 'buttons', array(
			'type'      => $attributes['type'],
			'title'     => $attributes['title'],
			'permalink' => $attributes['permalink'],
		) ) );
	}

	protected function render( $filepath, $vars ) {
		$filepath = WP_PLUGIN_DIR . '/' . \MwShareButtons\Setup\Config::NAME . '/templates/' . $filepath . '.php';
		if ( file_exists( $filepath ) ) {
			ob_start();
			extract( $vars );
			include( $filepath );
			return ob_get_clean();
		}
	}
}
