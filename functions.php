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
		'width'                  => 1140,
		'default-image'          => get_template_directory_uri() . '/assets/images/custom-header.jpg',
		'random-default'         => false,
		'header-text'            => false,
		'uploads'                => true
	);
 
	add_theme_support( 'custom-header', $argsCustomHeader );

	set_post_thumbnail_size( 1600, 600, true );

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

?>