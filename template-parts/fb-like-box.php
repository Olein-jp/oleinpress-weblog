<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-28
 * Time: 13:55
 */
?>
<?php
$target_fb_like_box = '';
if ( get_theme_mod( 'op-fb-like-box-name' ) ) {
	$fb_page_name = get_theme_mod( 'op-fb-like-box-name' );
	$target_fb_like_box = 'https://facebook.com/' .  $fb_page_name;
} else {
	$target_fb_like_box = esc_url( get_the_permalink() );
} ?>
<div class="p-fb-like-box">
	<h2 class="p-fb-like-box__title screen-reader-text">この投稿が気に入ったら「いいね！」をどうぞ！</h2>
	<figure class="p-fb-like-box__thumbnail">
		<?php
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'medium' );
		else:
			?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/op-weblog-thumbnail.png" alt="">
		<?php endif; ?>
	</figure>
	<div class="p-fb-like-box__meta">
		<p><strong>この投稿が気に入ったらいいね！しよう</strong></p>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.1';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-like" data-href="<?php echo $target_fb_like_box; ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
		<p><small>最新情報がFacebookで届きます。</small></p>
	</div>
</div>