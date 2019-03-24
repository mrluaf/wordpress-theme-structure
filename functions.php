<?php

// enqueue scripts and styles

add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');

function enqueue_scripts_styles() {

	// update jquery
	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1');

	// update jquery migrate
	wp_deregister_script('jquery-migrate');
	wp_register_script('jquery-migrate','https://code.jquery.com/jquery-migrate-3.0.1.min.js', array(), '3.0.1');

	// scripts.js
	wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);

	// style.css
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/styles.css');

	// google fonts
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700');

	// font awesome
	wp_enqueue_style('icons', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
}


// add featured image support and image sizes

add_theme_support('post-thumbnails');

// image sizes can be defined like this: add_image_size('square', 1200, 1200);


// create menus

add_action( 'init', 'create_menus' );

function create_menus() {

  register_nav_menu('main-menu', 'Main Menu');

}


// create sidebars

add_action( 'widgets_init', 'create_sidebars' );

function create_sidebars() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
	) );

}

?>