<?php get_header(); ?>

<?php
echo '
	<div class="post 404">

		<h2>' . esc_html__("Oops! That page can't be found.", "lancerteam") . '</h2>
		<p>' . esc_html__("It looks like nothing was found at this location.", "lancerteam") . '</p>

	</div>
';
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>