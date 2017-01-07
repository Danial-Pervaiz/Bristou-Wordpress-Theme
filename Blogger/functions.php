<?php

	// add theme support for custom featured images and custom posts types
	add_theme_support('post-thumbnails');
	add_image_size('slides', 758, 430, true);

	// registering theme stylesheets 
	function registering_CSS_stylesheets(){
		wp_enqueue_style('bootstrap_css', 	get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('icons_css', 	  	get_template_directory_uri() . '/css/icons.css');
		wp_enqueue_style('style_css',	  	get_template_directory_uri() . '/css/style.css');
		wp_enqueue_style('responsive_css', 	get_template_directory_uri() . '/css/responsive.css');
		wp_enqueue_style('color.css',      	get_template_directory_uri() . '/css/color.css');
	}
	add_action('wp_enqueue_scripts', 'registering_CSS_stylesheets');

	//registering javascript files
	function registering_JS_Files(){
		wp_enqueue_script('jquery_JS', 		get_template_directory_uri() . '/js/jquery.min.js');
		wp_enqueue_script('owl_carousel', 	get_template_directory_uri() . '/js/owl.carousel.min.js');
		wp_enqueue_script('custom_JS', 		get_template_directory_uri() . '/js/script.js');
	}	
	add_action('wp_enqueue_scripts', 'registering_JS_Files');

	// settings for the logo
	function customized_logo( $wp_customize ){
		$wp_customize->add_section('Theme_Logo', array(
			'title'=>'Custom Logo'
		));
		$wp_customize->add_setting('Theme_Logo_File', array(
			'Default'=>'Image'
		));
		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'Theme_Logo_File_Control', array(
			'Label'	  => 	'Please Upload Logo Image',
			'section' => 	'Theme_Logo',
			'settings'=> 	'Theme_Logo_File',
			'width'=>'193',
			'height'=>'41',
		)));

		// add Search Logo Image Icon
		$wp_customize->add_setting('Theme_Logo_File_Search', array(
			'Default'=>'Image'
		));
		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'Theme_Logo_File_Search_Control', array(
			'Label'	  => 	'Please Upload Logo Image Icon for Search',
			'section' => 	'Theme_Logo',
			'settings'=> 	'Theme_Logo_File_Search',
			'width'=>'17',
			'height'=>'17',
		)));
	}
	add_action('customize_register', 'customized_logo');

	// navigation menu theme location registeration
	register_nav_menus( array( 
		'primary'=>__('Primary Menu')
	));

	// customize post excerpts;
	function custom_post_excerpts(){
		return 80;
	}
	add_filter('excerpt_length', 'custom_post_excerpts');

	function new_excerpt_more( $more ) {
	    return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
?>