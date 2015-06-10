<?php get_header(); ?>

	<div class="emotion">
		<div class="img-wrapper">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>

<div class="content-wrapper has-sidebar">

	<div class="wrapper">

		<main class="content">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="single">
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<?php the_content(); ?>
					<?php comments_template(); ?>
				</article>
			<?php endwhile; ?>
			
		
		</main>

		<aside class="sidebar">
			<?php if ( is_active_sidebar( 'widget-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'widget-sidebar' ); ?>
			<?php endif; ?>	
		</aside>

	</div>	


</div>


<?php get_footer(); ?>