<?php
/**
 * @package inc2734/wp-breadcrumbs
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Breadcrumbs\Controller;

/**
 * Search item of breadcrumbs
 */
class Search extends Controller {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set(
			sprintf(
				__( 'Search results of "%1$s"', 'inc2734-wp-breadcrumbs' ),
				get_search_query()
			)
		);
	}
}
