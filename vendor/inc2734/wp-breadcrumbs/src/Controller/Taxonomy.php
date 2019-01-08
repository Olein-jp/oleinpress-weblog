<?php
/**
 * @package inc2734/wp-breadcrumbs
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Breadcrumbs\Controller;

/**
 * Taxonomy item of breadcrumbs
 */
class Taxonomy extends Controller {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$taxonomy         = get_query_var( 'taxonomy' );
		$term             = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
		$taxonomy_objects = get_taxonomy( $taxonomy );
		$post_types       = $taxonomy_objects->object_type;
		$post_type        = array_shift( $post_types );

		if ( $post_type ) {
			$post_type_object = get_post_type_object( $post_type );
			$label = $post_type_object->label;
			if ( $post_type_object->has_archive ) {
				$this->set( $label, $this->get_post_type_archive_link( $post_type ) );
			}
		}

		if ( is_taxonomy_hierarchical( $taxonomy ) && $term->parent ) {
			$this->set_ancestors( $term->term_id, $taxonomy );
		}

		$this->set( $term->name );
	}
}
