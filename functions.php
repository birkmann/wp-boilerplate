<?php

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

	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

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
	}

	add_action( 'widgets_init', 'wp_boilerplate_widgets_init' );

?>