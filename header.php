<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/assets/styles/styles.css" />  
	<?php wp_head(); ?>
</head>
<body>
<div class="page-wrapper">

	<header class="header-main">
		<div class="wrapper">

			<a href="/" class="logo">
				wp-boilerplate
			</a>

			<div class="menu-wrapper">
				<?php 
					wp_nav_menu( array( 
						'theme_location' 	=> 'nav-main',
						'echo'				=> true,
						'items_wrap'      => '<nav class="nav-main"><ul id="%1$s" class="%2$s"> %3$s </ul></nav>'
					)); 
				?>
			</div>

			<?php get_search_form(); ?>

			<?php if ( is_active_sidebar( 'widget-header' ) ) : ?>
				<?php dynamic_sidebar( 'widget-header' ); ?>
			<?php endif; ?>

		</div>
	</header>