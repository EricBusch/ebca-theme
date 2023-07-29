<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/heading', null, [
				'title' => get_the_title(),
				'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
			] ); ?>

			<!-- Display Images -->
			<section class="contained-images mb-8 lg:mb-10 xl:mb-12">
				<div class="flex flex-wrap items-center gap-x-2 gap-y-px sm:gap-y-[8vh]">

					<?php foreach ( busch_get_collection_images( get_the_ID(), 'large', [ 'class' => 'max-h-[70vh] shadow w-full h-auto' ] ) as $image ) : ?>
						<div
							class="flex items-center justify-center lg:justify-evenly w-full mx-auto bg-white sm:bg-transparent sm:w-auto">
							<div
								class="flex justify-center bg-white px-8 py-8 sm:inline-flex w-auto sm:justify-normal sm:shadow-sm">
								<?php echo $image->_html; ?>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</section>
			<!-- /Display Images -->
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
