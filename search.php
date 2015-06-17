<?php
	/*
		Template Name: Search Page
	*/
?>

<?php get_header(); ?>

	<div class="wrapper search-page">

		<h1>
			
			<?php
				global $wp_query;
				
				$total_results = $wp_query->found_posts;
				
				echo $total_results;
				
				if ($total_results > 1) {
					echo "search results for: ";
				} else {
					echo "search result for: ";
				}

				$search_query = get_search_query();

				echo $search_query;
			?>

		</h1>

		<?php get_search_form(); ?>


		<?php
			$s = get_search_query();
			
			$args = array(
				's' =>$s
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				echo "<ul>";
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
		?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>

		<?php
				}
				echo "</ul>";
			} else {
		?>
			<h2>Nothing Found</h2>
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		<?php } ?>



	</div>

<?php get_footer(); ?>