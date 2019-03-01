<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oleinpress-weblog
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="l-site-footer">
		<?php if ( is_active_sidebar( 'footer' ) && get_theme_mod( 'op-site-footer-col-number' ) ) : ?>
		<div class="p-footer-widget-area">
			<div class="c-container p-footer-widget-area__container p-footer-widget-area_<?php echo get_theme_mod( 'op-site-footer-col-num' ); ?>">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="p-copyright">
			<div class="p-copyright__inner c-container">
				© <?php echo date( "Y" ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<span class="sep"> | </span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'op-weblog' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'op-weblog' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'op-weblog' ), 'OleinPress Weblog', '<a href="https://olein-design.com/">Olein Design</a>' );
				?>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php
if ( has_nav_menu( 'sp-footer-menu') ) :
?>
	<div class="p-sp-footer-menu">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'sp-footer-menu',
			'menu_id'        => 'sp-footer-menu__list',
			'menu_class'     => 'p-sp-footer-menu__list',
			'container'      => '',
			'depth'          => '1',
		) );
		?>
	</div>
	<div class="p-sp-footer-share">
		<ul class="p-sp-footer-share__list">
			<li class="p-sp-footer-share__item p-sp-footer-share__item_twitter">
				<a href="">
					<span class="fa-stack fa-2x">
						<i class="fas fa-square fa-stack-2x"></i>
						<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
					</span>
					twitter
				</a>
			</li>
			<li class="p-sp-footer-share__item p-sp-footer-share__item_facebook">
				<a href="">
					<span class="fa-stack fa-2x">
						<i class="fas fa-square fa-stack-2x"></i>
						<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
					</span>
					facebook
				</a>
			</li>
			<li class="p-sp-footer-share__item p-sp-footer-share__item_line">
				<a href="">
					<span class="fa-stack fa-2x">
						<i class="fas fa-square fa-stack-2x"></i>
						<i class="fab fa-line fa-stack-1x fa-inverse"></i>
					</span>
					LINE
				</a>
			</li>
			<li class="p-sp-footer-share__item p-sp-footer-share__item_hatena">
				<a href="">
					<span class="fa-stack fa-2x">
						<i class="fas fa-square fa-stack-2x"></i>
						<i class="fa-hatena"></i>
					</span>
					はてな
				</a>
			</li>
			<li class="p-sp-footer-share__item p-sp-footer-share__item_copy">
				<a href="">
					<span class="fa-stack fa-2x">
						<i class="fas fa-square fa-stack-2x"></i>
						<i class="far fa-copy fa-stack-1x fa-inverse"></i>
					</span>
					コピー
				</a>
			</li>
		</ul>
	</div>
	<div class="p-sp-footer-follow">
		<ul class="p-sp-footer-follow__list">
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_twitter">
				<a href="">
					<i class="fab fa-twitter"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_facebook">
				<a href="">
					<i class="fab fa-facebook-f"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_instagram">
				<a href="">
					<i class="fab fa-instagram"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_line">
				<a href="">
					<i class="fab fa-line"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_youtube">
				<a href="">
					<i class="fab fa-youtube"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_wordpress">
				<a href="">
					<i class="fab fa-wordpress-simple"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_github">
				<a href="">
					<i class="fab fa-github"></i>
				</a>
			</li>
			<li class="p-sp-footer-follow__item p-sp-footer-follow__item_rss">
				<a href="">
					<i class="fas fa-rss"></i>
				</a>
			</li>
		</ul>
	</div>
<?php
endif;
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
