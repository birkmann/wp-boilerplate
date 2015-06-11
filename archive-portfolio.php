<?php 

	/*
	Template Name: Archive Portfolio Template
	*/

?>

<?php get_header(); ?>

<div class="wrapper">
	<h2>archive-portfolio.php</h2>
	<?php query_posts(array('post_type'=>'portfolio')); ?>
</div>

<?php get_footer(); ?>