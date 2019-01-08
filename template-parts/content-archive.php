<?php
/**
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'p-archive-body'); ?>>
	<header class="c-archive-header">
		<ul class="c-entry-meta">
			<li class="c-entry-meta__item">
				<time class="c-entry-meta__published" datetime="<?php the_time( 'Y-m-d' ); ?>">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</time>
			</li>
			<?php
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) :
				?>
			<li class="c-entry-meta__item">
				<time class="c-entry-meta__updated" datetime="<?php the_modified_date( 'Y-m-d' ); ?>">
					<?php the_modified_date( get_option( 'date_format' ) ); ?>
				</time>
			</li>
			<?php endif; ?>
		</ul>
		<?php the_title( '<h2 class="c-archive-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->
	<figure class="c-archive-thumbnail">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'large' );
			else:
				?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/op-weblog-thumbnail.png" alt="<?php bloginfo( 'name' ); ?>|ブログ記事「<?php the_title(); ?>」のサムネイル画像">
			<?php endif; ?>
		</a>
	</figure>
</article><!-- #post-<?php the_ID(); ?> -->