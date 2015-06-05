<?php get_header(); ?>

	<div class="wrapper">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

	</div>

<?php get_footer(); ?>