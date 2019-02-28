<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-28
 * Time: 23:19
 */
$tracking_id = get_theme_mod( 'google-analytics-tracking-id' );
if ( $tracking_id && ! is_user_logged_in() ) : ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async
		src="https://www.googletagmanager.com/gtag/js?id=<?php echo $tracking_id; ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', '<?php echo $tracking_id; ?>');
</script>
<?php endif;