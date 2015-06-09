<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/assets/styles/styles.css" />  
	<?php wp_head(); ?>
</head>
<body>
<div class="page-wrapper">

	<header class="header-main">
		<div class="search-wrapper">
			<div class="wrapper">
				<?php get_search_form(); ?>
			</div>
		</div>
		<div class="wrapper">

			<a href="/" class="logo">
				Plate
			</a>

			<div class="menu-wrapper">
				<?php 
					wp_nav_menu( array( 
						'theme_location' 	=> 'nav-main',
						'echo'				=> true,
						'items_wrap'      => '<nav class="nav-main"><ul id="%1$s" class="%2$s"> <span class="menu-items">%3$s</span></ul></nav>'
					)); 
				?>
			</div>

			<span class="search-toggle glyph-icon flaticon-magnifying-glass32"></span>

			<?php if ( is_active_sidebar( 'widget-header' ) ) : ?>
				<?php dynamic_sidebar( 'widget-header' ); ?>
			<?php endif; ?>

		</div>
	</header>