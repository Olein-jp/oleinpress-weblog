<div class="mw-share-button mw-share-button--<?php echo esc_attr( $type ); ?> mw-share-button--feedly">
	<div class="mw-share-button__count">0</div>
	<a class="mw-share-button__button" href="<?php echo esc_url( 'https://feedly.com/index.html#subscription/feed/' . get_bloginfo( 'rss2_url' ) ); ?>" target="_blank">
		<span class="mw-share-button__icon mw-share-button__icon--feedly"></span>
		<?php esc_html_e( 'Feedly', 'wp-mw-share-buttons' ); ?>
	</a>
</div>
