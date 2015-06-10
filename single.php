<?php get_header(); ?>

	<div class="emotion">
		<div class="img-wrapper">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>


	<main class="content">

		<div class="wrapper">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="single">
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<?php the_content(); ?>
					<?php comments_template(); ?>
				</article>
			<?php endwhile; ?>
			
		</div>
		
	</main>

<?php get_footer(); ?>