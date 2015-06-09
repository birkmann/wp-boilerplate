<?php get_header(); ?>

<div class="emotion">

	<div class="owl-carousel">

		<?php

		   $args = array('cat' => 5);
		   $category_posts = new WP_Query($args);

		   if($category_posts->have_posts()) : 
		      while($category_posts->have_posts()) : 
		         $category_posts->the_post();
		?>

		         <div class="slide">
					<a href="<?php the_permalink(); ?>">
						<span class="img-wrapper">
							<?php the_post_thumbnail(); ?>
						</span>
						<span class="text-box">
							<span class="wrapper"></span>
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
						</span>
					</a>
				</div>     
		      
		<?php
		      endwhile;
		   else: 
		?>

		      There are no posts.

		<?php
		   endif;
		?>

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