<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oleinpress-weblog
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="p-comments">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="p-comments__title">
			<?php
			$op_weblog_comment_count = get_comments_number();
			if ( '1' === $op_weblog_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'op-weblog' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $op_weblog_comment_count, 'comments title', 'op-weblog' ) ),
					number_format_i18n( $op_weblog_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="p-comments__list">
			<?php
			wp_list_comments( array(
				'callback' => 'op_weblog_comment_format',
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="p-comments__nothing"><?php esc_html_e( 'Comments are closed.', 'op-weblog' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
<script>
	jQuery(function($){
		$('#respond').addClass( 'p-comment-respond' );
		$('#commentform').addClass( 'p-comment-respond__form' );
	});
</script>
