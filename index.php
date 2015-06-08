<?php get_header(); ?>

	<div class="emotion">

		<div class="owl-carousel">
		
			<?php

				$post_query = new WP_Query ( 'post_type' , 'post'  );

				if($post_query->have_posts() ) : while($post_query->have_posts() ) : $post_query->the_post(); ?>

					<div class="slide">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
						</a>
					</div>
			
					<?php endwhile; ?>

				<?php endif; ?>

		</div>

	</div>

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