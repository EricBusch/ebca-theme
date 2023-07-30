<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/heading', null, [
				'title' => get_the_title(),
				'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
			] ); ?>

			<!-- NEW LAYOUT -->
			<div class="flex max-w-[82rem] mx-auto flex-col justify-evenly sm:gap-8 sm:px-8 default-margin-b">

				<?php
				$count = 0;
				$html  = '';
				$hr    = '<hr class="sm:hidden border-gray-200 w-full" />';
				?>
				<?php foreach ( busch_get_collection_images( get_the_ID(), 'large', [ 'class' => 'max-h-[76vh] shadow w-auto' ] ) as $image ) : ?>
					<?php
					$count = $image->_orientation !== 'portrait' ? $count += 2 : $count += 1;
					$html  .= '<a href="#" class="bg-white p-8 sm:shadow">' . $image->_html . '</a>';

					if ( $image->_orientation === 'portrait' ) {
						if ( $image->_next_orientation === 'portrait' ) {
							if ( $count < 2 ) {
								$html .= $hr;
								continue;
							}
						}
					}
					?>
					<div
						class="flex flex-col items-center justify-center bg-white sm:gap-8 sm:bg-transparent md:flex-row">
						<?php echo $html; ?>
					</div>

					<?php echo $hr; ?>

					<?php
					$count = 0;
					$html  = '';
					?>
				<?php endforeach; ?>
			</div>
			<!-- /NEW LAYOUT -->


		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
