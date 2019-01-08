<div class="mw-share-button mw-share-button--<?php echo esc_attr( $type ); ?> mw-share-button--pocket">
	<div class="mw-share-button__count">0</div>
	<a class="mw-share-button__button" href="<?php echo esc_url( 'https://getpocket.com/edit?url=' . $permalink . '&title=' . $title ); ?>" target="_blank">
		<span class="mw-share-button__icon fa fa-get-pocket"></span>
		<?php esc_html_e( 'Pocket', 'wp-mw-share-buttons' ); ?>
	</a>
</div>
