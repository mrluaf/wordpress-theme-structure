<?php

// enqueue scripts + styles

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );

function enqueue_scripts_styles() {

	// style.css
	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style('style');

	// scripts.js
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');

}

// add featured image support + image sizes

add_theme_support('post-thumbnails'); 
// add_image_size('square', 1200, 1200); 

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
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ) );

}

?>