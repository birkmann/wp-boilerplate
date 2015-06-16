<?php
/*
Template Name: Category
*/
get_header(); ?>

	<div class="wrapper">
				
		<h2>Category Site:</h2>
		<h3>Category: <?php single_cat_title(); ?></h3>

		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h2>Archives by Subject:</h2>
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>

		<?php 
			$args = array ( 'category' => ID, 'posts_per_page' => 100);
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post);
		?>
			//Style Posts here
		<?php endforeach; ?>
		
	</div>

<?php get_footer(); ?>