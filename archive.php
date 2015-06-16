<?php
/*
Template Name: Archives
*/
get_header(); ?>

	<div class="wrapper">
				
		<h2>Archives Site:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h2>Archives by Subject:</h2>
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>
		
	</div>

<?php get_footer(); ?>