<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/page', 'default' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
