<?php

// enqueue scripts and styles

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );

function enqueue_scripts_styles() {

	// scripts.js
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');

	// style.css
	wp_register_style('styles', get_stylesheet_directory_uri() . '/styles.css' );
	wp_enqueue_style('styles');

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