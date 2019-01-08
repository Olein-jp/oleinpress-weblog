<div class="mw-share-button mw-share-button--<?php echo esc_attr( $type ); ?> mw-share-button--twitter">
	<div class="mw-share-button__count">-</div>
	<a class="mw-share-button__button" href="<?php echo esc_url( 'https://twitter.com/share?&amp;text=' . urlencode( $title ) . '&amp;url=' . $permalink ); ?>" target="_blank">
		<span class="mw-share-button__icon fa fa-twitter"></span>
		<?php esc_html_e( 'Tweet', 'wp-mw-share-buttons' ); ?>
	</a>
</div>
