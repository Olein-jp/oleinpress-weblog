<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package oleinpress-weblog
 */

get_header();
?>

	<div id="primary" class="l-content-area">
		<main id="main" class="l-site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'p-entry' ); ?>>
				<header class="c-entry-header">
					<h1 class="c-entry-title"><?php the_title(); ?></h1>
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
				</header>
				<?php
				if ( false !== strpos( get_option( 'op-switch-show-on-page-post' ), 'post' ) ) {
					$op_switch_show_on_top_bottom = get_option( 'op-switch-show-on-top-bottom' );
					if ( false !== strpos( $op_switch_show_on_top_bottom, 'top' ) ) {
						get_template_part( 'template-parts/share-buttons' );
					}
				}
				?>
				<figure class="c-entry-thumbnail">
					<?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'large' );
					else:
						?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/op-weblog-thumbnail.png" alt="">
					<?php endif; ?>
				</figure>
				<div class="c-entry-content">
					<?php the_content(); ?>
				</div>
				<?php
				if ( 'show' === get_theme_mod( 'op-fb-like-box-show-post' ) ) {
					get_template_part( 'template-parts/fb-like-box' );
				} ?>
				<?php
				if ( false !== strpos( get_option( 'op-switch-show-on-page-post' ), 'post' ) ) {
					if ( false !== strpos( get_option( 'op-switch-show-on-top-bottom' ), 'bottom' ) ) {
						get_template_part( 'template-parts/share-buttons' );
					}
				}
				?>
			</article>

			<?php

//			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
