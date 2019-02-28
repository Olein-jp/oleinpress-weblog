<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-28
 * Time: 23:18
 */
if ( get_theme_mod( 'op-google-search-console-verification' ) ) {
	echo '<meta name="google-site-verification" content="' . get_theme_mod( 'op-google-search-console-verification' ) . '" />';
}
?>