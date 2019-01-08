<div class="mw-share-button mw-share-button--<?php echo esc_attr( $type ); ?> mw-share-button--hatena">
	<div class="mw-share-button__count">0</div>
	<a class="mw-share-button__button" href="<?php echo esc_url( 'http://b.hatena.ne.jp/add?mode=confirm&amp;url=' . $permalink . '&amp;title=' . $title ); ?>" target="_blank">
		<span class="mw-share-button__icon mw-share-button__icon--hatena"></span>
		<?php esc_html_e( 'Bookmark', 'wp-mw-share-buttons' ); ?>
	</a>
</div>
