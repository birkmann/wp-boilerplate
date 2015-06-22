<?php
	/*
	Template Name: Category
	*/
?>

<?php get_header(); ?>

<div class="content-wrapper has-sidebar">

	<div class="wrapper">

		<main class="content">

			<h2><?php single_cat_title( '', true ); ?></h2>
			<?php echo category_description(); ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article class="feature">
					<span class="block-side">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail()) the_post_thumbnail('home-thumb'); ?>
						</a>
					</span>
					<span class="block-text">
						<a href="<?php the_permalink(); ?>">
							<h3>
								<?php 
									if (strlen($post->post_title) > 80) {
										echo substr(the_title($before = '', $after = '', FALSE), 0, 80) . '...';
									} else {
										the_title();
									}
								?>
							</h3>
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
						</a>
						<a href="<?php the_permalink(); ?>">
							<?php the_excerpt(); ?>
						</a>
					</span>
				</article>

			<?php endwhile; endif; ?>
			
		</main>

		<aside class="sidebar">
			<?php if ( is_active_sidebar( 'widget-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'widget-sidebar' ); ?>
			<?php endif; ?>	
		</aside>

	</div>	


</div>

<?php get_footer(); ?>