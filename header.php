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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="l-site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'op-weblog' ); ?></a>

	<header id="masthead" class="l-site-header">
		<div class="c-container l-site-header__inner">
			<div class="p-site-branding">
				<?php
				if ( has_custom_logo() ) : ?>
					<?php if ( is_front_page() && is_home() ) :
						?>
						<h1 class="p-site-title"><?php the_custom_logo(); ?></h1>
					<?php
					else :
						?>
						<p class="p-site-title"><?php the_custom_logo(); ?></p>
					<?php
					endif;
					?>
				<?php else: ?>
					<?php if ( is_front_page() && is_home() ) :
						?>
						<h1 class="p-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					else :
						?>
						<p class="p-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;
					?>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<button class="p-hamburger-button hamburger hamburger--collapse" type="button">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<?php
			if ( has_nav_menu( 'header-menu') ) :
			?>
			<nav id="site-navigation" class="l-header-menu">
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
