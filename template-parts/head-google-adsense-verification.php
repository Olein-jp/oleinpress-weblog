<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-28
 * Time: 23:22
 */
if ( get_option( 'op-google-adsense-verification-code' ) ) : ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    <?php echo get_option( 'op-google-adsense-verification-code' ); ?>
</script>
<?php endif;