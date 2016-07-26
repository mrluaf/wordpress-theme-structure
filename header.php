<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png"/>

    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>

    <script>
		// put google analytics code here

		// site visits longer than 45 seconds do not count as bounces
    	setTimeout("ga('send', 'event', 'unbounce', '45_sec')", 45000);
	</script>
</head>
<body <?php body_class(); ?>>
	<header>
		<a id="logo" href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" /></a>
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</header>

	<div id="content">