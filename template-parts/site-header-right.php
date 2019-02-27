<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-26
 * Time: 14:47
 */
?>
<div class="p-site-branding p-site-branding_right-logo">
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
	<?php endif;?>
</div><!-- .site-branding -->