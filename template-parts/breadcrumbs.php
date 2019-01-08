<?php
/**
 * User: kojikuno
 * Date: 2018-12-11
 * Time: 14:07
 */
?>
<?php
$breadcrumbs = new Inc2734\WP_Breadcrumbs\Breadcrumbs();
$items = $breadcrumbs->get();
?>
<div class="p-breadcrumbs">
	<div class="c-container">
		<ol class="p-breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">
			<?php foreach ( $items as $key => $item ) : ?>
				<li class="p-breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<?php if ( empty( $item['link'] ) ) : ?>
						<span itemscope itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
				</span>
					<?php else : ?>
						<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo esc_url( $item['link'] ); ?>">
							<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
						</a>
					<?php endif; ?>
					<meta itemprop="position" content="<?php echo esc_attr( $key + 1 ); ?>" />
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</div>
