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
						<ul class="infos">
							<li>
								<span class="icon flaticon flaticon-calentar"></span>
								<time class="number" datetime="<?php the_time('Y-m-d'); ?>" pubdate>
									<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
								</time>
							</li>
							<li>
								<span class="icon flaticon flaticon-speechbubble65"></span>
								<span class="number">
									<?php comments_number( '0', '1', '%' ); ?>
								</span>
							</li>
						</ul>
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