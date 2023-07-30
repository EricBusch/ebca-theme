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
			<div class="flex max-w-[88rem] mx-auto flex-col justify-evenly sm:gap-8 sm:px-8">

				<?php $count = 0; $html = '';?>
				<?php foreach ( busch_get_collection_images( get_the_ID(), 'large', [ 'class' => 'max-h-[80vh] shadow w-auto' ] ) as $image ) : ?>
					<?php  ?>
					<?php
					$html .= '<a href="#" class="bg-white p-8 sm:shadow">' . $image->_html . '</a>';
					$count = $image->_orientation !== 'portrait' ? $count += 2 : $count += 1;
					if($count<2){
						continue;
					}
					?>
					<div
						class="flex flex-col items-center justify-center bg-white sm:gap-8 sm:bg-transparent md:flex-row">
						<a href="#" class="bg-white p-8 sm:shadow"><?php echo $html; ?></a>
					</div>
					<?php
					$count = 0;
					$html = '';
					?>
				<?php endforeach; ?>

				<hr class="sm:hidden border-gray-200 w-full"/>
			</div>
			<!-- /NEW LAYOUT -->


			<!-- Display Images -->
			<section class="mx-auto md:max-w-3xl lg:max-w-8xl px-0 sm:px-10 md:px-12 default-margin-b">
				<div class="flex flex-wrap items-center gap-x-6 gap-y-px sm:gap-y-[8vh]">

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
