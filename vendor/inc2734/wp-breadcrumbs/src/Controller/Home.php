<?php
/**
 * @package inc2734/wp-breadcrumbs
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Breadcrumbs\Controller;

/**
 * Home item of breadcrumbs
 */
class Home extends Controller {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );
		if ( 'page' === $show_on_front && $page_for_posts ) {
			$title = get_the_title( $page_for_posts );
			$this->set( $title );
		}
	}
}
