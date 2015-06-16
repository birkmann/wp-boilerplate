<?php
	if ( post_password_required() )
		return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentythirteen' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'callback' => 'prefix_comment_callback'
				) );
			?>
		</ol>

	<?php endif; ?>

	<?php
		$comments_args = array(
	        'comment_field' => '<textarea id="comment" name="comment" aria-required="true" placeholder="Comment"></textarea>',
			'fields' => apply_filters( 'comment_form_default_fields', array(
		    'author' =>
		      '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		      '" size="30"' . $aria_req . ' />' /* . ( $req ? '<span class="required">*</span>' : '' ) */,
		    'email' =>
		      '<input id="email" placeholder="Mail" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		      '" size="30"' . $aria_req . ' />' /* . ( $req ? '<span class="required">*</span>' : '' ) */,
		    'url' =>
		      '<input id="url" placeholder="Website" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		      '" size="30" />',
		    )
		  ),
		);
	comment_form($comments_args); ?>

</div>