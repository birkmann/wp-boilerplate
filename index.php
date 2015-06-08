<?php get_header(); ?>

	<div class="wrapper">

		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

				<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					the_content();
				?>

			 <?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php get_footer(); ?>