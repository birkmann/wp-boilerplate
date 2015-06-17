<?php 

	/**
	 * Template Name: Redirect to child page
	 * Description: Redirects to the top child page
	 *
	 * @package PUT YOUR THEME NAME HERE :D
	 */
	
	global $post;
	
	$parent = $post->ID;
	
	// In case you use WPML
	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
	    $_type  = get_post_type( $post->ID );
	    $parent = icl_object_id( $post->ID, $_type, true, ICL_LANGUAGE_CODE );
	}
	
	$post_children = get_children( array(
	    'posts_per_page' => 1,
	    'orderby' => 'menu_order',
	    'order' => 'ASC',
	    'post_type' => 'page',
	    'post_status' => 'publish',
	    'post_parent' => $parent
	) );

	wp_redirect( get_permalink( array_pop( $post_children )->ID ), 301 );

	exit;

?>