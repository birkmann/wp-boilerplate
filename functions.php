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

?>