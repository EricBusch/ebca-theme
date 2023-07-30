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
			<div class="flex max-w-[82rem] mx-auto flex-col justify-evenly sm:gap-x-8 sm:gap-y-8 lg:gap-y-12 sm:px-8 default-margin-b">
				<?php
				$count = 0;
				$html  = '';
				$hr    = '<hr class="sm:hidden border-gray-200 w-full" />';
				$link  = '<a href="%s" class="bg-white p-8 sm:shadow" title="View larger" data-fslightbox>%s</a>';
				$row   = '<!-- Row Start --><div class="flex flex-col items-center justify-center bg-white sm:gap-8 sm:bg-transparent md:flex-row">%s</div><!-- /Row Start -->';

				foreach ( busch_get_formatted_images_for_collection( get_the_ID(), '2048x2048', [ 'class' => 'max-h-[76vh] shadow w-auto' ] ) as $image ) {

					// Count "1" for a portrait image, "2" for a non-portrait image.
					$count = $image->_orientation !== 'portrait' ? $count += 2 : $count += 1;

					// Build <a> link for image.
					$html .= sprintf( $link, $image->_lightbox, $image->_html );

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

			<!-- Collection Pagination -->
			<?php $prev = busch_get_prev_collection( get_the_ID() ); ?>
			<?php $next = busch_get_next_collection( get_the_ID() ); ?>
			<section class="default-margin-b">
				<div
					class="mx-auto flex flex-col items-center justify-center gap-4 px-8 text-xs uppercase tracking-wider text-gray-500 sm:px-10 sm:text-sm md:text-xs lg:text-sm md:px-12 lg:max-w-6xl md:flex-row">

					<!-- Previous Collection -->
					<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" title="View previous collection"
					   class="group flex w-full flex-row items-center justify-between space-x-4 bg-white p-1.5 shadow
						transition duration-300 hover:bg-transparent hover:text-gray-900 hover:shadow-none lg:w-1/2">
						<div
							class="rounded-full bg-white p-2 transition group-hover:-translate-x-0.5 group-hover:shadow">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="mr-auto h-5 w-5 fill-gray-500 group-hover:fill-gray-900" viewBox="0 0 320 512">
								<path
									d="M-1.9 256l17-17L207 47l17-17L257.9 64 241 81 65.9 256 241 431l17 17L224 481.9l-17-17L15 273l-17-17z"/>
							</svg>
						</div>
						<div class="flex flex-row items-center space-x-4">
							<div class="truncate whitespace-nowrap"><?php esc_html_e( $prev->post_title ); ?></div>
							<?php echo get_the_post_thumbnail(
								$prev->ID,
								'medium',
								[
									'class' => 'aspect-square w-auto h-10 shrink-0 object-cover group-hover:shadow sm:aspect-video sm:h-16 md:h-12 lg:h-16',
									'alt'   => esc_attr( $prev->post_title . ' Collection Image' ),
								]
							); ?>
						</div>
					</a>
					<!-- /Previous Collection -->

					<!-- Next Collection -->
					<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" title="View next collection"
					   class="group flex w-full flex-row items-center justify-between space-x-4 bg-white p-1.5 shadow transition duration-300 hover:bg-transparent hover:text-gray-900 hover:shadow-none lg:w-1/2">
						<div class="flex flex-row items-center space-x-4">
							<?php echo get_the_post_thumbnail(
								$next->ID,
								'medium',
								[
									'class' => 'aspect-square w-auto h-10 shrink-0 object-cover group-hover:shadow sm:aspect-video sm:h-16 md:h-12 lg:h-16',
									'alt'   => esc_attr( $next->post_title . ' Collection Image' ),
								]
							); ?>
							<div class="truncate whitespace-nowrap"><?php esc_html_e( $next->post_title ); ?></div>
						</div>
						<div
							class="rounded-full bg-white p-2 transition group-hover:translate-x-0.5 group-hover:shadow">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="mr-auto h-5 w-5 fill-gray-500 group-hover:fill-gray-900" viewBox="0 0 320 512">
								<path
									d="M321.9 256l-17 17L113 465l-17 17L62.1 448l17-17 175-175L79 81l-17-17L96 30.1l17 17L305 239l17 17z"/>
							</svg>
						</div>
					</a>
					<!-- /Next Collection -->

				</div>
			</section>
			<!-- /Collection Pagination -->

		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
