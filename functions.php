<?php

	define( 'TEMPLATE_PARENT_DIR', get_template_directory() );
	define( 'TEMPLATE_INCLUDES_DIR', TEMPLATE_PARENT_DIR. '/inc' );

	function register_my_menus() {
		register_nav_menus(
			array(
				'nav-main' => __( 'Main Menu' ),
				'nav-secondary' => __( 'Secondary Menu' )
			)
		);
	}

	add_action( 'init', 'register_my_menus' );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

	$argsCustomHeader = array(
		'flex-height'            => false,
		'height'                 => 800,
		'flex-width'             => false,
		'width'                  => 1400,
		'default-image'          => get_template_directory_uri() . '/assets/images/custom-header.jpg',
		'random-default'         => false,
		'header-text'            => false,
		'uploads'                => true
	);
 
	add_theme_support( 'custom-header', $argsCustomHeader );

	set_post_thumbnail_size( 1400, 800, true );

	// post thumbnail support
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'post-thumb', 1400, 800 );
		add_image_size( 'home-thumb', 400, 300, true );
	}

	function wp_boilerplate_widgets_init() {

		register_sidebar( array(
			'name'          => __( 'Custom Widget Area Header', 'wp-boilerplate' ),
			'id'            => 'widget-header',
			'description'   => __( 'Custom widget area for the header of my theme', 'wp-boilerplate' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Custom Widget Area Sidebar', 'wp-boilerplate' ),
			'id'            => 'widget-sidebar',
			'description'   => __( 'Custom widget area for the sidebar of my theme', 'wp-boilerplate' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-sidebar">',
			'after_title'   => '</h3>',
		) );

		register_sidebar(array(
			'name' => 'Footer Left',
			'id'   => 'widget-footer-left',
			'description'   => 'Footer Left widget position.',
			'before_widget' => '<div id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		register_sidebar(array(
			'name' => 'Footer Center',
			'id'   => 'widget-footer-center',
			'description'   => 'Footer Center widget position.',
			'before_widget' => '<div id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		register_sidebar(array(
			'name' => 'Footer Right',
			'id'   => 'widget-footer-right',
			'description'   => 'Footer right widget position.',
			'before_widget' => '<div id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		register_sidebar( array(
			'name'          => __( 'Custom Widget Area Footer', 'wp-boilerplate' ),
			'id'            => 'widget-footer',
			'description'   => __( 'Custom widget area for the footer of my theme', 'wp-boilerplate' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	}

	add_action( 'widgets_init', 'wp_boilerplate_widgets_init' );
	add_filter('widget_text', 'do_shortcode');

	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	function prefix_comment_callback( $comment, $args, $depth ) {
		include( locate_template('comment.php') );
	}

	/* Custom Post Type Start */

	 
	function ah_custom_post_type() {
	 
		$labels = array(
			'name' => 'Portfolio Items',
			'singular_name' => 'Portfolio',
			'menu_name' => 'CPT',
			'parent_item_colon' => '',
			'all_items' => 'All Items',
			'view_item' => 'View Item',
			'add_new_item' => 'Add New Item',
			'add_new' => 'Add New',
			'edit_item' => 'Edit Item',
			'update_item' => 'Update Item',
			'search_items' => '',
			'not_found' => '',
			'not_found_in_trash' => '',
		);

		$rewrite = array(
			'slug' => 'portfolio',
			'with_front' => true,
			'pages' => true,
			'feeds' => true,
		);

		$args = array(
			'labels' => $labels,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', ),
			'taxonomies' => array( 'category', 'post_tag' ),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 5,
			'can_export' => false,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => $rewrite,
			'capability_type' => 'page',
		);

	register_post_type( 'portfolio', $args );
	 
	}
	 
	add_action( 'init', 'ah_custom_post_type', 0 );

?>