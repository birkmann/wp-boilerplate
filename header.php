<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/assets/styles/style.css" />  

</head>
<body>
<a href="/" class="logo">
	logo
</a>
<?php wp_nav_menu( $args ); ?>