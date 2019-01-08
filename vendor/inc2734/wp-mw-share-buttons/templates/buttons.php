<div id="wp-mw-share-buttons-<?php the_ID(); ?>" class="wp-mw-share-buttons" data-wp-mw-share-buttons-title="<?php echo esc_attr( $title ); ?>" data-wp-mw-share-buttons-url="<?php echo esc_attr( $permalink ); ?>" data-mw-share-buttons-postid="<?php the_ID(); ?>">
	<ul class="wp-mw-share-buttons__list">
		<li class="wp-mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_facebook type="<?php echo esc_attr( $type ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="wp-mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_twitter type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="wp-mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_hatena type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="wp-mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_pocket type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="wp-mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_feedly type="<?php echo esc_attr( $type ); ?>"]
		</li>
	</ul>
</div>
