<?php get_header(); ?>

<?php if( is_front_page() ) :?>

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
								<span class="blank"></span>
								<?php the_post_thumbnail(); ?>
							</span>
							<span class="text-box">
								<span class="wrapper">
									<h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
								</span>
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
	
<?php endif; ?>

<div class="content-wrapper has-sidebar">

	<div class="wrapper">

		<main class="content">

			<?php if( is_front_page() ) :?>

				<h3>Featured Articles</h3>

				<?php

					   $args = array(
					   		'cat' => 6,
					   		'showposts' => 3
					   	);
					   $category_posts = new WP_Query($args);

					   if($category_posts->have_posts()) : 
						  while($category_posts->have_posts()) : 
							 $category_posts->the_post();
					?>

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
						  
					<?php
						  endwhile;
					   else: 
					?>
						  There are no posts.

				<?php
				   endif;
				?>

			<?php endif; ?>
			
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

		</main>

		<aside class="sidebar">
			<?php if ( is_active_sidebar( 'widget-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'widget-sidebar' ); ?>
			<?php endif; ?>	
		</aside>

	</div>	


</div>


<?php get_footer(); ?>