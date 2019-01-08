<div class="mw-share-button mw-share-button--<?php echo esc_attr( $type ); ?> mw-share-button--facebook">
	<div class="mw-share-button__count">0</div>
	<a class="mw-share-button__button" href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink ); ?>" target="_blank">
		<span class="mw-share-button__icon fa fa-facebook"></span>
		<?php esc_html_e( 'Share', 'wp-mw-share-buttons' ); ?>
	</a>
</div>
