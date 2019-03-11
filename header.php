<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oleinpress-weblog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	$tag_manager_tracking_id = get_theme_mod( 'op-google tag-manager-tracking-id' );
	if ( $tag_manager_tracking_id && ! is_user_logged_in() ) :
	?>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $tag_manager_tracking_id; ?>');</script>
	<?php endif; ?>
	<?php wp_head(); ?>
	<?php get_template_part( 'template-parts/head-search-console-verification' ); ?>
	<?php get_template_part( 'template-parts/head-google-analytics' ); ?>
	<?php get_template_part( 'template-parts/head-google-adsense-verification' ); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( $tag_manager_tracking_id && ! is_user_logged_in() ) : ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $tag_manager_tracking_id; ?>"
				  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
<div id="page" class="l-site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'op-weblog' ); ?></a>

	<header id="masthead" class="l-site-header">
		<div class="c-container l-site-header__inner">
			<?php
			if ( 'center' === get_theme_mod( 'op-site-header-layout') ) {
				get_template_part( 'template-parts/site-header-center' );
			} elseif ( 'right' === get_theme_mod( 'op-site-header-layout') ) {
				get_template_part( 'template-parts/site-header-right' );
			} elseif ( 'left' === get_theme_mod( 'op-site-header-layout') ) {
				get_template_part( 'template-parts/site-header-left' );
			}
			?>
			<button class="p-hamburger-button hamburger hamburger--collapse" type="button">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<?php
			if ( has_nav_menu( 'header-menu') ) :
			?>
				<?php
				$global_menu_horizontal_val = '';
				if ( 'left' === get_theme_mod( 'op-global-menu-horizontal' ) ) {
					$global_menu_horizontal_val = 'left';
				} elseif ( 'center' === get_theme_mod( 'op-global-menu-horizontal' ) ) {
					$global_menu_horizontal_val = 'center';
				}
				?>
			<nav id="site-navigation" class="l-header-menu l-header-menu_<?php echo $global_menu_horizontal_val; ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'header-menu',
					'menu_class'     => 'p-header-menu',
					'container'      => '',
					'depth'          => '0',
				) );
				?>
			</nav><!-- #site-navigation -->
			<?php endif; ?>
			<script>
				jQuery(function($){
                    if (window.matchMedia( 'screen and (min-width: 992px)' ).matches) {
                        $('.p-header-menu').superfish();
                    }
				});
			</script>
		</div>
	</header><!-- #masthead -->

	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	<?php
		$container_tag = 'c-container ';

		if ( is_home() ) { // index.php
			$container_class_tag = 'c-container_archive';
		}

		$container_tag .= $container_class_tag;
	?>
	<div id="content" class="l-site-content <?php echo $container_tag; ?>">
