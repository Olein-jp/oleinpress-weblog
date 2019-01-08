<?php
/**
 * Format of comment
 */
function op_weblog_comment_format( $comment, $args, $depth ) {
	$GLOBALS[ 'comment' ] = $comment;
	extract( $args, EXTR_SKIP );

	?>
<li <?php comment_class( empty( $args[ 'has_children' ] ) ? 'c-comment-item' : 'c-comment-item c-comment-item_parent' ); ?> id="p-comments__list__id-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/Comment">
	<header class="c-comment-item__header">
		<figure class="c-comment-item__gravatar">
			<?php echo get_avatar( $comment, 75 ); ?>
		</figure>
		<div class="c-comment-item__meta">
			<p class="c-comment-item__author">
				<?php comment_author(); ?>
				<?php if ( get_comment_author_url() ) : ?>
					<a href="<?php comment_author_url(); ?>" class="c-comment-item__author-link" itemprop="author"><i class="fas fa-link"></i></a>
				<?php endif; ?>
			</p>
			<time class="c-comment-item__time" data-time="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <?php comment_time() ?></time>
		</div>
	</header>
	<?php edit_comment_link('<i class="fas fa-edit"></i>','',''); ?>
	<?php if ($comment->comment_approved == '0') : ?>
		<p class="c-comment-item__message">Your comment is awaiting moderation.</p>
	<?php endif; ?>
	<div class="c-comment-item__content" itemprop="text">
		<?php comment_text(); ?>
	</div>
	<div class="c-comment-item__reply-area">
		<?php comment_reply_link( array_merge( $args, array(
			'reply_text' => 'Reply',
			'add_below' => $add_below,
			'depth' => $depth,
			'max_depth' => $args['max_depth']
		))); ?>
	</div>
<?php }

/**
 * replace reply link class
 */
add_filter('comment_reply_link', 'op_weblog_replace_reply_link_class');
function op_weblog_replace_reply_link_class( $class ){
	$class = str_replace("class='comment-reply-link", "class='c-comment-item__reply", $class);
	return $class;
}

/**
 * custom edit button for comment
 */
add_filter( 'edit_comment_link', 'op_weblog_edit_comment_link' );
function op_weblog_edit_comment_link( $link ) {
	$link = '<a class="c-comment-item__edit-button" href="' . esc_url( get_edit_comment_link( $comment ) ) . '">' . __( 'Edit comment', 'op-weblog' ) . '</a>';
	return $link;
}

/**
 * custom comment form field
 */
add_filter( 'comment_form_default_fields', 'op_weblog_comment_form_fields' );
function op_weblog_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$fields    = array(
		'author' =>
			'<div class="c-form-group">' .
			'<label for="author" class="">' . __( 'Name', 'op-weblog' ) . ( $req ? '<span class="u-text-danger">*</span>' : '' ) . '</label> ' .
			'<input id="author" class="c-form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' />' .
			'</div>',
		'email' =>
			'<div class="c-form-group">' .
			'<label for="email" class="">' . __( 'Email', 'op-weblog' ) . ( $req ? '<span class="u-text-danger">*</span>' : '' ) . '</label> ' .
			'<input id="email" class="c-form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' />' .
			'</div>',
		'url' =>
			'<div class="c-form-group">' .
			'<label for="url">' .
			__( 'Website', 'op-weblog' ) . '</label>' .
			'<input id="url" class="c-form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" />' .
			'</div>',
	);
	return $fields;
}

/**
 * custom comment form
 */
add_filter( 'comment_form_defaults', 'op_weblog_comment_form' );
function op_weblog_comment_form( $args ) {
	$args[ 'title_reply' ]          = __( 'Leave a reply', 'op-weblog' );
	$args[ 'title_reply_before' ]   = '<h3 id="reply-title" class="p-comment-respond__title">';
	$args[ 'title_reply_to' ]       = __( 'Leave a reply to %s', 'op-weblog' );
	$args[ 'comment_notes_before' ] = '<p class="p-comment-respond__note"><span class="p-comment-respond__note__mail">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>';
	$args[ 'comment_notes_after' ]  = __( '', 'op-weblog' );
	$args[ 'label_submit' ]         = __( 'send', 'op-weblog' );
	$args[ 'comment_field' ]        = '<div class="c-form-group">' .
									  '<label for="comment">' . __( 'Comment', 'oleinpressMedia' ) .
									  '</label>' .
									  '<textarea id="comment" class="c-form-control" name="comment" cols="45" rows="8" aria-required="true">' .
									  '</textarea>' .
									  '</div>';
	$args[ 'submit_field' ]         = '<div class="c-form-group_submit">%1$s %2$s</div>';
	$args[ 'submit_button' ]        = '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />';
	$args[ 'class_submit' ]         = 'c-form-control_submit';
	return $args;
}