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


	/* Contact Form Start */

	function html_form_code() {
		echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
		echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" placeholder="Name" required >';
		echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" placeholder="Mail" required>';
		echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40"  placeholder="Subject" required>';
		echo '<textarea name="cf-message" placeholder="Message" required>' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
		echo '<button name="cf-submitted" type="submit">Send Message</button>';
		echo '</form>';
	}

	function deliver_mail() {
		if ( isset( $_POST['cf-submitted'] ) ) {
			$name    = sanitize_text_field( $_POST["cf-name"] );
			$email   = sanitize_email( $_POST["cf-email"] );
			$subject = sanitize_text_field( $_POST["cf-subject"] );
			$message = esc_textarea( $_POST["cf-message"] );

			$to = get_option( 'admin_email' );

			$headers = "From: $name <$email>" . "\r\n";

			if ( wp_mail( $to, $subject, $message, $headers ) ) {
				echo "sucess";
				// wp_redirect( 'http://www.example.com', 301 );
				// exit;
			} else {
				echo "error";
				// wp_redirect( 'http://www.example.com', 301 );
				// exit;
			}
		}
	}

	function cf_shortcode() {
		ob_start();
		deliver_mail();
		html_form_code();
		return ob_get_clean();
	}

	add_shortcode( 'contact_form', 'cf_shortcode' );

	/* Contact Form End */

?>