<?php

// enqueue scripts and styles

add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');

function enqueue_scripts_styles() {

	// update jquery
	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1');

	// update jquery migrate
	wp_deregister_script('jquery-migrate');
	wp_register_script('jquery-migrate','https://code.jquery.com/jquery-migrate-3.1.0.min.js', array(), '3.1.0');

	// scripts.js
	wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);

	// style.css
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/styles.css');

	// google fonts
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i');

	// font awesome
	wp_enqueue_style('icons', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
}


// add featured image support and image sizes

add_theme_support('post-thumbnails');

// image sizes can be defined like this: add_image_size('square', 1200, 1200);


// add support for optional block editor features

// editor styles
add_theme_support( 'editor-styles' );
add_editor_style( 'css/editor-styles.css' );

// wide width elements
add_theme_support('align-wide');

// responsive embeds
add_theme_support( 'responsive-embeds' );

// define custom font sizes
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'  => 'Small',
		'shortName' => 'S',
		'size' => 14,
		'slug' => 'small'
	),
	array(
		'name' => 'Normal',
		'shortName' => 'N',
		'size' => 18,
		'slug' => 'normal'
	),
	array(
		'name' => 'Large',
		'shortName' => 'L',
		'size' => 22,
		'slug' => 'large'
	)
));

// disable font size picker
add_theme_support('disable-custom-font-sizes');

// define custom colors
add_theme_support('editor-color-palette', array(
	array(
		'name'  => 'Light Grey',
		'slug'  => 'light-grey',
		'color'	=> '#eee'
	),
	array(
		'name'  => 'Dark Grey',
		'slug'  => 'dark-grey',
		'color' => '#333'
  ),
));

// disable color picker
add_theme_support('disable-custom-colors');


// create menus

add_action('init', 'create_menus');

function create_menus() {

  register_nav_menu('main-menu', 'Main Menu');

}


// create sidebars

add_action('widgets_init', 'create_sidebars');

function create_sidebars() {

	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
	));

}

?>