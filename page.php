<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

		<div class="post page">

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php the_content(); ?>

		</div>

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>