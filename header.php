<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php bloginfo('name'); ?></title>
    
    <!-- social metas -->
	<meta property="og:title" content="<?php echo get_the_title(); ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
	<meta property="og:description" content="<?php echo get_the_content(); ?>">
	<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta name="twitter:card" content="summary_large_image">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />

    <script>
		// put google analytics code here

		// site visits longer than 45 seconds do not count as bounces
    	setTimeout("ga('send', 'event', 'unbounce', '45_sec')", 45000);
	</script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<a class="logo" href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" /></a>
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</header>

	<div class="content">