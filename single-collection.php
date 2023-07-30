<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/heading', null, [
				'title' => get_the_title(),
				'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
			] ); ?>

			<!-- Display Images from Collection -->
			<div class="flex max-w-[82rem] mx-auto flex-col justify-evenly sm:gap-8 sm:px-8 default-margin-b">
				<?php
				$count = 0;
				$html  = '';
				$hr    = '<hr class="sm:hidden border-gray-200 w-full" />';
				$link  = '<a href="#" class="bg-white p-8 sm:shadow" title="View larger">%s</a>';
				$row   = '<!-- Row Start --><div class="flex flex-col items-center justify-center bg-white sm:gap-8 sm:bg-transparent md:flex-row">%s</div><!-- /Row Start -->';

				foreach ( busch_get_formatted_images_for_collection( get_the_ID(), 'large', [ 'class' => 'max-h-[76vh] shadow w-auto' ] ) as $image ) {

					// Count "1" for a portrait image, "2" for a non-portrait image.
					$count = $image->_orientation !== 'portrait' ? $count += 2 : $count += 1;

					// Build <a> link for image.
					$html .= sprintf( $link, $image->_html );

					// If the current image is a portrait and the next image is a portrait and we have only added 1 image to this row...
					if ( $image->_orientation === 'portrait' && $image->_next_orientation === 'portrait' && $count < 2 ) {

						// Insert <hr> tag and continue to get the next image in loop before closing "row" div.
						$html .= $hr;
						continue;
					}

					// Build "row" div.
					printf( $row, $html );

					// Display <hr> between images.
					echo $hr;

					// Reset $count and $html.
					$count = 0;
					$html  = '';
				}
				?>
			</div>
			<!-- /Display Images from Collection -->

		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
