<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-27
 * Time: 22:20
 */
?>
<?php
if ( get_option( 'op-display-share-buttons' ) ) :
?>
<div class="wp-share-buttons wp-share-buttons--<?php echo esc_attr( get_option( 'op-share-buttons-type' ) ); ?>">
<ul class="p-share-buttons p-share-buttons_<?php echo esc_attr( get_option( 'op-share-buttons-type' ) ); ?> wp-share-buttons__list">
	<?php $buttons = explode( ',', get_option( 'op-display-share-buttons' ) ); ?>
	<?php foreach ( $buttons as $button ) : ?>
	<li class="wp-share-buttons__item">
		<?php
		echo do_shortcode(
			sprintf(
			'[wp_share_buttons_%1$s type="%2$s" title="%3$d" post_id="%4$d"]',
				esc_attr( $button ),
				esc_attr( get_option( 'op-share-buttons-type' ) ),
				get_the_title(),
				get_the_ID()
			)
		);
		?>
	</li>
	<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>