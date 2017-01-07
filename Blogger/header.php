<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html;" charset="<?php bloginfo('charset');?>" />
	<title><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!-- Styles -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="menu-bar">
			<div class="container">
				<nav>	
					<?php 
						$args = array(
							'theme_location'=>'primary',
							'container'=>'nav',
							'container_class'=>'nav'
						);
						wp_nav_menu( $args );


					 ?>
				</nav><!-- Navigation -->
				<div class="header-search">
					<a class="search-btn" href="#" title="">
					<img src="<?php echo wp_get_attachment_url(get_theme_mod('Theme_Logo_File_Search'));?>" alt="" /></a>
					<form id="searchform" method="get" role="search" action="<?php echo home_url('/');?>">
						<?php get_search_form(); ?>
					</form>
				</div><!-- Header Search -->
			</div>
		</div>
		<div class="logo"><a href="index.html" title=""><img src="<?php echo wp_get_attachment_url(get_theme_mod('Theme_Logo_File'));?>" alt="" /></a></div>
	</header><!-- Header -->