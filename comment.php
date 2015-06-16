<li>
	
	<header>
		<?php echo get_avatar( $comment, 50 ); ?>

		<h3 class="author">
			<?php comment_author(); ?>
		</h3>

		<span class="date">
			<?php printf( __( '%1$s %2$s', 'wp-boilerplate' ), get_comment_date('F j, Y'), get_comment_time($d, $gmt = false, $translate = true) ); ?>
		</span>
	</header>

	<div class="text">
		<?php comment_text(); ?>
	</div>

	<?php edit_comment_link( __( '(Edit)', 'wp-boilerplate' ), ' ' ); ?>


</li>