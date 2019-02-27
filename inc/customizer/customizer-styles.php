<?php
use Inc2734\WP_Customizer_Framework\Style;

add_action(
	'inc2734_wp_customizer_framework_load_styles',
	function() {
		$accent_color = get_theme_mod( 'op-accent-color' );

		Style::register(
			[
				'.l-site-header',
				'.c-archive-thumbnail',
				'.c-entry-thumbnail',
				'.p-copyright',
				'.widget-title',
				'.c-entry-content table thead th',
				'.widget_tag_cloud .tagcloud a',
			],
			[
				"background: {$accent_color};",
			]
		);

		Style::register(
			[
				'.c-entry-content h1',
				'.c-entry-content h2',
				'.c-entry-content h3',
			],
			[
				"border-bottom-color: {$accent_color};",
			]
		);

		Style::register(
			[
				'.c-entry-content h4',
				'.c-entry-content h5',
				'.c-entry-content h6',
			],
			[
				"color: {$accent_color};",
			]
		);

		Style::register(
			[
				'.widget_search .c-widget-searchform__submit',
			],
			[
				"color: {$accent_color};",
			]
		);
	}
);